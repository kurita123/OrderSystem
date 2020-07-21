@extends('layouts.admin.app')

@section('title','OrderSystem')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">商品追加確認</h1>
                {!! Form::open(['url' => 'admin/product/addtocomplete','class' => 'form-horizontal']) !!}  
                <table border=2 class="table-cs">
                    <tr><th>商品名</th><th>価格</th><th>量</th><th>在庫量</th></tr>               
                    <tr>
                        <input type="hidden" name="admin_id" value="{{$admin_id}}">
                        <input type="hidden" name="product" value="{{$product}}">
                        <input type="hidden" name="price" value="{{$price}}">
                        <input type="hidden" name="amount" value="{{$amount}}">
                        <input type="hidden" name="stocks" value="{{$stocks}}">
                        <td>{{$product}}</td>
                        <td>{{$price}}</td>
                        <td>{{$amount}}</td>
                        <td>{{$stocks}}</td>                                 
                    </tr>   
                </table>
                <div class="text-css">
                <input type="submit" value="追加" class= 'btn-lg btn-primary'>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection