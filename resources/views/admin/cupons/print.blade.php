@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Cupom: {{ $entity->name }}.
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
            </div>
            <!-- /.col -->
        </div>
@endsection