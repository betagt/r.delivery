@extends('admin.base.list_2')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_estabelecimentos_show', $entity) !!}
@endsection
@section('header')
    <a href="{{ route('admin.estabelecimentos.create') }}" class="btn btn-primary btn-flat mb"><i
                class="fa fa-plus"></i> Novo Registro</a>
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
            <td>Icone</td>
            <td><img src="{{ $entity->icone }}" alt="{{ $entity->icone }}"></td>
        </tr>
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
                    <span class="label label-success"><i class="fa fa-toggle-on"></i> Aberto</span>
                @else
                    <span class="label label-default"><i class="fa fa-toggle-off"></i> Fechado</span>
                @endif
            </td>
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
@section('options')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tags"></i> Categorias</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="box-body" style="display: block;">
            <ul class="list-group">
            	<li class="list-group-item">
                    <a href="{{ route('admin.estabelecimentos.categories.index', ['estabelecimento_id' => $entity->id]) }}">
                        <i class="fa fa-list"></i> Listagem
                    </a>
                </li>
            	<li class="list-group-item">
                    <a href="{{ route('admin.estabelecimentos.categories.create', ['estabelecimento_id' => $entity->id]) }}" >
                        <i class="fa fa-plus"></i> Novo
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </div>
@endsection
@section('footer')
    <a href="{{ route('admin.estabelecimentos.index') }}" class="btn btn-default">
        <i class="fa fa-list-ul"></i>
        Listar Registros
    </a>
    <a href="{{ route('admin.estabelecimentos.edit', ['id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-pencil"></i> Alterar Registro
    </a>
    <a href="{{ route('admin.estabelecimentos.print', ['id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-print"></i> Imprimir
    </a>
    <a href="{{ route('admin.estabelecimentos.destroy', [ 'id' => $entity->id]) }}" class="btn btn-danger delete">
        <i class="fa fa-close"></i> Excluir
    </a>
@endsection