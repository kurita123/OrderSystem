<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    //ホーム
    public function index(Request $request)
    {
        //ユーザーID
        $user_id  = Auth::id();
        //発注先会社ID、会社名
        $admins   = Admin::select('id','c_name')->get();
        //問い合わせ、返信内容検索
        $inquirys = DB::table('inquiries')->where('user_id',$user_id)
                                          ->where('comfirmation' , 0)
                                          ->get();

        return view('user.home',compact('inquirys','admins'));
    }

    //確認事項
    public function update(Request $request)
    {
        //配列に保管
        $comfirmation = [
            'comfirmation'=> $request->comfirmation
        ];
        //DBを確認済みに変更
        DB::table('inquiries')->where('id',$request->inquiry_id)
                              ->update($comfirmation);
    
        return redirect('user/home');
    }
}