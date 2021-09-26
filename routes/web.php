<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'lecture'], function(){
    Route::get('/login', function(){ return view('auth.login'); })->name('login');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('login');
    Route::get('/register', function(){ return view('auth.register'); })->name('register');
    Route::post('/register', [App\Http\Controllers\LoginController::class, 'customRegistration'])->name('register');

    // Facebook Login
    Route::get('login/facebook', [App\Http\Controllers\LoginController::class, 'redirectToFacebookProvider'])->name('login.facebook');
    Route::get('login/facebook/callback', [App\Http\Controllers\LoginController::class, 'handleProviderFacebookCallback'])->name('login.facebook.callback');

    // Twitter Login
    Route::get('login/twitter', [App\Http\Controllers\LoginController::class, 'redirectToTwitterProvider'])->name('login.twitter');
    Route::get('login/twitter/callback', [App\Http\Controllers\LoginController::class, 'handleProviderTwitterCallback'])->name('login.twitter.callback');

    // Google Login
    Route::get('login/google', [App\Http\Controllers\LoginController::class, 'redirectToGoogleProvider'])->name('login.google');
    Route::get('login/google/callback', [App\Http\Controllers\LoginController::class, 'handleProviderGoogleCallback'])->name('login.google.callback');

    // forget password
    Route::get('/forgot-password', [App\Http\Controllers\ResetPasswordController::class, 'index'])->name('reset.password');
    Route::get('/password/reset-form/{token}', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('reset.reser-form');

    Route::get('/', [App\Http\Controllers\Lecture\IndexController::class, 'index'])->name('lecture.index');
    Route::get('/detail/{lecture_id}', [App\Http\Controllers\Lecture\DetailController::class, 'index'])->name('lecture.detail');
    Route::get('/payment/{lecture_id}', [App\Http\Controllers\Lecture\PaymentController::class, 'index'])->name('lecture.payment');
    Route::post('/favorit', [App\Http\Controllers\Lecture\FavoritController::class, 'add_favorit'])->name('lecture.detail.favorit.post');
    Route::post('/favorit-delete', [App\Http\Controllers\Lecture\FavoritController::class, 'delete_favorit'])->name('lecture.detail.favorit-delete.post');
    Route::post('/payment', [App\Http\Controllers\Lecture\PaymentController::class, 'payment'])->name('lecture.payment.post');

    // お問い合わせ関連
    Route::get('/faq', [App\Http\Controllers\Lecture\FaqController::class, 'index'])->name('lecture.faq');
    Route::get('/contact', [App\Http\Controllers\Lecture\FaqController::class, 'contact'])->name('lecture.contact');
    Route::post('/contact', [App\Http\Controllers\Lecture\FaqController::class, 'send_contact'])->name('lecture.contact.post');
});

