@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','チーム紹介')
@section('content')
<style>
  .notice {
    text-align: center;
    padding: 20px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
  }

  .notice-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .notice-date {
    font-size: 16px;
    color: #888;
  }

  .notice-content {
    margin-top: 20px;
    font-size: 18px;
  }

  .team-edit-btn {
    width: 30%;
  }
</style>
<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />

<!-- メインコンテンツ -->
<div class="notice">
  <h3 class="notice-title text-center">{{ $teams[0]->team_title }}</h3>
  <div class="notice-meta text-center">
    <p class="notice-date">
      <span>作成日:</span> {{ \Carbon\Carbon::parse($teams[0]->created_at)->format('Y-m-d') }}
    </p>
    <p class="notice-date">
      <span>更新日:</span> {{ $teams[0]->updated_at }}
    </p>
  </div>
  <div class="notice-content text-center">
    <p class="notice-text">{{ $teams[0]->team_text }}</p>
  </div>
</div>
<div class="text-center">
  <button type="button" class="btn btn-primary team-edit-btn" onclick="location.href='/admin/team/edit/{{ $teams[0]->id }}'">編集する</button>
</div>


<script>
  function checkDelete() {
    if (window.confirm('選手を削除してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection