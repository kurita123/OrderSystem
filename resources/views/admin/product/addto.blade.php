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
            <h1 style="color:#555555; text-align:center; font-size:2em; padding:24px 0px; font-weight:bold;">商品追加</h1>
                {!! Form::open(['url' => 'admin/product/addtoconf','class' => 'form-horizontal']) !!}  
                <table border=2 class="table-cs">
                    <tr><th>商品名</th><th>価格</th><th>量</th><th>在庫量</th></tr>               
                    <tr>
                        <input type="hidden" name="admin_id" value="{{$admins_id}}">
                        <td><input type="text" name="product" value="{{ old('product')}}"></td>
                        <td><input type="number" name="price" min="1" value="{{ old('price')}}"></td>
                        <td><input type="text" name="amount" value="{{ old('amount')}}"></td>
                        <td><input type="number" name="stocks" min="1" value="{{ old('stocks')}}"></td>                                 
                    </tr>   
                </table>
                <div class="text-css">
                <input type="submit" value="確認" class= 'btn-lg btn-primary'>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection