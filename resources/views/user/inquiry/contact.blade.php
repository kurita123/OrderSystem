@extends('layouts.user.app')

@section('title','OrderSystem')
 
@section('content')
<div class="container">
    <div class="col-12">
        <h2 class="text-center page-title">お問い合わせ</h2>
    </div>
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
        {!! Form::open(['url' => 'user/inquiry/confirm','class' => 'form-horizontal']) !!}  
            <div class="row">
                <div class="col-12 form-group{{ $errors->has('inquiry') ? ' has-error' :''}}">              
                    <div class="offset-md-3 col-sm-5 col-md-4">
                        <!-- 問い合わせ先企業ドロップダウンリスト -->
                        お問い合わせ企業名選択:{{ Form::select('admin_id', $admins_id, null, ['class' => 'my_class']) }} 
                    </div>     
                </div>             
                    <div class="col-12 form-group{{ $errors->has('inquiry') ? ' has-error' :''}}">       
                        <div class="offset-md-3 col-sm-5 col-md-4">
                            {!! Form::label('inquiry', '内容:', ['class' => 'sizeM control-label']) !!}
                        </div>
                        <div class="offset-md-3 col-sm-7 col-md-6">
                            {!! Form::textarea('inquiry', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
            </div> 
                <div class="col-12 form-group text-center">
                    {!! Form::submit('確認', ['class' => 'btn-lg btn-primary']) !!}
                </div>
                    {!! Form::close() !!}
        </div>
</div>
@endsection