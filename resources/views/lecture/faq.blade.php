@extends('layouts/lecture-header')
@section('main.content')

<link href="/lecture-platform/ws/css/faq.css" rel="stylesheet">

@include('layouts/lecture_faq-menu')

                <div class="col-md-8 mb-3">
                    <div class="osahan-cart-item-profile">
                        <div id="basics">
                            <!-- Title -->
                            <div class="mb-2 mt-3">
                                <h5 class="font-weight-semi-bold mb-0 faq-title">スキルトークについて</h5>
                            </div>
                            <!-- End Title -->
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion" style="font-size:1.3em">
                                <!-- Card -->
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    スキルトークとは、なんですか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            スキルトークとは、WEB会議で講義・セミナーを主催または、
                                            受講することができるプラットフォームです。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingTwo">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    会員登録はどこからできますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            <a href="{{route('register')}}">こちらの新規登録ページ</a>からご登録ください。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingTwo">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    主催する講義を登録したいのですが。
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            スキルトークの講師からの紹介、または、運営側の審査を通過したユーザーのみが、講義を登録できます。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingTwo">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    講師へ質問やメッセージを送ることはできますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            講義詳細ページに遷移し、「講師と連絡をとる」ボタンでメッセージのやりとりが可能です。
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="basics">
                            <!-- Title -->
                            <div class="mb-2 mt-5">
                                <h5 class="font-weight-semi-bold mb-0 faq-title">講義・セミナーの申し込みについて</h5>
                            </div>
                            <!-- End Title -->
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion" style="font-size:1.3em">
                                <!-- Card -->
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    講義の開催日時はどのように決まりますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            講師と直接メッセージを行い、決定していただきます。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    講義の開催場所はオンラインのみですか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            講師と直接メッセージを行っていただき、講師次第で会議室などのオフラインでの講義も可能です。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    料金の支払い方法を教えてください。
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            講義の受講料は、クレジットカード決済のみとなります。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    カードの売上の確定は、どのタイミングですか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            講義を申し込みした時点では、クレジットカードの与信枠を(60日間)確保します。
                                            講義が完了し、講師が完了ボタンを押したタイミングで、売上が確定されます。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    申し込みのキャンセルは、いつまでできますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            講義を申込後、講師と直接メッセージのやりとりをし、開催日時を決めていただきます。
                                            その開催日時の2日前までは、こちらの「申し込み受講リスト」の詳細ページから、キャンセルが可能です。
                                            ただし、<span style="font-size:18px;color:blue">当日及び前日での取消は、50%返金</span>となります。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                     会員登録は無料ですか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                             会員登録は無料です。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                     月会費、年会費はかかりますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                             いずれも不要です。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h5 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                     講師と連絡が取れません。どうすればいいですか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h5>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                             スキルトークのサポートデスクにご連絡ください！通常平日24時間（土日祝・日本時間：10~19時）で、お電話、又はメールで対応致します。
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="basics">
                            <!-- Title -->
                            <div class="mb-2 mt-5">
                                <h5 class="font-weight-semi-bold mb-0 faq-title">講師・セミナー主催者について</h5>
                            </div>
                            <!-- End Title -->
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion" style="font-size:1.3em">
                                <!-- Card -->
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    講義を登録したいのですが。
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            スキルトークの講師からの紹介、または、運営側の審査を通過したユーザーのみが、講義を登録できます。
                                            <a href="{{route('lecture.contact')}}">こちらへお問い合わせください</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    講師はどんな人ですか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            運営側で実務経験を審査しており、各分野のスペシャリストが講義を担当します。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    会議の時間設定は自由にできますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            申込後、受講者とメッセージ機能で連絡をとっていただき、そこで調整していただきます。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    会議はオフラインでもできますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            できます。受講者とメッセージ機能で調整し、申込依頼の詳細ページから会議室の住所を登録してください。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    会議が突然キャンセルされました。報酬はどうなりますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            原則、講義日時が決定し、その2日前までは無料でキャンセルが可能です。当日、前日の取消の場合、50%の報酬となります。ただし、講義の当日もしくは前日による、講師または受講者からの一方的な取り消しが発生した場合、運営側へご連絡ください。
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="basics">
                            <!-- Title -->
                            <div class="mb-2 mt-5">
                                <h5 class="font-weight-semi-bold mb-0 faq-title">講義の報酬について</h5>
                            </div>
                            <!-- End Title -->
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion" style="font-size:1.3em">
                                <!-- Card -->
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    どうすれば、講義の報酬が受け取れますか？
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            売上の管理画面から、入金待ち => 入金依頼をクリックしていただきます。その後、運営側により、月末に確定した報酬を入金します。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    入金のサイクルを教えてください。
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            入金は、15日締め、月末払いです。15日までに入金依頼があった場合、その月末に売上が振り込まれます。
                                            16日以降に入金依頼を申請した場合、翌月末の振り込みとなるので、ご注意ください。
                                        </div>
                                    </div>
                                </div>
                                <div class="box border-bottom bg-white mb-2 rounded shadow-sm overflow-hidden">
                                    <div id="basicsHeadingOne">
                                        <h3 class="mb-0">
                                            <button style="font-size:16px" class="shadow-none btn btn-block d-flex justify-content-between card-btn p-3 collapsed">
                                    手数料を教えてください。
                                    <span class="card-btn-arrow">
                                    <span class="feather-chevron-down"></span>
                                    </span>
                                    </button>
                                        </h3>
                                    </div>
                                    <div id="basicsCollapseOne" class="collapse show" >
                                        <div class="card-body border-top p-3 text-muted">
                                            振り込み手数料280円及び、システム手数料がかかります。
                                            システム手数料は、利用頻度に応じ、講義・セミナー料金の10%~20%で変動します。
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
