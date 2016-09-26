@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_orders_show', $entity) !!}
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
            <tr>
                <td>Cliente</td>
                <td>{{ $entity->client->name }}</td>
            </tr>
            <tr>
                <td>Entregado</td>
                <td>
                    @if ($entity->user_deliveryman_id)
                        {{ $entity->deliveryman->name }}
                    @else
                        <span class="label label-default"><i class="fa fa-exclamation"></i> Aguardando Definição</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Items</td>
                <td>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Porção</th>
                            <th>Preço</th>
                            <th>Qtde</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entity->items as $product)
                            <tr>
                                <td>{{ $product->product->name }}</td>
                                <td>{{ $product->porcao_category_id }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->qtd }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>Taxa de Entrega</td>
                <td>{{ $entity->taxa_entrega }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>{{ $entity->total }}</td>
            </tr>
            <td>
                @if ($entity->status == 1)
                    <span class="label label-success"><i class="fa fa-check"></i> Entregue</span>
                @else
                    <span class="label label-warning"><i class="fa fa-exclamation"></i> Aguardando Entrega</span>
                @endif
            </td>
        </tbody>
    </table>
@endsection
@section('footer')
    <a href="{{ route('admin.orders.index') }}" class="btn btn-default">
        <i class="fa fa-list-ul"></i>
        Listar Registros
    </a>
    <a href="{{ route('admin.orders.edit', ['id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-pencil"></i> Alterar Registro
    </a>
    <a href="{{ route('admin.orders.destroy', [ 'id' => $entity->id]) }}" class="btn btn-danger delete">
        <i class="fa fa-close"></i> Excluir
    </a>
@endsection