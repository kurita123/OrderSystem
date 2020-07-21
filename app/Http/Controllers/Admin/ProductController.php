<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Change;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    //商品一覧
    public function myproduct(Request $request)
    {
        //発注先管理ID
        $admins_id = Auth::id();
        //発注先会社の商品検索
        $products = DB::table('products')->where('admin_id',$admins_id)->get(); 

        return view('admin.product.myproduct',compact('products'));
    }

    //商品変更
    public function change(Request $request)
    {
        //選択商品ID
        $product_id = $request->product_id;
        //商品情報
        $products = DB::table('products')->where('id',$product_id)->get();
        
        return view('admin.product.change',compact('products','product_id'));
    }
    
    //変更確認
    public function check(Change $request)
    {
        $product = $request->product;
        $price   = $request->price;
        $amount  = $request->amount;
        $stocks  = $request->stocks;
        $product_id = $request->product_id;

        return view('admin.product.check',compact('product','price','amount','stocks','product_id'));
    }

    //完了ページ
    public function confirm(Request $request)
    {
        $request->session()->regenerateToken();
        //商品情報
        $products = [
            'product' => $request->product,
            'price'   => $request->price,
            'amount'  => $request->amount,
            'stocks'  => $request->stocks,
        ];
        //DB保存
        DB::table('products')->where('id',$request->product_id)->update($products);
        
        return view('admin.product.changecomplete');
    }
    
    //商品削除
    public function delete(Request $request)
    {
        //選択商品ID
        $product_id = $request->product_id;
        //商品情報
        $products = DB::table('products')->where('id',$product_id)->get();

        return view('admin.product.delete',compact('products','product_id'));
    }

    //削除確認
    public function delconf(Request $request)
    {
        $request->session()->regenerateToken();
        //削除
        DB::table('products')->where('id',$request->product_id)->delete();

        return view('/admin/product/delcomplete');
    }

    //削除完了
    public function delcomplete(Request $request)
    {
        return redirect('/admin/product/myproduct');
    }

    //商品追加
    public function addto(Request $request)
    {
        //発注先管理ID
        $admins_id = Auth::id();

        return view('admin.product.addto',compact('admins_id'));
    }
    
    //商品追加内容
    public function addtoconf(Change $request)
    {
        //商品情報
        $admin_id = $request->admin_id;
        $product  = $request->product;
        $price    = $request->price;
        $amount   = $request->amount;
        $stocks   = $request->stocks;
        
        return view('admin.product.addtoconf',compact('admin_id','product','price','amount','stocks'));
    }

    //追加完了
    public function addtocomplete(Request $request)
    {
        $request->session()->regenerateToken();
        //商品情報
        $products = [
            'admin_id'=> $request->admin_id,
            'product' => $request->product,
            'price'   => $request->price,
            'amount'  => $request->amount,
            'stocks'  => $request->stocks,
        ];
        //DB保存
        DB::table('products')->insert($products);

        return view('admin.product.addtocomplete');
    }

}

