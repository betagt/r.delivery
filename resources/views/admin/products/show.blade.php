@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_avaliacoes_show', $entity) !!}
@endsection
@section('header')
    <a href="{{ route('admin.avaliacoes.create') }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Novo Registro</a>
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
                <td>Questão</td>
                <td>{{ $entity->questao }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if ($entity->status == 1)
                        <span class="label label-success"><i class="fa fa-check"></i> Ativo</span>
                    @else
                        <span class="label label-warning"><i class="fa fa-exclamation"></i> Inativo</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
@endsection
@section('footer')
    <a href="{{ route('admin.avaliacoes.index') }}" class="btn btn-default">
        <i class="fa fa-list-ul"></i>
        Listar Registros
    </a>
    <a href="{{ route('admin.avaliacoes.edit', ['id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-pencil"></i> Alterar Registro
    </a>
    <a href="{{ route('admin.avaliacoes.destroy', [ 'id' => $entity->id]) }}" class="btn btn-danger delete">
        <i class="fa fa-close"></i> Excluir
    </a>
@endsection