@extends('layouts.admin.app')

@section('title','OrderSystem')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">
                <table border=2 class="table-cs">
                <tr><th>商品名</th><th>価格</th><th>量</th><th>在庫量</th><th>変更</th><th>削除</th></tr>
                    <!-- 商品情報 -->
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->product}}</td>
                        <td>{{$product->price}}円</td>
                        <td>{{$product->amount}}</td>
                        <td>{{$product->stocks}}</td>
                        <td><form action="/admin/product/change" method="get">
                        @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="submit" value="変更">
                        </form></td>
                        <td><form action="/admin/product/delete" method="get">
                        @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="submit" value="削除">
                        </form>
                        </td> 
                    </tr>       
                    @endforeach
                </table>
                </div>
            </div>               
                </div>
                <div class="button">
                    <form action="/admin/home" method="post">
                    @csrf
                        <input type="submit" value="ホーム">
                    </form>
                </div>
            </div>
        </div>　　
    </div>
</div>
@endsection