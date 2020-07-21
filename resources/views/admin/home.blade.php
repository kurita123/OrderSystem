@extends('layouts.admin.app')

@section('title','OrderSystem')

@section('content')
<table border=2 class="table-cs">
<tr><th>内容</th><th>企業名</th><th>確認</th></tr>
<!-- お問い合わせ内容返信内容 -->
@foreach($inquirys as $inquiry)
    <tr>
    @if($inquiry->comfirm_admin === 0 )
        <td>{{$inquiry->inquiry}}
        {{$inquiry->reply}}</td>
    @endif
    @foreach($users as $user)    
        @if($inquiry->user_id == $user->id)
            <td class="text-cs">{{$user->c_name}}</td>
        @endif
    @endforeach       
    <td><form action="" method="post">
    @csrf
        <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}">
        <input type="hidden" name="comfirm_admin" value=1>
        <input type="submit" name="confirm" value="確認済"></td>
    </form>
    
@endforeach
</tr>
</table>
    
@endsection