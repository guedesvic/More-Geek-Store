<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('admin.products', compact('products'));
    }

    public function create(Product $id){
        return view('admin.product_create');
    }

    public function edit(Product $product){
        return view('admin.product_edit', [
            'product' => $product
        ]);
    }

    public function update(Product $product, ProductStoreRequest $request){
        $inputs = $request->validated();

        if(!empty($inputs['cover']) && $inputs['cover']->isValid()) {
            Storage::delete($product->cover ?? '');
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        }

        $product->fill($inputs);
        $product->save();

        return Redirect::route('admin.products');
    }

    public function store(ProductStoreRequest $request){
        $inputs = $request->validated();

        $inputs['slug'] = Str::slug($inputs['name']);

        if(!empty($inputs['cover']) && $inputs['cover']->isValid()) {
            $file = $inputs['cover'];
            $path = $file->store('products');
            $inputs['cover'] = $path;
        }

        Product::create($inputs);

        return Redirect::route('admin.products');
    }

    public function destroy(Product $product){
        $product->delete();

        Storage::delete($product->cover ?? '');

        return Redirect::route('admin.products');
    }

    public function destroyImage(Product $product){

        Storage::delete($product->cover ?? '');

        $product->cover = null;
        $product->save();

        return Redirect::back();
    }
}
