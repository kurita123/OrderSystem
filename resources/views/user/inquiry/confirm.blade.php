@extends('layouts.user.app')

@section('title','OrderSystem')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">お問い合わせ</div>
                    <div class="panel-body">
                        <p>誤りがないことをご確認のうえ送信ボタンをクリックしてください。</p>  
                    <table border=2 class="table-css">
                        <tr>
                            <th>お問い合わせ先企業名</th>
                            <td>{{ $c_name }}</td>
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>{{ $inquiry }}</td>
                        </tr>
                    </table> 
                        {!! Form::open(['url' => 'user/inquiry/complete','class' => 'form-horizontal','id' => 'post-input']) !!}
                        {!! Form::hidden('inquiry',$inquiry) !!}
                        {!! Form::hidden('admin_id',$admin_id) !!}
                        {!! Form::hidden('c_name',$c_name) !!}
                    <div class="text-css">
                        {!! Form::submit('戻る', ['name' => 'action', 'class' => 'btn btn-primary']) !!}
                        {!! Form::submit('送信', ['name' => 'action', 'class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection