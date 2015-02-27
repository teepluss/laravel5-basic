<!DOCTYPE html>
<html>
    <head>
        <title>Master Layout</title>
        <link rel="stylesheet" href="{{ asset('components/foundation/css/foundation.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    </head>
    <body ng-app="myApp">
        <div class="container">
            @yield('content')
        </div>

        <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('components/angular/angular.min.js') }}"></script>
        <script src="{{ asset('js/all.js') }}"></script>
    </body>
</html>