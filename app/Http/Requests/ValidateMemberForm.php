<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateMemberForm extends FormRequest
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
            'name'           =>    'required|max:100',
            'photo'          =>    'required|max:1024',
            'phone'          =>    'required',
            'position'       =>    'required|min:5|max:100',
            'description'    =>    'required|max:3000|min:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "ФИО" обязательно для заполнения',
            'name.max' => 'Максимальная длина поля "ФИО" 100 символов',
            'photo.required' => 'Поле "Фото" обязательно для заполнения',
            'photo.max' => 'Максимальный размер фото 1024 Mb',
            'phone.required' => 'Поле "Телефон" обязательно для заполнения',
            'position.required' => 'Поле "Должность" обязательно для заполнения',
            'position.min' => 'Минимальная длина поля "Должность" 5 символов',
            'position.max' => 'Максимальная длина поля "Должность" 100 символов',
            'description.required' => 'Поле "Описание" обязательно для заполнения',
            'description.min' => 'Минимальная длина поля "Описание" 10 символов',
            'description.max' => 'Максимальная длина поля "Описание" 3000 символов'
        ];
    }
}
