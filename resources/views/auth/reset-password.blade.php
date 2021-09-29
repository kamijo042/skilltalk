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
                    <p class="second-color text-50">パスワードを再設定してください。</p>
                    <form class="mt-5 mb-4" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">メールアドレス</label>
                            <input type="email" placeholder="test@test.com" required :value="old('email')" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">パスワード</label>
                            <input type="password" required class="form-control" id="password" name="password" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">確認用パスワード</label>
                            <input type="password" required class="form-control" id="password_confirmation" name="password_confirmation" >
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">パスワードを再設定する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
