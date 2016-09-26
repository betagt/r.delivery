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
                <td>
                    {{ $entity->client->name }}
                </td>
            </tr>

            <tr>
                <td>Entregador</td>
                <td>
                    @if ($entity->user_deliveryman_id)
                        {{ $entity->deliveryman->name }}
                    @else
                        <span class="label label-default"><i class="fa fa-exclamation"></i> Aguardando Definição</span>
                    @endif
                </td>
            </tr>
            @if ($entity->deliveryAddresses)
            <tr>
                <td>Dados para entrega:</td>
                <td>
                    @foreach($entity->deliveryAddresses as $item)
                        <strong>Endereço: </strong>{{ $item->address }}  <br>
                        <strong>Complemento: </strong>{{ $item->complement }} <br>
                        <strong>Ponto de Referência: </strong>{{ $item->reference_point }} <br>
                        <strong>Número: </strong>{{ $item->number }} <br>
                        <strong>Bairro: </strong>{{ $item->neighborhood }} <br>
                        <strong>Cidade: </strong>{{ $item->city }}/{{ $item->state }} <br>
                        <strong>CEP: </strong> {{ $item->zipcode }} <br><br>
                    @endforeach
                </td>
            </tr>
            @endif
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
                @if($entity->status == 0)
                    <span class="label label-warning"><i class="fa fa-exclamation-circle"></i> Pendente</span>
                @elseif ($entity->status == 1)
                    <span class="label label-info"><i class="fa fa-motorcycle"></i> A Caminho</span>
                @elseif ($entity->status == 2)
                    <span class="label label-success"><i class="fa fa-check-circle"></i> Entregue</span>
                @elseif ($entity->status == 3)
                    <span class="label label-danger"><i class="fa fa-times"></i> Cancelado</span>
                @endif
            </td>
            @if($entity->avaliacao)
                <tr>
                    <td>Avaliação</td>
                    <td>
                        @foreach($entity->avaliacao->items as $item)
                            <p>
                                <strong>Questão: </strong>{{ $item->questao }} <br />
                                <strong>Nota: </strong>
                                @if ($item->pivot->nota == 1)
                                    <i class="fa fa-star"></i>
                                @elseif ($item->pivot->nota == 2)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @elseif ($item->pivot->nota == 3)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @elseif ($item->pivot->nota == 4)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @elseif ($item->pivot->nota == 5)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                @else
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                @endif
                            </p>
                        @endforeach
                        <p>
                            <strong>Mensagem: </strong>{{ $entity->avaliacao->mensagem }} <br />
                            <strong>Média Final: </strong>
                            @if ($entity->avaliacao->total == 1)
                                <i class="fa fa-star"></i>
                            @elseif ($entity->avaliacao->total == 2)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            @elseif ($entity->avaliacao->total == 3)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            @elseif ($entity->avaliacao->total == 4)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            @elseif ($entity->avaliacao->total == 5)
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            @else
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            @endif
                        </p>
                    </td>
                </tr>
            @endif
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
    <a href="{{ route('admin.orders.print', ['id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-print"></i> Imprimir
    </a>
@endsection