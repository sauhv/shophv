<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Categories;
use App\http\Requests\RuleRegisterForm;
use App\Models\User;

class AuthController extends Controller
{
    public function login_admin()
    {
        //Nếu tồn tại Auth::check() hoặc user roll == 1 ở login user thì vào trực tiếp không cần login nữa chặn login user
        if (!empty(\Auth::check()) && \Auth::user()->role == 1) {
            return redirect("admin/dashboard");
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'role' => 1,
        ], $remember)) {

            return redirect("admin/dashboard");
        } else {
            toastr()->error("Please enter currect email or password");
            return redirect()->back();
        }
    }

    public function logout_admin()
    {
        \Auth::logout();
        return redirect('admin');
    }

    public function register()
    {
        return view('pages.authentic.wrapper_regsiter_page');
    }

    public function auth_register(RuleRegisterForm $request)
    {
        $check_mail = User::checkEmail($request->email);
        if (empty($check_mail)) {
            $save = new User;
            $save->name = trim(strip_tags($request->fullname));
            $save->email = trim(strip_tags($request->email));
            $save->phone_number = trim(strip_tags($request->phone_number));
            $save->image = 'user.png';
            $save->password = \Hash::make($request->txtPass);
            $save->save();
            toastr()->success('Đăng ký tài khoản thành công!');
            return redirect()->back();
        } else {
            toastr()->error('Email đã tồn tại!');
            return redirect()->back();
        }
    }

    public function login_user()
    {
        return view('pages.authentic.wrapper_login_page');
    }

    public function auth_login_user(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (\Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            toastr()->success("Đăng nhập thành công!");
            return redirect('/');
        }
        toastr()->error('Email hoặc mật khẩu không chính xác!');
        return redirect()->back();
    }

    public function logout_user()
    {
        \Auth::logout();
        toastr()->success('Đăng xuất thành công!');
        return redirect('/');
    }

    public function change_password() 
    {
        return view('pages.authentic.wrapper_changePass');
    }

    public function update_password(Request $request) 
    {
        $request->validate([
            'password_old' => 'required',
            'password' => 'required',
            'password_comfirm' => 'required|same:password',

        ]);
        $user = User::findOrFail(auth()->id());
        if(\Hash::check($request->input('password_old'), $user->password)){
            $user->password = \Hash::make($request->input('password'));
            $user->save();
            toastr()->success('Mật khẩu của bạn đã được thay đổi!');
            return redirect()->back();
        }else {
            toastr()->error('Mật khẩu cũ không chính xác!');
            return redirect()->back();

        }
    }
}
