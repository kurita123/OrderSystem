<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    //発注一覧
    public function add(Request $request)
    {
        //管理者情報取得
        $admins = Admin::all();
        //管理者情報から会社名取得
        foreach($admins as $val){
            $admins_id[$val->id] = $val ->c_name;
        }
        
        return view('user.history.search',compact('admins_id'));
    }

    //発注一覧検索内容
    public function index(CartRequest $request)
    {
        $total = 0;
        //id,カレンダー情報取得
        $user_id = Auth::id(); 
        $admin_id   = $request->admin_id;
        $date_first = $request->datetime_first;
        $date_last  = $request->datetime_last;
        //発注先情報から会社名取得
        $admin_name = DB::table('admins')->where('id',$admin_id)->get('c_name');
        //カートから管理者IDと日付の範囲検索
        $admins = DB::table('carts')->where('user_id',$user_id)
                                    ->where('admin_id',$admin_id)
                                    ->whereRaw('datetime >= ? and datetime <=?',[$date_first,$date_last])
                                    ->orderBy('datetime','asc')
                                    ->get();
        //検索結果から商品ID取得
        foreach($admins as $val){
            $products_id[$val->id] = $val ->product_id;
        }
        //管理者IDで検索した商品情報取得
        $products = DB::table('products')->where('admin_id',$admin_id)->get();
        return view('user.history.confirm',compact('admin_name','admins','products','total'));
    }
}