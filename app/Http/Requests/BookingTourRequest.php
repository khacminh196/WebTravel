<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BookingTourRequest extends FormRequest
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
            'tour_id' => 'nullable',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email:rfc,dns|max:254',
            'number_of_people' => 'required|integer',
            'expected_travel_time' => 'required|date',
            'expected_travel_hotel' => 'nullable|integer',
            'note' => 'nullable',
        ];
    }

    public function validated()
    {
        $data = $this->validator->validated();
        $data['expected_travel_time'] = Carbon::parse($data['expected_travel_time'])->format('Y-m-d');
        
        return $data;
    }
}
