<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateImportForm extends FormRequest
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
            'file'   =>   'required',
            'file'   =>   'mimes:xlsx,csv,htm,tsv,ods,xls,slk,xml,gnumeric,html'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Вы не выбрали файл для загрузки.',
            'file.mimes' =>
            'Файл должен быть в одном из поддерживаемыx форматов:
            xlsx, csv, htm, tsv, ods, xls, slk, xml, gnumeric, html.'
        ];
    }
}
