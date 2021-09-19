@extends('layouts/mypage-header')
@section('main.content')

@include('layouts/mypage-lecture_list-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">申し込み講義リスト</h3>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>申込番号</th>
                                      <th>タイトル</th>
                                      <th>受講日時</th>
                                      <th>ステータス</th>
                                    </tr>
                                    @foreach($lecture_books as $lecture_book)
                                    <tr>
                                      <td>{{$lecture_book->id}}</td>
                                      <td>
                                        <a href="{{route('mypage.lecture-list.detail', ['lecture_book_id'=>$lecture_book->id] )}}">
                                          {{$lecture_book->title}}
                                        </a>
                                      </td>
                                      <td>9/14 14:00</td>
                                      <td>{{$lecture_book_status[$lecture_book->status]}}</td>
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
