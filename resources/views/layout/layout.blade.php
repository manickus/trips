<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


{!! SEOMeta::generate() !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn+SC" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111744044-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111744044-1');
</script>
    @include('partials.fbjdk')
    @include('layout.nav')
    <main class="main-wrapper wrap-posts">
        <section class="posts">
            @yield('content')
        </section>
         @include('partials.sidebar')
    </main>
   
    @include('layout.footer')
    <!-- Scripts -->
    @yield('js')
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Infolinks ads -->
    <script type="text/javascript">
      var infolinks_pid = 3090861;
      var infolinks_wsid = 0;
    </script>
    <script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>

</body>
</html>
