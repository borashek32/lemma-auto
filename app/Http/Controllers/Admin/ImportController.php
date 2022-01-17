<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,htm,tsv,ods,xls,slk,xml,gnumeric,html'
        ]);

        $data = $request->file('file');

        Excel::import(new ProductsImport, $data);

        return back()->with('success', 'Прайс успешно обновлен');
    }
}
