<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockMoves extends Model
{

    protected $table = 'stock_moves';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'name', 'qty', 'source'
    ];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


}
