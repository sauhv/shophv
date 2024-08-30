@extends('layout')
@section('titlePage', 'Chi tiết sản phẩm')
@section('content')
<div class="wrapper-details-page">
    <div class="page-body container py-5">
        <div class="product-essential row">

            <div class="gallery col-lg-5 p-0 ">
                <div class="picture p-3 rounded-1" style="background: #ebebefb3">
                    <img style="aspect-ratio: 1/1; object-fit: contain;" id="imageGallery" src="{{ asset('images/product/'.$product_detail->image)}}" class="w-100 d-block m-0" alt="{{ $product_detail->image }}">
                </div>

                <div class="picture-slideshow mt-3">
                    <ul class="p-0 d-flex">
                        <li class="w-25 list-group-item p-3 border border-dark-subtle rounded-2 me-1">
                            <img onclick="galleryFunction(this)" src="{{ asset('images/product/'.$product_detail->image)}}" class="w-100 d-block" alt="{{$product_detail->image}}">
                        </li>
                        @if (isset($gallery))
                        @foreach ($gallery as $gall )
                        <li class="w-25 list-group-item p-3 border border-dark-subtle rounded-2 me-1">
                            <img onclick="galleryFunction(this)" src="{{ asset('images/gallery/'.$gall)}}" class="w-100 d-block" alt="{{$product_detail->thumbnails}}">
                        </li>
                        @endforeach
                        @endif


                    </ul>
                </div>
                <!-- Script gallery -->
                <script>
                    function galleryFunction(smallImg) {
                        var fullImg = document.getElementById('imageGallery');
                        fullImg.src = smallImg.src;
                    }
                </script>

            </div>
            <div class="overview col-lg-7 px-4">
                <div class="wrapper-info py-2 border-bottom">
                    <div class="product-name">
                        <h3 class="fw-medium">{{ $product_detail->name }}</h3>
                    </div>
                    <div class="product-review-box d-flex align-items-center justify-content-between">
                        <div class="d-flex">
                            <div class="rating text-warning pe-2">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                            </div>
                            <div class="product-review-links pe-2 text-primary">
                                <a class="text-decoration-none" href="#">Views: {{$product_detail->views}}</a> <span>|</span>
                            </div>
                            <div class="overview-buttons text-primary">
                                <i class="fa-regular fa-circle-plus"></i> <a class="text-decoration-none" href="#">So
                                    sánh</a>
                            </div>
                        </div>
                        <div class="storelocation-all">
                            <select class="form-select bg-light">
                                <option value="1">Vui lòng chọn</option>
                                <option selected>Khu vực miền Bắc</option>
                                <option value="2">Khu vực miền Nam</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="prices d-flex align-items-center my-2">
                    <div class="price me-3 d-flex text-primary">
                        <h4 class="fw-bolder">{{ number_format($product_detail->price) }}</h4><i class="fa-solid fa-dong-sign"></i>
                    </div>
                    <div class="lowPrice text-secondary"><del class="fs-5">{{ number_format($product_detail->amount) }}</del> <i class="fa-light fa-dong-sign fa-xs"></i></div>
                </div>


                <form id="formCart" data-action="{{ route('addToCart')}}" method="">
                    <div class="quantitys">
                        <div class="col-auto pe-0">
                            <div class="input-group input-group-sm" data-quantity="data-quantity">
                                <button type="button" class="btn btn-sm btn-outline-secondary border border-300" onclick="minus()">-</button>
                                <input class="form-control text-center input-quantity input-spin-none" id="quantity_product" type="number" min="1" value="1" style="max-width: 50px">
                                <button type="button" class="btn btn-sm btn-outline-secondary border border-300" onclick="plus()">+</button>
                            </div>
                        </div>
                        <script>
                            function minus() {
                                var minus = document.getElementById('quantity_product').value;
                                if (minus > 1) {
                                    minus--;
                                }
                                document.getElementById('quantity_product').value = minus;
                            }

                            function plus() {
                                var plus = document.getElementById('quantity_product').value;
                                if (plus < 100) {
                                    plus++;
                                }
                                document.getElementById('quantity_product').value = plus;
                            }
                        </script>
                    </div>
                    <!-- <dl class="attributes">
                    <dt class="text-prompt">
                        <label class="form-label fw-lighter mb-2">Dung lượng</label>
                    </dt>
                    <dd>
                        <ul class="d-flex mb-3">
                            <li class="list-group-item py-1 px-3 border border-dark-subtle me-2 rounded-2">
                                <a class="nav-link text-secondary" href="#">128GB</a>
                            </li>
                            <li class="list-group-item py-1 px-3 border border-dark-subtle me-2 rounded-2">
                                <a class="nav-link text-secondary" href="#">256GB</a>
                            </li>
                            <li class="list-group-item py-1 px-3 border border-dark-subtle me-2 rounded-2">
                                <a class="nav-link text-secondary" href="#">512GB</a>
                            </li>
                        </ul>
                    </dd>
                    <dt class="text-prompt">
                        <label class="form-label fw-lighter mb-2">Màu sắc</label>
                    </dt>
                    <dd>
                        <ul class="d-flex mb-3">
                            <li class="list-group-item "><input type="radio" class="me-3 rounded-circle d-inline-block" style="width: 30px; height: 30px; background: #4c4b49;">&nbsp;</input>
                            </li>
                            <li class="list-group-item "><span class="me-3 rounded-circle d-inline-block" style="width: 30px; height: 30px; background: #e3e5e3;">&nbsp;</span>
                            </li>
                            <li class="list-group-item "><span class="me-3 rounded-circle d-inline-block" style="width: 30px; height: 30px; background: #fcebd3;">&nbsp;</span>
                            </li>
                            <li class="list-group-item "><span class="me-3 rounded-circle d-inline-block" style="width: 30px; height: 30px; background: #61586b;">&nbsp;</span>
                            </li>
                        </ul>
                    </dd>
                    </dl> -->
                    <div class="short-des border border-dark-subtle p-3 my-2 rounded-2">
                        <!-- <div class="des-sale">
                        <p class="fw-bold"><i class="fa-solid fa-gift"></i> Khuyến mãi</p>
                        <div class="form-check border-bottom pb-3">
                            <input class="me-2" id="muathang" type="radio" name="mua" checked><label for="muathang" class="fw-medium"> Mua
                                thẳng</label>
                            <input class="mx-2" id="tragop" type="radio" name="mua"><label for="tragop" class="fw-medium"> Trả góp</label>
                   
                        </div>
                        </div> -->
                        <div class="uu-dai py-2">
                            <p class="fw-bold"><i class="fa-solid fa-gift"></i> Ưu đãi</p>
                            <div class="form-check border-bottom">
                                <p class="text-danger fw-medium m-0">Ưu đãi thanh toán <a href="#">(Xem
                                        thêm)</a></p>
                                <p class="fw-normal m-0">Giảm <strong>10%</strong> tối đa
                                    <strong>500.000đ</strong> qua <strong>Home Paylater </strong><a href="#">(Xem thêm)</a>
                                </p>
                                <p class="fw-normal m-0"> Giảm <strong>5%</strong> tối đa
                                    <strong>500.000đ</strong> qua Kredivo (SL có hạn)
                                </p>
                            </div>
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                            Xem thêm ưu đãi khác
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="text-danger fw-medium m-0">Ưu đãi thanh toán <a href="#">(Xem
                                                    thêm)</a></p>
                                            <p class="fw-normal m-0">Giảm <strong>10%</strong> tối đa
                                                <strong>500.000đ</strong> qua <strong>Home Paylater </strong><a href="#">(Xem thêm)</a>
                                            </p>
                                            <p class="fw-normal m-0"> Giảm <strong>5%</strong> tối đa
                                                <strong>500.000đ</strong> qua Kredivo (SL có hạn)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="call-action">
                        <div class="btn-buy my-3">
                            <a role="button" id="addToCart" class="btn text-bg-primary w-100 py-3 fw-bold text-uppercase">Mua ngay</a>
                        </div>
                        <input id="product_id" type="hidden" value="{{$product_detail->id}}">

                        <div class="btn-all row">
                            <div class="col-6">
                                <button class="btn btn-outline-primary w-100 py-3 fw-bold text-uppercase disabled">Trả
                                    góp</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-primary w-100 py-3 fw-bold text-uppercase disabled"><i class="fa-solid fa-rotate"></i> Thu cũ đổi mới</button>
                            </div>
                        </div>
                    </div>
                    <div class="service py-2 border border-dark-subtle rounded-2 mt-3">
                        <ul>
                            <li class="list-group-item"><i class="fa-solid fa-circle-check" style="color: #0066cc;"></i> Bộ
                                sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy
                                sim, Cáp Lightning - Type C</li>
                            <li class="list-group-item"><i class="fa-solid fa-circle-check" style="color: #0066cc;"></i>
                                Bảo hành chính hãng 1 năm <a href="#">(Chi
                                    tiết)</a></li>
                            <li class="list-group-item"><i class="fa-solid fa-circle-check" style="color: #0066cc;"></i>
                                Giao hàng nhanh toàn quốc <a href="#">(Chi
                                    tiết)</a></li>
                            <li class="list-group-item"><i class="fa-solid fa-circle-check" style="color: #0066cc;"></i>
                                Hoàn thuế cho người nước ngoài <a href="#">(Chi
                                    tiết)</a></li>
                            <li class="list-group-item"><i class="fa-solid fa-circle-check" style="color: #0066cc;"></i> Gọi
                                đặt mua <strong class="text-primary">19006626</strong> (7:30 - 22:00)</li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="desciprtion">
            <hr>
            <h4>Mô tả</h4>
            <div class="text-center p-4" style="background: #fff;">
                {!!$product_detail->description!!}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '#addToCart', function(e) {
            e.preventDefault();
            let id = $('#product_id').val();
            let url = $('#formCart').attr('data-action');
            let quantity = $('#quantity_product').val();
            if(quantity<=0){
                toastr.error('Số lượng sản phẩm phải lớn hơn không!')
                return;
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    quantity: quantity,
                },
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success(data.message);
                    }
                },
                error: function(error) {
                    alert(error)
                }
            })
        })
    })
</script>
@endpush