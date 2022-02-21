<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequisiteForm extends FormRequest
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
            'user_id' => 'required',
            'requisites' => 'required|mimes:docx,doc'
        ];
    }

    public function messages()
    {
        return [
            'requisites.required' => 'Вы не загрузили файл. Выберите файл, а потом загрузите его',
            'requisites.mimes' => 'Загрузить реквизиты организации можно в форматах .doc, .docx'
        ];
    }
}
