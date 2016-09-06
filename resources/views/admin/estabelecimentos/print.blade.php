@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Estabelecimento: {{ $entity->nome }}.
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
                            <td>Ícone</td>
                            <td>{{ $entity->icone }}</td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td>{{ $entity->nome }}</td>
                        </tr>
                        <tr>
                            <td>Descrição</td>
                            <td>{{ $entity->descricao }}</td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>{{ $entity->email }}</td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td>{{ $entity->telefone }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h3>Produtos do Estabelecimento</h3>
                            </td>
                        </tr>
                        @foreach($entity->produtos as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
@endsection