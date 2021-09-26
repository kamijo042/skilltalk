@extends('layouts/lecture-header')
@section('main.content')

<link href="/lecture-platform/ws/css/detail.css" rel="stylesheet">

    <div class="bg-primary p-3 d-none">
        <div class="text-white">
            <div class="title align-items-center">
                <a class="toggle" href="#">
                    <span></span>
                </a>
                <h4 class="font-weight-bold m-0" style="font-size:18px;text-align:center;">Skill Evolution</h4>
            </div>
        </div>
    </div>
    <div class="container position-relative">
        <div class="py-5 row">

            <div class="mt-24 col-md-4">

                <div>
                    <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                        <img alt="#" src="/lecture-platform/ws/img/{{$lecture->image_name}}" class="img-radius img-fluid item-img w-100 h-239">
                        <div class="detail-item">
                            <div class="detail-title">タイトル</div>
                            <div class="detail-desc">{{$lecture->title}}</div>
                            <div class="detail-title">講師</div>
                            <div class="detail-desc">上條哲也</div>
                        </div>
                        <div class="detail-item-button">
                            <a href="checkout.html" class="btn btn-primary px-3 button-form">講師プロフィール</a>
                            <a href="{{route('mypage.lecture-list.new.thread', ['lecture_id'=>$lecture->id])}}" style="margin-left:16px" class="btn btn-warning px-3 button-form">講師と連絡を取る</a>
                        </div>
                        <div class="detail-item" style="font-size: 15px;">
                            <div class="detail-title">講習料</div>
                            <p class="mb-1">{{$lecture->title}} </p>
                            <p class="mb-1">価格 <span class="float-right text-dark">{{number_format($lecture->price)}}円</span></p>
                            @if(!empty($coupon))
                            <p class="mb-1">{{$coupon->coupon_name}}<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">
                            @if($coupon->discount_type===2) <small>({{$coupon->discount_rate}}%OFF)</small> @endif - {{$discount_price}}円</span></p>
                            @endif
                            <p class="mb-1 text-success">累計割引額<span class="float-right text-success">{{number_format($fixed_price)}}円</span></p>
                            <hr>
                            <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">{{number_format($fixed_price)}}円</span></h6>
                        </div>
                        @auth
                          @if($lecture->user_id == Auth::user()->id)
                            <div class="own-class">担当講義です</div>
                          @else
                            @if($isBook)
                              <div class="already-text">※既に申込み済みです</div>
                              <a href="{{route('mypage.lecture-list')}}">
                                  <div class="already-payment">
                                      マイページを開く
                                  </div>
                              </a>
                            @else
                              <div
                                  class="entry-field"
                                  data-toggle="modal"
                                  data-target="#firstEntryLectureModal"
                              >
                                  <button class="entry-btn" type="submit">講義を申し込む</button>
                              </div>
    
                              @if (!empty($cardList))
                                <p class="def-font-size first-color padding-top text-center">もしくは登録済みのカードで支払い</p>
                              <div
                                  class="entry-field"
                                  data-toggle="modal"
                                  data-target="#secondEntryLectureModal"
                              >
                                  <button class="already-card-btn" type="submit">前回のカードで申し込む</button>
                              </div>
                              @endif
                            @endif
                            @if ($isFavorit)
                            <form method="POST" action="{{route('lecture.detail.favorit-delete.post')}}">
                                @csrf
                                <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                                <div class="favorit">
                                    <button class="white"><i class="feather-heart"></i>お気に入りを解除</button>
                                </div>
                            </form>
                            @else
                            <form method="POST" action="{{route('lecture.detail.favorit.post')}}">
                                @csrf
                                <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                                <div class="favorit">
                                    <button class="white"><i class="feather-heart"></i>お気に入り</button>
                                </div>
                            </form>
                            @endif
                          @endif
                        @else
                           <div class="p-3">
                               <a class="btn btn-success btn-block btn-lg" href="{{route('lecture.payment', ['lecture_id' => $lecture->id])}}">会員登録してお申し込み</a>
                           </div>
                        @endauth
                    </div>

                </div>
            </div>

            <div class="col-md-8 mb-3 mt-24-pc">
                <div>
                    <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                        <div class="detail-item">
                            <div class="detail-title">講義名</div>
                            <div class="detail-desc">{{$lecture->title}}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-title">受講後に期待できるスキル</div>
                            <div class="detail-desc">{{$lecture->expected_skill}}</div>
                        </div>
                        <div class="d-flex" style="padding-left: 16px;">
                            <div class="col-md-6 detail-item">
                                <div class="detail-title">所要時間</div>
                                <div class="detail-desc">{{$lecture->unit_time}}{{$lecture->unit}}</div>
                            </div>
                            <div class="col-md-6 detail-item">
                                <div class="detail-title">開催日時</div>
                                <div class="detail-desc">{{$lecture->lecture_date}}</div>
                            </div>
                        </div>
                        <div class="status-flex">
                            <p class="bg-info text-white text-center py-1 px-2 rounded small mb-1" style="margin-right:16px">ワンツーマン確約</p>
                            <p class="bg-success text-white text-center py-1 px-2 rounded small mb-1">オンライン</p>
                        </div>
                        <hr>

                        <div class="detail-item">
                            <div class="detail-title">講義詳細</div>
                            <div class="detail-desc">{!! nl2br(e($lecture->comment)) !!}</div>
                        </div>

                            <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                                <div class="osahan-cart-item-profile bg-white p-3">
                                    <div class="d-flex flex-column">
                                        <iframe class="iframe-box" src="http://127.0.0.1:8000/lecture-platform/js/pdfjs/web/viewer.html?file=pdf-storage/exp1.pdf"></iframe>
                                    </div>
                                </div>
                            </div>

                        <div class="detail-item">
                            <div class="detail-title">講義レビュー</div>
                            @if (empty($reviews))
                              <div class="non-review">レビュー投稿がありません。</div>
                            @else
                              @foreach($reviews as $review)
                              <div class="reviews-members py-3">
                                  <div class="media">
                                      <a href="#"><img alt="#" src="/lecture-platform/ws/img/{{$review->image_name}}" width="50" height="50" class="mr-3 rounded-pill"></a>
                                      <div class="media-body">
                                          <div class="reviews-members-header">
                                              <div class="star-rating float-right">
                                                  <div class="d-inline-block" style="font-size: 14px;">
                                                      (+{{$review->rank}})
                                                      @for($i=1;$i<=5;$i++)
                                                        @if($i<=$review->rank)
                                                          <i class="feather-star text-warning"></i>
                                                        @else
                                                          <i class="feather-star"></i>
                                                        @endif
                                                      @endfor
                                                  </div>
                                              </div>
                                              <h6 class="mb-0"><a class="text-dark" href="#">{{$review->name}}</a></h6>
                                              <p class="text-muted small">{{date('Y/m/d', strtotime($review->created_at))}}</p>
                                          </div>
                                          <div class="reviews-members-body">
                                              <p>{!! nl2br(e($review->comment)) !!}</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

