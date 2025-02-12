<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #006400;">
        <div class="container">
            <!-- Logo Section -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/ZEAT LOGO.png') }}" alt="Logo" style="width: 80px; height: auto; max-height: 80px;" />
                <span class="ml-2">ZEAT: Zero-Eat</span>
            </a>

            <!-- Hamburger Menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <!-- Authenticated User Links -->
                        <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="nav-item {{ Route::currentRouteName() == 'recommendations' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('recommendations') }}">Recommendations</a>
                        </li>

                        <li class="nav-item {{ Route::currentRouteName() == 'achievements' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('achievements') }}">Achievements</a>
                        </li>

                        <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">About Us</a>
                        </li>

                        <!-- Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                <form action="{{ route('user.logout') }}" method="POST" id="logout-form" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </li>
                    @endauth

                    @guest
                        <!-- Guest User Links (Login and Register) -->
                        <li class="nav-item {{ Route::currentRouteName() == 'login' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'register' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
