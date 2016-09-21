@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_cupons_show', $entity) !!}
@endsection
@section('header')
    <a href="{{ route('admin.cupons.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Novo Registro</a>
@endsection
@section('list')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @if ($entity->order)
                <tr>
                    <td colspan="2">Pedido</td>
                </tr>
                <tr>
                    <td>Detalhes</td>
                    <td>
                        <p>
                            <strong>#{{ $entity->order->id }}</strong><br />
                            <strong>Entregador: </strong>$entity->order->estabelecimento->nome <br />
                            <strong>Cliente: </strong>$entity->order->client->user->name <br />
                            <strong>Entregador: </strong>$entity->order->deliveryman->name <br />
                            <strong>Total: </strong>$entity->order->total <br />
                            <strong>Status: </strong>
                            @if($entity->order->status == 0)
                                <span class="label label-warning"><i class="fa fa-exclamation-circle"></i> Pendente</span>
                            @elseif ($entity->order->status == 1)
                                <span class="label label-info"><i class="fa fa-motorcycle"></i> A Caminho</span>
                            @elseif ($entity->order->status == 2)
                                <span class="label label-success"><i class="fa fa-check-circle"></i> Entregue</span>
                            @elseif ($entity->order->status == 3)
                                <span class="label label-danger"><i class="fa fa-times"></i> Cancelado</span>
                            @endif

                        </p>
                    </td>
                </tr>
            @endif
            <tr>
                <td>Código</td>
                <td>{{ $entity->code }}</td>
            </tr>
            <tr>
                <td>Valor</td>
                <td>{{ $entity->value }}</td>
            </tr>
        </tbody>
    </table>
@endsection
@section('footer')
    <a href="{{ route('admin.cupons.index') }}" class="btn btn-default">
        <i class="fa fa-list-ul"></i>
        Listar Registros
    </a>
    <a href="{{ route('admin.cupons.edit', ['id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-pencil"></i> Alterar Registro
    </a>
    <a href="{{ route('admin.cupons.destroy', [ 'id' => $entity->id]) }}" class="btn btn-danger delete">
        <i class="fa fa-close"></i> Excluir
    </a>
@endsection