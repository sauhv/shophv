@extends('admin.master')
@section('content')
<div class="card mb-3">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-md">
                <h5 class="mb-2 mb-md-0">Category Listing</h5>
            </div>
            <div class="col-auto"><a href="{{ url('admin/category/create') }}" class="btn btn-primary" role="button">Add Category </a></div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-sm-auto mb-2 mb-sm-0">
                <h6 class="mb-0">Showing 1-24 of 205 Category</h6>
            </div>
            <div class="col-sm-auto">
                <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                        <form class="row gx-2">
                            <div class="col-auto"><small>Sort by: </small></div>
                            <div class="col-auto"><select class="form-select form-select-sm" aria-label="Bulk actions">
                                    <option selected="">Default</option>
                                    <option value="Hot">Hot</option>
                                    <option value="Refund">Newest</option>
                                    <option value="Delete">Price</option>
                                </select></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive scrollbar">
    <table style="font-size: 14px;" class="table table-striped overflow-hidden text-nowrap">
        <thead>
            <tr class="btn-reveal-trigger table-dark">
                <th scope="col">Order ID</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Total</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Note</th>
                <th scope="col">Note Admin</th>
                <th scope="col">Date Create</th>
                <th scope="col">Date Update</th>
                <th class="text-end" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="btn-reveal-trigger ">
                <td><a href="{{ url('admin/order_items', $order->id) }}">ĐH{{$order->id}}</a></td>
                <td>{{$order->name}}</td>
                <td>
                    <form action="{{ route('order.update', $order->id)}}" method="post">
                        @csrf @method('PUT')
                        <select name="status" id="" onchange="this.form.submit()">
                            <option value="0" {{$order->status==0?'selected': ''}}>Chờ xác nhận</option>
                            <option value="1" {{$order->status==1?'selected': ''}}>Đang vận chuyển</option>
                            <option value="2" {{$order->status==2?'selected': ''}}>Đã hoàn thành</option>
                            <option value="3" {{$order->status==3?'selected': ''}}>Đơn bị hủy</option>
                        </select>
                    </form>
                </td>
                <td>{{number_format($order->total_money)}} VNĐ</td>
                <td>{{$order->phone_number}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->note}}</td>
                <td>{{$order->note_admin}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->updated_at==null?'No Update': $order->updated_at }}</td>
                <td class="text-end">
                    <div class="dropdown font-sans-serif position-static">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-0">
                            <div class="py-2"><a class="dropdown-item" href="#">Edit</a>
                                <form action="#" method="post">
                                    <button onclick="return confirm('Are\'u sure you want to delete?')" class="dropdown-item text-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="category-pagination d-flex justify-content-center mt-3">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <ul class="pagination">
        <li class="page-item me-2">{{ $orders->onEachSide(5)->links() }}</li>
      </ul>
    </ul>
  </nav>
</div>
@endsection