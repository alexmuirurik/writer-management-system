<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard | Copy Scribers - https://copyscribers.com </title>
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/logo.png">
        <link rel="icon" type="image/png" href="/assets/img/logo.png">
        <!--     Fonts and icons     -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Agbalumo&family=Fascinate+Inline&family=Nunito:wght@200&display=swap" rel="stylesheet">
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="/assets/vendor/fontawesome/css/all.css" rel="stylesheet"> 
        <link href="/assets/css/main.css" rel="stylesheet"> 
        <script type="text/javascript" src="/assets/vendor/core/jquery.min.js"></script> 
    </head>

    <body class="white-content">
        <div class="wrapper">
            @include('layouts.sidebar')
            <div class="main-panel">

                @include('layouts.navbar')

                @yield('content')

                @include('layouts.footer')

                <script type="text/javascript" src="/assets/vendor/tinymce/tinymce.min.js"></script>
                <script type="text/javascript" src="/assets/vendor/core/popper.min.js"></script>
                <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
                <script type="text/javascript" src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script type="text/javascript" src="/assets/vendor/plugins/bootstrap-notify.js"></script>
                <script type="text/javascript" src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script type="text/javascript" src="/assets/js/main.js"></script>
                <script type="text/javascript" src="/assets/js/index.js"></script>
            </div>
        </div>
    </body>
</html>