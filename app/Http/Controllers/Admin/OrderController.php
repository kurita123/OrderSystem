<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CartRequest;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //発注一覧検索
    public function search(Request $request)
    {   
        //管理者情報取得
        $users = User::get();
        //管理者情報から会社名取得
        foreach($users as $val){
            $users_id[$val->id] = $val ->c_name;
        }
        
        return view('admin.order.search',compact('users_id'));
    }

    //検索内容確認
    public function catalog(CartRequest $request)
    {
        $total = 0;
        //id,カレンダー情報取得
        $admins_id = Auth::id(); 
        $users_id   = $request->user_id;
        $date_first = $request->datetime_first;
        $date_last  = $request->datetime_last;
        //発注先情報から会社名取得
        $users_name = DB::table('users')->where('id',$users_id)->get('c_name');
        //カートから管理者IDと日付の範囲検索
        $orders = DB::table('carts')->where('user_id','like','%'.$users_id.'%')
                                    ->where('admin_id','like','%'.$admins_id.'%')
                                    ->whereRaw('datetime >= ? and datetime <=?',[$date_first,$date_last])
                                    ->orderBy('datetime','asc')
                                    ->get();
        //管理者IDで検索した商品情報取得
        $products = DB::table('products')->where('admin_id',$admins_id)->get();
    
        return view('admin.order.catalog',compact('orders','products','admins_id','users_name','total','users_id'));
    }
}
