<nav class="sidebar">
    <div class="sidebar-header">
		<a href="#" class="sidebar-brand">
			Infia <span>Dashboard</span>
		</a>

		<div class="sidebar-toggler not-active">
			<span></span>
			<span></span>
			<span></span>
		</div>
    </div>
    <div class="sidebar-body">
		<ul class="nav">
			<li class="nav-item nav-category">Home</li>
			<li class="nav-item {{ (\Str::of(\Request::route()->getName())->contains('home')) ? 'active' : '' }}">
				<a href="{{ route('home') }}" class="nav-link">
					<i class="link-icon" data-feather="home"></i>
					<span class="link-title">Dashboard</span>
				</a>
			</li>
			<li class="nav-item nav-category">Management</li>
			<li class="nav-item {{ (\Str::of(\Request::route()->getName())->contains('career')) ? 'active' : '' }}">
				<a href="{{ route('career.list') }}" class="nav-link">
					<i class="link-icon" data-feather="briefcase"></i>
					<span class="link-title">Career</span>
				</a>
			</li>
			<li class="nav-item {{ (\Str::of(\Request::route()->getName())->contains('article')) ? 'active' : '' }}">
				<a href="{{ route('article.list') }}" class="nav-link">
					<i class="link-icon" data-feather="book"></i>
					<span class="link-title">Article</span>
				</a>
			</li>
			<li class="nav-item {{ (\Str::of(\Request::route()->getName())->contains('user')) ? 'active' : '' }}">
				<a href="{{ route('user.list') }}" class="nav-link">
					<i class="link-icon" data-feather="user"></i>
					<span class="link-title">Admin</span>
				</a>
			</li>
            <li class="nav-item {{ (\Str::of(\Request::route()->getName())->contains('applicant')) ? 'active' : '' }}">
                <a href="{{ route('applicant.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="clipboard"></i>
                    <span class="link-title">Applicants</span>
                </a>
            </li>
		</ul>

		{{-- <pre>
			{{\Str::of(\Request::route()->getName())}}
		</pre> --}}
    </div>
</nav>
