<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\productRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    //商品検索
    public function company(Request $request)
    {
        //発注先情報
        $admins = Admin::all();
        //発注先会社名
        foreach($admins as $val){
            $admins_id[$val->id] = $val ->c_name;
        }

        return view('user.company',compact('admins_id'));
    }

    //商品一覧
    public function index(Request $request)
    {
        //発注先管理ID
        $admin_id = $request->admin_id;
        //発注先会社の商品検索
        $products = DB::table('products')
            ->where('admin_id','LIKE','%'.$admin_id.'%')
            ->paginate(6); 

        return view('user.product',compact('admin_id'),['products'=>$products]);
    }
   
    //発注登録
    public function myCart(ProductRequest $request)
    {   
        $request->session()->regenerateToken();
        $user_id    = Auth::id();
        //入力情報
        $product_id = $request->product_id;
        $stock      = $request->stock;
        $datetime   = $request->datetime;
        $admin_id   = $request->admin_id;
        //DB保存
        $cart_add_info=Cart::Create(['product_id' => $product_id,'admin_id'=>$admin_id,
            'user_id' => $user_id, 'stock' => $stock, 'datetime' => $datetime]);
        //商品情報
        $products = DB::table('products')
            ->where('admin_id','LIKE','%'.$admin_id.'%')
            ->paginate(6);

        return view('user.product',compact('admin_id'),['products'=>$products]);
 
    }
}

