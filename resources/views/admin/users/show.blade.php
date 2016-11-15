@extends('admin.base.template')
@if (Auth::user()->role == 'estabelecimento')
    @include('admin.users.estabelecimento_show')
@else
    @include('admin.users.admin_show')
@endif