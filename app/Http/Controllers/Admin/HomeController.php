<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    //ホーム画面
    public function index(Request $request)
    {
        //ユーザーID
        $admin_id  = Auth::id();
        //発注先会社ID、会社名
        $users     = User::select('id','c_name')->get();
        //問い合わせ、返信内容検索
        $inquirys  = DB::table('inquiries')->where('admin_id',$admin_id)
                                           ->where('comfirm_admin' , 0)
                                           ->get();
        
        return view('admin.home',compact('inquirys','users'));
    }

    //確認事項
    public function update(Request $request)
    {
        //配列に保管
        $comfirm_admin = [
            'comfirm_admin'=> $request->comfirm_admin
        ];
        //DBを確認済みに変更
        DB::table('inquiries')->where('id',$request->inquiry_id)
                              ->update($comfirm_admin);
    
        return redirect('admin/home');
    }

}