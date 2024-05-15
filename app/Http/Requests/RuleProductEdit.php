<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleProductEdit extends FormRequest
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
            'name' => ['required'],
            'amount' => ['required', 'min:0', 'integer'],
            'price' => ['required', 'min:0', 'integer'],
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }
    public function messages() {
        return [
         'name.required' => 'Tên sản phẩm không được để trống',
         'amount.required' => 'Amount không được để trống',
         'amount.min' => 'Amount phải lớn hơn 0',
         'amount.integer' => 'Amount không được nhập chữ',
         'price.required' => 'Price không được để trống',
         'price.min' => 'Price phải lớn hơn 0',
         'price.integer' => 'Price Không được nhập chữ',
         'image.mimes' => 'Image phải có định dạng jpeg,jpg,png,webp',
         'image.max' => 'Kích thước image không được lớn hơn 10MB',
       ];
     }
}
