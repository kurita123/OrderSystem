@extends('layouts.admin.app')

@section('title','OrderSystem')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <h2 class="text-center page-title">返信内容</h2></br>
                    <div class="panel-body">
                        <p>誤りがないことをご確認のうえ送信ボタンをクリックしてください。</p>  
                    <table border=2 class="table-css">
                        <tr>
                            <th>返信先企業名</th>
                            <td>{{ $c_name }}</td>
                        </tr>
                        <tr>
                            <th>返信内容</th>
                            <td>{{ $reply }}</td>
                        </tr>
                    </table> 
                        {!! Form::open(['url' => 'admin/inquiry/complete','class' => 'form-horizontal','id' => 'post-input']) !!}
                        {!! Form::hidden('reply',$reply) !!}
                        {!! Form::hidden('user_id',$user_id) !!}
                        {!! Form::hidden('c_name',$c_name) !!}
                    <div class="text-css">
                        {!! Form::submit('選択へ戻る', ['name' => 'action', 'class' => 'btn-lg btn-primary']) !!}
                        {!! Form::submit('送信', ['name' => 'action', 'class' => 'btn-lg btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection