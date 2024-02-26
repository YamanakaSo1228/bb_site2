@extends('layout')
@section('title','お知らせ内容')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>{{ $notice[0]->notice_title }}</h2>
            <p>{{ $notice[0]->notice_text }}</p>
        </div>
    </div>
</div>

@endsection