<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePostForm extends FormRequest
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
            'title'       => 'required|max:100|min:3',
            'img'         => 'required|max:1024',
            'category_id' => 'required',
            'page_text'   => 'required|min:10',
            'tags'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'Поле "Название" обязательно для заполнения.',
            'title.max'          => 'Максимальная длина поля "Название" 100 символов',
            'title.min'          => 'Минимальная длина поля "Название" 3 символов',
            'img.required'       => 'Поле "Фото" обязательно для заполнения',
            'img.max'            => 'Максимальный размер изображения 1024 Mb',
            'category_id'        => 'Поле "Категория" обязательно для заполнения',
            'page_text.required' => 'Поле "Текст" обязательно для заполнения',
            'page_text.min'      => 'Минимальная длина поля "Текст" 10 символа',
            // 'page_text.max'      => 'Максимальная длина поля "Текст" 5000 символов',
            'tags.required'      => 'Поле "Теги" обязательно для заполнения',
        ];
    }
}
