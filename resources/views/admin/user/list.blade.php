@extends('admin.layouts.app')

@section('title')
    | Team
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Team Management</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-10 grid-margin strectch-card"></div>
        <div class="col-md-2 grid-margin strecth-card">
            <a href="{{ route('user.create') }}" class="btn btn-primary"><i data-feather="plus"></i> Create Admin</a>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="dataTableUser" class="table" data-url="{{ route('user.data') }}">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('customjs')
    <script src="{{ asset('admins/assets/js/page/user/list.js')}}"></script>
@endsection

