@extends('layout')
@section('content')

<div class="wrapper_order_page container py-5">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">#Đơn hàng của <u>{{ Auth::user()->name }}!</u></h6>
                </div>
                <div class="col-sm-auto">
                    <div class="row gx-2 align-items-center">
                        <div class="col-auto">
                            <form class="row gx-2">
                                <div class="col-auto"><small>Sắp xếp: </small></div>
                                <div class="col-auto"><select class="form-select form-select-sm" aria-label="Bulk actions">
                                        <option selected="">Mã đơn hàng</option>
                                        <option value="Hot">Giá</option>

                                    </select></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive scrollbar">
        <table class="table table-striped overflow-hidden table-order">
            <thead>
                <tr class="btn-reveal-trigger table-dark text-nowrap">
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hình thức thanh toán</th>
                    <th scope="col">Thông tin người nhận</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @if (!$orders->isEmpty())
                @foreach($orders as $order)
                <tr class="btn-reveal-trigger tbody_order">
                    <td><strong>#{{$order->id}}</strong></td>
                    <td>
                        @if ($order->status==0)
                        <strong>Chờ xác nhận</strong>
                        <div class="action-cancel">
                            <form action="{{ url('orders') }}" method="post">
                                @csrf 
                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                <button onclick="confirm('Bạn có chắc là muốn hủy!')">Hủy đơn hàng</button>
                            </form>
                        </div>
                        @elseif ($order->status==1)
                        <strong>Đang vận chuyển</strong>
                        @elseif ($order->status==2)
                        <strong class="text-success">Đã hoàn thành</strong>
                        @elseif ($order->status==3)
                        <strong class="text-danger">Đã Hủy</strong>
                        @endif
                        <div class="">
                            <i style="font-size: 9px;">{{$order->created_at}}</i>
                            <div class="">

                                <i style="font-size: 9px;">{{$order->updated_at}}</i>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if ($order->status==2)
                        <strong>Đã thanh toán</strong>
                        @else
                        <span>Thanh toán khi nhận hàng</span>
                        <div>
                            <i class="free-ship">(Miễn phí giao hàng)</i>
                        </div>
                        @endif
                    </td>
                    <td>
                        <div>
                            <div class="table-order_name">
                                <span>{{$order->name}}</span>
                            </div>
                            <div class="table-order_contact">
                                <i>SĐT: {{$order->phone_number}}</i>
                            </div>
                            <div class="table-order_address">
                                <i>Địa chỉ: {{$order->address}}</i>
                            </div>
                        </div>
                    </td>
                    <td class="table-order_takenote">{{$order->note}}</td>
                    <td><strong>{{number_format($order->total_money)}} VNĐ</strong></td>

                    <td><a class="text-bg-success p-1 list-group-item text-center" href="{{ url('order_items', $order->id) }}">Xem</a></td>
                </tr>
                @endforeach
                @else
                    <td class="text-center" colspan="8">Không có đơn hàng nào! <a href="{{ url('/')}}">Mua Ngay</a></td>
                @endif
            </tbody>
        </table>
    </div>
    <div class="category-pagination d-flex justify-content-end mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <ul class="pagination">
                    <li class="page-item me-2">{{ $orders->onEachSide(5)->links() }}</li>
                </ul>
            </ul>
        </nav>
    </div>
</div>

@endsection