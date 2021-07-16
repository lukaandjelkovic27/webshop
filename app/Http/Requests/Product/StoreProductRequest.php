<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|between:2,191',
            'description'=> 'required|string|max:100000',
            'price'=> 'required',
            'currency'=> 'required|string',
            'quantity'=> 'required|int|between:1,50',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ];
    }
}
