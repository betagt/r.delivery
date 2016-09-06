@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Pedido: #{{$entity->id}}.
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
                            <td>Número do Pedido</td>
                            <td>#{{$entity->id}}</td>
                        </tr>
                        <tr>
                            <td>Cliente</td>
                            <td>{{$entity->client->user->name}}</td>
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
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
@endsection