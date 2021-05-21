@extends('admin.layouts.app')

@section('title')
    | Home
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
@endsection

@section('customjs')
    <script src="{{ asset('admins/assets/js/page/events/list.js')}}"></script>
@endsection

