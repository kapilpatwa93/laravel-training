<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('task.index')}}">Task Manager</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{route('task.create')}}">Add</a></li>
            <li><a href="{{route('task.index')}}">View </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav navbar-btn">Welcome <b>Kapil</b></li>
            <li><a class="nav navbar-btn" href="{{route('logout')}}">Logout</a></li>
        </ul>
    </div>
</nav>