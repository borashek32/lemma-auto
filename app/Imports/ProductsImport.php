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
                if ($product = Product::where('number', $row[0])->first())
                {
                    $product->update([
                            'count'          => $row[2],
                            'price'          => $row[3],
                        ]);
                } else {
                    DB::table('products')
                        ->insert([
                            'number'         => $row[0],
                            'name'           => $row[1],
                            'count'          => $row[2],
                            'price'          => $row[3],
                            'goodsId'        => uniqid(),
                            'shipmentDate'   => $row[4],
                            'brand'          => $row[5]
                        ]);
                }
            }
        }
    }

    // public function collection(Collection $collection)
    // {
    //     foreach ($collection as $row) {
    //         if ($row !== null) {
    //             DB::table('products')
    //                 ->insert([
    //                     'goodsId'        => uniqid(),
    //                     'brand'          => $row[1],
    //                     'code'           => $row[2],
    //                     'title'          => $row[3],
    //                     'price'          => $row[4],
    //                     'stock_quantity' => $row[5],
    //                     'shipment_date'  => $row[6]
    //                 ]);
    //             }
    //         }
    //     }
    // }
}
