<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleProductsForm extends FormRequest
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
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'thumbnails' => 'required|max:10000',
            'description' =>['required']
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
         'image.required' => 'Image không được để trống',
         'image.max' => 'Kích thước image không được lớn hơn 10MB',
         'thumbnails' => 'Thumbnails không được để trống',
       ];
     }
}
