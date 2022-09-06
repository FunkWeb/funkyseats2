<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/united.min.css') }}">
</head>

<body class="antialiased">

@include('layout.navbar')

<div class="container">
    <h1 class="text-3xl text-purple-600 font-bold">Laravel 9 Vite with Tailwind CSS</h1>
    <div>Hei</div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
