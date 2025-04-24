@extends('layouts.main.app')
@section('title', 'Welcome User')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header mb-3">
        Hi, User. <br><small>Silahkan Login Terlebih dahulu. Jika belum punya akun silahkan register</small>
    </h1>
    <a type="button" href="{{ route('login') }}" class="btn btn-theme my-3">Login</a>
    <a type="button" href="{{ route('register') }}" class="btn btn-theme my-3">Register</a>
</div>
@endsection