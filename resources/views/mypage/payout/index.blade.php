@extends('layouts/mypage-header')
@section('main.content')

@include('layouts/mypage-payout-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">売上予定(講義完了前)</h3>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>取引番号</th>
                                      <th>講義名</th>
                                      <th>金額</th>
                                      <th>申込日</th>
                                    </tr>
                                    @foreach($transactions as $transaction)
                                    <tr>
                                      <td>{{$transaction->id}}</td>
                                      <td>{{$transaction->title}}</td>
                                      <td>{{number_format($transaction->fixed_price)}}円</td>
                                      <td>{{date('Y/m/d', strtotime($transaction->created_at))}}</td>
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
