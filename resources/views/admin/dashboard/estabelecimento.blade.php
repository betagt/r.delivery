<div ng-view></div>
    {{--<!-- Default box -->--}}
    {{--<div class="box box-primary">--}}
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Listagem de Pedidos</h3>--}}
            {{--<div class="box-tools pull-right">--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"--}}
                        {{--title="Collapse">--}}
                    {{--<i class="fa fa-minus"></i>--}}
                {{--</button>--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"--}}
                        {{--title="Remove">--}}
                    {{--<i class="fa fa-times"></i>--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="box-body">--}}
            {{--@include('admin.base.message')--}}
            {{--@if($orders->total() == 0)--}}
                {{--<div class="callout callout-info">--}}
                    {{--<h4>Atenção</h4>--}}
                    {{--<p>Você não possuí pedidos para liberação</p>--}}
                {{--</div>--}}
            {{--@else--}}
                {{--<table class="table table-hover">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>ID</th>--}}
                        {{--<th>Cliente</th>--}}
                        {{--<th>Produtos</th>--}}
                        {{--<th>Total</th>--}}
                        {{--<th>Taxa</th>--}}
                        {{--<th>Entregador</th>--}}
                        {{--<th>Status</th>--}}
                        {{--<th>Ação</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($orders as $item)--}}
                        {{--<tr>--}}
                            {{--<td>{{$item->id}}</td>--}}
                            {{--<td>--}}
                                {{--{{$item->client->name}}--}}
                                {{--@if ($item->avaliacao)--}}
                                    {{--<br>--}}
                                    {{--<strong>Avaliação: </strong>--}}
                                    {{--@if ($item->avaliacao->total == 1)--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                    {{--@elseif ($item->avaliacao->total == 2)--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                    {{--@elseif ($item->avaliacao->total == 3)--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                    {{--@elseif ($item->avaliacao->total == 4)--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                    {{--@elseif ($item->avaliacao->total == 5)--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                        {{--<i class="fa fa-star"></i>--}}
                                    {{--@else--}}
                                        {{--<i class="fa fa-star-o"></i>--}}
                                        {{--<i class="fa fa-star-o"></i>--}}
                                        {{--<i class="fa fa-star-o"></i>--}}
                                        {{--<i class="fa fa-star-o"></i>--}}
                                        {{--<i class="fa fa-star-o"></i>--}}
                                    {{--@endif--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--@foreach($item->items as $product)--}}
                                    {{--{{ $product->product->name }} <br>--}}
                                {{--@endforeach--}}
                            {{--</td>--}}
                            {{--<td>{{$item->total}}</td>--}}
                            {{--<td>{{$item->taxa_entrega}}</td>--}}
                            {{--<td>--}}
                                {{--@if ($item->user_deliveryman_id)--}}
                                    {{--{{ $item->deliveryman->name }}--}}
                                {{--@else--}}
                                    {{--<span class="label label-default"><i--}}
                                                {{--class="fa fa-exclamation"></i> Aguardando Definição</span>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--@if($item->status == 0)--}}
                                    {{--<span class="label label-warning"><i--}}
                                                {{--class="fa fa-exclamation-circle"></i> Pendente</span>--}}
                                {{--@elseif ($item->status == 1)--}}
                                    {{--<span class="label label-info"><i class="fa fa-motorcycle"></i> A Caminho</span>--}}
                                {{--@elseif ($item->status == 2)--}}
                                    {{--<span class="label label-success"><i class="fa fa-check-circle"></i> Entregue</span>--}}
                                {{--@elseif ($item->status == 3)--}}
                                    {{--<span class="label label-danger"><i class="fa fa-times"></i> Cancelado</span>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{route('admin.orders.edit',['id'=>$item->id])}}" class="btn btn-default"--}}
                                   {{--data-toggle="tooltip" data-placement="top" target="_blank"--}}
                                   {{--title="Editar #{{ $item->id }}"--}}
                                {{-->--}}
                                    {{--<i class="fa fa-pencil"></i>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('admin.orders.show',['id'=>$item->id])}}" class="btn btn-default"--}}
                                   {{--data-toggle="tooltip" data-placement="top" target="_blank"--}}
                                   {{--title="Visualizar #{{ $item->id }}"--}}
                                {{-->--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('admin.orders.print',['id'=>$item->id])}}" class="btn btn-default"--}}
                                   {{--data-toggle="tooltip" data-placement="top" target="_blank"--}}
                                   {{--title="Imprimir #{{ $item->id }}"--}}
                                {{-->--}}
                                    {{--<i class="fa fa-print"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
        {{--</div>--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--<!-- /.box-body -->--}}
    {{--<div class="box-footer">--}}
        {{--{!! $orders->render() !!}--}}
    {{--</div>--}}
    {{--<!-- /.box-footer-->--}}
    {{--</div>--}}
    {{--<!-- /.box -->--}}
