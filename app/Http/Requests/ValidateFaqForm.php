<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFaqForm extends FormRequest
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
            'question'      => 'required|min:10',
            'answer'        => 'required|min:20'
        ];
    }

    public function messages()
    {
        return [
            'question.required'     => 'Поле "Название" обязательно для заполнения.',
            'question.min'          => 'Минимальная длина поля "Вопрос" 10 символов',
            'answer.required'       => 'Поле "Текст" обязательно для заполнения',
            'answer.min'            => 'Минимальная длина поля "Ответ" 20 символа',
        ];
    }
}
