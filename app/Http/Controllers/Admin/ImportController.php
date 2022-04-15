<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateImportForm;

class ImportController extends Controller
{
    public function import(ValidateImportForm $request)
    {
        $data = $request->file('file');

        if($data) {
            if ($data->validate()) {
                $data = $request->file('file');
                Excel::import(new ProductsImport, $data);

                return back()->with('success', 'Прайс успешно обновлен');
            }
        }
        return back()->with('error', 'Вы не загрузили файл');
    }
}
