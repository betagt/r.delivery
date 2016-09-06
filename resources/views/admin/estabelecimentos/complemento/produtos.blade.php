<a href="{{ route('admin.estabelecimentos.products.create', [ 'estabelecimentoId' => $entity->id ]) }}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Novo Produto</a>
<h2>Produtos do Estabelecimento</h2>
<hr>
{!! Form::open(['method' => 'post', 'route' => ['admin.estabelecimentos.products.destroy', $entity->id ], 'id' => 'formfield']) !!}
<table id="produtos" class="table table-hover">
    <thead>
    <tr>
        <th><input type="checkbox" name="all" id="all" data-toggle="tooltip" data-placement="top" title="Marcar/Desmarcar Todos"></th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Opções</th>
    </tr>
    </thead>
    <tbody>
    @foreach($entity->produtos as $item)
        <tr>
            <td><input type="checkbox" name="id[]" value="{{ $item->id }}" class="item"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>
                <a href="{{ route('admin.estabelecimentos.products.show', [ 'estabelecimentoId' => $entity->id, 'id' => $item->id ]) }}" class="btn btn-default"
                   data-toggle="tooltip" data-placement="top" target="_blank" title="Visualizar #{{ $item->id }}"
                >
                    <i class="fa fa-search"></i>
                </a>
                <a href="{{ route('admin.estabelecimentos.products.print', [ 'estabelecimentoId' => $entity->id, 'id' => $item->id ]) }}" class="btn btn-default"
                   data-toggle="tooltip" data-placement="top" target="_blank" title="Imprimir #{{ $item->id }}"
                >
                    <i class="fa fa-print"></i>
                </a>
                <a href="{{ route('admin.estabelecimentos.products.edit', [ 'estabelecimentoId' => $entity->id, 'id' => $item->id ]) }}" class="btn btn-default"
                   data-toggle="tooltip" data-placement="top" target="_blank" title="Editar #{{ $item->id }}"
                >
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="{{ route('admin.estabelecimentos.products.destroy', [ 'estabelecimentoId' => $entity->id, 'id' => $item->id]) }}" class="btn btn-danger delete"
                   data-toggle="tooltip" data-placement="top" title="Excluir #{{ $item->id }}"
                >
                    <i class="fa fa-close"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="form-group">
    <button id="delete-selecionados" class="btn btn-flat btn-danger">
        <i class="fa fa-times"></i> Excluir Registros Selecionados
    </button>
</div>
{!! Form::close() !!}