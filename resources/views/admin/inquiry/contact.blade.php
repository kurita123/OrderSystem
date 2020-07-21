@extends('layouts.admin.app')

@section('title','OrderSystem')
 
@section('content')
<div class="container">
    <div class="col-12">
        <h2 class="text-center page-title">お問い合わせ内容確認</h2>
    </div>
        {!! Form::open(['url' => 'admin/inquiry/reply','method' => 'get']) !!}  
            <div style="text-align:center; margin:40px 0;">
                <!-- 問い合わせ先企業ドロップダウンリスト -->
                企業名選択 : {{ Form::select('user_id', $users_name, null, ['class' => 'my_class']) }}
            </div>             
            <div class="col-12 form-group text-center">
                {!! Form::submit('確認', ['class' => 'btn-lg btn-primary']) !!}
            </div>
        {!! Form::close() !!} 
</div>
@endsection