@extends('admin.layouts.app')

@section('title')
    | Applicant
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Applicant</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="dataTableEvent" class="table" data-url="{{ route('applicant.data') }}">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Current Company</th>
                            <th>Portfolio link</th>
                            <th>CV</th>
                            <th>letter</th>
                            <th>Created at</th>
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
    <script src="{{ asset('admins/assets/js/page/applicant/list.js')}}"></script>
@endsection

