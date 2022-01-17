<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            if ($row !== null) {
                if ($product = Product::where('code', $row[0])->first())
                {
                    $product->update([
                            'stock_quantity' => $row[2],
                            'price'          => $row[3],
                        ]);
                } else {
                    DB::table('products')
                        ->insert([
                            'code'           => $row[0],
                            'title'          => $row[1],
                            'stock_quantity' => $row[2],
                            'price'          => $row[3],
                        ]);
                }
            }
        }
    }
}
