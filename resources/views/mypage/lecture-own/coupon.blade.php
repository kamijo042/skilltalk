@extends('layouts/mypage-header')
@section('main.content')
<link href="/lecture-platform/ws/css/lecture-own.css" rel="stylesheet">

<link href="/lecture-platform/vendor/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
<script src="/lecture-platform/vendor/air-datepicker/js/datepicker.min.js"></script>
<script src="/lecture-platform/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>

@include('layouts/mypage-lecture_own-menu')

       <div class="col-md-8 mb-3">
         <div class="rounded shadow-sm">
           <div class="osahan-privacy bg-white rounded shadow-sm p-4">
             <div id="yourContent" class="active">
               <form method="POST" action="{{route('mypage.lecture-own.detail.coupon.post')}}">
                 @csrf
                 <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                 <div class="mb-3">
                     <h3 class="h5 text-primary">クーポンを発行する</h3>
                 </div>
                 <div class="padding-font-flex">
                     <div class="min-width bold">クーポン名</div>
                     <input type="text" class="text" id="coupon_name" name="coupon_name" value=""  placeholder="期間限定クーポン">
                 </div>
                 <div class="padding-font-flex">
                   <div class="min-width bold">割引内容</div>
                   <span>
                     <input type="radio" id="discount_type1" name="discount_type[]" value="1" class="radio-input" >
                     <label class="discount-label" for="discount_type1">定額割引</label>
                   </span>
                   <span style="margin-left:16px">
                     <input type="radio" id="discount_type2" name="discount_type[]" value="2" class="radio-input">
                     <label class="discount-label" for="discount_type2">定率割引</label>
                   </span>
                 </div>
                 <div class="padding-font-flex">
                     <div class="min-width bold">割引額</div>
                     <input type="text" class="text2" id="discount_price" name="discount_price" value=""  placeholder="10">
                     <span id="price_unit">円</span>
                 </div>
                 <div class="padding-font-flex">
                     <div class="min-width bold">発行数</div>
                     <input type="text" class="text2" id="max_issue_coupon" name="max_issue_coupon" value=""  placeholder="10">
                 </div>
                 <div class="padding-font-flex">
                     <div class="min-width bold">有効期間(from)</div>
                     <input type='text' class="datepicker-here text" value="" id="discount_from" name="discount_from" data-position="bottom left" placeholder="2021/09/08" data-timepicker="false" data-language='en' autocomplete="off"/>
                 </div>
                 <div class="padding-font-flex">
                     <div class="min-width bold">有効期間(to)</div>
                     <input type='text' class="datepicker-here text" value="" id="discount_to" name="discount_to" data-position="bottom left" placeholder="2021/09/08" data-timepicker="false" data-language='en' autocomplete="off"/>
                 </div>
                 <div class="margin-top center">
                     <button type="submit" id="coupon-btn" class="success-btn">クーポンを発行</button>
                 </div>
               </form>
             </div>
           </div>
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
<script type="text/javascript" src="/lecture-platform/ws/js/coupon.js"></script>
<script type="text/javascript" src="/lecture-platform/ws/js/datetimepicker.js"></script>
@endsection
