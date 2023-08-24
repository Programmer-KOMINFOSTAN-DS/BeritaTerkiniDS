<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">
            <img src="assets/img/logox.png" alt="..." class="d-none d-lg-block" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">GRAFIK TANGGAPAN</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">BERITA TERBARU</a></li>
                
                <!-- Dropdown for Register and Login -->
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->nama_lengkap }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </li>
                @endauth
                
                <!-- Dropdown for User Profile and Logout -->
                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="authDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="authDropdown">
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
