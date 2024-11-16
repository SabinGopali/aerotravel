<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravellerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules():array
    {
        if(request()->isMethod('post')){
            return[
                'traveller_detail' => 'required|exists:traveller_details,id',
            ];
        }
    }
}
