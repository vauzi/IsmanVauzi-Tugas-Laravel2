<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-comm</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar></x-navbar>
    <div class="flex pt-10">
        <x-side-bar></x-side-bar>
        {{$slot}}
    </div>
</body>
</html>