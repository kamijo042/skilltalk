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
                                <div>
                                    <p class="text-muted mb-0 small">White Sands, Inc</p>
                                    Skill Evolution
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-flex align-items-center justify-content-end pr-5">
                            <div class="dropdown mr-4 m-none">
                                <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img alt="#" src="/lecture-platform/ws/img/sea03.jpg" class="img-fluid rounded-circle header-user mr-2 header-user"> Hi {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="profile.html">講義を公開する</a>
                                    <a class="dropdown-item" href="{{route('mypage.lecture-own')}}">担当講義一覧</a>
                                    <a class="dropdown-item" href="{{route('mypage.lecture-list')}}">受講一覧</a>
                                    <a class="dropdown-item" href="{{route('mypage.payout')}}">売上情報</a>
                                    <a class="dropdown-item" href="privacy.html">会員設定</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            class="dropdown-item"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('ログアウト') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <!-- signin -->
                            <a class="toggle" href="#">
                                <span></span>
                            </a>
                        </div>
                        <!-- widgets-wrap.// -->
                    </div>
                </div>
            </div>
        </section>
    </header>

    @yield('main.content')

        <!-- Footer -->
        <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
            <div class="row">
                <div class="col">
                    <a href="home.html" class="text-dark small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
                        講義リスト
                    </a>
                </div>
                <div class="col">
                    <a href="most_popular.html" class="text-dark small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                        受講リスト
                    </a>
                </div>
                <div class="col">
                    <a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-heart"></i></p>
                        売上
                    </a>
                </div>
                <div class="col selected">
                    <a href="profile.html" class="text-danger small font-weight-bold text-decoration-none">
                        <p class="h4 m-0"><i class="feather-user"></i></p>
                        会員設定
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="section-footer border-top bg-dark">
        <section class="footer-copyright border-top py-3 bg-light">
            <div class="container d-flex align-items-center">
                <p class="mb-0"> © <?php echo(date('Y'))?> White Sands, Inc All rights reserved </p>
            </div>
        </section>
    </footer>
    <nav id="main-nav">
        <ul class="second-nav">
            <li><a href="home.html"><i class="feather-home mr-2"></i> 講義を公開する</a></li>
            <li><a href="{{route('mypage.lecture-own')}}"><i class="feather-list mr-2"></i> 担当講義一覧</a></li>
            <li><a href="{{route('mypage.lecture-list')}}"><i class="feather-heart mr-2"></i> 受講一覧</a></li>
            <li><a href="trending.html"><i class="feather-trending-up mr-2"></i> 売上情報</a></li>
            <li><a href="most_popular.html"><i class="feather-award mr-2"></i> 会員設定</a></li>
        </ul>
    </nav>
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
