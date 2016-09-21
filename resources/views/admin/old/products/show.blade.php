@extends('admin.base.list')
@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_estabelecimentos_products_show', $entity, $relation) !!}
@endsection
@section('header')
    <a href="{{ route('admin.estabelecimentos.products.create', [ 'estabelecimentoId' => $relation->id ]) }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Novo Registro</a>
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
@endsection
@section('footer')
    <a href="{{ route('admin.estabelecimentos.show', [ 'id' => $relation->id ]) }}" class="btn btn-default">
        <i class="fa fa-search"></i>
        Estabelecimento Comercial
    </a>
    <a href="{{ route('admin.estabelecimentos.products.edit', [ 'estabelecimentoId' => $relation->id, 'id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-pencil"></i> Alterar Registro
    </a>
    <a href="{{ route('admin.estabelecimentos.products.print', [ 'estabelecimentoId' => $relation->id, 'id' => $entity->id]) }}" class="btn btn-default">
        <i class="fa fa-print"></i> Imprimir
    </a>
    <a href="{{ route('admin.estabelecimentos.products.destroy', [ 'estabelecimentoId' => $relation->id, 'id' => $entity->id]) }}" class="btn btn-danger">
        <i class="fa fa-close"></i> Excluir
    </a>
@endsection