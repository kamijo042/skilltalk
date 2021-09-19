<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use Log;
use App\Models\LectureFavorits;
use App\Components\GcsUtils;
use Payjp\Payjp;
use Payjp\Customer;
use Payjp\Charge;

class FavoritController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_favorit(Request $request)
    {
        $lecture_id = $request->get('lecture_id');
        LectureFavorits::create([
            'lecture_id' => $lecture_id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('lecture.detail', ['lecture_id' => $lecture_id]));
    }

    public function delete_favorit(Request $request)
    {
        $lecture_id = $request->get('lecture_id');
        $lecture_favorit = LectureFavorits::where('lecture_id', $lecture_id)->where('user_id',Auth::user()->id)->delete();

        if ($request->get('page') === 'mypage') {
            return redirect(route('mypage.lecture-list.favorit'));
        } else {
            return redirect(route('lecture.detail', ['lecture_id' => $lecture_id]));
        }
    }

}
