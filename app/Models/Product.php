<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product', 'price','amount','stocks',
    ];

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
   
    public function carts(){
        return $this->belongsMany('App\Models\Cart');
    }
}