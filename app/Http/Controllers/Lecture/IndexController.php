<?php

namespace App\Http\Controllers\Lecture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

use App\Models\Lectures;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function index()
    {
        $lectures = Lectures::select('lectures.id as lecture_id','lectures.category_large_id', 'title','sub_title','image_name',
            'unit_time','unit','price','is_online','is_man_to_man','category_large_name','category_small_name', 'lectures.created_at')
            ->join('images', 'lectures.image_id', '=', 'images.id')
            ->join('lecture_categories as lc', function ($join) {
                $join->on('lc.category_large_id', '=', 'lectures.category_large_id');
                $join->on('lc.category_small_id', '=', 'lectures.category_small_id');
            })
            ->get();

        $itLectures = $lectures->filter(function($lecture) {
            if ($lecture->category_large_id === 1) {
                return $lecture;
            }
        });

        return view('lecture.index', compact(['lectures', 'itLectures']));
    }
}
