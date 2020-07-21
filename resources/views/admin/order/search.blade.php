@extends('layouts.admin.app')

@section('title','OrderSystem')
 
@section('content')
<!-- エラーメッセージ -->
@if (count($errors) >0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<div class="container">
    <div class="col-12">
        <h2 class="text-center page-title">発注一覧検索</h2>
    </div>
        {!! Form::open(['url' => 'admin/order/catalog','class' => 'form-horizontal','autocomplete="off"']) !!}  
        <div class="col-12 form-group">
            <div class="text_1">
                <p>納品先会社名を選択して下さい。</p>
                <!-- 発注先ドロップダウンリスト -->
                {{ Form::select('user_id', $users_id, null, ['class' => 'my_class']) }}
            </div>
            <div class="text_1">
                <p> 納品日の期間を選択して下さい。</p>
            </div>
            <div class="text_css">
                <!-- 納品日選択カレンダー -->
                納品日 : {{ Form::text('datetime_first','',['class'=>'datetime'])}} 〜 
                期間 : {{ Form::text('datetime_last','',['class'=>'datetime'])}}
            </div>    
        </div>
        <div class="col-12 form-group text-center">
            {!! Form::submit('確認', ['class' => 'btn-lg btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection