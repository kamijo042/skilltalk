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

use App\Components\MessageComponent;
use App\Components\PaymentComponent;

class LectureOwnController extends Controller
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

    public function index()
    {
        $menu_type = "list";
        $lectures = Lectures::where('user_id', Auth::user()->id)->get();

        return view('mypage.lecture-own.index', compact(['lectures', 'menu_type']));
    }

    public function entry()
    {
        $menu_type = "entry";

        $lecture_own_ids = Lectures::select('id')->where('user_id', Auth::user()->id)->get();
        $lecture_books = LectureBooks::select('lecture_books.id', 'lectures.title')
            ->join('lectures', 'lectures.id', '=', 'lecture_books.lecture_id')
            ->whereIn('lecture_books.lecture_id', $lecture_own_ids)->whereIn('lecture_books.status', [1,2,3,4])->get();

        return view('mypage.lecture-own.entry', compact(['lecture_books', 'menu_type']));
    }

    public function detail($lecture_id)
    {
        $menu_type = "list";
        $lecture = Lectures::where('id', $lecture_id)->first();

        $coupon = Coupons::where('lecture_id', $lecture_id)->first();
        if (!empty($coupon)) {
            if ($coupon->discount_type === 1) {
                $coupon->price = $coupon->discount_price . '円';
            } else {
                $coupon->price = $coupon->discount_rate . '％';
            }
        }

        return view('mypage.lecture-own.lecture-detail', compact(['menu_type', 'coupon', 'lecture']));
    }

    public function entry_detail($lecture_book_id)
    {
        $menu_type = "entry";

        $lecture_book = LectureBooks::select('lecture_books.id', 'lecture_books.lecture_datetime', 'lecture_books.status', 'lectures.title',
            'lectures.unit', 'lectures.unit_time', 'lecture_books.lecture_web_link', 'lecture_books.lecture_place')
            ->join('lectures', 'lectures.id', '=', 'lecture_books.lecture_id')
            ->where('lecture_books.id', $lecture_book_id)
            ->first();

        $message_thread = MessageThreads::where('lecture_book_id', $lecture_book_id)->first();
        $messages = [];
        if (!empty($message_thread)) {
            $messages = Messages::where('message_thread_id', $message_thread->id)->get();
        }

        $status = LectureBooks::LECTURE_BOOK_STATUS;

        return view('mypage.lecture-own.detail', compact(['menu_type', 'status', 'lecture_book', 'messages', 'message_thread']));
    }

    public function coupon($lecture_id)
    {
        $menu_type = "list";
        $lecture = Lectures::where('id', $lecture_id)->first();

        return view('mypage.lecture-own.coupon', compact(['menu_type', 'lecture']));
    }

    public function add_coupon(Request $request)
    {
        $lecture_id = $request->get('lecture_id');
        $discount_type = $request->get('discount_type')[0];
        if ($discount_type === 1) {
            $discount_price = $request->get('discount_price');
            $discount_rate = null;
        } else {
            $discount_price = null;
            $discount_rate = $request->get('discount_price');
        }

        $counpon = Coupons::create([
            'lecture_id' => $lecture_id,
            'coupon_name' => $request->get('coupon_name'),
            'coupon_code' => '9999998',
            'discount_type' => $discount_type,
            'discount_price' => $discount_price,
            'discount_rate' => $discount_rate,
            'max_issue_coupon' => $request->get('max_issue_coupon'),
            'coupon_from' => $request->get('discount_from'),
            'coupon_to' => $request->get('discount_to'),
            'status' => 1,
        ]);
        return redirect()->route('mypage.lecture-own.detail', ['lecture_id' => $lecture_id]);
    }

    /*
     * (講師用画面) 申込依頼のメッセージ追加
     */
    public function add_message(Request $request)
    {
        $lecture_book_id = $request->has('lecture_book_id') ? $request->input('lecture_book_id') : null;
        $page = $request->has('page') ? $request->input('page') : null;
        $message_thread_id = $request->get('message_thread_id');
        $message = $request->get('message');
        
        MessageComponent::addMessageByTeacher($message, $message_thread_id, $lecture_book_id);

        if ($page === 'thread' ) {
            return redirect()->route('mypage.lecture-own.message.thread', ['message_thread_id' => $message_thread_id]);
        } else if ($page === 'fixed') {
            return redirect()->route('mypage.lecture-own.fixed.detail', ['lecture_book_id' => $lecture_book_id]);
        } else {
            return redirect()->route('mypage.lecture-own.entry.detail', ['lecture_book_id' => $lecture_book_id]);
        }
    }

    public function add_lecture_info(Request $request)
    {
        $lecture_book_id = $request->get('lecture_book_id');
        $lecture_time_original = $request->has('lectureTime') ? $request->input('lectureTime') : null;
        $web_link = $request->has('webLink') ? $request->input('webLink') : null;
        $lecture_place = $request->has('lecturePlace') ? $request->input('lecturePlace') : null;

        $lecture_book = LectureBooks::where('id', $lecture_book_id)->first();
        $lecture_book->lecture_web_link = $web_link;
        $lecture_book->lecture_place = $lecture_place;
        $lecture_book->lecture_datetime = $lecture_time_original;

        if ($lecture_book->lecture_web_link && $lecture_book->lecture_place) {
            $lecture_book->status = 4;
        } else if ($lecture_book->lecture_web_link) {
            $lecture_book->status = 3;
        } else if ($lecture_book->lecture_place) {
            $lecture_book->status = 2;
        }
        $lecture_book->save();

        return redirect()->route('mypage.lecture-own.entry.detail', ['lecture_book_id' => $lecture_book_id]);
    }

    public function fix_lecture(Request $request)
    {
        $lecture_book_id = $request->get('lecture_book_id');

        $lecture_book = LectureBooks::where('id', $lecture_book_id)->first();
        $transaction = Transactions::where('id', $lecture_book->transaction_id)->first();
        $message_thread = MessageThreads::where('lecture_book_id', $lecture_book_id)->first();

        $payment = new PaymentComponent();
        $payment->makeSettlement($transaction->charge_id);

        $lecture_book->status = 5;
        $transaction->status = 2;
        $message_thread->entry_status = 3;
        $lecture_book->save();
        $transaction->save();
        $message_thread->save();

        return redirect()->route('mypage.lecture-own.fixed.detail', ['lecture_book_id' => $lecture_book_id]);
    }

    public function fixed()
    {
        $menu_type = "fixed";

        $lecture_own_ids = Lectures::select('id')->where('user_id', Auth::user()->id)->get();
        $lecture_books = LectureBooks::select('lecture_books.id', 'lectures.title', 'transactions.fixed_price', 'transactions.updated_at')
            ->join('lectures', 'lectures.id', '=', 'lecture_books.lecture_id')
            ->join('transactions', 'transactions.id', '=', 'lecture_books.transaction_id')
            ->whereIn('lecture_books.lecture_id', $lecture_own_ids)->whereIn('lecture_books.status', [5])->get();

        return view('mypage.lecture-own.fixed', compact(['lecture_books', 'menu_type']));
    }

    public function fixed_detail($lecture_book_id)
    {
        $menu_type = "fixed";

        $lecture_book = LectureBooks::select('lecture_books.id', 'lecture_books.lecture_datetime', 'lecture_books.status', 'lectures.title',
            'lectures.unit', 'lectures.unit_time', 'lecture_books.lecture_web_link', 'lecture_books.lecture_place')
            ->join('lectures', 'lectures.id', '=', 'lecture_books.lecture_id')
            ->where('lecture_books.id', $lecture_book_id)
            ->first();

        $message_thread = MessageThreads::where('lecture_book_id', $lecture_book_id)->first();
        $messages = Messages::where('message_thread_id', $message_thread->id)->get();

        $status = LectureBooks::LECTURE_BOOK_STATUS;

        return view('mypage.lecture-own.detail', compact(['menu_type', 'status', 'lecture_book', 'messages', 'message_thread']));
    }

    public function message()
    {
        $menu_type = "message";

        $message_threads = MessageThreads::select('message_threads.id', 'title', 'entry_status', 'users.published_name', 'last_updated')
            ->where('teacher_user_id', Auth::user()->id)
            ->join('lectures', 'lectures.id', '=', 'message_threads.lecture_id')
            ->join('users', 'users.id', '=', 'message_threads.audience_user_id')
            ->get();

        $thread_status = MessageThreads::MESSAGE_THREAD_STATUS;

        return view('mypage.lecture-own.message', compact(['menu_type', 'message_threads', 'thread_status']));
    }

    public function message_thread($message_thread_id)
    {
        $menu_type = "message";

        $messages = Messages::where('message_thread_id', $message_thread_id)->get();
        $message_thread = MessageThreads::join('lectures', 'lectures.id', '=', 'message_threads.lecture_id')
            ->where('message_threads.id', $message_thread_id)
            ->first();

        return view('mypage.lecture-own.message_thread', compact(['menu_type', 'messages', 'message_thread_id', 'message_thread']));
    }

}
