@extends('admin.base.template')
@yield('breadcrumbs')
@section('content')
    @if(Auth::user()->role == 'admin')
        @include('admin.dashboard.admin')
    @endif
    @if(Auth::user()->role == 'estabelecimento')
        @include('admin.dashboard.estabelecimento')
    @endif
@endsection