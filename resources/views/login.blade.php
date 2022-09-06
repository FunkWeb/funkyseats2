<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logg inn - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style/united.min.css') }}">

</head>

<body>
<div class="container mt-4 col-3 d-flex align-items-center">
    <div class="card">
        <div class="card-body text-center">
            <h4>{{ config('app.name') }}</h4>
            <div class="my-4">All bruk av denne tjenesten krever at du er pålogget med din konto hos FunkWeb.</div>
            <a class="btn btn-outline-dark" role="button" style="text-transform:none"
               href="{{ route('google.login') }}">
                <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                     src="{{ asset('img/g-logo.png') }}"/>
                Logg på med Google
            </a>
            <div class="mt-4">For spørsmål, vennligst kontakt IT-ansvarlig.</div>
        </div>
    </div>
</div>
</body>
</html>
