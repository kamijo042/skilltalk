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
                    <h2 class="first-color text-dark my-0">ログイン</h2>
                    <p class="second-color text-50">会員登録された方は、講義を開設し収益を得ることや、講義を受講することができます。</p>
                    @error('email')
                        <div class="error">メールアドレスまたはパスワードが異なります</div>
                    @enderror
                    <form class="mt-5 mb-4" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">Email</label>
                            <input type="email" placeholder="Enter Email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-dark">Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" id="password" name="password">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">メールアドレスでログイン</button>
                    </form>
                        <div class="flex-center-pc">
                            <a href="{{ route('login.google') }}">
                                <div class="py-3">
                                    <button class="btn btn-lg btn-google btn-block"><i class="feather-chrome"></i> Googleでログイン</button>
                                </div>
                            </a>
                            <a href="{{ route('login.facebook') }}">
                                <div class="py-3 ml-16-pc">
                                    <button class="btn btn-lg btn-facebook btn-block min-w-200"><i class="feather-facebook"></i> FBでログイン</button>
                                </div>
                            </a>
                            <a href="{{ route('login.twitter') }}">
                                <div class="py-3 ml-16-pc">
                                    <button class="btn btn-lg btn-twitter btn-block"><i class="feather-twitter"></i> Twitterでログイン</button>
                                </div>
                            </a>
                        </div>
                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                        <p class="text-center">パスワードを忘れた方</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('register') }}">
                            <p class="text-center m-0">新規会員登録はこちら</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
