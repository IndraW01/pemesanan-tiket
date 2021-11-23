<div class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="#" class="logo">
                <i class='bx bx-movie-play bx-tada main-color'></i>Fl<span class="main-color">i</span>x ID
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="{{ route('films.index') }}">Home</a></li>
                <li><a href="#">Genre</a></li>
                @auth
                    @can('admin')
                    <li><a href="{{ route('dashboard.admin.index') }}">Profile</a></li>
                    @else
                    <li><a href="{{ route('dashboard.user.index') }}">Profile</a></li>
                    @endcan
                    <li>
                        <form action="{{ route('logout.logout') }}" id="logoutform" method="POST">
                            @csrf
                            <button type="button" class="btn btn-hover" id="btn-logout"><span>Logout</span></button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login.index') }}" class="btn btn-hover">
                            <span>Sign in</span>
                        </a>
                    </li>
                @endauth
            </ul>
            <!-- MOBILE MENU TOGGLE -->
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger"></div>
            </div>
        </div>
    </div>
</div>
