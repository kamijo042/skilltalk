@extends('layouts/lecture-header')
@section('main.content')

    <div class="osahan-home-page">
        <div class="bg-primary p-3 d-none">
            <div class="text-white">
                <div class="title align-items-center">
                    <a class="toggle" href="#">
                        <span></span>
                    </a>
                    <h4 class="font-weight-bold m-0" style="font-size:18px;text-align:center;">Skill Evolution</h4>
                </div>
            </div>
        </div>
        <!-- offer sectio slider -->
        <div class="container">
            <div class="pt-4 pb-2 title d-flex align-items-center">
                <h5 class="m-0 lecture-item">おすすめの講義</h5>
            </div>
            <!-- slider -->
            <div class="trending-slider">
                @foreach($lectures as $lecture)
                <div class="osahan-slider-item">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> {{$lecture->category_large_name}}/{{$lecture->category_small_name}}</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                            <a href="{{ route('lecture.detail', ['lecture_id'=>$lecture->lecture_id]) }}">
                                <img alt="#" src="/lecture-platform/ws/img/{{$lecture->image_name}}" class="img-fluid item-img w-100 h-239">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="{{ route('lecture.detail', ['lecture_id'=>$lecture->lecture_id]) }}" class="text-black">{{$lecture->title}}
                              </a>
                                </h6>
                                <p class="text-gray mb-3">{{$lecture->sub_title}}</p>
                                <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> {{$lecture->unit_time}} {{$lecture->unit}}</span> <span class="float-right text-black-50"> {{number_format($lecture->price)}}円</span></p>
                            </div>
                            <div class="list-card-badge">
                                <span class="badge badge-success">空きあり</span> <small> <a href="{{ route('lecture.detail', ['lecture_id'=>$lecture->lecture_id]) }}">詳細を見る</a></small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Most popular -->
            <div class="py-3 title d-flex align-items-center">
                <h5 class="m-0 lecture-item">講義一覧</h5>
            </div>
            <div>
                <h6 class="m-0 lecture-description">企業の現場レベルの専門スキルを、ピンポイントでレクチャーできます。</h6>
            </div>

            <section class="py-4 osahan-main-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <ul class="nav nav-tabsa custom-tabsa border-0 flex-column bg-white rounded overflow-hidden shadow-sm p-2 c-t-order" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link border-0 text-dark py-3 active" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true">
                                        <i class="feather-sliders mr-2 text-success mb-0"></i> IT・システム</a>
                                </li>
                                <li class="nav-item border-top" role="presentation">
                                    <a class="nav-link border-0 text-dark py-3" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="false">
                                        <i class="feather-clock mr-2 text-warning mb-0"></i> 経済・投資</a>
                                </li>
                                <li class="nav-item border-top" role="presentation">
                                    <a class="nav-link border-0 text-dark py-3" id="canceled-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
                                        <i class="feather-zap mr-2 text-danger mb-0"></i> 起業</a>
                                </li>
                                <li class="nav-item border-top" role="presentation">
                                    <a class="nav-link border-0 text-dark py-3" id="medical-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
                                        <i class="feather-folder-plus mr-2 text-info mb-0"></i> 医学・薬学</a>
                                </li>
                                <li class="nav-item border-top" role="presentation">
                                    <a class="nav-link border-0 text-dark py-3" id="medical-tab" data-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">
                                        <i class="feather-edit-3 mr-2 text-success mb-0"></i> 育児・教育</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content col-md-9" id="myTabContent">
                            <div class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                <div class="order-body">
                                    @foreach($itLectures as $itLecture)
                                    <div class="pb-3">
                                        <div class="p-3 rounded shadow-sm bg-white">
                                            <div class="d-flex border-bottom pb-3">
                                                <div class="text-muted mr-3">
                                                    <img alt="#" src="/lecture-platform/ws/img/{{$itLecture->image_name}}" class="order_img rounded w-132">
                                                </div>
                                                <div class="max-w-370">
                                                    <p class="mb-0 font-weight-bold lecture-item"><a href="restaurant.html" class="text-dark">{{$itLecture->title}}</a></p>
                                                    <p class="mb-0 lecture-description">{{$itLecture->sub_title}}</p>
                                                    <p class="mb-0 small"><a href="status_complete.html">詳細を見る</a></p>
                                                </div>
                                                <div class="ml-auto sp-none">
                                                    @if($itLecture->is_man_to_man)
                                                    <p class="bg-info text-white text-center py-1 px-2 rounded small mb-1">ワンツーマン確約</p>
                                                    @endif
                                                    @if($itLecture->is_online)
                                                    <p class="bg-success text-white text-center py-1 px-2 rounded small mb-1">オンライン限定</p>
                                                    @endif
                                                    <p class="small font-weight-bold text-center"><i class="feather-clock"></i> {{date("Y/m/d", strtotime($itLecture->created_at))}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="d-flex-pc lecture-description">
                                                    <p class="text- font-weight-bold mb-0"><i class="feather-clock"></i>{{$itLecture->unit_time}}{{$itLecture->unit}}</p>
                                                    @if($itLecture->initial_discount)
                                                    <p class="text- font-weight-bold mb-0 ml-8"><span class="badge badge-info">初回半額クーポン</span></p>
                                                    @endif
                                                    @if($itLecture->student_discount)
                                                    <p class="text- font-weight-bold mb-0 ml-8"><span class="badge badge-success">学割適用</span></p>
                                                    @endif
                                                </div>
                                                <div class="text-muted m-0 ml-auto mr-3 small pl-16">料金<br>
                                                    <span class="text-dark font-weight-bold">{{number_format($itLecture->price)}}円</span>
                                                </div>
                                                <div class="text-right">
                                                    <a href="checkout.html" class="btn btn-primary px-3">講義詳細</a>
                                                    <a href="contact-us.html" class="btn btn-outline-primary px-3 mt-8-sp">講師情報</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                                <div class="order-body">
                                    <div class="pb-3">
                                        <div class="p-3 rounded shadow-sm bg-white">
                                            <div class="d-flex border-bottom pb-3">
                                                <div class="text-muted mr-3">
                                                    <img alt="#" src="/lecture-platform/ws/img/sea03.jpg" class="order_img rounded w-132">
                                                </div>
                                                <div>
                                                    <p class="mb-0 font-weight-bold"><a href="restaurant.html" class="text-dark">Conrad Chicago Restaurant</a></p>
                                                    <p class="mb-0">Punjab, India</p>
                                                    <p>ORDER #321DERS</p>
                                                    <p class="mb-0 small"><a href="status_onprocess.html">View Details</a></p>
                                                </div>
                                                <div class="ml-auto">
                                                    <p class="bg-warning text-white py-1 px-2 rounded small mb-1">On Process</p>
                                                    <p class="small font-weight-bold text-center"><i class="feather-clock"></i> 06/04/2020</p>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="small">
                                                    <p class="text- font-weight-bold mb-0">Kesar Sweet x 1</p>
                                                    <p class="text- font-weight-bold mb-0">Gulab Jamun x 4</p>
                                                </div>
                                                <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                    <span class="text-dark font-weight-bold">$12.74</span>
                                                </div>
                                                <div class="text-right">
                                                    <a href="status_onprocess.html" class="btn btn-primary px-3">Track</a>
                                                    <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-3">
                                        <div class="p-3 rounded shadow-sm bg-white">
                                            <div class="d-flex border-bottom pb-3">
                                                <div class="text-muted mr-3">
                                                    <img alt="#" src="/lecture-platform/ws/img/sea01.jpg" class="order_img rounded w-132">
                                                </div>
                                                <div>
                                                    <p class="mb-0 font-weight-bold"><a href="restaurant.html" class="text-dark">Conrad Chicago Restaurant</a></p>
                                                    <p class="mb-0">Punjab, India</p>
                                                    <p>ORDER #321DERS</p>
                                                    <p class="mb-0 small"><a href="status_onprocess.html">View Details</a></p>
                                                </div>
                                                <div class="ml-auto">
                                                    <p class="bg-warning text-white py-1 px-2 rounded small mb-1">On Process</p>
                                                    <p class="small font-weight-bold text-center"><i class="feather-clock"></i> 06/04/2020</p>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="small">
                                                    <p class="text- font-weight-bold mb-0">Kesar Sweet x 1</p>
                                                    <p class="text- font-weight-bold mb-0">Gulab Jamun x 4</p>
                                                </div>
                                                <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                    <span class="text-dark font-weight-bold">$12.74</span>
                                                </div>
                                                <div class="text-right">
                                                    <a href="status_onprocess.html" class="btn btn-primary px-3">Track</a>
                                                    <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-3">
                                        <div class="p-3 rounded shadow-sm bg-white">
                                            <div class="d-flex border-bottom pb-3">
                                                <div class="text-muted mr-3">
                                                    <img alt="#" src="/lecture-platform/ws/img/sea02.jpg" class="order_img rounded w-132">
                                                </div>
                                                <div>
                                                    <p class="mb-0 font-weight-bold"><a href="restaurant.html" class="text-dark">Conrad Chicago Restaurant</a></p>
                                                    <p class="mb-0">Punjab, India</p>
                                                    <p>ORDER #321DERS</p>
                                                    <p class="mb-0 small"><a href="status_onprocess.html">View Details</a></p>
                                                </div>
                                                <div class="ml-auto">
                                                    <p class="bg-warning text-white py-1 px-2 rounded small mb-1">On Process</p>
                                                    <p class="small font-weight-bold text-center"><i class="feather-clock"></i> 06/04/2020</p>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="small">
                                                    <p class="text- font-weight-bold mb-0">Kesar Sweet x 1</p>
                                                    <p class="text- font-weight-bold mb-0">Gulab Jamun x 4</p>
                                                </div>
                                                <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                    <span class="text-dark font-weight-bold">$12.74</span>
                                                </div>
                                                <div class="text-right">
                                                    <a href="status_onprocess.html" class="btn btn-primary px-3">Track</a>
                                                    <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
                                <div class="order-body">
                                    <div class="pb-3">
                                        <div class="p-3 rounded shadow-sm bg-white">
                                            <div class="d-flex border-bottom pb-3">
                                                <div class="text-muted mr-3">
                                                    <img alt="#" src="/lecture-platform/ws/img/sea03.jpg" class="order_img rounded w-132">
                                                </div>
                                                <div>
                                                    <p class="mb-0 font-weight-bold"><a href="restaurant.html" class="text-dark">Conrad Chicago Restaurant</a></p>
                                                    <p class="mb-0">Punjab, India</p>
                                                    <p>ORDER #321DERS</p>
                                                   <p class="mb-0 small"><a href="status_canceled.html">View Details</a></p>
                                                </div>
                                                <div class="ml-auto">
                                                    <p class="bg-danger text-white py-1 px-2 rounded small mb-1">Payment failed</p>
                                                    <p class="small font-weight-bold text-center"><i class="feather-clock"></i> 06/04/2020</p>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="small">
                                                    <p class="text- font-weight-bold mb-0">Kesar Sweet x 1</p>
                                                    <p class="text- font-weight-bold mb-0">Gulab Jamun x 4</p>
                                                </div>
                                                <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                    <span class="text-dark font-weight-bold">$12.74</span>
                                                </div>
                                                <div class="text-right">
                                                    <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-3">
                                        <div class="p-3 rounded shadow-sm bg-white">
                                            <div class="d-flex border-bottom pb-3">
                                                <div class="text-muted mr-3">
                                                    <img alt="#" src="/lecture-platform/ws/img/sea01.jpg" class="order_img rounded w-132">
                                                </div>
                                                <div>
                                                    <p class="mb-0 font-weight-bold"><a href="restaurant.html" class="text-dark">Conrad Chicago Restaurant</a></p>
                                                    <p class="mb-0">Punjab, India</p>
                                                    <p>ORDER #321DERS</p>
                                                    <p class="mb-0 small"><a href="status_canceled.html">View Details</a></p>
                                                </div>
                                                <div class="ml-auto">
                                                    <p class="bg-danger text-white py-1 px-2 rounded small mb-1">Canceled</p>
                                                    <p class="small font-weight-bold text-center"><i class="feather-clock"></i> 06/04/2020</p>
                                                </div>
                                            </div>
                                            <div class="d-flex pt-3">
                                                <div class="small">
                                                    <p class="text- font-weight-bold mb-0">Kesar Sweet x 1</p>
                                                    <p class="text- font-weight-bold mb-0">Gulab Jamun x 4</p>
                                                </div>
                                                <div class="text-muted m-0 ml-auto mr-3 small">Total Payment<br>
                                                    <span class="text-dark font-weight-bold">$12.74</span>
                                                </div>
                                                <div class="text-right">
                                                    <a href="contact-us.html" class="btn btn-outline-primary px-3">Help</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

@endsection
