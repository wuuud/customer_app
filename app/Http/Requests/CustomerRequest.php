<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'email' => 'required|string|max:250',
            'postcode' => 'required|string|min:7|max:7',
            'address' => 'required|string|max:250',
            'tel' => 'required|string|min:6|max:20',
        ];
    }
}
