<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $table = 'products';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'name', 'description'
    ];

    public function stockMoves() {
        return $this->hasMany(StockMoves::class, 'product_id', 'id');
    }

    public function availableQty() {
        $sum = $this->stockMoves->reduce(function ($carry, $item) {
            return $carry + $item->qty;
        }, 0);

        return $sum;
    }


}
