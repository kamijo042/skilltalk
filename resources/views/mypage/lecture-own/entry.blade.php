@extends('layouts/mypage-header')
@section('main.content')

@include('layouts/mypage-lecture_own-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">申し込みリスト</h3>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>予約ID</th>
                                      <th>タイトル</th>
                                      <th>会議リンク</th>
                                      <th>チャット</th>
                                    </tr>
                                    @foreach($lecture_books as $lecture_book)
                                    <tr>
                                      <td>{{$lecture_book->id}}</td>
                                      <td><a href="{{route('mypage.lecture-own.entry.detail', ['lecture_book_id' => $lecture_book->id])}}" >{{$lecture_book->title}}</a>
                                      </td>
                                      <td>
                                        <a target="_blank" href="">
                                          リンク
                                        </a>
                                      </td>
                                      <td></td>
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
