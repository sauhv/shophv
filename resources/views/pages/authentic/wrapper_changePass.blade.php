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
                        <h4>Đổi mật khẩu</h4>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="matkhauold" class="form-label p-0">Mật khẩu cũ:</label>
                            <input type="password" class="form-control" id="matkhauold" name="password_old">
                        </div>
                        <div class="mb-3">
                            <label for="matkhau_new" class="form-label p-0">Mật khẩu mới:</label>
                            <input type="password" class="form-control" id="matkhau_new" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="matkhau_rp" class="form-label p-0">Xác nhận mật khẩu:</label>
                            <input type="password" class="form-control" id="matkhau_rp" name="password_comfirm">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection