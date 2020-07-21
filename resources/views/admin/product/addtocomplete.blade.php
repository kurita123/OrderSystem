@extends('layouts.admin.app')

@section('title','OrderSystem')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h2>商品追加完了しました。</h2>  
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