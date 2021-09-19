@extends('layouts/lecture-header')
@section('main.content')
<link href="/lecture-platform/ws/css/thanks.css " rel="stylesheet">

<div class="osahan-home-page ">
    <div class="bg-primary p-3 d-none">
        <div class="text-white">
            <div class="title align-items-center">
                <a class="toggle" href="#">
                    <span></span>
                </a>
                <h4 class="font-weight-bold m-0" style="font-size:18px;text-align:center;">Skill Evolution</h4>
            </div>
        </div>
    </div>
    <div class="top-form">
      <div class="thanks-top">
        <div>
          <img class="img-height" src="/lecture-platform/img/check.png">
        </div>
        <div>
          講義の申し込みを受け付けました。
        </div>
        <div>
          <div class="bold" style="padding-top: 16px;font-size: 24px;text-decoration: underline;">講義名</div>
          <div class="bold" style="padding-top: 8px">Laravelを使った管理画面の開発講義</div>
        </div>
    
        <div class="desc-center">
          お申込みいただき、ありがとうございました。<br>
          <br>
          ご登録いただいたメールアドレスに確認メール（自動送信）をお送りしましたので、ご確認ください。<br>
          「迷惑メールフォルダ」や「ゴミ箱フォルダ」に自動的に振り分けられてしまう場合があります。そちらもご確認の上、メールが届いていない場合はお手数ですがこちらからご連絡ください。
        </div>
      </div>
      <div class="right-contents">
        <div>
          <div class="d-flex-between">
            <div>取引番号</div>
            <div class="bold">{{$transaction->id}}</div>
          </div>
          <div class="d-flex-between">
            <div>氏名</div>
            <div class="bold">{{Auth::user()->name}}</div>
          </div>
          <div class="d-flex-between">
            <div>お支払い金額</div>
            <div class="bold">{{$transaction->fixed_price}}円</div>
          </div>
        </div>
        <div class="btn-place">
          <div>
            <div>
              Step1. 講義のスケジュール調整をする
            </div>
            <div>
              <button onclick="location.href='{{route('mypage.lecture-list')}}'" class="btn-layout">スケジュールを調整する</button>
            </div>
          </div>
          <div>
            <div>
              Step2. 予約内容の確認
            </div>
            <div>
              <button onclick="location.href='{{route('mypage.lecture-list')}}'" class="btn-layout">マイページを見る</button>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection
