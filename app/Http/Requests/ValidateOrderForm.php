<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderForm extends FormRequest
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
            'order_number'        =>    'required',
            'contact_id'          =>    'required',
            'payment_id'          =>    'required',
            'status'              =>    'required',
            'total'               =>    'required',
            'product_count'       =>    'required',
            'user_id'             =>    'required'
        ];
    }

    public function messages()
    {
        return [
            'contact_id.required' => 'Выберите пункт самовывоза',
            'payment_id.required' => 'Выберите способ оплаты',
        ];
    }
}
