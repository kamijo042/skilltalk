<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Components\MailComponent;

use Hash;
use Session;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('lecture');
        }

        return back()->withErrors([
            'email' => 'The kamijo provided credentials do not match our records.',
        ]);
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        Auth::login($check);

        // Send Mail
        $email = new MailComponent();
        $email->sendEntry([$data['email']]);

        return redirect()->route('mypage.lecture-list')->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }   

    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // すでにFacebook登録済みじゃなかったらユーザーを登録する
        $userModel = User::where('facebook_id', $user->id)->first();
        if (!$userModel) {
            $userModel = new User([
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id' => $user->id
            ]);

            $userModel->save();
        }
        // ログインする
        Auth::login($userModel);

        // Send Mail
        $email = new MailComponent();
        $email->sendEntry([$user->email], $user->name);

        // /homeにリダイレクト
        return redirect()->route('mypage.lecture-list')->withSuccess('You have signed-in');
    }

    public function redirectToTwitterProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderTwitterCallback()
    {
        $user = Socialite::driver('twitter')->user();

        $userModel = User::where('twitter_id', $user->id)->first();
        if (!$userModel) {
            $userModel = new User([
                'name' => $user->name,
                'email' => $user->email,
                'twitter_id' => $user->id
            ]);

            $userModel->save();
        }
        // ログインする
        Auth::login($userModel);

        // Send Mail
        $email = new MailComponent();
        $email->sendEntry([$user->email], $user->name);

        // /homeにリダイレクト
        return redirect()->route('mypage.lecture-list')->withSuccess('You have signed-in');

    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $userModel = User::where('google_id', $user->id)->first();
        if (!$userModel) {
            $userModel = new User([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id
            ]);

            $userModel->save();
        }
        // ログインする
        Auth::login($userModel);

        // Send Mail
        $email = new MailComponent();
        $email->sendEntry([$user->email], $user->name);

        // /homeにリダイレクト
        return redirect()->route('mypage.lecture-list')->withSuccess('You have signed-in');
    }

}
