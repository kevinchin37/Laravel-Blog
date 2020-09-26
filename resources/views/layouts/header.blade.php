<nav id="main-menu" class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="/posts">Site Title</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/posts">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Another Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Testing</a>
            </li>
        </ul>
    </div>

    <div class="user-menu">
        <div class="collapse navbar-collapse">
            @if (Auth::check())
                <div class="avatar-wrapper">
                    <avatar image="{{ auth()->user()->avatar }}" size="small"></avatar>
                </div>
                <span class="welcome-msg">Hi {{ auth()->user()->name }}</span>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Edit Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Log Out</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav">
                    <li>
                        <a class="nav-link" href="/login">Log In</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>

</nav>
