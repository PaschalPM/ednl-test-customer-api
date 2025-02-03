<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'telephone' => 'required|string',
            'bvn' => 'required|string',
            'dob' => 'required|string',
            'residential_address' => 'required|string',
            'state' => 'required| string',
            'bankcode' => 'required| string',
            'accountnumber' => 'required| string',
            'company_id' => 'required| string',
            'email' => 'required| string',
            'city' => 'required| string',
            'country' => 'required| string',
            'id_card' => 'nullable| string',
            'voters_card' => 'nullable| string',
            'drivers_licence' => 'nullable| string',
        ];

        if (request()->method() === 'PUT') {
            $rules['id'] = 'required|numeric';
        }

        return $rules;
    }
}
