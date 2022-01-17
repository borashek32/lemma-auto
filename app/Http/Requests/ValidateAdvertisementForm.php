<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdvertisementForm extends FormRequest
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
            'link'           => 'required|max:100|min:3',
            'banner'         => 'required|max:1024'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Поле "Адрес сайта" обязательно для заполнения.',
            'link.max' => 'Максимальная длина поля "Адрес сайта" 100 символов',
            'link.min' => 'Минимальная длина поля "Адрес сайта" 3 символов',
            'banner.required' => 'Поле "Фото" обязательно для заполнения',
            'banner.max' => 'Максимальный размер изображения 1024 Mb'
        ];
    }
}
