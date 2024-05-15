@extends('admin.master')
@section('content')
<div class="wrapper_order_page container py-5">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <a href="{{ url('admin/order') }}" class="mb-0 "><i class="fa-regular fa-arrow-left-long-to-line"></i> Trở về</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive scrollbar">
        <table class="table table-striped overflow-hidden text-nowrap">
            <thead>
                <tr class="btn-reveal-trigger table-dark">
                    <th scope="col">ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Date Update</th>
                </tr>
            </thead>
            <tbody>
                @if(!$order_items->isEmpty())
                    @foreach ($order_items as $item )
                    <tr>
                        <td>#{{ $item->id }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>x {{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }} VNĐ</td>
                        <td>{{ $item->product_id }}</td>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at==null ? 'Not Update' : $item->updated_at }}</td>
                    </tr>
                    @endforeach
                @else
                <td colspan="5">Không có sản phẩm nào</td>
                @endif
            </tbody>
        </table>
    </div>
    <div class="category-pagination d-flex justify-content-end mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <ul class="pagination">

                </ul>
        </nav>
    </div>
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