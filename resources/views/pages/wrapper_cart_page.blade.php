@extends('layout')
@section('titlePage', 'Giỏ hàng')
@section('content')
<div class="wrapper-cart-page">
    <div style="background: #fff;" class="cart-header">
        <div class="container button-cart pt-5 d-flex justify-content-between align-content-center">
            <div class="">
                <h3>#Shoping Cart</h3>
            </div>
            <a class="btn text-bg-success" href="{{ url('orders')}}">Đơn hàng đã đặt</a>
        </div>
    </div>
    <div class="container">
        <div class="cart-body">
            <div class="all_content-cart py-4">
                <div class="cart-block ">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sp_in_cart shadow ">
                                <table class="table table-responsive">
                                    @if ($cart_empty==false)
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_item as $id => $item)
                                        <tr class="p-0" data-id={{$id}}>
                                            <td class="p-0">
                                                <div class="img">
                                                    <img src="{{ asset('images/product/'.$item->associatedModel->image) }}" class="d-block p-3" width="100px" alt="image_cart">
                                                </div>
                                            </td>
                                            <td style="width:350px;">
                                                <h5 class="m-0 item_name">{{ $item->name }}</h5>
                                            </td>
                                            <td>
                                                <strong>{{ number_format($item->price)}}<i class="fa-solid fa-dong-sign"></i></strong>
                                            </td>
                                            <td>
                                                <div class="col-auto pe-0">
                                                    <div class="input-group input-group-sm" data-quantity="data-quantity">
                                                        <input class="form-control text-center input-quantity input-spin-none" id="{{$item->id}}" type="number" min="0" value="{{ $item->quantity }}" style="max-width: 50px">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a data-url="{{ route('removecart', $item->id) }}" class="btn btn-delete" role="button"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <th colspan="5">
                                            <button class="btn btn-outline-primary float-end">Update Cart</button>
                                            </tr>
                                    </tbody>
                                    @else
                                    <div class="cart_empty text-center">
                                        <img src="https://newnet.vn/themes/newnet/assets/img/empty-cart.png" width="60%" alt="cart_empty"> <br>
                                    </div>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4 bg-body p-4 rounded-3 shadow">
                            <div class="input-group form_info-text">
                                <input type="text" id="getCouponCode" class="form-control" placeholder="Mã giảm giá">
                                <button type="button" id="ApplyCoupon" class="btn btn-outline-success "><i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                            <span id="getCouponName"></span>
                            <div class="d-flex justify-content-between pt-4 form_info-text">
                                <p class="text-secondary">Tổng sản phẩm ({{$total_quantity}})</p>
                                <strong>{{ number_format(\Cart::getTotal()) }}<i class="fa-solid fa-dong-sign"></i></strong>
                            </div>
                            <div class="d-flex justify-content-between form_info-text">
                                <p class="text-secondary">Vận chuyển</p>
                                <strong>Free Shiping</strong>
                            </div>
                            <div class="d-flex justify-content-between form_info-text">
                                <p class="text-secondary">Giảm giá <i id="percent_amount"></i></p>
                                <strong>
                                    <span id="getCouponAmount">0</span>
                                    <i class="fa-solid fa-dong-sign"></i>
                                </strong>
                            </div>
                            <div class="d-flex justify-content-between py-3 border-bottom">
                                <strong>Tổng thu</strong>
                                <strong class="text-primary">
                                    <span id="getPayableTotal">{{ number_format(\Cart::getSubTotal()) }}</span>
                                    <i class="fa-solid fa-dong-sign"></i></strong>
                            </div>
                        </div>
                        <div class="col-lg-8 pb-5 ">
                            <form action="{{ url('checkout') }}" method="post">
                                @csrf
                                <div class="container_form_order mt-2">
                                    <h3>Thông tin thanh toán *</h3>
                                    <div class="form_order">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="Họ tên" id="floatingInput" name="name" value="{{ old('name') }}">
                                            <label for="floatingInput">Họ tên *</label>
                                            @error('name')
                                            <span class="alert_error_message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="form-floating mb-3 col-6">
                                                <input type="text" class="form-control" placeholder="Số điện thoại" id="floatingInput" name="phone_number" value="{{ old('phone_number') }}">
                                                <label class="ms-2" for="floatingInput">Số điện thoại</label>
                                                @error('phone_number')
                                                <span class="alert_error_message">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3 col-6">
                                                <input type="email" class="form-control" placeholder="Email" id="floatingInput" name="email" value="{{ old('email') }}">
                                                <label class="ms-2" for="floatingInput">Email *</label>
                                                @error('email')
                                                <span class="alert_error_message">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="provinces" name="provinces">
                                                    <option value="" selected>Chọn tỉnh thành</option>
                                                </select>
                                                <label class="ms-2" for="floatingInput">Tỉnh thành phố</label>
                                            </div>
                                            <div class="form-floating mb-3 col-6">
                                                <select class="form-select" id="districts" name="districts">
                                                    <option value="" selected>Chọn quận huyện</option>
                                                </select>
                                                <label class="ms-2" for="floatingInput">Quận Huyện</label>
                                            </div>
                                            <div class="form-floating mb-3 col-6">
                                                <select class="form-select" id="wards" name="wards">
                                                    <option value="" selected>Chọn phường xã</option>
                                                </select>
                                                <label class="ms-2" for="floatingInput">Phường xã</label>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" placeholder="Địa chỉ" id="floatingInput" name="address" value="{{ old('address') }}">
                                            <label for="floatingInput">Địa chỉ cụ thể</label>
                                            @error('address')
                                            <span class="alert_error_message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Ghi chú cho đơn hàng" id="floatingTextarea" name="note"></textarea>
                                                <label for="floatingTextarea">Ghi chú đơn hàng</label>
                                            </div>
                                        </div>
                                        <div class="form-check form_info-text">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Thanh toán khi nhận hàng (COD)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-check px-0 py-2 form_info-text">
                                        <input type="checkbox" id="rules" value="{{ old('checkbox') }}" required>
                                        <label for="rules">Tôi đã đọc và đồng ý với <a href="#">điều khoản và điều kiện</a> của website.</label>
                                        @error('checkbox')
                                        <span class="alert_error_message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if(empty(\Auth::check()))
                                    <span class="fs-11 text-danger">
                                        Bạn chưa đăng nhập <a href="{{ url('login') }}"> vui lòng đăng nhập!</a>
                                    </span>
                                    @endif
                                    <button class="btn btn-outline-primary w-100 py-2 mt-3">Tiền hành đặt hàng</button>
                                </div>
                                <input type="hidden" name="subTotal" id="subTotal" value="{{ \Cart::getSubTotal() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(() => {
        $('#ApplyCoupon').click(function() {
            var coupon_code = $('#getCouponCode').val();

            $.ajax({
                type: "POST",
                url: "{{ url('checkout/apply_coupon_code') }}",
                data: {
                    coupon_code: coupon_code,
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        $('#getCouponAmount').html(data.coupon_amount)
                        $('#getPayableTotal').html(data.payable_total)
                        if (data.coupon_type == "percent") {
                            $('#percent_amount').html('(' + data.coupon_percent_amount + '%)');
                        }
                        $('#subTotal').val(data.payable_total)
                        $('#getCouponName').html('Mã giảm: ' + data.coupon_code_name + ' (<i>' + data.coupon_code + '</i>)')
                        toastr.success('App mã giảm ' + data.coupon_code_name + ' thành công')
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function(error) {
                    alert(error)
                }
            });
        })

    })
</script>
@endpush