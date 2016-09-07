<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravel App</title>
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/style.css">
  <meta id="token" name="token" value="{{ csrf_token() }}">
</head>
<body>
    @yield('content');
</body>