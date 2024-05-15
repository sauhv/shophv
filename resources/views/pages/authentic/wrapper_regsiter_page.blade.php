@extends('layout')
@section('content')
<div class="wrapper-signin-page container">
    <div class="page-body">
        <div class="all_content-signin py-5">
            <div class="signin-block row px-4 pt-4 pb-5">
                <div class="signin-form-wrapper col-7">
                    <img src="{{ asset('images/uploaded/VNU_M492_08_1.jpg') }}" class="w-100" alt="img">
                </div>
                <div class="register-block col-5">
                    <div class="page-title">
                        <h4>Đăng nhập</h4>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="hoten" class="form-label p-0">Họ, tên:</label>
                            <input type="text" class="form-control" id="hoten" name="fullname" value="{{ old('fullname') }}">
                            @error('fullname')
                            <code>{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="row">
                            <div class=" col-6 mb-3">
                                <label for="email" class="form-label p-0">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <code>{{ $message }}</code>
                                @enderror
                            </div>
                            <div class=" col-6 mb-3">
                                <label for="phone" class="form-label p-0">Điện thoại:</label>
                                <input type="number" class="form-control" id="phone" name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                <code>{{ $message }}</code>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="matkhau" class="form-label p-0">Mật khẩu:</label>
                            <input type="password" class="form-control" id="matkhau" name="txtPass" value="{{ old('txtPass') }}">
                            <div id="passwordHelpBlock" class="form-text">
                                Lưu ý: Mật khẩu phải có tối thiểu 8 ký tự bao gồm chữ, số và các ký tự đặc
                                biệt
                            </div>
                            @error('txtPass')
                            <code>{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rematkhau" class="form-label p-0">Xác nhận mật khẩu:</label>
                            <input type="password" class="form-control" id="rematkhau" name="txtPass2" value="{{ old('txtPass2') }}">
                            @error('txtPass2')
                            <code>{{ $message }}</code>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ old('ckeckbox') }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault"> 
                                Bạn đã đồng ý với các <a href="#">điều khoản và chính sách</a> của chúng tôi
                            </label>
                            @error('checkbox')
                            <code>{{ $message }}</code>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">Đăng ký</button>
                        <div class="form-link">
                            <span>Bạn đã có tài khoảng? <a class="text-decoration-none" href="{{url('/login')}}">Đăng nhập
                                    ngay</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection