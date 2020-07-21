@extends('layouts.admin.app')

@section('title','OrderSystem')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text_1">
                        <p>お問い合わせ完了しました。</p>  
                        {!! Form::open(['url' => 'admin/home']) !!}
                        {!! Form::submit('ホームへ', ['name' => 'action', 'class' => 'btn-lg btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection