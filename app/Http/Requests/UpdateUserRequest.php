<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'prohibited',
            'password' => 'prohibited',
            'phone' => 'required|numeric|digits_between:8,12',
            'shipping_address1' => 'nullable|string|max:255',
            'shipping_address2' => 'nullable|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_state' => 'required|string|max:255',
            'shipping_country' => 'required|string|max:255',
            'shipping_pin_code' => 'required|numeric|digits_between:4,6',
            'billing_address1' => 'nullable|string|max:255',
            'billing_address2' => 'nullable|string|max:255',
            'billing_city' => 'nullable|string|max:255',
            'billing_state' => 'nullable|string|max:255',
            'billing_country' => 'nullable|string|max:255',
            'billing_pin_code' => 'nullable|numeric|digits_between:4,6',
        ];
    }
}