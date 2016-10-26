@extends('admin.base.template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_home') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{!! $orders->total() !!}</h3>
                    <p>Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="small-box-footer">
                    Detalhes do Módulo <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{!! $clients->total() !!}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                    Detalhes do Módulo <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{!! $estabelecimentos->total() !!}</h3>
                    <p>Establecimentos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
                <a href="{{ route('admin.estabelecimentos.index') }}" class="small-box-footer">
                    Detalhes do Módulo <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

@endsection