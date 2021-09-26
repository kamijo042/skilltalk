@extends('layouts/lecture-header')
@section('main.content')

<div class="osahan-home-page">
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
    <div class="vh-login">
        <div class="d-flex align-items-center justify-content-center vh-login">
            <div class="px-12 col-md-12 ml-auto">
                <div class="px-12 col-md-8 col-sm-12 mx-auto">
                    <h2 class="first-color text-dark my-0">パスワードの再設定</h2>
                    <p class="second-color text-50">パスワードを忘れた場合、こちらのフォームから再設定が可能です。下記ボタンをクリックすると、事前に会員登録したメールアドレスへ、パスワード更新用メールが送信されます。</p>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="mt-5 mb-4" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" placeholder="test@test.com" required :value="old('email')" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">パスワードを再設定する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
