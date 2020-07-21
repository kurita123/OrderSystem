<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReplyRequest;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    //お問い合わせ検索
    public function contact(Request $request)
    {
        //問い合わせ先情報取得
        $users = User::all();
        //問い合わせ先ID企業名
        foreach($users as $val){
            $users_name[$val->id] = $val ->c_name;
        }
        
        return view('admin.inquiry.contact', compact('users_name') );
    }
    
    //お問い合わせ内容確認、返信
    public function reply(Request $request)
    {
        $admin_id  = Auth::id();
        $user_id   = $request->user_id;

        $inquiries = DB::table('inquiries')->where('user_id',$user_id)
                                           ->where('admin_id',$admin_id)
                                           ->where('comfirm_admin',0)                                 
                                           ->get();
        //問い合わせ先情報取得
        $items    = User::find($request->user_id);
        $c_name   = $items->c_name;
        $user_id  = $items->id;

        return view('admin.inquiry.reply', compact('inquiries', 'c_name','user_id'));
    }
    
    //返信内容確認
    public function confirm(ReplyRequest $request)
    {
        //返信内容
        $reply    = $request->reply;
        //返信先情報取得
        $items    = User::find($request->user_id);
        $c_name   = $items->c_name;
        $user_id  = $items->id;

        return view('admin.inquiry.confirm', compact('reply', 'c_name','user_id'));
    }

    //完了ページ
    public function complete(Request $request)
    {
        $admin_id = Auth::id();
        //問い合わせへリダイレクト
        $input    = $request->except('action');
        if ($request->action === '選択へ戻る') {
            return redirect()->action('Admin\InquiryController@contact')->withInput($input);
        }
        //問い合わせ内容
        $reply_data = $request->reply;
        //問い合わせ先ID
        $user_id    = $request->user_id;
        //DB保存
        $inquiry    = new Inquiry();
        $inquiry->create([
            'reply'    => $reply_data,
            'admin_id' => $admin_id,
            'user_id'  => $user_id
        ]);
 
        return view('admin.inquiry.complete');
    }
}