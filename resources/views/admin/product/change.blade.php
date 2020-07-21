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
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">変更商品</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">
                    <table border="2" class="table-cs">
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
                </div>
                <div class="text_1">
                    <p>変更内容を入力して下さい。</p>
                </div>
                {!! Form::open(['url' => 'admin/product/check','class' => 'form-horizontal']) !!}  
                <table border="2" class="table-cs">
                    <tr><th>商品名</th><th>価格</th><th>量</th><th>在庫量</th></tr>               
                    <tr>
                        <input type="hidden" name="product_id" value="{{$product_id}}">
                        <td><input type="text" name="product" value="{{ old('product')}}"></td>
                        <td><input type="number" name="price" min="1" value="{{ old('price')}}"></td>
                        <td><input type="text" name="amount" value="{{ old('amount')}}"></td>
                        <td><input type="number" name="stocks" min="1" value="{{ old('stocks')}}"></td>                                 
                    </tr>   
                </table>
                <div class="text-css">
                <input type="submit" value="変更" class= 'btn-lg btn-primary'>
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection