<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Medserve - {{ Auth::user()->name ?? "Guest" }}</a>
        
        @if(Auth::check())
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/doctor/create">Doctor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/patient/create">Patient</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/department/create">Departments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/appointment/create">Book an Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/create">Users</a>
            </li>
        </ul>
        @else
        <form class="d-flex" role="search">
            <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        @endif


        <div>
            @if(Auth::check())
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>                   
            @else
            <a class="btn btn-outline-success" type="submit" href="/login">Login</a>
            @endif
        </div>
    </div>
</nav>