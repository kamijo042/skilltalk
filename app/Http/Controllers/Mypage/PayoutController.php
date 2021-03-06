<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

use App\Models\Lectures;
use App\Models\Coupons;
use App\Models\LectureBooks;
use App\Models\LectureFavorits;
use App\Models\Messages;
use App\Models\MessageThreads;
use App\Models\Transactions;
use App\Models\Payouts;
use App\Models\PayoutDetails;

use App\Components\MessageComponent;
use App\Components\PaymentComponent;

use DateTimeImmutable;
use DateTime;
use DB;
use Log;

class PayoutController extends Controller
{
    protected $SYSTEM_FEE;
    protected $TRANSACTION_FEE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->SYSTEM_FEE = 20;
        $this->TRANSACTION_FEE = 280;
    }

    public function index()
    {
        $menu_type = "top";

        $transactions = Transactions::select('transactions.id','lectures.user_id','transactions.fixed_price','lectures.title','transactions.created_at')
            ->join('lectures','lectures.id','=','transactions.lecture_id')
            ->where('lectures.user_id', Auth::user()->id)
            ->where('transactions.status', 1)
            ->get();

        return view('mypage.payout.index', compact(['menu_type', 'transactions']));
    }

    public function transfered()
    {
        $menu_type = "transfered";
        $payouts = Payouts::where('user_id', Auth::id())->where('status', 2)->get();
        $tran_status = Payouts::TRANSACTION_STATUS;

        foreach ($payouts as $payout) {
            $transactions = PayoutDetails::select('transactions.id', 'lectures.title', 'transactions.fixed_price')
                ->join('transactions', 'transactions.id', '=', 'payout_details.transaction_id')
                ->join('lectures', 'lectures.id', '=', 'transactions.lecture_id')
                ->where('payout_details.payout_id', $payout->id)
                ->get();
            $payout->transactions = $transactions;
        }

        return view('mypage.payout.transfered', compact(['menu_type', 'tran_status', 'payouts']));
    }

    public function submit()
    {
        $menu_type = "submit";

        $transactions = Transactions::select('transactions.id','transactions.status','lectures.user_id','transactions.fixed_price','lectures.title','transactions.created_at')
            ->join('lectures','lectures.id','=','transactions.lecture_id')
            ->where('lectures.user_id', Auth::user()->id)
            ->whereIn('transactions.status', [2,4])
            ->get();

        $transaction_status = Transactions::TRANSACTION_STATUS;

        $before_transactions = Transactions::select('transactions.id','transactions.status','lectures.user_id','transactions.fixed_price','lectures.title','transactions.created_at')
            ->join('lectures','lectures.id','=','transactions.lecture_id')
            ->where('lectures.user_id', Auth::user()->id)
            ->whereIn('transactions.status', [2])
            ->get();
        $total_price = 0;
        $total_system_fee = 0;
        foreach ($before_transactions as $transaction) {
            $total_price += $transaction->fixed_price;
            $system_fee = $transaction->fixed_price * $this->SYSTEM_FEE / 100;
            $total_system_fee += $system_fee;
        }

        // ???????????????
        $payout_flag = Payouts::where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->exists();

        // ????????????
        $payout = Payouts::where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->first();

        return view('mypage.payout.submit', compact(['menu_type', 'payout', 'payout_flag', 'transaction_status', 'total_price', 'total_system_fee', 'transactions']));
    }

    public function submit_post(Request $request)
    {

        DB::beginTransaction(); 

        // ??????????????????
        $transactions = Transactions::select('transactions.id','transactions.status','lectures.user_id','transactions.fixed_price','lectures.title','transactions.created_at')
            ->join('lectures','lectures.id','=','transactions.lecture_id')
            ->where('lectures.user_id', Auth::user()->id)
            ->whereIn('transactions.status', [2])
            ->get();

        // ????????????????????????
        $total_price = 0;
        $total_system_fee = 0;
        foreach ($transactions as $transaction) {
            $total_price += $transaction->fixed_price;
            $system_fee = $transaction->fixed_price * $this->SYSTEM_FEE / 100;
            $total_system_fee += $system_fee;
        }

        // ????????????
        $apply_date = new DateTime();
        $payout_date = $this->payoute_date();

        try {

            // Payouts
            $payouts = Payouts::create([
                'user_id' => Auth::user()->id,
                'payout' => $total_price - $total_system_fee - $this->TRANSACTION_FEE,
                'transaction_fee' => $this->TRANSACTION_FEE,
                'system_fee' => $total_system_fee,
                'apply_date' => new DateTime(),
                'payout_date' => $payout_date,
                'status' => 1,
            ]);
    
            // Payout Detail
            foreach ($transactions as $transaction) {
                PayoutDetails::create([
                    'payout_id' => $payouts->id,
                    'transaction_id' => $transaction->id,
                ]);
                $transaction->status = 4;
                $transaction->save();
            }

            DB::commit();

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();

            if(strpos($e,'has already been used') !== false) {
              return redirect()->back()->with('error-message', '????????????????????????????????????????????????');
            }

            return redirect()->back();
        }

        return redirect()->back();

    }

    private function payoute_date()
    {
        $date = new DateTime();
        // 15????????????????????????
        if (15 > $date->format('d')) {
            return new DateTime('last day of this month');
        // 16???????????????????????????
        } else {
            return (new DateTimeImmutable)->modify('last day of next month');
        }
        
    }

}
