<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required',
            'description'=>'required',
            'enabled' =>'bail|required',
            'category' =>'bail|required|array',
            'collection' =>'bail|required',
            'regular_price' =>'bail|required|numeric',
            'offer_price' =>'bail|required|numeric|max:'.request('regular_price',0),
            'delivery_within_days' =>'bail|required|numeric',
        ];
    }
}
