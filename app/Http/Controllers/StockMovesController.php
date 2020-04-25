<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\StockMoves;
use App\Product;
use App\Http\Requests\StockMoveRequest;
use Illuminate\Support\Facades\Validator;


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

    public function report() {
        $todayMoves = StockMoves::where('created_at', '>', Carbon::today())->get();

        return view('stock.report', [
            'todayMoves' => $todayMoves
        ]);
    }

    public function create() {
        return view('stock.form', [
            'products' => Product::all()
        ]);
    }

    public function store(StockMoveRequest $request) {
        $product = Product::find($request->input('product_id'));
        $qty = $request->input('qty');

        if($qty < 0) {
            $messages = [
                'required' => 'The :attribute field is required.',
                'qty.min' => 'Não é possível retirar mais produtos do que o disponível no estoque'
            ];

            $rules = [
                'product_id' => ['required'],
                'qty' => ['required', 'numeric', 'min:-' . ($product->availableQty())],
            ];

            
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                Session::flash('error', $validator->messages()->first());
                return redirect('/stock/create')->withErrors($validator)->withInput();
           }
        }else {
            $validatedData = $request->validate([
                'product_id' => ['required'],
                'qty' => ['required', 'numeric', 'min:1'],
            ]);
        }

        $newStock = new StockMoves();
        $newStock->product_id = $request->input('product_id');
        $newStock->qty = $request->input('qty');
        $newStock->source = $request->input('source');
        $newStock->save();

        return redirect()->route('dashboard');
    }



}