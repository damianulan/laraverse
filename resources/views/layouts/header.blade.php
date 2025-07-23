<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="none">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ route('laraverse.css') }}">
    <script src="{{ route('laraverse.js') }}"></script>
    @stack('styles')

</head>
