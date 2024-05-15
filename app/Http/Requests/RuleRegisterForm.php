<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleRegisterForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'min:3', 'max:100'],
            'email' => 'required|email|ends_with:@gmail.com|unique:users,email',
            'phone_number' => ['regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/', 'required'],
            'txtPass' => 'required | min:6',
            'txtPass2' => 'required | min:6 |same:txtPass',
            'checkbox' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Họ tên không được để trống!',
            'fullname.min' => 'Họ tên phải lớn hơn 6 kí tự!',
            'fullname.max' => 'Họ tên phải lớn hơn 100 kí tự!',
            'email.required' => 'Email không được để trống!',
            'email.ends_with' => 'Email phải kết thúc @gmail.com',
            'phone_number.required' => 'Số điện thoại không đươc để trống!',
            'phone_number.regex' => 'Số điện thoại không hợp lệ!',
            'txtPass.required' => 'Mật khẩu không được để trống!',
            'txtPass.min' => 'Mật khẩu không được bé hơn 6 kí tự!',
            'txtPass2.required' => 'Mật khẩu không được để trống!',
            'txtPass2.min' => 'Mật khẩu không được bé hơn 6 kí tự!',
            'txtPass2.same' => 'Nhập lại mật khẩu không chính xác!',
            'checkbox.required' => 'Vui lòng check nếu bạn đã đồng ý với điều khoảng của chúng tôi!',
        ];
    }
}
