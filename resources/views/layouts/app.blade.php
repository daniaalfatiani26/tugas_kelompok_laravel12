<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        </head>
<body class="bg-light"> <div class="bootstrap-scope">
            
            @include('layouts.navigation')

            <div class="container mt-3">
                @if(session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                @endif

                @if(session('gagal'))
                    <div class="alert alert-danger">{{ session('gagal') }}</div>
                @endif
            </div>
            <main class="container py-4">
                {{ $slot }}
            </main>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>