@extends('layouts.admin_layout')

@section('title','管理者ホーム')
@section('content')
<style>
  .sidebar {
    width: 280px;
    background-color: #343a40;
    color: #fff;
    padding: 20px;
    height: 100vh;
  }

  .sidebar .title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .sidebar li {
    margin-bottom: 10px;
  }

  .sidebar a {
    color: #fff;
    text-decoration: none;
  }
</style>

<x-alert type="success" :session="session('success')"/>
<!-- メインコンテンツ -->





@endsection