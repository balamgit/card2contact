<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
    <div class="wrapper">
    @include('inc.navibar')
     @include('inc.sidebar')
     <div class="content-wrapper">
         @yield('content')
     </div>
        @include('inc.footer')
    </div>
    </body>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</html>
