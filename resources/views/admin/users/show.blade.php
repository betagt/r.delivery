@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_users_show', $entity) !!}
@endsection
@section('header')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-flat mt mb"><i class="fa fa-plus"></i> Novo Registro</a>
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
@endsection
@section('footer')
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
        <i class="fa fa-list-ul"></i>
        Listar Registros
    </a>
    <a href="{{ route('admin.users.print', [ 'id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-print"></i> Imprimir
    </a>
@endsection