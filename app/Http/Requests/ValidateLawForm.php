<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLawForm extends FormRequest
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
            'title'                =>    'required',
            'description'          =>    'required',
            'link'                 =>    'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'Поле "Название" обязательно для заполнения',
            'description.required' => 'Поле "Описание" обязательно для заполнения',
            'link.required'        => 'Поле "Ссылка" обязательно для заполнения',
        ];
    }
}
