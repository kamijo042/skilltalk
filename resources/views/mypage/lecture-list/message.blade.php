@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/lecture-list.css" rel="stylesheet">
@include('layouts/mypage-lecture_list-menu')

      <div class="col-md-8 mb-3">
        <div class="rounded shadow-sm">
          <div class="osahan-privacy bg-white rounded shadow-sm p-4">
            <div id="yourContent" class="active">
              <div class="mb-3">
                <h3 class="h5 text-primary">メッセージ一覧</h3>
              </div>
              <table>
                <tr>
                  <th>講義名</th>
                  <th>申込の有無</th>
                  <th>最終更新日</th>
                </tr>
                @foreach($message_threads as $message_thread)
                <tr>
                  <td><a href="{{route('mypage.lecture-list.message.thread', ['message_thread_id' => $message_thread->id])}}">{{$message_thread->title}}</a></td>
                  <td>{{$thread_status[$message_thread->entry_status]}}</td>
                  <td>{{$message_thread->last_updated}}</td>
                </tr>
                @endforeach
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
