<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Product;


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

    public function edit(Request $request) {
        $id = 1;
        $product = Product::find(1);

        return view('products.form', [
            'product' => $product
        ]);


    }

    public function store(Request $request) {
        $newProduct = new Product();
        $newProduct->sku = $request->input('sku');
        $newProduct->name = $request->input('name');
        $newProduct->save();

        return redirect()->route('dashboard');
    }

    public function update() {

    }

    public function delete() {

    }


}