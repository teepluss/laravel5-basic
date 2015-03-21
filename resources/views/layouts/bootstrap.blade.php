<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap 101 Template</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('components/bootstrap/dist/css/bootstrap-theme.min.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('css/all.css') }}" rel="stylesheet" media="screen">
    </head>
    <body>

        @include('partials.header')

        <div class="content" role="main">

            @yield('content')

        </div><!-- /.container -->

        <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>
