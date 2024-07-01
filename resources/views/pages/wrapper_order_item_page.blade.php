@extends('layout')
@section('titlePage', 'Chi tiết đơn hàng')
@section('content')
<div class="wrapper_order_page container py-5">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0 ">
                    <a class="list-group-item" href="{{ url('orders') }}" class="mb-0 "><i class="fa-regular fa-arrow-left-long-to-line"></i> Trở về</a>
                </div>
                <div class="col-sm-auto mb-2 mb-sm-0 ">
                    <span class="list-group-item" href="{{ url('orders') }}" class="mb-0 ">#Đơn hàng chi tiết</span>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive scrollbar">
        <table class="table table-striped overflow-hidden text-nowrap">
            <thead>
                <tr class="btn-reveal-trigger table-dark">
                    <th scope="col">STT</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @if(!$order_items->isEmpty())
                <?php $index = 1 ?>
                    @foreach ($order_items as $item )
                    <tr>
                        <td>{{$index++}}</td>
                        <td>
                            <a href="{{ url('detail/'.$item->product_id) }}" class="list-group-item">
                                <div class="table-order_item_product d-flex m-2">
                                    <div class="table-order_item_image">
                                        <img width="80px" src="{{ asset('images/product/'. $item->image) }}">
                                    </div>
                                    <div class="table-order_item_name">
                                        <strong class="fs-5">{{$item->product_name}}</strong> <br>
                                        <span>{{ number_format($item->price) }}</span>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>x {{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }} VNĐ</td>
                        <td>{{ number_format($item->quantity * $item->price) }} VNĐ</td>
                    </tr>
                    @endforeach
                @else
                <td colspan="5">Không có sản phẩm nào</td>
                @endif
            </tbody>
        </table>
    </div>
    <div class="category-pagination d-flex justify-content-center mt-3">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <ul class="pagination">
        <li class="page-item me-2">{{ $order_items->onEachSide(5)->links() }}</li>
      </ul>
    </ul>
  </nav>
</div>

@endsection