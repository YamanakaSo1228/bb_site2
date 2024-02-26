@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','問い合わせ一覧')
@section('content')

<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />

<!-- メインコンテンツ -->
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">タイトル</th>
        <th scope="col">本文</th>
        <th scope="col">メールアドレス</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($inquiries as $inquiry)
      <tr>
        <td>
          <a href="/admin/inquiry/{{ $inquiry->id }}">{{ $inquiry->title }}</a>
        </td>
        <td>{{ $inquiry->body }}</td>
        <td>{{ $inquiry->email }}</td>
        <td>
        <td>
          @if (!$inquiry->hasReplies())
          <span class="badge badge-danger">未返信</span>
          @endif
          <a href="/admin/inquiry/{{ $inquiry->id }}">返信する</a>
        </td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <ul class="pagination">
      @if ($inquiries->onFirstPage())
      <li class="page-item disabled">
        <span class="page-link">前へ</span>
      </li>
      @else
      <li class="page-item">
        <a href="{{ $inquiries->previousPageUrl() }}" class="page-link" rel="prev">前へ</a>
      </li>
      @endif

      @for ($i = 1; $i <= $inquiries->lastPage(); $i++)
        <li class="page-item {{ $inquiries->currentPage() == $i ? 'active' : '' }}">
          <a href="{{ $inquiries->url($i) }}" class="page-link">{{ $i }}</a>
        </li>
        @endfor

        @if ($inquiries->hasMorePages())
        <li class="page-item">
          <a href="{{ $inquiries->nextPageUrl() }}" class="page-link" rel="next">次へ</a>
        </li>
        @else
        <li class="page-item disabled">
          <span class="page-link">次へ</span>
        </li>
        @endif
    </ul>
  </div>
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.inquiry.create') }}" class="btn btn-primary">新規登録</a>
  </div>
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