@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/lecture-own.css" rel="stylesheet">
<link href="/lecture-platform/ws/css/chat.css" rel="stylesheet">
@include('layouts/mypage-lecture_own-menu')

       <div class="col-md-8 mb-3">
         <div class="rounded shadow-sm">
           <div class="osahan-privacy bg-white rounded shadow-sm p-4">
             <div id="yourContent" class="active">

               <div class="mb-3">
                   <h3 class="h5 text-primary">アクセス状況</h3>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">申込件数</div>
                   <div>4件</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">お気に入り件数件数</div>
                   <div>8件</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">口コミ件数</div>
                   <div>4件(<i class="feather-star text-warning"></i>4.1)</div>
               </div>

               <hr>
               <div class="mb-3">
                   <h3 class="h5 text-primary">講義詳細</h3>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">タイトル</div>
                   <div>{{$lecture->title}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">期待するスキル</div>
                   <div>{{$lecture->expected_skill}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">詳細</div>
                   <div>{{$lecture->comment}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">所要時間</div>
                   <div>{{$lecture->unit_time}}{{$lecture->unit}}</div>
               </div>
               <div class="d-flex">
                   <div class="min-width bold">お支払い金額</div>
                   <div>12,000円</div>
               </div>

               <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
                   <div class="osahan-cart-item-profile bg-white p-3">
                       <div class="d-flex flex-column">
                           <iframe class="mypage-iframe-box" src="http://127.0.0.1:8000/lecture-platform/js/pdfjs/web/viewer.html?file=pdf-storage/exp1.pdf"></iframe>
                       </div>
                   </div>
               </div>

               <div class="mb-3">
                   <h3 class="h5 text-primary">クーポン発行
                   </h3>※ クーポンは各講義、一つまで発行可能です
               </div>
               @if(!empty($coupon))
               <table >
                 <tr>
                   <th>クーポン名</th>
                   <th>割引額</th>
                   <th>有効期限</th>
                   <th></th>
                 </tr>
                 <tr>
                   <td>{{$coupon->coupon_name}}</td>
                   <td>{{$coupon->price}}</td>
                   <td>{{date('Y/m/d', strtotime($coupon->coupon_from))}}~<br>{{date('Y/m/d', strtotime($coupon->coupon_to))}}</td>
                   <td>詳細</td>
                 </tr>
               </table>
               @else
               <div class="coupon-box">
                   <span class="coupon-btn"><a style="color:#FFF" href="{{route('mypage.lecture-own.detail.coupon', ['lecture_id' => $lecture->id])}}">新規発行</a></span>
               </div>
               @endif
<br>
               <hr>
               <div class="mb-3">
                   <h3 class="h5 text-primary">口コミ情報</h3>
               </div>
               <div class="review">平均<i class="feather-star text-warning"></i>4.1</div>
               <table >
                 <tr>
                   <th>登校日</th>
                   <th>ユーザー名</th>
                   <th>点数</th>
                   <th></th>
                 </tr>
                 <tr>
                   <td>2021/09/15</td>
                   <td>yamada</td>
                   <td><i class="feather-star text-warning"></i>4</td>
                   <td>詳細</td>
                 </tr>
               </table>
        </div>
    </div>
</div>
<!-- Book Satus Update Modal END -->


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/lecture-platform/js/scroll.js"></script>
<script type="text/javascript" src="/lecture-platform/ws/js/modal.js"></script>
@endsection
