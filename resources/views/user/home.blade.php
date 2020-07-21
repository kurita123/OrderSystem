@extends('layouts.user.app')

@section('title','OrderSystem')

@section('content')
<table border=2 class="table-cs">
<tr><th>内容</th><th>企業名</th><th>確認</th></tr>
@foreach($inquirys as $inquiry)
    <tr>
    @if($inquiry->comfirmation === 0 )
        <td>{{$inquiry->inquiry}}
        {{$inquiry->reply}}</td>
    @endif
    @foreach($admins as $admin)    
        @if($inquiry->admin_id == $admin->id)
            <td class="text-cs">{{$admin->c_name}}</td>
        @endif
    @endforeach       
    <td><form action="" method="post">
    @csrf
        <input type="hidden" name="inquiry_id" value="{{$inquiry->id}}">
        <input type="hidden" name="comfirmation" value=1>
        <input type="submit" name="confirm" value="確認済"></td>
    </form>
    
@endforeach
</tr>
</table>
    
@endsection