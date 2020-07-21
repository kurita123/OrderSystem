@extends('layouts.user.app')

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
</div>
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">
                    <!-- 商品情報 -->
                    @foreach($products as $product)
                        <div class="col-xs-6 col-sm-4 col-md-4 ">
                            <div class="mycart_box">
                                商品名 : {{$product->product}} 
                                価格 : {{$product->price}}円
                                量 : {{$product->amount}}        
                                <form action="/user/mycart" method="post">
                                    @csrf
                                    <!-- 発注量下限上限 -->
                                    発注量 : <input type="number" min="1" max="30" name="stock" style="width:50%"></br>
                                    <!-- 納品日カレンダー -->
                                    納品日 : <input type="text" name="datetime" class="datetime" style="width:50%" autocomplete="off">
                                    <input type="hidden" name="admin_id" value="{{$admin_id}}">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" name="action" value="send">送信</button></br>
                    　　　　　　　</form>
                    　　　　　</div>
                        </div>
                    @endforeach                
                </div>
                <div style="text-center; width: 200px;margin: 20px auto;">
                   {{ $products->appends(request()->input())->links() }} 
                </div>
                <div class="button">
                    <form action="/user/company" method="post">
                    @csrf
                        <input type="submit" name="action" value="選択へ戻る">                        
                    </form>
                    <form action="/user/history/search" method="post">
                    @csrf
                        <input type="submit" value="発注一覧へ">
                    </form>
                </div>
            </div>
        </div>　　
    </div>
</div>
@endsection