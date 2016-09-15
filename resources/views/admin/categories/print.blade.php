@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Produto: {{ $entity->name }}.
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
                            <td>Estabelecimento Comercial</td>
                            <td>{{ $entity->estabelecimento->nome }}</td>
                        </tr>
                        <tr>
                            <td>Categoria</td>
                            <td>{{ $entity->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td>{{ $entity->name }}</td>
                        </tr>
                        <tr>
                            <td>Descrição</td>
                            <td>{{ $entity->description }}</td>
                        </tr>
                        <tr>
                            <td>Preço</td>
                            <td>{{ $entity->price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
@endsection