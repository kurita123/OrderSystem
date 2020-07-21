@extends('layouts.admin.app')

@section('title','OrderSystem')

@section('content')
<!-- 管理者会社名取り出し -->
@foreach ($users_name as $user_name)
    <h2 class="text-center page-title">{{ $user_name->c_name}}の発注一覧</h2>
@endforeach
    <table border=2>
    <tr><th>商品名</th><th>納品日</th><th>発注量</th><th>価格</th><th>商品合計金額</th></tr>
        <!-- 検索情報取り出し -->
        @foreach ($orders as $order)
            <tr>
                <!-- 商品情報取り出し -->
                @foreach($products as $product)
                    <!-- ID照合 -->
                    @if($product->id == $order->product_id)
                        <td>{{ $product->product}}</td>
                    @endif
                @endforeach
                <td>{{ $order->datetime }}</td>
                <td>{{ $order->stock }}</td>
                <!-- 商品情報取り出し -->
                @foreach($products as $product)
                    <!-- ID照合 -->
                    @if($product->id == $order->product_id)
                    <td>{{ $product->price * $order->stock}}円</td>
                    <td>{{ $total +=  $product->price * $order->stock}}円</td>
                    @endif
                @endforeach  
            </tr>
        @endforeach
    </table>
    {!! Form::open(['url' => 'admin/home','class' => 'form-horizontal']) !!}
    <div class="col-12 form-group text-center">
        <div class="text_1">
        <!-- ホームボタン -->
        {!! Form::submit('ホームへ戻る', ['class' => 'btn-lg btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
