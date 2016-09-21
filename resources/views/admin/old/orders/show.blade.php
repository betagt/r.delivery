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
                <td>Número do Pedido</td>
                <td>#{{$entity->id}}</td>
            </tr>
            <tr>
                <td>Cliente</td>
                <td>{{$entity->client->user->name}}</td>
            </tr>
            <tr>
                <td>Estabelecimento</td>
                <td>{{$entity->estabelecimento->nome}}</td>
            </tr>
            <tr>
                <td>Entregar em:</td>
                <td>
                    <p>
                        <b>Entregar em:</b><br>
                        {{$entity->client->address}} - {{$entity->client->city}} - {{$entity->client->state}}
                    </p>
                </td>
            </tr>
            <tr>
                <td>Entregador</td>
                <td>
                    @if($entity->deliveryman)
                        {{$entity->deliveryman->name}}
                    @else
                        ---
                    @endif
                </td>
            </tr>
            @if ($entity->cupom)
                <tr>
                    <td>Cupom</td>
                    <td>
                        <strong>Código: </strong> {{ $entity->cupom->code }} <br />
                        <strong>Valor: </strong> R$ {{$entity->valor}}
                    </td>
                </tr>
            @endif
            @if ($entity->items)
                <tr>
                    <td>Ítens do Pedido</td>
                    <td>
                        <ol>
                            @foreach($entity->items as $itemOrder)
                                <li>{{$itemOrder->product->name}}</li>
                            @endforeach
                        </ol>
                    </td>
                </tr>
            @endif
            <tr>
                <td>Valor do Pedido</td>
                <td>R$ {{$entity->total}}</td>
            </tr>
            <tr>
                <td>Gerado em: </td>
                <td>{{$entity->created_at->format('d/m/Y H:i:s')}}</td>
            </tr>
            <tr>
                <td>Status do Pedido: </td>
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
            </tr>
            @if ($entity->avaliacao)
                <tr>
                    <td>Avaliação </td>
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
    <a href="{{ route('admin.orders.destroy', [ 'id' => $entity->id]) }}" class="btn btn-danger delete">
        <i class="fa fa-close"></i> Excluir
    </a>
@endsection