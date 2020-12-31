<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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

            'product_id.*' => 'bail|required|integer',
            'qty.*' => 'bail|required|integer',
            'selling_price.*' => 'bail|required|numeric',

            // shipping address
            'name' => 'bail|required',
            'address' => 'bail|required',
            'optional_address' => 'bail|nullable',
            'mobile_number' => 'bail|required',
            'delivery_charge' =>'bail|required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'address.required' => 'Address is required',
            'mobile_number.required' => 'Mobile Number is required',
            'delivery_charge.required' => 'Delivery Charge required',
            'delivery_charge.numeric' => 'Delivery Charge required',
        ];
    }
}
