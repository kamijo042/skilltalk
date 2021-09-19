<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Log;
use App\Models\Lectures;
use App\Models\LectureBooks;
use App\Models\MessageThreads;
use App\Models\Transactions;
use App\Components\GcsUtils;

use App\Components\PaymentComponent;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($lecture_id)
    {
        return redirect(route('lecture.detail', ['lecture_id' => $lecture_id]));
    }

    public function payment(Request $request)
    {
        if (empty($request->get('payjp-token')) && !$request->get('payjp_card_id')) {
            abort(404);
        }

        DB::beginTransaction();

        try {
            $user = auth()->user();
            $payment = new PaymentComponent();
    
            // 以前使用したカードを使う場合
            if (!empty($request->get('payjp_card_id'))) {
              $customer = $payment->searchCustomer($user['payjp_customer_id']); 
              $customer->default_card = $request->get('payjp_card_id');
              $customer->save();

            // 既にpayjpに登録済みの場合
            } elseif (!empty($user['payjp_customer_id'])) {
              $customer = $payment->searchCustomer($user['payjp_customer_id']); 
              $card = $customer->cards->create([
                'card' => $request->get('payjp-token'),
              ]);
               $customer->default_card = $card->id;
               $customer->save();

            // payjp未登録の場合
            } else {
               $customer = $payment->createCustomer($request->get('payjp-token'));
               $user->payjp_customer_id = $customer->id;
               $user->save();
            }

            // 金額
            $full_price = $request->get('full_price');
            $discount_price = $request->get('discount_price');
            $fixed_price = $request->get('fixed_price');

            // PPay JPにチャージ
            $charge = $payment->makeAuthorization($customer->id, $fixed_price);

            // DB登録
            $transaction = Transactions::create([
                "lecture_id" => $request->get('lecture_id'),
                "user_id" => Auth::user()->id,
                "charge_id" => $charge->id,
                "card_id" => $charge->card->id,
                "coupon_id" => null,
                "full_price" => $full_price,
                "discount_price" => $discount_price,
                "fixed_price" => $fixed_price,
                "status" => 1,
            ]);

            $lecture_book = LectureBooks::create([
                "lecture_id" => $request->get('lecture_id'),
                "user_id" => Auth::user()->id,
                "transaction_id" => $transaction->id,
                "status" => 1,
            ]);

            if(MessageThreads::where('lecture_id', $request->get('lecture_id'))->where('audience_user_id', Auth::user()->id)->exists()) {
                $message_thread = MessageThreads::where('lecture_id', $request->get('lecture_id'))->where('audience_user_id', Auth::user()->id)->first();
                $message_thread->lecture_book_id = $lecture_book->id;
                $message_thread->entry_status = 2;
                $message_thread->save();
            }

            DB::commit();

            return view('lecture.thanks', compact(['transaction']));
  
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();

            if(strpos($e,'has already been used') !== false) {
              return redirect()->back()->with('error-message', '既に登録されているカード情報です');
            }

            return redirect()->back();
        }

    }

}
