@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/payout.css" rel="stylesheet">

@include('layouts/mypage-payout-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">講義完了済みリスト</h3>
                                    売上の入金をする場合、「入金依頼」ボタンから、申請してください。<br>
                                    入金を行う場合、別途振込手数料280円がかかります。<br>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>取引番号</th>
                                      <th>講義名</th>
                                      <th>金額</th>
                                      <th>取引状況</th>
                                    </tr>
                                    @foreach($transactions as $transaction)
                                    <tr>
                                      <td>{{$transaction->id}}</td>
                                      <td>{{$transaction->title}}</td>
                                      <td>{{number_format($transaction->fixed_price)}}円</td>
                                      <td>{{$transaction_status[$transaction->status]}}</td>
                                    </tr>
                                    @endforeach
                                  </table>
                                </div>
                                <div class="mb-3 padding-top">
                                    <h3 class="h5 text-primary">売上情報(入金依頼前)</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="min-width bold">売上累計</div>
                                    <div style="font-size:18px">{{number_format($total_price)}}円</div>
                                </div>
                                <div class="d-flex">
                                    <div class="min-width bold">システム手数料</div>
                                    <div>{{number_format($total_system_fee)}}円</div>
                                </div>
                                <hr>
                                <div class="mb-3 padding-top">
                                    <h3 class="h5 text-primary">振込情報</h3>
                                    ご利用いただき、誠にありがとうございました。<br>ご入金までもうしばらくお待ちください。
                                </div>
                                @if ($payout_flag)
                                <div class="payout-info">
                                    <p class="mb-1">売上累計 <span class="float-right text-dark">{{number_format($payout->payout+$payout->system_fee+$payout->transaction_fee)}}円</span></p>
                                    <p class="mb-1">システム手数料<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">
                                     - {{number_format($payout->system_fee)}}円</span></p>
                                    <p class="mb-1">振込手数料<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">
                                     - {{number_format($payout->transaction_fee)}}円</span></p>
                                    <hr>
                                    <p class="mb-1 text-success">振込金額<span class="float-right text-success">{{number_format($payout->payout)}}円</span></p>
                                    <p class="mb-1 text-success">振込予定日<span class="float-right text-success">{{date('Y/m/d', strtotime($payout->payout_date))}}</span></p>
                                </div>
                                <hr>
                                @endif
                                <div
                                    class="submit-block"
                                    data-toggle="modal"
                                    data-target="#showPayoutModal"
                                >
                                    「入金依頼」から申請すると、振込が完了するまで、再申請はできません。
                                    <button type="submit" @if($payout_flag) disabled @endif class="@if($payout_flag) payout-disabled @else payout-submit @endif">入金依頼</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Book Status Update Modal -->
<div class="modal fade" id="showPayoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                @csrf
                <input type="hidden" id="modal_book_id" name="modal_book_id">
                <div class="modal-body">
                    <h4>入金依頼</h4>
                    <div class="modal-title">手数料について</div>
                    <div class="modal-description">
                        講義視聴料の<span style="color:red;font-size:18px">20%</span>をシステム手数料として頂きます。<br>
                        また、振込手数料として、別途<span style="color:red;font-size:18px">280円</span>を頂きます。
                    </div>
                    <div class="modal-title">支払いのタイミングについて</div>
                    <div class="modal-description">
                        入金依頼のタイミングは、<span style="color:blue;font-size:16px">15日締め、月末支払い</span>です。<br>
                        例えば、10日に入金依頼を申請した場合、当月末のお支払いになります。<br>
                        20日に入金依頼を申請した場合、翌月末のお支払いになります。<br>
                    </div>
                    <div class="modal-title">入金依頼のキャンセルについて</div>
                    <div class="modal-description">
                        一度入金依頼を申請した場合、キャンセルはできません。毎月15日にボタンが有効になります。<br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-success" id="appointment_update">入金を依頼する</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Book Satus Update Modal END -->

<script type="text/javascript" src="/lecture-platform/ws/js/modal.js"></script>
@endsection
