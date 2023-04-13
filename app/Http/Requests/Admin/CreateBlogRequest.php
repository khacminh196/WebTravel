<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
            'language' => 'required',
            'title' => 'required',
            'category_id' => 'required|integer',
            'description' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif'
        ];
    }
}
