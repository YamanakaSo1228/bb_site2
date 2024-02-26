@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','お知らせ一覧')
@section('content')

<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />

<!-- メインコンテンツ -->
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">タイトル</th>
        <th scope="col">内容</th>
        <th scope="col">登録日</th>
        <th scope="col">更新日</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($notices as $notice)
      <tr>
        <td>
          <a href="/admin/notice/{{ $notice->id }}">{{ $notice->notice_title }}</a>
        </td>
        <td>{{ $notice->notice_text }}</td>
        <td>{{ $notice->created_at }}</td>
        <td>{{ $notice->updated_at }}</td>

        <td>
          <button type="button" class="btn btn-primary" onclick="location.href='/admin/notice/edit/{{ $notice->id }}'">編集</button>
        </td>
        <form method="POST" action="{{ route('admin.notice.delete', $notice->id) }}" onSubmit="return checkDelete()">
          @csrf
          <td>
            <button type="submit" class="btn btn-danger" onclick="">削除</button>
          </td>
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <ul class="pagination">
      @if ($notices->onFirstPage())
      <li class="page-item disabled">
        <span class="page-link">前へ</span>
      </li>
      @else
      <li class="page-item">
        <a href="{{ $notices->previousPageUrl() }}" class="page-link" rel="prev">前へ</a>
      </li>
      @endif

      @for ($i = 1; $i <= $notices->lastPage(); $i++)
        <li class="page-item {{ $notices->currentPage() == $i ? 'active' : '' }}">
          <a href="{{ $notices->url($i) }}" class="page-link">{{ $i }}</a>
        </li>
        @endfor

        @if ($notices->hasMorePages())
        <li class="page-item">
          <a href="{{ $notices->nextPageUrl() }}" class="page-link" rel="next">次へ</a>
        </li>
        @else
        <li class="page-item disabled">
          <span class="page-link">次へ</span>
        </li>
        @endif
    </ul>
  </div>
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.notice.create') }}" class="btn btn-primary">新規登録</a>
  </div>
</div>

<script>
  function checkDelete() {
    if (window.confirm('お知らせを削除してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection