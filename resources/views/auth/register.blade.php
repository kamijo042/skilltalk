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
                    <h2 class="first-color text-dark my-0">新規登録</h2>
                    <p class="second-color text-50">会員登録された方は、講義を開設し収益を得ることや、講義を受講することができます。</p>
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="error">メールアドレスまたはパスワードが異なります</div>
                    @endif
                    <form class="mt-5 mb-4" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">氏名</label>
                            <input type="text" placeholder="氏名" required :value="old('name')" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">Email</label>
                            <input type="email" placeholder="test@test.com" required :value="old('email')" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-dark">Password</label>
                            <input type="password" placeholder="Enter Password" required class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-dark">確認用パスワード</label>
                            <input type="password" placeholder="Enter Password" required class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <button style="margin-top: 40px;" class="btn btn-primary btn-lg btn-block">登録する</button>
                    </form>
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        <p class="text-center">既に登録済みの方はこちら</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
