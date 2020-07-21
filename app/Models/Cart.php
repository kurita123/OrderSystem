<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'user_id','stock','admin_id','datetime'
    ];
    
    public function products(){
        return $this->belongsMany('App\Models\Product');
    }
}
