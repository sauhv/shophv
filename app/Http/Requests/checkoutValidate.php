<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkoutValidate extends FormRequest
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
            'name' => 'required | min:3',
            'phone_number' => ['regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/', 'required'],
            'email' => 'required|email|ends_with:@gmail.com',
            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '* Họ tên không được để trống!',
            'name.min' => '* Họ tên phải lớn hơn 6 kí tự!',
            'phone_number.required' => '* Số điện thoại không đươc để trống!',
            'phone_number.regex' => '* Số điện thoại không hợp lệ!',
            'email.required' => '* Email không được để trống!',
            'email.ends_with' => '* Email phải kết thúc @gmail.com',
            'address.required' => '* Địa chỉ của bạn không được để trống!',
            // 'checkbox.required' => '* Vui lòng đồng ý. Nếu bạn đã đồng ý với các điều khoản của chúng tôi!',
        ];
    }
}
