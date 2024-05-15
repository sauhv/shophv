@extends('layout')
@section('content')
<div class="container">
    <div class="group_news">
        <div class="page-title py-3">
            <h1 class="text-center">Tin tức</h1>
        </div>
        <div class="page-body">
            <div class="news-items row">
                <div class="col-8">
                    <div class="picture_latest_big">
                        <img class="object-fit-cover" src="{{ asset('images/news/DM_20240309000419_001.png')}}" width="100%" alt="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="picture_latest_normal float-right">
                        <img src="{{ asset('images/news/DM_20240309000419_002.png')}}" width="100%" alt="">
                    </div>
                    <div class="picture_latest_normal">
                        <img src="{{ asset('images/news/DM_20240309000419_003.png')}}" width="100%" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="group-news">
        <div class="page-title py-3">
            <h1>Tin tức Apple</h1>
        </div>
        <div class="page-body">
            <div class="news-item row">
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_004.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_005.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_006.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_007.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
            </div>
            <div class="show-all text-center mt-3">
                <a class="px-5 btn btn-outline-primary" href="#!category/ipad">Xem tất cả</a>
            </div>
        </div>
    </div>
    <div class="group-news">
        <div class="page-title py-3">
            <h1>Bài viết review</h1>
        </div>
        <div class="page-body">
            <div class="news-item row">
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_004.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_005.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_006.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_007.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
            </div>
            <div class="show-all text-center mt-3">
                <a class="px-5 btn btn-outline-primary" href="#!category/ipad">Xem tất cả</a>
            </div>
        </div>
    </div>
    <div class="group-news">
        <div class="page-title py-3">
            <h1>Khám phá</h1>
        </div>
        <div class="page-body">
            <div class="news-item row">
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_004.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_005.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_006.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_007.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
            </div>
            <div class="show-all text-center mt-3">
                <a class="px-5 btn btn-outline-primary" href="#!category/ipad">Xem tất cả</a>
            </div>
        </div>
    </div>
    <div class="group-news">
        <div class="page-title py-3">
            <h1>Thủ thuật</h1>
        </div>
        <div class="page-body">
            <div class="news-item row">
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_004.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_005.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_006.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_007.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
            </div>
            <div class="show-all text-center mt-3">
                <a class="px-5 btn btn-outline-primary" href="#!category/ipad">Xem tất cả</a>
            </div>
        </div>
    </div>
    <div class="group-news">
        <div class="page-title py-3">
            <h1>Khuyến mại</h1>
        </div>
        <div class="page-body">
            <div class="news-item row">
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_004.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_005.jpg') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_006.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
                <div class="col-lg-6 row p-2">
                    <div class="picture col-6">
                        <img src="{{ asset('images/news/DM_20240309000419_007.png') }}" width="100%" alt="">
                    </div>
                    <div class="news-head col-6">
                        <div class="news-title">Tiêu điểm cuối năm 2023: Tổng hợp sản phẩm MacBook và iMac mới nhất của Apple</div>
                        <div class="news-date">31/10/2023</div>
                    </div>
                </div>
            </div>
            <div class="show-all text-center mt-3">
                <a class="px-5 btn btn-outline-primary" href="#!category/ipad">Xem tất cả</a>
            </div>
        </div>
    </div>
</div>
@endsection