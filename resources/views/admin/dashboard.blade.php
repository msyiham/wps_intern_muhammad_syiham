@extends('layouts.main.app')
@section('title', 'Dashboard Admin')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header mb-3">
        Hi, {{ Auth::user()->name }}. <small>Sealamat datang.</small>
    </h1>
    <a type="button" href="{{ route('login') }}" class="btn btn-theme my-3">Login</a>
    <div class="">
    </div>
</div>
@endsection