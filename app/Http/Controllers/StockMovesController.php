<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\StockMoves;
use App\Product;


class StockMovesController extends BaseController {

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }


    public function index() {
        $stockMoves = StockMoves::all();
        return view('stock.index', [
            'stockMoves' => $stockMoves
        ]);
    }

    public function create() {
        return view('stock.form', [
            'products' => Product::all()
        ]);
    }

    public function store(Request $request) {
        $newStock = new StockMoves();
        $newStock->product_id = $request->input('product_id');
        $newStock->qty = $request->input('qty');
        $newStock->source = 'WEB';
        $newStock->save();

        return redirect()->route('dashboard');

    }



}