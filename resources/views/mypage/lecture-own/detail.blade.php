@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/lecture-own.css" rel="stylesheet">
<link href="/lecture-platform/ws/css/chat.css" rel="stylesheet">

<link href="/lecture-platform/vendor/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="/lecture-platform/vendor/air-datepicker/js/datepicker.min.js"></script>
<script src="/lecture-platform/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>

@include('layouts/mypage-lecture_own-menu')

       <div class="col-md-8 mb-3">
         <div class="rounded shadow-sm">
           <div class="osahan-privacy bg-white rounded shadow-sm p-4">
             <div id="yourContent" class="active">
               <!-- Title -->
               <div class="mb-3">
                   <h3 class="h5 text-primary">講義詳細</h3>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">申込状況</div>
                   <div>{{$status[$lecture_book->status]}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">タイトル</div>
                   <div>{{$lecture_book->title}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">所要時間</div>
                   <div>{{$lecture_book->unit_time}}{{$lecture_book->unit}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">開催日時</div>
                   <div>下記のチャットルームから調整してください</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">お支払い金額</div>
                   <div>12,000円</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">会議リンク</div>
                   <div>未定</div>
               </div>

               @if(in_array($lecture_book->status, [6]))
                   <div class="cancel-field"><button class="cancel-btn">キャンセル済みです</button></div>
               @elseif(in_array($lecture_book->status, [5]))
               @else
                   <div
                       class="cancel-field"
                       data-toggle="modal"
                       data-target="#bookStatusCancelModal"
                       data-book_id="{{$lecture_book->id}}"
                   >
                       <button class="cancel-btn" type="submit">依頼をキャンセルする</button>
                   </div>
               @endif
               @if(!in_array($lecture_book->status, [5,6]))
                   <hr>
                   <div class="mb-3">
                       <h3 class="h5 text-primary">開催場所</h3>
                   </div>
                   <div class="padding">
                       <form method="POST" action="{{route('mypage.lecture-own.entry.add_lecture_info.post')}}" name="sendPlace">
                           @csrf
                           <input type="hidden" name="lecture_book_id" value="{{$lecture_book->id}}">
                           <div class="nortification">開催時刻及び、WEBリンクもしくは会議室所在地は、必須です。</div>
                           <div>
                               <div class="title">WEBリンク</div>
                               <input type="text" class="text" id="webLink" name="webLink" value="{{$lecture_book->lecture_web_link}}" onkeyup="checkEmpty()" placeholder="https://us02web.zoom.us/j/81975793659?pwd=VE1PQW1DTzJIaUpFaWZkRGs2cmNLZz09">
                           </div>
                           <div class="margin-top">
                               <div class="title">会議室所在地</div>
                               <input type="text" class="text" id="lecturePlace" name="lecturePlace" value="{{$lecture_book->lecture_place}}" onkeyup="checkEmpty()" placeholder="東京都千代田区大手町1-1-1">
                           </div>
                           <div class="margin-top">
                               <div class="title">開催時刻</div>
                               <input type='text' onkeyup="checkEmpty()" required class="datepicker-here text" value="{{date('Y/m/d h:i', strtotime($lecture_book->lecture_datetime))}}" id="lectureTime" name="lectureTime" data-position="bottom left" placeholder="2021/09/08 10:00" data-timepicker="true" data-language='en' autocomplete="off"/>
                           </div>
                           <div class="margin-top right">
                               <button type="submit" class="info-btn" id="button1" name="button1">講義・会議情報の決定</button>
                           </div>
                       </form>
                   </div>

                   <hr>
                   <div class="mb-3">
                       <h3 class="h5 text-primary">講義完了</h3>
                   </div>
                   <div class="padding">
                     <form method="POST" action="{{route('mypage.lecture-own.entry.fix_lecture.post')}}">
                       @csrf
                       <input type="hidden" name="lecture_book_id" value="{{$lecture_book->id}}">
                       <label>講義が完了しましたら、講義完了ボタンを押下してください。<br>
                           支払いの確定処理が行われます。<br>
                           申込日から60日経つと、申込が自動キャンセルされます。
                       </label>
                       <div class="margin-top center">
                           <button type="submit" @if(in_array($lecture_book->status, [2,3,4])) class="success-btn" @else disabled class="disabled-btn" @endif>講義完了</button>
                       </div>
                     </form>
                   </div>
               @endif

               <hr>
               <div class="mb-3">
                   <h3 class="h5 text-primary">メッセージ</h3>
               </div>
               <div class="scroll">
                 <div id="scroll-inner">
                   @foreach($messages as $message)
                     @if($message->toward === 'right')
                       @if($message->dept === 1)
                         <div class="chat-right">
                           <div class="pc-none">
                             <img class="chat-right-img" src="/lecture-platform/ws/img/sea01.jpg">
                           </div>
                           <div class="chat-right-text">
                             {!! nl2br(e($message->message)) !!}
                           </div>
                         </div>
                       @else
                         <div class="chat-right">
                           <div class="chat-right-text2">
                             {!! nl2br(e($message->message)) !!}
                           </div>
                         </div>
                       @endif
                     @else
                       @if($message->dept === 1)
                         <div class="chat-left">
                           <div class="pc-none">
                             <img class="chat-left-img" src="/lecture-platform/ws/img/money01.jpg">
                           </div>
                           <div class="chat-left-text">
                             {!! nl2br(e($message->message)) !!}
                           </div>
                         </div>
                       @else
                         <div class="chat-left">
                           <div class="chat-left-text2">
                             {!! nl2br(e($message->message)) !!}
                           </div>
                         </div>
                       @endif
                     @endif
                   @endforeach
                   <form method="POST" action="{{route('mypage.lecture-own.entry.add_message.post')}}">
                     @csrf
                     <input type="hidden" id="lecture_book_id" name="lecture_book_id" value="{{$lecture_book->id}}">
                     @if (!empty($message_thread))
                         <input type="hidden" id="message_thread_id" name="message_thread_id" value="{{$message_thread->id}}">
                     @endif
                     @if(in_array($lecture_book->status, [5,6]))
                       <input type="hidden" id="page" name="page" value="fixed">
                     @endif
                     <div class="send-box">
                       <div>
                           <textarea id="message" name="message" rows="4" class="send-box-area"></textarea>
                       </div>
                       <div class="padding8">
                         <button class="send-teacher-button">送信</button>
                       </div>
                     </div>
                   </form>
                 </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Book Status Update Modal -->
<div class="modal fade" id="bookStatusCancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{route('mypage.lecture-list.delete.post')}}">
                @csrf
                <input type="hidden" id="modal_book_id" name="modal_book_id">
                <div class="modal-body">
                    <h4>申込した講義のキャンセル</h4>
                    <div class="modal-title">キャンセル可能な期間について</div>
                    <div class="modal-description">
                        講義当日のキャンセルはできません。<br>
                        また、スケジュール設定後のキャンセルは、必ず講師へ、事前に連絡してください。
                    </div>
                    <div class="modal-title">キャンセル後の払い戻し期間について</div>
                    <div class="modal-description">
                        発行元のカード会社に依存するため断定することが出来ません。<br>
                        通常、カード会社の月締めの周期に合わせて、引き落としや請求が行なわれます。実際の請求期間に関しては、カード所有者の方がカード会社へ直接お問い合わせ頂く必要があります。
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-primary" id="appointment_update">講義依頼を取消</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Book Satus Update Modal END -->

<script type="text/javascript" src="/lecture-platform/js/scroll.js"></script>
<script type="text/javascript" src="/lecture-platform/ws/js/modal.js"></script>
<script type="text/javascript" src="/lecture-platform/ws/js/lecture-own.js"></script>
<script type="text/javascript" src="/lecture-platform/ws/js/datetimepicker.js"></script>
@endsection
