@extends('layout')
@section('content')
<div class="wrapper-category-page container">
    <div class="all_content-category py-4">
        <div class="page-title text-center mb-4">
            <h4>Tìm kiếm: {{Request::get('keyword')}}</h4>
        </div>
        <div class="category-nav py-4 d-flex justify-content-between align-items-center">
            <div class="col-lg-8">
                <h5>Tìm kiếm: {{Request::get('keyword')}}</h5>
            </div>
            <div class="col-lg-2 ms-5">

                <form action="{{ url('search')}}" method="get">
                    <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm">
                </form>

            </div>
            <div class=" col-lg-2 sosanh ms-4">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Xắp xếp theo
                    </button>
                    <ul class="dropdown-menu">
                        <form action="" method="post">
                            <li><button name="abc" value="123" class="btn">Giá tăng dần</button></li>
                            <li><button name="abc" value="12" class="btn">Giá giảm dần</button></li>
                            <li><button name="abc" value="222" class="btn">Sắp xếp theo tên</button></li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        <div class="product-list-category">
            <div class="list-item row">
                @forelse ($products as $pro)
                <div class="item-box col-lg-3 col-md-4 col-6 py-3">
                    <div class="card p-4 border-0 shadow ">
                        <div class="item-tag"></div>
                        <div class="item-picture mb-4">
                            <a href="{{ url('detail/'.$pro->id) }}">
                                <img style="aspect-ratio: 1/1;" src="{{ asset('images/product/'.$pro->image) }}" class="w-100 d-block object-fit-contain">
                            </a>
                        </div>
                        <div class="item-details card-body p-0">
                            <h5 class="item-title mb-4">
                                <a class="list-group-item" href="{{ url('detail/'.$pro->id) }}">{{ $pro->name }}</a>
                            </h5>
                            <div class="item-info">
                                <strong class="actual-price text-primary me-2">{{number_format($pro->price)}}<i class="fa-solid fa-dong-sign fa-xs"></i></strong>
                                <del class="old-price text-secondary me-2">{{number_format($pro->amount)}}<i class="fa-solid fa-dong-sign fa-xs"></i></del>
                                <span class="sale-tag text-secondary">{{ number_format((($pro->amount - $pro->price) / $pro->amount)*100)}}%</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col text-center">
                    <img class="" src="{{ asset('images/uploaded/search_empty.png')}}" width="50%" alt="search"> <br>
                    <span>Không có kết quả tìm kiếm</span>
                </div>
                @endforelse

            </div>
        </div>
        <div class="category-pagination d-flex justify-content-center mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <ul class="pagination">
                        <li class="page-item me-2">{{ $products->onEachSide(5)->appends(request()->query())->links() }}</li>
                    </ul>
                </ul>
            </nav>
        </div>
        <div class="topic-block mt-4">
            <div class="topic-block-body row justify-content-around">
                <div class="col-lg-5 d-flex bg-body justify-content-center align-items-center px-4">
                    <img src="{{ asset('images/thums/Image-Standard.png')}}" width="200px" alt="1">
                    <div class="">
                        <h4>Tìm IPhone phù hợp với bạn</h4>
                        <a class="text-decoration-none" href="#">So sánh các iPhone</a>
                    </div>
                </div>
                <div class="col-lg-5 d-flex bg-body justify-content-center align-items-center px-4">
                    <img src="{{ asset('images/thums/Image-Standard-1.png')}}" width="200px" alt="1">
                    <div class="">
                        <h4>Phụ kiện iPhone thường mua kèm</h4>
                        <a class="text-decoration-none" href="#">So sánh các iPhone</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection