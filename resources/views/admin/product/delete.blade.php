@extends('layouts.admin.app')

@section('title','OrderSystem')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">商品削除確認</h1>
            <table border=2 class="table-cs">
                <tr><th>商品名</th><th>価格</th><th>量</th><th>在庫量</th></tr>
                <tr>
                    @foreach($products as $product)
                        <td>{{$product->product}}</td>
                        <td>{{$product->price}}円</td>
                        <td>{{$product->amount}}</td>
                        <td>{{$product->stocks}}</td>
                    @endforeach
                </tr>
            </table>
            <div class="text-css">
            {!! Form::open(['url' => 'admin/product/delconf','class' => 'form-horizontal']) !!}
            {!! Form::hidden('product_id',$product_id) !!}
            {{ Form::submit('削除',['class' => 'btn-lg btn-primary']) }}
            </div>
        </div>
    </div>
</div>
@endsection