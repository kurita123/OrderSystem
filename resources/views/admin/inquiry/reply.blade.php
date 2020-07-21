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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <h2 class="text-center page-title">お問い合わせ返信内容</h2></br>
            <!-- 返信先企業名 -->
            <h4 class="text-center page-title">{{ $c_name }}</h4>
            {!! Form::open(['url' => 'admin/inquiry/confirm','class' => 'form-horizontal']) !!}  
                <table border=2 class="table-cs">
                    <tr><th>内容</th></tr>
                        <!-- 未確認事項表記 -->
                        @foreach($inquiries as $inquiry)
                        <tr>
                        <td>{{ $inquiry->inquiry }}{{ $inquiry->reply }}</td>
                        </tr>
                        @endforeach   
                 </table>
                 <div class="col-12 form-group{{ $errors->has('reply') ? ' has-error' :''}}">       
                    <div class="reply_css">
                        {!! Form::label('reply', '返信内容:', ['class' => 'sizeM control-label']) !!}
                    </div>
                    <div class="reply">
                        {!! Form::textarea('reply', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-12 form-group text-center">
                {!! Form::hidden('user_id',$user_id) !!}
                {!! Form::submit('確認', ['class' => 'btn-lg btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection