<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

use App\Components\MailComponent;

use Hash;
use Session;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.forgot-password');
    }

    public function showResetForm($token)
    {
        return view('auth.reset-password')->with(
          ['token' => $token]
        );
    }

}
