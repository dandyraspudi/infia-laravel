<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">

        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    @auth
                        @if (empty(Auth::user()->avatar))
                            <img src="https://via.placeholder.com/30x30" alt="profile">
                        @else
                            <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="">
                        @endif
                    @endauth
                    @guest
                        <img src="https://via.placeholder.com/30x30" alt="profile">
                    @endguest
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            @auth
                                @if (empty(Auth::user()->avatar))
                                    <img src="https://via.placeholder.com/80x80" alt="Avatar">
                                @else
                                    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="">
                                @endif
                            @endauth
                            @guest
                                <img src="https://via.placeholder.com/80x80" alt="">
                            @endguest
                        </div>
                        <div class="info text-center">
                            <p class="name font-weight-bold mb-0">
                                @auth
                                    {{ Auth::user()->name }}
                                @endauth
                            </p>
                            <p class="email text-muted mb-3">
                                @auth
                                    {{ Auth::user()->email }}
                                @endauth
                            </p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">

                            <li class="nav-item">
                                <a href="edit-profile.html" class="nav-link">
                                    <i data-feather="edit"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
