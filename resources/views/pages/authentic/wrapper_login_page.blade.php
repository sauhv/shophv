@extends('layout')
@section('content')
<div class="wrapper-login-page container">
    <div class="page-body">
        <div class="all_content-login py-5">
            <div class="login-block row px-4 pt-4 pb-5">
                <div class="login-form-wrapper col-7">
                    <img src="{{ asset('/images/uploaded/VNU_m492_08_1.jpg') }}" class="d-block w-100" alt="img">
                </div>
                <div class="register-block col-5">
                    <div class="page-title">
                        <h4>Đăng nhập</h4>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="tendangnhap" class="form-label p-0">Email:</label>
                            <input type="text" class="form-control" id="tendangnhap" maxlength="25"name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="matkhau" class="form-label p-0">Mật khẩu:</label>
                            <input type="password" class="form-control" id="matkhau" name="password" required>
                        </div>
                        <div class="mb-3 form-check d-flex justify-content-sm-between">
                            <div class="checkbox">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
                            </div>
                            <div class="link">
                                <a class="text-decoration-none" href="#">Quên mật khẩu</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">Đăng nhập</button>
                        <div class="form-link">
                            <span>Bạn chưa có tài khoảng? <a class="text-decoration-none" href="{{ url('/register') }}">Tạo tài
                                    khoảng ngay</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection