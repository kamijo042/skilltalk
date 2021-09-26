@extends('layouts/lecture-header')
@section('main.content')

<link href="/lecture-platform/ws/css/faq.css" rel="stylesheet">

@include('layouts/lecture_faq-menu')

                <div class="col-md-8 mb-3">
                    <div class="osahan-cart-item-profile thanks-block">
                        お問合せありがとうございました。
                        返信をお待ちください。
                        <div style="margin-top:24px;"><a class="top-link" href="{{route('lecture.index')}}">トップへ戻る</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