<div class="modal fade" id="firstEntryLectureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>講義の申込</h4>
                <div class="modal-title">クレジットカード決済のタイミングについて</div>
                <div class="modal-description">
                    クレジットカード登録後に、60日間の与信枠を確保します。<br>
                    講義完了後に、クレジットカードの売上が確定されます。
                </div>
                <div class="modal-title">申込をした講義の取消について</div>
                <div class="modal-description">
                    講義の申込後に、講師と調整の上、スケジュールを決定します。<br>
                    スケジュール確定後、講義当日は講義のキャンセルができません。<br>
                    講義の申込を取消した時点で、クレジットカードの与信枠を開放します。
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <form action="{{route('lecture.payment.post')}}" method="POST">
                    @csrf
                    <script class="payjp-button"
                        src="https://checkout.pay.jp/"
                        data-key="{{config('payjp.public_key')}}"
                        data-payjp="{{config('payjp.aouth_client_id')}}">
                    </script>
                    <input type="hidden" name="price" value="12000">
                    <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                    <input type="hidden" name="full_price" value="{{$lecture->price}}">
                    <input type="hidden" name="discount_price" value="{{$discount_price}}">
                    <input type="hidden" name="fixed_price" value="{{$fixed_price}}">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="secondEntryLectureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>講義の申込</h4>
                <div class="modal-title">クレジットカード決済のタイミングについて</div>
                <div class="modal-description">
                    クレジットカード登録後に、60日間の与信枠を確保します。<br>
                    講義完了後に、クレジットカードの売上が確定されます。
                </div>
                <div class="modal-title">申込をした講義の取消について</div>
                <div class="modal-description">
                    講義の申込後に、講師と調整の上、スケジュールを決定します。<br>
                    スケジュール確定後、講義当日は講義のキャンセルができません。<br>
                    講義の申込を取消した時点で、クレジットカードの与信枠を開放します。
                </div>
            </div>
            <form action="{{route('lecture.payment.post')}}" method="POST">
                @csrf
                <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                <input type="hidden" name="full_price" value="{{$lecture->price}}">
                <input type="hidden" name="discount_price" value="{{$discount_price}}">
                <input type="hidden" name="fixed_price" value="{{$fixed_price}}">

                @foreach ($cardList as $card)
                <div class="card-item">
                    <label>
                        <input type="radio" name="payjp_card_id" value="{{ $card['id'] }}" />
                        <span class="brand">{{ $card['brand'] }}</span>
                        <span class="number">{{ $card['cardNumber'] }}</span>
                    </label>
                    <div>
                        <p>名義: {{ $card['name'] }}</p>
                        <p>期限: {{ $card['exp_year'] }}/{{ $card['exp_month'] }}</p>
                    </div>
                </div>
                @endforeach
                <div class="card_checkout_padding">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <button class="card_checkout" type="submit">選択したカードで決済する</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Book Satus Update Modal END -->

@endsection
