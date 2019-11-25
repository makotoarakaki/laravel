<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <!--       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    </head>
    <body>
        @component('components.header')
        @endcomponent
        <div class="container">
            @yield('content')
        </div>
        @component('components.footer')
        @endcomponent

         <script src="{{ asset('js/app.js') }}"></script>
<!--         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    </body>
</html> 