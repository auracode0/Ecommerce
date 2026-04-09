<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function order(){
        return $this->belongsTo(order::class,'order_id');
    }
}
