<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Product;
use App\Http\Requests\StoreUpdateProduct;


class ProductsController extends BaseController {

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }


    public function index() {
        $products = Product::all();
        return view('dashboard.index', [
            'products' => $products
        ]);
    }

    public function create() {
        return view('products.form');
    }

    public function edit(Request $request, $id) {
        
        $product = Product::find($id);

        return view('products.form', [
            'product' => $product
        ]);


    }

    public function store(StoreUpdateProduct $request) {
        $validated = $request->validated();
        $newProduct = new Product();
        $newProduct->sku = $request->input('sku');
        $newProduct->name = $request->input('name');
        $newProduct->save();

        return redirect()->route('dashboard');
    }

    public function update(Request $request) {
        $updateProduct = Product::find($request->input('id'));
        $updateProduct->sku = $request->input('sku');
        $updateProduct->name = $request->input('name');
        $updateProduct->update();

        return redirect()->route('dashboard');
    }

    public function delete() {

    }


}