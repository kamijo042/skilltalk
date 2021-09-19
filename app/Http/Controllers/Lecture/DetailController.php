<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Carbon\Carbon;

use App\Models\Lectures;
use App\Models\Coupons;
use App\Models\LectureBooks;
use App\Models\LectureFavorits;
use App\Components\GcsUtils;
use Payjp\Payjp;
use Payjp\Customer;

class DetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function index($lecture_id)
    {
        $lecture = Lectures::select('lectures.id', 'user_id', 'images.image_name','title', 'price', 'expected_skill', 'unit_time', 'unit', 'lecture_date', 'comment')
            ->join('images', 'lectures.image_id', '=', 'images.id')
            ->join('lecture_categories as lc', function ($join) {
                $join->on('lc.category_large_id', '=', 'lectures.category_large_id');
                $join->on('lc.category_small_id', '=', 'lectures.category_small_id');
            })
            ->where('lectures.id',$lecture_id)->first();

        $user = auth()->user();
        $cardList = [];
        
        // 既にpayjpに登録済みの場合
        if (!empty($user->payjp_customer_id)) {
          // カード一覧を取得
          Payjp::setApiKey(config('payjp.secret_key'));
          $cardDatas = Customer::retrieve($user->payjp_customer_id)->cards->data;
          foreach ($cardDatas as $cardData) {
            $cardList[] = [
              'id' => $cardData->id,
              'cardNumber' =>  "**** **** **** {$cardData->last4}",
              'brand' =>  $cardData->brand,
              'exp_year' =>  $cardData->exp_year,
              'exp_month' =>  $cardData->exp_month,
              'name' =>  $cardData->name,
            ];
          }
        }

        $coupon = Coupons::where('lecture_id', $lecture_id)
            ->where('status', 1)
            ->where('coupon_from', '<=', Carbon::now('Asia/Tokyo'))
            ->where('coupon_to', '>=', Carbon::now('Asia/Tokyo'))
            ->first();
        $discount_price = 0;
        $fixed_price = 0;
        if (!empty($coupon)) {
            // 定額割引の場合
            if ($coupon->discount_type === 1) {
                $discount_price = $coupon->discount_price;
                $fixed_price = $lecture->price - $discount_price;
            // 定率割引の場合
            } else {
                $discount_price = $lecture->price * $coupon->discount_rate / 100;
                $fixed_price = $lecture->price - $discount_price;
            }
        } else {
            $fixed_price = $lecture->price;
        }

        // 既に申し込みの場合、
        $isBook = false;
        if (!empty($user)) {
            $lecture_book = LectureBooks::where('user_id', $user->id)
                ->where('status', 1)
                ->where('lecture_id', $lecture_id)
                ->first();
            if ($lecture_book) {
                $isBook = true;
            }
        }

        $isFavorit = false;
        if (!empty(Auth::user()->id)) {
            $isFavorit = LectureFavorits::where('lecture_id', $lecture_id)->where('user_id', Auth::user()->id)->exists();
        }

        return view('lecture.detail', compact(['lecture', 'coupon', 'discount_price', 'fixed_price', 'cardList', 'isBook', 'isFavorit']));
    }
}
