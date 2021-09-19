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
                                    Skill Evolution
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
                                    <i class="feather-file-text h6 mr-2 mb-0"></i> <span>講義一覧</span>
                                </div>
                            </a>
                            <a href="login.html" class="widget-header mr-4 text-dark m-none">
                                <div class="icon d-flex align-items-center">
                                    <i class="feather-sunrise h6 mr-2 mb-0"></i> <span>講義をリクエストする</span>
                                </div>
                            </a>
                            <a href="login.html" class="widget-header mr-4 text-dark m-none">
                                <div class="icon d-flex align-items-center">
                                    <i class="feather-sunset h6 mr-2 mb-0"></i> <span>講義を開設する</span>
                                </div>
                            </a>
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
                            <a href="{{ route('login') }}" class="widget-header mr-4 text-dark m-none">
                                <div class="icon d-flex align-items-center">
                                    <i class="feather-user h6 mr-2 mb-0"></i> <span>ログイン</span>
                                </div>
                            </a>
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
        <!-- //container -->
        <section class="footer-copyright border-top py-3 bg-light">
            <div class="container d-flex align-items-center">
                <p class="mb-0"> © <?php echo(date('Y')) ?> White Sands, Inc All rights reserved </p>
            </div>
        </section>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/lecture-platform/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/lecture-platform/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="/lecture-platform/vendor/slick/slick.min.js"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="/lecture-platform/vendor/sidebar/hc-offcanvas-nav.js"></script>
    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="/lecture-platform/js/osahan.js"></script>
</body>

</html>
