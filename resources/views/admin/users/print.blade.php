@extends('admin.base.print')
@section('content')
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-print"></i> Dados do Usuário: {{ $entity->name }}
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
                        <td>Nome</td>
                        <td>{{ $entity->name }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ $entity->email }}</td>
                    </tr>
                    <tr>
                        <td>Data de Nascimento</td>
                        <td>{{ $entity->data_nascimento }}</td>
                    </tr>

                    <tr>
                        <td>Sexo</td>
                        <td>
                            @if ($entity->sexo == 'M')
                                Masculino
                            @else
                                Feminino
                            @endif
                        </td>
                    </tr>
                    @if($entity->telefone_celular)
                        <tr>
                            <td>Telefone Celular</td>
                            <td>{{ $entity->telefone_celular }}</td>
                        </tr>
                    @endif
                    @if($entity->telefone_fixo)
                        <tr>
                            <td>Telefone Fixo</td>
                            <td>{{ $entity->telefone_fixo }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
@endsection