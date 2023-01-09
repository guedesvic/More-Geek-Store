<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SebastianBergmann\Type\VoidType;

class ProductController extends Controller
{
    public function show(Product $product){
        return view('products.product', [
            'product' => $product
        ]);
    }
}
