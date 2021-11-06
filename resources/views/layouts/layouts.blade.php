
<html>
    <head>
        <title>Life of Purpose</title>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <main class="py-4 container">
            @yield('content')
        </main>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>