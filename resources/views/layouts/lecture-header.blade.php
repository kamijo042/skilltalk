<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <link rel="icon" type="image/png" href="img/fav.png">
    <title>Skill Evolution / オンラインスクールプラットフォーム</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="/lecture-platform/vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="/lecture-platform/vendor/slick/slick-theme.min.css" />
    <!-- Feather Icon-->
    <link href="/lecture-platform/vendor/icons/feather.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="/lecture-platform/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/lecture-platform/ws/css/custom.css" rel="stylesheet">
    <link href="/lecture-platform/css/style.css" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="/lecture-platform/vendor/sidebar/demo.css" rel="stylesheet">
    <script type="text/javascript" src="/lecture-platform/vendor/jquery/jquery.min.js"></script>
</head>

<body class="fixed-bottom-bar">
    <header class="section-header">
        <section class="header-main shadow-sm bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4 d-flex align-items-center m-none">
                        <div class="dropdown mr-3">
                            <div class="text-dark d-flex align-items-center py-3" >
                                <a href="{{route('lecture.index')}}">
                                <div style="font-size: 16px">
                                    <p class="text-muted mb-0 small">White Sands, Inc</p>
                                    Skill Talk
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- col.// -->
                    <div class="col-8">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="{{route('lecture.index')}}" class="widget-header mr-4 text-dark m-none">
                                <div class="icon d-flex align-items-center">
                                    <i class="feather-file-text h6 mr-2 mb-0"></i> <span>初めての方へ</span>
                                </div>
                            </a>
                            <div class="dropdown mr-4 m-none">
                                <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather-sunset h6 mr-2 mb-0"></i>講義/セミナーを見る
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profile.html" target="_blank">講義を探す</a>
                                    <a class="dropdown-item" href="{{route('mypage.lecture-own')}}" target="_blank">講義を作成する</a>
                                    <a class="dropdown-item" href="{{route('mypage.lecture-own')}}" target="_blank">評価の高い講義を見る</a>
                                </div>
                            </div>
                            <div class="dropdown mr-4 m-none">
                                <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather-book-open h6 mr-2 mb-0"></i>お問い合わせ
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('lecture.contact')}}" target="_blank">お問い合わせ</a>
                                    <a class="dropdown-item" href="{{route('lecture.faq')}}" target="_blank">よくある質問</a>
                                </div>
                            </div>
                            @auth
                            <a href="{{route('mypage.lecture-list')}}" class="widget-header mr-4 text-dark m-none">
                                <div class="icon d-flex align-items-center">
                                    <i class="feather-user h6 mr-2 mb-0"></i> <span>管理画面</span>
                                </div>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                            </form>

                            @else
                            <div class="dropdown mr-4 m-none">
                                <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather-user h6 mr-2 mb-0"></i>ログイン
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('login') }}" >ログイン</a>
                                    <a class="dropdown-item" href="{{ route('register') }}" >新規会員登録</a>
                                </div>
                            </div>
                            @endauth
                        </div>
                        <!-- widgets-wrap.// -->
                    </div>
                    <!-- col.// -->
                </div>
                <!-- row.// -->
            </div>
            <!-- container.// -->
        </section>
        <!-- header-main .// -->
    </header>

    <!-- body content start -->
    @yield('main.content')
    <!-- body content end-->

    <!-- Footer -->
    <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
        <div class="row">
            <div class="col selected">
                <a href="{{route('lecture.index')}}" class="text-danger small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-file-text text-danger"></i></p>
                    講義一覧
                </a>
            </div>
            <div class="col">
                <a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-sunrise"></i></p>
                    リクエスト
                </a>
            </div>
            <div class="col">
                <a href="most_popular.html" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-sunset"></i></p>
                    講義開設
                </a>
            </div>
            <div class="col">
                <a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-user"></i></p>
                    登録
                </a>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="section-footer border-top bg-dark">
        <div class="container">
            <section class="footer-top padding-y py-5">
                <div class="row pt-3">
                    <aside class="col-md-4 footer-about">
                        <article class="d-flex pb-3">
                            <div>
                                <h6 class="title text-white">スキルトーク / Skill Talk</h6>
                                <p class="text-muted">WEB会議プラットフォーム<br>独自のスキルをシェアしよう</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank" href="#"><i class="feather-facebook"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank" href="#"><i class="feather-instagram"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Youtube" target="_blank" href="#"><i class="feather-youtube"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank" href="#"><i class="feather-twitter"></i></a>
                                </div>
                            </div>
                        </article>
                    </aside>
                    <aside class="col-sm-3 col-md-2 text-white">
                        <h6 class="title">運営情報</h6>
                        <ul class="list-unstyled hov_footer">
                            <li> <a href="https://white-sands.biz" class="text-muted">企業情報</a></li>
                            <li> <a href="maintence.html" class="text-muted">講義パートナー募集</a></li>
                            <li> <a href="coming-soon.html" class="text-muted">開発パートナー募集</a></li>
                        </ul>
                    </aside>
                    <aside class="col-sm-3 col-md-2 text-white">
                        <h6 class="title">講師・セミナー主催者</h6>
                        <ul class="list-unstyled hov_footer">
                            <li> <a href="faq.html" class="text-muted">講義パートナーになる</a></li>
                            <li> <a href="contact-us.html" class="text-muted">講義を開く</a></li>
                            <li> <a href="terms.html" class="text-muted">講師用管理画面</a></li>
                            <li> <a href="privacy.html" class="text-muted">講師規約</a></li>
                            <li> <a href="favorites.htdml" class="text-muted"> 講師キャンセルポリシー </a></li>
                        </ul>
                    </aside>
                    <aside class="col-sm-3  col-md-2 text-white">
                        <h6 class="title">受講者・視聴者</h6>
                        <ul class="list-unstyled hov_footer">
                            <li> <a href="login.html" class="text-muted"> 講義を探す </a></li>
                            <li> <a href="signup.html" class="text-muted"> 受講者管理画面 </a></li>
                            <li> <a href="signup.html" class="text-muted"> 受講者規約 </a></li>
                            <li> <a href="favorites.html" class="text-muted"> 受講者キャンセルポリシー </a></li>
                        </ul>
                    </aside>
                    <aside class="col-sm-3  col-md-2 text-white">
                        <h6 class="title">スキルトーク</h6>
                        <ul class="list-unstyled hov_footer">
                            <li> <a href="trending.html" class="text-muted"> よくある質問 </a></li>
                            <li> <a href="most_popular.html" class="text-muted"> お問い合わせ </a></li>
                            <li> <a href="restaurant.html" class="text-muted"> プライバシーポリシー </a></li>
                            <li> <a href="maintence.html" class="text-muted">講義パートナー募集</a></li>
                            <li> <a href="coming-soon.html" class="text-muted">開発パートナー募集</a></li>
                        </ul>
                    </aside>
                </div>
                <!-- row.// -->
            </section>
        </div>
        <section class="footer-copyright border-top py-3 bg-light">
            <div class="container d-flex align-items-center">
                <p class="mb-0"> © <?php echo(date('Y')) ?> White Sands, Inc All rights reserved </p>
            </div>
        </section>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/lecture-platform/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="/lecture-platform/vendor/slick/slick.min.js"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="/lecture-platform/vendor/sidebar/hc-offcanvas-nav.js"></script>
    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="/lecture-platform/js/osahan.js"></script>
</body>

</html>
