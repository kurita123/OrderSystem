@extends('layouts.admin.app')

@section('title','OrderSystem')

@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">商品変更確認</h1>
                <div class="panel-body">
                    <p style="margin:20px 110px">誤りがないことをご確認のうえ送信ボタンをクリックしてください。</p>  
                    <table border=2 class="table-cs">
                        <tr><th>商品名</th><th>価格</th><th>量</th><th>在庫量</th></tr>
                        <tr>
                            <td>{{ $product }}</td>
                            <td>{{ $price }}</td>
                            <td>{{ $amount }}</td>
                            <td>{{ $stocks }}</td>
                        </tr>
                    </table> 
                        {!! Form::open(['url' => 'admin/product/confirm','class' => 'form-horizontal']) !!}
                        {!! Form::hidden('product',$product) !!}
                        {!! Form::hidden('price',$price) !!}
                        {!! Form::hidden('amount',$amount) !!}
                        {!! Form::hidden('stocks',$stocks) !!}
                        {!! Form::hidden('product_id',$product_id) !!}
                    <div class="text-css">
                        {!! Form::submit('送信', ['class' => 'btn-lg btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection