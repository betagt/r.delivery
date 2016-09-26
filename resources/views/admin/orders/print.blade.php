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
                                 <strong>Aguardando Definição</strong>
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
                    <tr>
                        <td>Status do Pedido: </td>
                        <td>
                            @if($entity->status == 0)
                                Pendente
                            @elseif ($entity->status == 1)
                                A Caminho
                            @elseif ($entity->status == 2)
                                Entregue
                            @elseif ($entity->status == 3)
                                Cancelado
                            @endif
                        </td>
                    </tr>

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
            </div>
            <!-- /.col -->
        </div>
@endsection