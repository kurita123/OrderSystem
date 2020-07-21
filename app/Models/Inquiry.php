<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class Inquiry extends Model
{
    protected $fillable = [
        'user_id','admin_id','inquiry','reply'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
    
    public function inquiry()
    {
        $user_id = Auth::id();
        return $this->where('user_id',$user_id)
            ->where('comfirmation' , '0')->get();
    }
}