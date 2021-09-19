@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/favorit.css" rel="stylesheet">
@include('layouts/mypage-lecture_list-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">お気に入り</h3>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>タイトル</th>
                                      <th>処理</th>
                                    </tr>
                                    @foreach($lecture_favorits as $lecture_favorit)
                                    <tr>
                                      <td><a href="{{route('lecture.detail', ['lecture_id' => $lecture_favorit->lecture_id])}}">{{$lecture_favorit->title}}</a></td>
                                      <td>
                                        <form method="POST" action="{{route('lecture.detail.favorit-delete.post')}}">
                                          @csrf
                                          <input type="hidden" name="page" value="mypage">
                                          <input type="hidden" name="lecture_id" value="{{$lecture_favorit->lecture_id}}">
                                          <button type="submit" class="delete-btn">取消</button>
                                        </form>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
