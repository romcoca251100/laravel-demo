<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function getIndex() {
        $products = Product::all();

        $dataView = [
            'products' => $products,
        ];
        return view('admin.product.index', $dataView);
    }
}
