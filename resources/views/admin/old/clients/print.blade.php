@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Cliente: {{ $entity->user->name }}.
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
                            <td colspan="2">
                                <h3>Usuário</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td>{{ $entity->user->name }}</td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>{{ $entity->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Dica de Senha</td>
                            <td>{{ $entity->user->dica_senha }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h3>Cliente</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td>{{ $entity->phone }}</td>
                        </tr>
                        <tr>
                            <td>Endereço</td>
                            <td>{{ $entity->address }}</td>
                        </tr>
                        <tr>
                            <td>CEP</td>
                            <td>{{ $entity->zipcode }}</td>
                        </tr>
                        <tr>
                            <td>Cidade/Estado</td>
                            <td>{{ $entity->city }}/{{ $entity->state }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
@endsection