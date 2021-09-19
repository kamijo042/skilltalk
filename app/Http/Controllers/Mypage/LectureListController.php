<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

use App\Models\Lectures;
use App\Models\LectureBooks;
use App\Models\LectureFavorits;
use App\Models\Messages;
use App\Models\Reviews;
use App\Models\Transactions;
use App\Models\MessageThreads;

use App\Components\MessageComponent;
use App\Components\PaymentComponent;

class LectureListController extends Controller
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
        $lecture_books = Lectures::select('lecture_books.id','lectures.title', 'lecture_books.status')
            ->join('lecture_books', 'lectures.id', '=', 'lecture_books.lecture_id')
            ->where('lecture_books.user_id', Auth::user()->id)
            ->get();

        $lecture_book_status = LectureBooks::LECTURE_BOOK_STATUS;

        return view('mypage.lecture-list.index', compact(['lecture_books', 'lecture_book_status']));
    }

    public function detail($lecture_book_id)
    {
        $lecture_book = LectureBooks::where('id', $lecture_book_id)->first();
        $lecture = Lectures::where('id', $lecture_book->lecture_id)->first();
        $message_thread = null;
        $messages = [];
        if (MessageThreads::select('id')->where('lecture_book_id', $lecture_book_id)->exists()) {
            $message_thread = MessageThreads::select('id')->where('lecture_book_id', $lecture_book_id)->first();
            $messages = Messages::where('message_thread_id', $message_thread->id)->get();
        }

        $review = Reviews::where('lecture_book_id', $lecture_book_id)->first();

        return view('mypage.lecture-list.detail', compact(['lecture', 'lecture_book', 'review', 'messages', 'message_thread']));
    }

    public function add_message(Request $request)
    {
        $lecture_id = $request->get('lecture_id');
        $lecture_book_id = $request->get('lecture_book_id');
        $message_thread_id = $request->get('message_thread_id');
        $message = $request->get('message');

        $thread_id = MessageComponent::addMessageByAudience($lecture_id, $message, $message_thread_id, $lecture_book_id);

        if ($request->get('page') === 'thread') {
            return redirect()->route('mypage.lecture-list.message.thread', ['message_thread_id' => $thread_id]);
        } else {
            return redirect()->route('mypage.lecture-list.detail', ['lecture_book_id' => $lecture_book_id]);
        }
    }

    public function message()
    {
        $message_threads = MessageThreads::select('message_threads.id', 'title', 'entry_status', 'last_updated')
            ->where('audience_user_id', Auth::user()->id)
            ->join('lectures', 'lectures.id', '=', 'message_threads.lecture_id')
            ->get();

        $thread_status = MessageThreads::MESSAGE_THREAD_STATUS;

        return view('mypage.lecture-list.message', compact(['message_threads', 'thread_status']));
    }

    public function message_thread($message_thread_id)
    {
        $messages = Messages::where('message_thread_id', $message_thread_id)->get();
        $message_thread = MessageThreads::join('lectures', 'lectures.id', '=', 'message_threads.lecture_id')
            ->where('message_threads.id', $message_thread_id)
            ->first();

        return view('mypage.lecture-list.message_thread', compact(['messages', 'message_thread_id', 'message_thread']));
    }

    public function new_thread($lecture_id)
    {
        $lecture = Lectures::where('id', $lecture_id)->first();
        $message_thread = MessageThreads::where('lecture_id', $lecture_id)
            ->where('audience_user_id', Auth::user()->id)
            ->first();
        if ($message_thread) {
            $messages = Messages::where('message_thread_id', $message_thread->id)
            ->get();
        } else {
            $messages = null;
        }

        return view('mypage.lecture-list.new_thread',compact(['lecture', 'message_thread', 'messages']));
    }

    public function favorit()
    {
        $lecture_favorits = LectureFavorits::select('lectures.title', 'lecture_favorits.lecture_id')
            ->join('lectures', 'lecture_favorits.lecture_id', '=', 'lectures.id')
            ->where('lecture_favorits.user_id', Auth::user()->id)
            ->get();

        return view('mypage.lecture-list.favorit', compact(['lecture_favorits']));
    }

    public function review(Request $request)
    {
        $review = $request->get('review');
        $message = $request->get('message');
        $lecture_book_id = $request->get('lecture_book_id');

        $lecture_book = LectureBooks::where('id', $lecture_book_id)->first();

        Reviews::create([
            'user_id' => Auth::user()->id,
            'comment' => $message,
            'rank' => $review,
            'image_id' => 10,
            'lecture_id' => $lecture_book->lecture_id,
            'lecture_book_id' => $lecture_book_id,
        ]);

        return redirect()->route('mypage.lecture-list.detail', ['lecture_book_id' => $lecture_book_id]);

    }

    public function review_update(Request $request)
    {
        $review = $request->get('review');
        $review_id = $request->get('review_id');
        $message = $request->get('message');
        $lecture_book_id = $request->get('lecture_book_id');

        $review_record = Reviews::where('id', $review_id)->first();
        $review_record->rank = $review;
        $review_record->comment = $message;
        $review_record->save();

        return redirect()->route('mypage.lecture-list.detail', ['lecture_book_id' => $lecture_book_id]);
    }

    public function refund(Request $request)
    {
        $lecture_book_id = $request->get('modal_book_id');
        $lecture_books = LectureBooks::where('id', $lecture_book_id)->first();
        $transactions = Transactions::where('id', $lecture_books->transaction_id)->first();
        $message_threads = MessageThreads::where('lecture_book_id', $lecture_book_id)->first();

        // Pay JPの取消処理
        $payment = new PaymentComponent();
        $payment->refundPayment($transactions->charge_id);

        // DBを更新する
        $lecture_books->status = 6;
        $transactions->status = 3;
        $message_threads->entry_status = 4;
        $lecture_books->save();
        $transactions->save();
        $message_threads->save();

        return redirect()->route('mypage.lecture-list.detail', ['lecture_book_id' => $lecture_books->id]);
    }

}
