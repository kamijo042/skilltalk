@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/lecture-list.css" rel="stylesheet">
<link href="/lecture-platform/ws/css/chat.css" rel="stylesheet">
@include('layouts/mypage-lecture_list-menu')

      <div class="col-md-8 mb-3">
        <div class="rounded shadow-sm">
          <div class="osahan-privacy bg-white rounded shadow-sm p-4">
            <div id="yourContent" class="active">
              <div class="mb-3">
                  <h3 class="h5 text-primary">メッセージ</h3>
              </div>
              <div class="chat-title">
                <div>
                  {{$lecture->title}}
                </div>
                <div>
                  @if (!empty($message_thread) && $message_thread->entry_status !== 1)
                    <form method="GET" action="{{route('mypage.lecture-list.detail', ['lecture_book_id'=>$message_thread->lecture_book_id])}}">
                     @csrf
                      <button class="chat-title-button">講義詳細へ</button>
                    </form>
                  @else
                    <form method="GET" action="{{route('lecture.detail', ['lecture_id'=>$lecture->id])}}">
                      @csrf
                      <button class="chat-title-button">申込ページ</button>
                    </form>
                  @endif
                </div>
              </div>
              <hr>
              <div class="scroll">
                <div id="scroll-inner">
                  @if(!empty($messages))
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
                  @endif
                  <form method="POST" action="{{route('mypage.lecture-list.add_message.post')}}">
                    @csrf
                    <input type="hidden" id="lecture_id" name="lecture_id" value="{{$lecture->id}}">
                    <input type="hidden" id="page" name="page" value="thread">
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

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/lecture-platform/js/scroll.js"></script>
@endsection
