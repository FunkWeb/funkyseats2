<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style/united.min.css') }}">
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    @stack('head')
</head>

<body class="antialiased">

@include('layout.navbar')
<div class="container mt-3">

    {{ $slot }}

</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@stack('scripts')
</body>
</html>
