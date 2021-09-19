<?php

namespace App\Components;

use Illuminate\Support\Facades\Auth;
use App\Models\Messages;
use App\Models\Lectures;
use App\Models\LectureBooks;
use App\Models\MessageThreads;

class MessageComponent
{

    /*
     * 申込者のメッセージを追加する
     * $lecture_id: 必須: 講義番号
     * $message: 必須: メッセージ
     * $message_thread_id:  スレッド番号
     * $lecture_book_id:  予約番号
     */
    public static function addMessageByAudience($lecture_id, $message, $message_thread_id=null, $lecture_book_id=null)
    {
        // 講義情報を取得しておく
        $lecture = Lectures::where('id', $lecture_id)->first();

        // 初期値
        $dept = 1;

        // スレッドが立ち上がっている場合
        if ($message_thread_id) {
            // スレッド内のメッセージを取得
            $latest_message = Messages::where('message_thread_id', $message_thread_id)
                ->orderBy('created_at', 'desc')->first();

            // 最新のメッセージが自分の場合、dept=2
            if ($latest_message->talk_user_id === Auth::user()->id) {
                $dept = 2;
            }

        // スレッドが立ち上がっていない場合
        } else {
            // 講義予約番号がある場合、ステータスを取得。なければ1
            if ($lecture_book_id) {
                $lecture_book = LectureBooks::where('id', $lecture_book_id)->first();
                $entry_status = MessageThreads::CONVERT_STATUS[$lecture_book->status];
            } else {
                $entry_status = 1;
            }


            // スレッドを立ち上げる
            $message_thread = MessageThreads::create([
                'lecture_id' => $lecture_id,
                'lecture_book_id' => $lecture_book_id,
                'audience_user_id' => Auth::user()->id,
                'teacher_user_id' => $lecture->user_id,
                'entry_status' => $entry_status,
                'last_updated' => date("Y-m-d H:i:s"),
            ]);

            // 発行されたスレッドIDを取得
            $message_thread_id = $message_thread->id;

        }

        // メッセージを挿入
        Messages::create([
            'lecture_book_id' => $lecture_book_id,
            'message_thread_id' => $message_thread_id,
            'audience_user_id' => Auth::user()->id,
            'teacher_user_id' => $lecture->user_id,
            'talk_user_id' => Auth::user()->id,
            'toward' => 'right',
            'dept' => $dept,
            'message' => $message,
        ]);

        return $message_thread_id;

    }

    /*
     * 講師のメッセージを追加する
     * $message: 必須: メッセージ
     * $message_thread_id: 必須: スレッド番号
     * $lecture_book_id:  予約番号
     */
    public static function addMessageByTeacher($message, $message_thread_id, $lecture_book_id=null)
    {
        // 初期値
        $dept = 1;

        // スレッド内のメッセージを取得
        $latest_message = Messages::where('message_thread_id', $message_thread_id)
            ->orderBy('created_at', 'desc')->first();

        // 最新のメッセージが自分の場合、dept=2
        if ($latest_message->talk_user_id === Auth::user()->id) {
            $dept = 2;
        }

        // スレッド情報を取得
        $message_thread = MessageThreads::where('id', $message_thread_id)->first();

        // メッセージを挿入
        Messages::create([
            'lecture_book_id' => $lecture_book_id,
            'message_thread_id' => $message_thread_id,
            'audience_user_id' => $message_thread->audience_user_id,
            'teacher_user_id' => Auth::user()->id,
            'talk_user_id' => Auth::user()->id,
            'toward' => 'left',
            'dept' => $dept,
            'message' => $message,
        ]);
    }

}
