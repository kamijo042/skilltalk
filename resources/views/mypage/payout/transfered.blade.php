@extends('layouts/mypage-header')
@section('main.content')

@include('layouts/mypage-payout-menu')

                <div class="col-md-8 mb-3">
                    <div class="rounded shadow-sm">
                        <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                            <div id="yourContent" class="active">
                                <!-- Title -->
                                <div class="mb-3">
                                    <h3 class="h5 text-primary">支払い明細</h3>
                                </div>
                                <div>
                                  <table >
                                    <tr>
                                      <th>支払番号</th>
                                      <th>支払金額</th>
                                      <th>支払日</th>
                                      <th>状態</th>
                                    </tr>
                                    @foreach($payouts as $payout)
                                    <tr
                                        data-toggle="modal"
                                        data-target="#showPayoutDetailModal"
                                        data-payout="{{$payout}}"
                                    >
                                      <td>{{$payout->id}}</td>
                                      <td>{{number_format($payout->payout)}}</td>
                                      <td>{{date('Y/m/d', strtotime($payout->payout_date))}}</td>
                                      <td>{{$tran_status[$payout->status]}}</td>
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

<!-- Book Status Update Modal -->
<div class="modal fade" id="showPayoutDetailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>入金明細</h4>
                <div class="modal-title">取引内容</div>
                <div class="modal-description">

                    <div class="payout-info">
                        <p class="mb-1 text-info">入金振込日<span id="apply_date" class="float-right text-info"></span></p>
                        <p class="mb-1 text-info">振込日<span id="payout_date" class="float-right text-info"></span></p>
                        <p class="mb-1">売上累計 <span id="total_transfer" class="float-right text-dark"></span></p>
                        <p class="mb-1">システム手数料<span class="text-info ml-1"><i class="feather-info"></i></span><span id="system_fee" class="float-right text-dark"></span></p>
                        <p class="mb-1">振込手数料<span class="text-info ml-1"><i class="feather-info"></i></span><span id="transaction_fee" class="float-right text-dark"></span></p>
                        <hr>
                        <p class="mb-1 text-success">振込金額<span id="payout" class="float-right text-success"></span></p>
                    </div>

                </div>
                <hr>
                <div class="modal-description">
                    <table id="transaction">
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
<!-- Book Satus Update Modal END -->

<script type="text/javascript" src="/lecture-platform/ws/js/modal.js"></script>

@endsection
