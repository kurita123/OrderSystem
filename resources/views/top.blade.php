@extends('layouts.layout')

@section('title','OrderSystem')

@section('content')
    <div class = "example">
        <img src="image/computer.jpg">
        <p><a href="{{ route('user.login') }}">userログイン</a></p>
    </div>
    <div class = "example-cs">  
        <p><a href="{{ route('admin.login') }}">adminログイン</a></p>
    </div>
@endsection
