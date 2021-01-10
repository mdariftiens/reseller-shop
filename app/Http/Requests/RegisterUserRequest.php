<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required',
            'mobile' =>'required|unique:'. User::class . ',mobile',
            'provider' => 'nullable',
            'provider_id' => 'nullable',
            'shop_name' =>'required',
            'payment_method' => 'required|in:'. implode(',',config('shop.payment_method') ) ,
            'bank_account_holder_name' => 'required_if:payment_method,Bank',
            'back_account_name' => 'required_if:payment_method,Bank',
            'bank_name_and_branch' => 'required_if:payment_method,Bank',
            'business_type' => ['required','in:'. implode(',',config('shop.business_type'))],
            'experience' => ['required', 'in:'. implode(',',config('shop.experience'))],
            'age_of_business' => ['required', 'in:'. implode(',',config('shop.age_of_business'))],
            'fb_page_link' => 'nullable|url',
            'website_url' => 'nullable|url',
            'bkash_mobile_number' => 'required_if:payment_method,bKash',
        ];
    }
}
