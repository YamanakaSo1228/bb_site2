<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
  <script src="/js/app.js" defer></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>

  </style>
</head>

<body>
  <header>
    @if (!empty(Auth::user()))
    @include('admin.header')
    @endif
  </header>

  @yield('content')
  <footer class="">
  </footer>
</body>

</html>