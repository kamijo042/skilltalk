@extends('layouts/lecture-header')
@section('main.content')

<link href="/lecture-platform/ws/css/entry.css" rel="stylesheet">

<div class="col-md-12 mb-3">
    <div class="osahan-cart-item-profile">
        <div class="entry-block osahan-privacy bg-white rounded shadow-sm">
            <div class="entry-block_title">あなたの専門性を共有してください</div>
            <div class="entry-block_desc">
                スキルトークでは、あなたの専門性を、講義・セミナー・会議という形で公開することができます。<br>
                全国からあなたの専門性に興味を抱き、講義を受けに来ます。
                <br><br>
                会員登録は、無料です。<br>
※ 有料の会議、セミナーを開催する場合、10%~20%までの手数料をいただきます。
                <br><br>
                スキルトークでは、特に以下の分野での講義を募集しております。
            </div>
            <div class="rec-block">
                <div class="rec-block_detail">
                    <div class="rec-block_detail_num">1</div>
                    <div class="rec-block_detail_desc">IT、 システム開発</div>
                </div>
                <div class="rec-block_detail">
                    <div class="rec-block_detail_num">2</div>
                    <div class="rec-block_detail_desc">デザイン、映像制作</div>
                </div>
                <div class="rec-block_detail">
                    <div class="rec-block_detail_num">3</div>
                    <div class="rec-block_detail_desc">教育</div>
                </div>
                <div class="rec-block_detail">
                    <div class="rec-block_detail_num">4</div>
                    <div class="rec-block_detail_desc">医療・薬学関連</div>
                </div>
                <div class="rec-block_detail">
                    <div class="rec-block_detail_num">5</div>
                    <div class="rec-block_detail_desc">経済、会計</div>
                </div>
            </div>
            <div class="margin-top entry-block_desc">
                もちろん、その他の分野でも、なんでも募集いたします。
                <br>お気軽にご相談ください。
            </div>
            <hr>
            <div class="entry-block_title">講義開設までの流れ</div>
            <div class="entry-block_flow"><img src="/lecture-platform/img/flow.png" height="500px"></div>

            <div class="flow-title">1. 講義内容の準備</div>
            <div class="box">
              <ul>
                <li>講義タイトル</li>
                <li>受講後に期待できるスキル</li>
                <li>講義詳細、説明</li>
                <li>説明用パワポ資料(2~4枚)</li>
                <li>講義最小人数</li>
              </ul>
            </div>
            <div class="flow-desc"><a href="http://127.0.0.1:8000/lecture/detail/1">参考ページ</a></div>

            <div class="flow-title">2. 講義申請フォームから申請する</div>
            <div class="entry-block_desc"><div class="entry-btn"><a style="color: #FFF;" href="https://forms.gle/uy7ErP8G67AEwrNR8">講義申請フォーム</a></div></div>

            <div class="flow-title">3. 講義の内容に問題がないか、運営側で審査・ヒアリングをいたします</div>

            <div class="flow-title">4. ヒラリング後、3,4日程度で専用ページが公開されます</div>

            <hr>
            <div class="entry-block_desc">その他、質問等ございましたら、下記お問い合わせフォームから、
                ご連絡お願い致します。
            </div>
            <div class="entry-block_desc"><div class="inquiry-btn"><a style="color: #FFF;" href="http://127.0.0.1:8000/lecture/contact">お問い合わせ</a></div></div>
        </div>
    </div>
</div>

@endsection
