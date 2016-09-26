@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_orders') !!}
@endsection
@section('header')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h4>Pesquisar Registros</h4>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
        {!! Form::open(['method' => 'GET' ]) !!}
        <!-- Pesquisar Form Imput -->
            <div class="col-xs-6 col-sm-10 col-md-10 col-lg-10">
                {!! Form::text("search", null, ['class' => 'form-control', 'placeholder' => 'Inserir texto para consulta']) !!}
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <button type="submit" class="btn btn-default btn-flat btn-block">
                    <i class="fa fa-btn fa-search"></i> Pesquisar
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('list')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Produtos</th>
            <th>Total</th>
            <th>Taxa</th>
            <th>Entregador</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->client->name}}</td>
                <td>
                    @foreach($item->items as $product)
                        {{ $product->product->name }} <br>
                    @endforeach
                </td>
                <td>{{$item->total}}</td>
                <td>{{$item->taxa_entrega}}</td>
                <td>
                    @if ($item->user_deliveryman_id)
                        {{ $item->deliveryman->name }}
                    @else
                        <span class="label label-default"><i class="fa fa-exclamation"></i> Aguardando Definição</span>
                    @endif
                </td>
                <td>
                    @if ($item->status == 1)
                        <span class="label label-success"><i class="fa fa-check"></i> Entregue</span>
                    @else
                        <span class="label label-warning"><i class="fa fa-exclamation"></i> Aguardando Entrega</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.orders.edit',['id'=>$item->id])}}" class="btn btn-default"
                       data-toggle="tooltip" data-placement="top" target="_blank" title="Editar #{{ $item->id }}"
                    >
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="{{route('admin.orders.print',['id'=>$item->id])}}" class="btn btn-default"
                       data-toggle="tooltip" data-placement="top" target="_blank" title="Imprimir #{{ $item->id }}"
                    >
                        <i class="fa fa-search"></i>
                    </a>
                    <a href="{{route('admin.orders.show',['id'=>$item->id])}}" class="btn btn-default"
                       data-toggle="tooltip" data-placement="top" target="_blank" title="Visualizar #{{ $item->id }}"
                    >
                        <i class="fa fa-search"></i>
                    </a>
                    <a href="{{ route('admin.orders.destroy', [ 'id' => $item->id]) }}" class="btn btn-danger delete"
                       data-toggle="tooltip" data-placement="top" title="Excluir #{{ $item->id }}"
                    >
                        <i class="fa fa-close"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="form-group">
        <button id="delete-selecionados" class="btn btn-flat btn-danger">
            <i class="fa fa-times"></i> Excluir Registros Selecionados
        </button>
    </div>
@endsection
@section('footer')
    {!! $list->render() !!}
@endsection