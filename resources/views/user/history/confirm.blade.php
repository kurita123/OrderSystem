@extends('layouts.user.app')

@section('title','OrderSystem')

@section('content')
<!-- 管理者会社名取り出し -->
@foreach ($admin_name as $a_name)
    <h2 class="text-center page-title">{{ $a_name->c_name}}の発注一覧</h2>
@endforeach
    <table border="2">
    <tr><th>商品名</th><th>納品日</th><th>発注量</th><th>価格</th><th>検索期間合計金額</th></tr>
        <!-- 検索情報取り出し -->
        @foreach ($admins as $admin)
            <tr>
                <!-- 商品情報取り出し -->
                @foreach($products as $product)
                    <!-- ID照合 -->
                    @if($product->id == $admin->product_id)
                        <td>{{ $product->product}}</td>
                    @endif
                @endforeach
                <td>{{ $admin->datetime }}</td>
                <td>{{ $admin->stock }}</td>
                <!-- 商品情報取り出し -->
                @foreach($products as $product)
                    <!-- ID照合 -->
                    @if($product->id == $admin->product_id)
                    <td>{{ $product->price * $admin->stock}}円</td>
                    <td>{{ $total +=  $product->price * $admin->stock}}円</td>
                    @endif
                @endforeach  
            </tr>
        @endforeach
    </table>
    {!! Form::open(['url' => 'user/home','class' => 'form-horizontal']) !!}
    <div class="col-12 form-group text-center">
        <div class="text_1">
        <!-- ホームボタン -->
        {!! Form::submit('ホームへ戻る', ['class' => 'btn-lg btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
