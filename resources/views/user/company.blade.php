@extends('layouts.user.app')

@section('title','OrderSystem')

@section('content')
<div class="container">
    <div class="col-12">
        <h2 class="text-center page-title">発注先商品検索</h2>
    </div>
        {!! Form::open(['url' => 'user/product','method' => 'get','class' => 'form-horizontal']) !!}      
            <div class="text_1">
                <!-- 発注先ドロップダウンリスト -->
                {{ Form::select('admin_id', $admins_id, null, ['class' => 'my_class']) }} 
            </div>
        <div class="col-12 form-group text-center">
            {!! Form::submit('確認', ['class' => 'btn-lg btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection