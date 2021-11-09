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
                    <li><a href="#">Profile</a></li>
                    <li>
                        <form action="{{ route('logout.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-hover"><span>Logout</span></button>
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
