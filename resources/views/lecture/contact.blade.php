@extends('layouts/lecture-header')
@section('main.content')

<link href="/lecture-platform/ws/css/faq.css" rel="stylesheet">

@include('layouts/lecture_faq-menu')

                <div class="col-md-8 mb-3">
                    <div class="osahan-cart-item-profile">
                        <form method="POST">
                            @csrf
                            <div class="osahan-privacy bg-white rounded shadow-sm p-4">
                               <div class="contact-title">お問合せ</div>
                               <div class="block">
                                   <div class="title">氏名</div>
                                   <input type="text" class="text" id="name" name="name" value="" placeholder="スキル 太郎">
                               </div>
                               <div class="block">
                                   <div class="title">電話番号</div>
                                   <input type="text" class="text" id="tel" name="tel" value="" placeholder="080-1234-5678">
                               </div>
                               <div class="block">
                                   <div class="title">メールアドレス</div>
                                   <input type="text" class="text" id="email" name="email" value="" placeholder="test@test.com">
                               </div>
                               <div class="block">
                                   <div class="title">区分</div>
                                   <div style="display: flex; padding: 8px;">
                                       <span>
                                         <input type="radio" id="contact-type1" name="contact-type[]" value="1" class="radio-input" >
                                         <label class="contact-type" for="contact-type1">講師・主催者</label>
                                       </span>
                                       <span style="margin-left:16px">
                                         <input type="radio" id="contact-type2" name="contact-type[]" value="2" class="radio-input">
                                         <label class="contact-type" for="contact-type2">受講者・視聴者</label>
                                       </span>
                                       <span style="margin-left:16px">
                                         <input type="radio" id="contact-type3" name="contact-type[]" value="2" class="radio-input">
                                         <label class="contact-type" for="contact-type3">その他</label>
                                       </span>
                                   </div>
                               </div>
                               <div class="block">
                                   <div class="title">件名(任意)</div>
                                   <input type="text" class="text" id="subject" name="subject" value="" placeholder="講義時刻の変更について">
                               </div>
                               <div class="block">
                                   <div class="title">内容</div>
                                   <div class="send-box">
                                       <textarea id="message" name="message" rows="4" class="send-box-area"></textarea>
                                   </div>
                               </div>
                               <div class="block text-center">
                                  <button class="entry-btn" style="width:50%" type="submit">講義を申し込む</button>
                               </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
