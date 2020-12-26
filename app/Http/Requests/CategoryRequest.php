<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $category_id = '';

        if ( $this->route()->hasParameter('category')){
            $category_id = ','. $this->route()->category;
        }

        return [
            'name'=>'required|unique:Cats,name' . $category_id,
            'description'=>'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'enabled' => 'required',
        ];
    }
}
