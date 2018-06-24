<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'school') }}</title>
    
    <!-- Styles -->
    <link  rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link  rel="stylesheet" href="{{ asset('css/app1.css')}}">

</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container">
        @include('inc.massages')
        @yield('content')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
