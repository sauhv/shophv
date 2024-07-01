@extends('layout')
@section('titlePage', 'Shophv.com')
@section('content')
<div class="wrapper-home-page">

    <div class="slideshow-home-page mb-5">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="{{ asset('images/uploaded/banner/slider/1.jpg') }}" class="d-block w-100 object-fit-cover" height="100%" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('images/uploaded/banner/slider/3.png') }}" class="d-block w-100 object-fit-cover" height="100%" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('images/uploaded/banner/slider/4.png') }}" class="d-block w-100 object-fit-cover" height="100%" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="content-home-page container">

        <div class="feedback-topic mb-5">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('images/uploaded/banner/feedback/BA.png')}}" class="w-100 d-block" alt="feedback">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('images/uploaded/banner/feedback/QT2.png')}}" class="w-100 d-block" alt="feedback">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('images/uploaded/banner/feedback/TR.png')}}" class="w-100 d-block" alt="feedback">
                </div>
            </div>
        </div>

        <div class="home-page-category-list">

            <div class="category-list">
                <div class="category-list">
                    @foreach ($productListing as $productList)
                        @foreach ($productList as $category => $products)
                            <div class="categoty-item pt-4">
                                <h2 class="mb-2 text-center fw-bold"><a class="list-group-item" href="#">{{ ucfirst($category) }}</a></h2>
                                <div class="list-item row">
                                    @foreach ($products as $product)
                                    <div class="item-box col-lg-3 col-md-4 col-6 py-3">
                                        <div class="card p-4 border-0 shadow ">
                                            <div class="item-tag"></div>
                                            <div class="item-picture mb-4">
                                                <a href="{{ url('detail/'.$product->id)}}">
                                                    <img src="{{ asset('images/product/'.$product->image)}}" class="w-100 d-block object-fit-contain" alt="Iphone14" style="aspect-ratio: 1/1;">
                                                </a>
                                            </div>
                                            <div class="item-details card-body p-0">
                                                <h5 class="item-title mb-4" style="height: 60px;">
                                                    <a class="list-group-item" href="{{ url('detail/'.$product->id)}}">{{$product->name}}</a>
                                                </h5>
                                                <div class="item-info">
                                                    <a href="{{ url('detail/'.$product->id)}}" class="text-decoration-none">
                                                        <strong class="actual-price text-primary me-2">{{ number_format($product->price) }}<i class="fa-solid fa-dong-sign fa-xs"></i></strong>
                                                        <del class="old-price text-secondary me-2">{{ number_format($product->amount) }}<i class="fa-solid fa-dong-sign fa-xs"></i></del>
                                                        <span class="sale-tag text-secondary">{{ number_format((($product->amount - $product->price) / $product->amount) * 100) }}%</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="show-all text-center my-3">
                                <a class="px-5 py-2 btn btn-outline-primary " href="{{ url('product/'.$product->category_id) }}">Xem tất cả</a>
                            </div>
                        @endforeach
                    @endforeach
                </div>

            </div>

        </div>
        <div class="banner-home-page-bottom py-5">
            <img src="{{ asset('images/uploaded/banner/slider/PC_(2).png')}}" class="w-100 d-block" alt="banner">
        </div>
    </div>

    <!-- news list -->
    <div class="news-list-home-page container">
        <h2 class="title text-center fw-bold mb-2">Tin tức</h2>
        <div class="news-items row">
            <div class="news-item col-lg-4 col-12 py-3">
                <div class="card border-0">
                    <img src="{{ asset('/images/uploaded/0023321_review-macbook-pro-m3-2023_(2)_1600.jpg')}}" class="card-img-top w-100 d-block object-fit-cover" height="180px" alt="tin tuc">
                    <div class="card-body p-0">
                        <h5 class="card-title m-0 p-4">Review MacBook Pro M3 2023: Chip M3 series vượt trội, đồ họa và
                            gaming
                        </h5>
                        <p class="card-text text-secondary mb-4 px-4">8/11/2023</p>
                    </div>
                </div>
            </div>
            <div class="news-item col-lg-4 col-6 py-3">
                <div class="card border-0">
                    <img src="{{ asset('/images/uploaded/0023320_sac-macbook-pro-m3-bao-nhieu-w_(4)_1600.jpg')}}" class="card-img-top w-100 d-block object-fit-cover" height="180px" alt="tin tuc">
                    <div class="card-body p-0">
                        <h5 class="card-title m-0 p-4">Sạc MacBook Pro M3 bao nhiêu W? Máy hỗ trợ tính năng sạc nhanh
                            nào?
                        </h5>
                        <p class="card-text text-secondary mb-4 px-4">8/11/2023</p>
                    </div>
                </div>
            </div>
            <div class="news-item col-lg-4 col-6 py-3">
                <div class="card border-0">
                    <img src="{{ asset('images/uploaded/0023322_macbook-pro-m3-co-may-mau_(5)_1600.jpg')}}" class="card-img-top w-100 d-block object-fit-cover" height="180px" alt="tin tuc">
                    <div class="card-body p-0">
                        <h5 class="card-title m-0 p-4">Điểm danh 3 màu MacBook Pro M3 | Space Black - Màu mới mà không
                            mới
                        </h5>
                        <p class="card-text text-secondary mb-4 px-4">8/11/2023</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-all text-center pb-5">
            <a class="px-5 py-2 btn btn-outline-primary" href="#"> Xem tất cả </a>
        </div>
    </div>
</div>
@endsection