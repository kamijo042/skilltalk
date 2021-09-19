    <div class="osahan-profile">
        <div class="d-none">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Profile</h4>
            </div>
        </div>
        <!-- profile -->
        <div class="container position-relative">
            <div class="py-5 osahan-profile row">
                <div class="col-md-4 mb-3">
                    <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                        <a href="profile.html" class="">
                            <div class="d-flex align-items-center p-3">
                                <div class="left mr-3">
                                    <img alt="#" height="50" width="50"src="/lecture-platform/ws/img/sea02.jpg" class="rounded-circle">
                                </div>
                                <div class="right">
                                    <h6 class="mb-1 font-weight-bold">{{Auth::user()->published_name}} <i class="feather-check-circle text-success"></i></h6>
                                    <p class="text-muted m-0 small">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                        </a>
                        <!-- profile-details -->
                        <div class="bg-white profile-details">
                            <a href="{{route('mypage.payout')}}" class="d-flex w-100 align-items-center px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i class="feather-lock bg-danger text-white p-2 rounded-circle mr-2"></i> 売上予定</h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0">@if($menu_type==='list')<i class="feather-user-check">@else<i class="feather-chevron-right">@endif</i></h6>
                                </div>
                            </a>
                            <a href="{{route('mypage.payout.submit')}}" class="d-flex w-100 align-items-center px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i class="feather-star bg-danger text-white p-2 rounded-circle mr-2"></i> 入金待ち</h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0">@if($menu_type==='submit')<i class="feather-user-check">@else<i class="feather-chevron-right">@endif</i></h6>
                                </div>
                            </a>
                            <a href="{{route('mypage.lecture-own.fixed')}}" class="d-flex w-100 align-items-center px-3 py-4">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold m-0 text-dark"><i class="feather-star bg-danger text-white p-2 rounded-circle mr-2"></i> 支払履歴</h6>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0">@if($menu_type==='fixed')<i class="feather-user-check">@else<i class="feather-chevron-right">@endif</i></h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
