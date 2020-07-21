<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\inquiryRequest;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    //お問い合わせ
    public function contact()
    {
        //問い合わせ先情報取得
        $admins = Admin::all();
        //問い合わせ先ID企業名
        foreach($admins as $val){
            $admins_id[$val->id] = $val ->c_name;
        }
        
        return view('user.inquiry.contact', compact('admins_id') );
    }

    //お問い合わせ確認
    public function confirm(InquiryRequest $request)
    {
        //問い合わせ内容
        $inquiry  = $request->inquiry;
        //問い合わせ先情報取得
        $items    = Admin::find($request->admin_id);
        $c_name   = $items->c_name;
        $admin_id = $items->id;
    
        return view('user.inquiry.confirm', compact('inquiry', 'c_name','admin_id'));
    }

    //お問い合わせ完了
    public function complete(Request $request)
    {
        $request->session()->regenerateToken();
        $user_id = Auth::id();
        //問い合わせへリダイレクト
        $input   = $request->except('action');
        if ($request->action === '戻る') {
            return redirect()->action('InquiryController@contact')->withInput($input);
        }
        //問い合わせ内容
        $inquiry_data = $request->inquiry;
        //問い合わせ先ID
        $admin_id     = $request->admin_id;
        //DB保存
        $inquiry      = new Inquiry();
        $inquiry->create([
            'inquiry'  => $inquiry_data,
            'admin_id' => $admin_id,
            'user_id'  => $user_id
        ]);
 
        return view('user.inquiry.complete');
    }
}