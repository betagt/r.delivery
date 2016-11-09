@extends('admin.base.template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_home') !!}
@endsection
@section('content')
    @if(Auth::user()->role == 'admin')
        @include('admin.dashboard.admin')
    @endif
    @if(Auth::user()->role == 'estabelecimento')
        @include('admin.dashboard.estabelecimento')
    @endif
@endsection