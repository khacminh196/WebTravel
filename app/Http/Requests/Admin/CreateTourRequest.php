<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateTourRequest extends FormRequest
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
            'country_id' => 'required|integer',
            'name' => 'required',
            'num_of_day' => 'required|integer',
            'cost' => 'nullable|integer',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'tag' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image_prefectures' => 'required|array',
            'prefectures' => 'required|array',
        ];
    }
}
