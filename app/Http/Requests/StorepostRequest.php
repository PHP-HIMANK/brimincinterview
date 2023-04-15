<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepostRequest extends FormRequest
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
            'categories_id' => 'required|numeric',
            'post' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Category is required',
            'post.required' => 'Post is required',
        ];
    }
}
