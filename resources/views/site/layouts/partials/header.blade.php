<div class="pos-f-t nav-group pt-4">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="b-dark-blue p-4">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white fw-700" href="{{ route("site.index") }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-700" href="{{ route("site.portfolio") }}">Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-700 disabled" href="{{ route("site.blog") }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-700 disabled" href="{{ route("site.careers") }}">Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-700 disabled" href="{{ route("site.about") }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-700 disabled" href="{{ route("site.contact") }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-dark b-dark-blue">
        <a class="navbar-brand w-50" href="{{ route('site.index') }}">
            <img src="{{ asset("site/assets/logo-white.png") }}" alt="Infia-Logo" class="logo">
        </a>

        <button class="navbar-toggler b-green rounded-0" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>
