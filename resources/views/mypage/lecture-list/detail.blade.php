@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/lecture-list.css" rel="stylesheet">
<link href="/lecture-platform/ws/css/chat.css" rel="stylesheet">
<link href="/lecture-platform/ws/css/review.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@include('layouts/mypage-lecture_list-menu')

       <div class="col-md-8 mb-3">
         <div class="rounded shadow-sm">
           <div class="osahan-privacy bg-white rounded shadow-sm p-4">
             <div id="yourContent" class="active">
               <!-- Title -->
               <div class="mb-3">
                   <h3 class="h5 text-primary">講義詳細</h3>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">タイトル</div>
                   <div>{{$lecture->title}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">期待するスキル</div>
                   <div>{{$lecture->expected_skill}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">詳細</div>
                   <div>{!! nl2br(e($lecture->comment)) !!}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">所要時間</div>
                   <div>{{$lecture->unit_time}}{{$lecture->unit}}</div>
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
                   <div class="cancel-field"><button class="cancel-btn">講義が終了しました</button></div>
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

               @if($lecture_book->status === 5)
                   <hr>
                   @if(empty($review))
                       <div class="mb-3">
                           <h3 class="h5 text-primary">レビュー投稿</h3>
                           講義の視聴お疲れ様でした。レビューの投稿をお願いいたします。
                       </div>
                       <span>スコア</span>
                       <div class="stars">
                          <div class="stars-ghost">
                             <div class="star"><i class="fa fa-star"></i></div>
                             <div class="star"><i class="fa fa-star"></i></div>
                             <div class="star"><i class="fa fa-star"></i></div>
                             <div class="star"><i class="fa fa-star"></i></div>
                             <div class="star"><i class="fa fa-star"></i></div>
                          </div>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                       </div>
                       <span>評価内容</span>
                       <form method="POST" action="{{route('mypage.lecture-list.review.post')}}">
                         @csrf
                         <input type="hidden" name="review" id="review">
                         <input type="hidden" name="lecture_book_id" id="lecture_book_id" value="{{$lecture_book->id}}">
                         <div class="review-box">
                           <div>
                             <textarea id="message" name="message" rows="6" class="review-box-area"></textarea>
                           </div>
                           <div class="padding8 center">
                             <button class="review-btn">レビュー投稿</button>
                           </div>
                         </div>
                       </form>
                   @else
                       <div class="mb-3">
                           <h3 class="h5 text-primary">レビュー投稿</h3>
                           講義の視聴お疲れ様でした。レビューの投稿ありがとうございました。
                       </div>
                       <div class="d-flex">
                           <div class="min-width bold">スコア</div>
                           <div>
                               @for($i=0;$i<5;$i++)
                                   @if($review->rank <= $i) 
                                       <i class="feather-star"></i>
                                   @else
                                       <i class="feather-star text-warning"></i>
                                   @endif
                               @endfor
                               (+{{$review->rank}})
                           </div>
                       </div>
                       <div class="d-flex">
                           <div class="min-width bold">レビュー内容</div>
                           <div>{!! nl2br(e($review->comment)) !!}</div>
                       </div>
                       <div
                           class="cancel-field"
                           data-toggle="modal"
                           data-target="#reviewUpdateModal"
                           data-book_id="{{$lecture_book->id}}"
                           data-rank="{{$review->rank}}"
                       >
                           <button class="cancel-btn" type="submit">レビュー内容を修正する</button>
                       </div>
                   @endif
                   <hr>

               @endif
               <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
               <div class="mb-3">
                   <h3 class="h5 text-primary">講義用資料</h3>
               </div>
                   <div class="osahan-cart-item-profile bg-white p-3">
                       <div class="d-flex flex-column">
                           <iframe class="mypage-iframe-box" src="http://127.0.0.1:8000/lecture-platform/js/pdfjs/web/viewer.html?file=pdf-storage/exp1.pdf"></iframe>
                       </div>
                   </div>
               </div>

               <div class="mb-3">
                   <h3 class="h5 text-primary">メッセージ</h3>
               </div>
               <div class="scroll">
                 <div id="scroll-inner">
                   @foreach($messages as $message)
                     @if($message->toward === 'right')
                       @if($message->dept === 1)
                         <div class="chat-right">
                           <div>
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
                           <div>
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
                   <form method="POST" action="{{route('mypage.lecture-list.add_message.post')}}">
                     @csrf
                     <input type="hidden" id="lecture_book_id" name="lecture_book_id" value="{{$lecture_book->id}}">
                     <input type="hidden" id="lecture_id" name="lecture_id" value="{{$lecture_book->lecture_id}}">
                     @if(!empty($message_thread))
                         <input type="hidden" id="message_thread_id" name="message_thread_id" value="{{$message_thread->id}}">
                     @endif
                     <div class="send-box">
                       <div>
                           <textarea id="message" name="message" rows="4" class="send-box-area"></textarea>
                       </div>
                       <div class="padding8">
                         <button class="send-button">送信</button>
                       </div>
                     </div>
                   </form>
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

<!-- Book Status Update Modal -->
<div class="modal fade" id="reviewUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div style="padding: 24px;">
                <span>スコア</span>
                <div class="stars">
                   <div class="stars-ghost">
                      <div class="star"><i class="fa fa-star"></i></div>
                      <div class="star"><i class="fa fa-star"></i></div>
                      <div class="star"><i class="fa fa-star"></i></div>
                      <div class="star"><i class="fa fa-star"></i></div>
                      <div class="star"><i class="fa fa-star"></i></div>
                   </div>
                   <div class="star"><i class="fa fa-star-o"></i></div>
                   <div class="star"><i class="fa fa-star-o"></i></div>
                   <div class="star"><i class="fa fa-star-o"></i></div>
                   <div class="star"><i class="fa fa-star-o"></i></div>
                   <div class="star"><i class="fa fa-star-o"></i></div>
                </div>
                <span>評価内容</span>
                <form method="POST" action="{{route('mypage.lecture-list.review.update.post')}}">
                  @csrf
                  @if(!empty($review))
                  <input type="hidden" name="review" id="review">
                  <input type="hidden" name="review_id" value="{{$review->id}}">
                  <input type="hidden" name="lecture_book_id" id="lecture_book_id" value="{{$lecture_book->id}}">
                  <div class="review-box">
                    <div>
                      <textarea id="message" name="message" rows="6" class="review-box-area">{{$review->comment}}</textarea>
                    </div>
                    <div class="padding8 center">
                      <button class="review-btn">レビュー投稿</button>
                    </div>
                  </div>
                  @endif
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Book Satus Update Modal END -->


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/lecture-platform/js/scroll.js"></script>
<script type="text/javascript" src="/lecture-platform/ws/js/modal.js"></script>
<script type="text/javascript" src="/lecture-platform/ws/js/review.js"></script>
@endsection