Route::group(['prefix' => 'lecture/mypage'], function(){
    Route::get('/', [App\Http\Controllers\Mypage\IndexController::class, 'index'])->name('mypage.index');

    // Lecture List
    Route::get('/lecture-list', [App\Http\Controllers\Mypage\LectureListController::class, 'index'])->name('mypage.lecture-list');
    Route::post('/lecture-list/review', [App\Http\Controllers\Mypage\LectureListController::class, 'review'])->name('mypage.lecture-list.review.post');
    Route::post('/lecture-list/review/update', [App\Http\Controllers\Mypage\LectureListController::class, 'review_update'])->name('mypage.lecture-list.review.update.post');
    Route::post('/lecture-list/delete', [App\Http\Controllers\Mypage\LectureListController::class, 'refund'])->name('mypage.lecture-list.delete.post');
    Route::get('/lecture-list/favorit', [App\Http\Controllers\Mypage\LectureListController::class, 'favorit'])->name('mypage.lecture-list.favorit');
    Route::get('/lecture-list/message', [App\Http\Controllers\Mypage\LectureListController::class, 'message'])->name('mypage.lecture-list.message');
    Route::get('/lecture-list/message/newthread/{lecture_id}', [App\Http\Controllers\Mypage\LectureListController::class, 'new_thread'])->name('mypage.lecture-list.new.thread');
    Route::get('/lecture-list/message/thread/{message_thread_id}', [App\Http\Controllers\Mypage\LectureListController::class, 'message_thread'])->name('mypage.lecture-list.message.thread');
    Route::get('/lecture-list/detail/{lecture_book_id}', [App\Http\Controllers\Mypage\LectureListController::class, 'detail'])->name('mypage.lecture-list.detail');
    Route::post('/lecture-list/detail', [App\Http\Controllers\Mypage\LectureListController::class, 'add_message'])->name('mypage.lecture-list.add_message.post');

    // Lecture Own
    Route::get('/lecture-own', [App\Http\Controllers\Mypage\LectureOwnController::class, 'index'])->name('mypage.lecture-own');
    Route::get('/lecture-own/detail/{lecture_id}', [App\Http\Controllers\Mypage\LectureOwnController::class, 'detail'])->name('mypage.lecture-own.detail');
    Route::get('/lecture-own/detail/coupon/{lecture_id}', [App\Http\Controllers\Mypage\LectureOwnController::class, 'coupon'])->name('mypage.lecture-own.detail.coupon');
    Route::post('/lecture-own/detail/coupon', [App\Http\Controllers\Mypage\LectureOwnController::class, 'add_coupon'])->name('mypage.lecture-own.detail.coupon.post');
    Route::get('/lecture-own/entry', [App\Http\Controllers\Mypage\LectureOwnController::class, 'entry'])->name('mypage.lecture-own.entry');
    Route::get('/lecture-own/entry/detail/{lecture_book_id}', [App\Http\Controllers\Mypage\LectureOwnController::class, 'entry_detail'])->name('mypage.lecture-own.entry.detail');
    Route::post('/lecture-own/entry/detail/add_message', [App\Http\Controllers\Mypage\LectureOwnController::class, 'add_message'])->name('mypage.lecture-own.entry.add_message.post');
    Route::post('/lecture-own/entry/detail/fix_lecture', [App\Http\Controllers\Mypage\LectureOwnController::class, 'fix_lecture'])->name('mypage.lecture-own.entry.fix_lecture.post');
    Route::post('/lecture-own/entry/detail/add_lecture_info', [App\Http\Controllers\Mypage\LectureOwnController::class, 'add_lecture_info'])->name('mypage.lecture-own.entry.add_lecture_info.post');
    Route::get('/lecture-own/fixed', [App\Http\Controllers\Mypage\LectureOwnController::class, 'fixed'])->name('mypage.lecture-own.fixed');
    Route::get('/lecture-own/fixed/detail/{lecture_book_id}', [App\Http\Controllers\Mypage\LectureOwnController::class, 'fixed_detail'])->name('mypage.lecture-own.fixed.detail');
    Route::get('/lecture-own/message', [App\Http\Controllers\Mypage\LectureOwnController::class, 'message'])->name('mypage.lecture-own.message');
    Route::get('/lecture-own/message/thread/{message_thread_id}', [App\Http\Controllers\Mypage\LectureOwnController::class, 'message_thread'])->name('mypage.lecture-own.message.thread');

    // Payout
    Route::get('/payout', [App\Http\Controllers\Mypage\PayoutController::class, 'index'])->name('mypage.payout');
    Route::get('/payout/transfered', [App\Http\Controllers\Mypage\PayoutController::class, 'transfered'])->name('mypage.payout.transfered');
    Route::get('/payout/submit', [App\Http\Controllers\Mypage\PayoutController::class, 'submit'])->name('mypage.payout.submit');
    Route::post('/payout/submit', [App\Http\Controllers\Mypage\PayoutController::class, 'submit_post'])->name('mypage.payout.submit.post');

    Route::get('/settlement', [App\Http\Controllers\Mypage\IndexController::class, 'index'])->name('mypage.index');
    Route::get('/settings', [App\Http\Controllers\Mypage\IndexController::class, 'index'])->name('mypage.index');

});
