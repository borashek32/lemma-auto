<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateArticleForm extends FormRequest
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
            'title'             =>    'required',
            'seo_text'          =>    'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'Поле "Название" обязательно для заполнения',
            'seo_text.required'    => 'Поле "Описание" обязательно для заполнения'
        ];
    }
}
