@extends('pages.wrapper_productList_page')
@section('titlePage', 'Sản phẩm theo loại')
@section('product')
<div class="product-list-category">
    <div class="list-item row">
        @foreach($product_cate as $item)
        <div class="item-box col-lg-3 col-md-4 col-6 py-3">
            <div class="card p-4 border-0 shadow ">
                <div class="item-tag"></div>
                <div class="item-picture mb-4">
                    <a href="{{ url('detail/'.$item->id) }}">
                        <img style="aspect-ratio: 1/1;" src="{{ asset('images/product/'.$item->image)}}" class="w-100 d-block object-fit-contain" alt="{{ $item->image }}">
                    </a>
                </div>
                <div class="item-details card-body p-0">
                    <h5 class="item-title mb-4" style="height: 60px;">
                        <a class="list-group-item" href="{{ url('detail/'.$item->id) }}">{{ $item->name }}</a>
                    </h5>
                    <div class="item-info">
                        <strong class="price text-primary me-2">{{ number_format($item->price) }}<i class="fa-solid fa-dong-sign fa-xs"></i></strong>
                        <del class="amount text-secondary me-2">{{ number_format($item->amount) }}<i class="fa-solid fa-dong-sign fa-xs"></i></del>
                        <span class="sale-tag text-secondary">{{ number_format( (($item->amount - $item->price) / $item->amount)*100 ) }}%</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="category-pagination d-flex justify-content-center mt-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <ul class="pagination">
                <li class="page-item me-2">{{ $product_cate->onEachSide(5)->links() }}</li>
            </ul>
        </ul>
    </nav>
</div>
@endsection