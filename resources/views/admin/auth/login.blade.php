@extends('admin.layouts.appFront')

@section('title')
    | Login
@endsection

@section('content')

<div class="page-wrapper full-page">
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">

                        <div class="col-md-12 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                @error('email')
                                    <div class="alert alert-icon-danger" role="alert">
                                        <i data-feather="alert-circle"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <a href="#" class="noble-ui-logo d-block mb-2">Infia Compro <span>Dashboard</span></a>
                                <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>

                                <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email"
                                            name="email" value="{{ old('email') }}" required autofocus
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password"
                                            name="password" required
                                        >
                                    </div>
                                    @error('password')
                                        <div class="alert alert-icon-danger" role="alert">
                                            <i data-feather="alert-circle"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
