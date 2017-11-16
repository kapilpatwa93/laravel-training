<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">  
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        @section('header')
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">My ToDo</a>
                </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Add</a></li>
                <li><a href="#">View </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logout</a></li>
            </ul>
            </div>
        </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>