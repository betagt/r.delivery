@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Pedido: {{ $entity->name }}.
                    <small class="pull-right">Data do Relatório: {!! Carbon\Carbon::today()->format('d/m/Y H:i:s') !!}
                    </small>
                </h2>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table">
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
                                 <strong>Aguardando Definição</strong>
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
                            <strong>Entregue</strong>
                        @else
                            <strong>Aguardando Entrega</strong>
                        @endif
                    </td>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
@endsection