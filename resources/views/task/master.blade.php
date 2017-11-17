<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">  
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        @section('header')
        @include('layouts.header')
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>