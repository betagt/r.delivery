@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Produto: {{ $entity->nome }}.
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
                            <td>Cidade</td>
                            <td>{{ $entity->cidade->nome }}/{{ $entity->cidade->estado->uf }}</td>
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
                            <td>Telefone</td>
                            <td>{{ $entity->telefone }}</td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>{{ $entity->email }}</td>
                        </tr>
                        <tr>
                            <td>Situação do Estabelecimento</td>
                            <td>
                                @if ($entity->power == 1)
                                    Aberto
                                @else
                                    Fechado
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if ($entity->status == 1)
                                    Ativo
                                @else
                                    Inativo
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
@endsection