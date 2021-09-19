@extends('layouts/mypage-header')
@section('main.content')

@include('layouts/mypage-lecture_own-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">講義完了リスト</h3>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>予約ID</th>
                                      <th>タイトル</th>
                                      <th>金額</th>
                                      <th>完了日</th>
                                    </tr>
                                    @foreach($lecture_books as $lecture_book)
                                    <tr>
                                      <td>{{$lecture_book->id}}</td>
                                      <td><a href="{{route('mypage.lecture-own.fixed.detail', ['lecture_book_id' => $lecture_book->id])}}" >{{$lecture_book->title}}</a>
                                      </td>
                                      <td>{{number_format($lecture_book->fixed_price)}}円</td>
                                      <td>{{date('Y/m/d', strtotime($lecture_book->updated_at))}}</td>
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
