<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editSubCategory extends FormRequest
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
            'sub_category_id' => 'required|numeric',
            'main_category_id' => 'required|numeric',
            'index' => 'required|numeric',
            'name' => 'required|max:255',
            'name_old' => 'required|max:255',
        ];
    }
}
