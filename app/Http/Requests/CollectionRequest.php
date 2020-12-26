<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
        $collection_id = '';

        if ( $this->route()->hasParameter('collection')){
            $collection_id = ','. $this->route()->collection;
        }


        return [
            'name'=>'required|unique:collections,name' . $collection_id,
            'description'=>'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'enabled' => 'required',
        ];
    }
}
