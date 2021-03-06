@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_estabelecimento_categories', $relation, $entity) !!}
@endsection
@section('header')
    <a href="{{ route('admin.estabelecimentos.categories.create') }}" class="btn btn-primary btn-flat mt mb"><i class="fa fa-plus"></i>
        Novo Registro</a>
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
            <td>Categoria</td>
            <td>
                @if($entity->parent_id == 0)
                    Categoria Principal
                @else
                    <a href="{{ route('admin.estabelecimentos.categories.show', ['id' => $entity->parent_id]) }}">
                        {{ $entity->parent->name }}
                    </a>
                @endif
            </td>
            @if($entity->children)
            <tr>
                <td>Sub Categorias</td>
                <td>
                    @foreach($entity->children as $item)
                        {{ $item->name }}
                    @endforeach
                </td>
            </tr>
            @endif
            </tr>
            <tr>
                <td>Nome</td>
                <td>{{ $entity->name }}</td>
            </tr>
        </tbody>
    </table>
@endsection
@section('footer')
    <a href="{{ route('admin.estabelecimentos.categories.index') }}" class="btn btn-default">
        <i class="fa fa-list-ul"></i>
        Listar Registros
    </a>
    <a href="{{ route('admin.estabelecimentos.categories.edit', ['id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-pencil"></i> Alterar Registro
    </a>
    <a href="{{ route('admin.estabelecimentos.categories.destroy', [ 'id' => $entity->id]) }}" class="btn btn-danger delete">
        <i class="fa fa-close"></i> Excluir
    </a>
@endsection