@extends('layouts/mypage-header')
@section('main.content')

@include('layouts/mypage-lecture_own-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">担当講義リスト</h3>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>タイトル</th>
                                      <th>申込ページ</th>
                                      <th>金額</th>
                                      <th>講義時間</th>
                                    </tr>
                                    @foreach($lectures as $lecture)
                                    <tr>
                                      <td><a href="{{route('mypage.lecture-own.detail', ['lecture_id' => $lecture->id ])}}">
                                          {{$lecture->title}}
                                      </td>
                                      <td>
                                        <a target="_blank" href="{{route('lecture.detail', ['lecture_id' => $lecture->id] )}}">
                                          リンク
                                        </a>
                                      </td>
                                      <td>{{number_format($lecture->price)}}円</td>
                                      <td>{{$lecture->unit_time}}{{$lecture->unit}}</td>
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
