@extends('layouts.admin_layout')

@section('title','管理者ログイン')
@section('content')
<link rel="stylesheet" href="{{ asset('/css/signin.css') }}">
<style>
    /* パスワードの上の空間確保 */
    .password {
        margin-top: 30px;
    }

    button.btn.btn-primary.float-right {
        text-align: right;
    }
</style>

<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">管理者ログイン</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <x-alert type="danger" :session="session('danger')"/>
    
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
</form>

@endsection