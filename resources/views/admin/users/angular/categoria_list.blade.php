<div class="form-group mb">
    <label>Filtrar Categorias</label>
    <input type="text" ng-model="search" class="form-control" placeholder="Especifique o nome da categoria"/>
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Opções</th>
    </tr>
    </thead>
    <tbody>
    <tr dir-paginate="item in listagem.data | itemsPerPage: perPage | filter: search"
        total-items="total" current-page="pagination.current">
        <td>
            @{{ item.name }}
        </td>
        <td>
            <button class="btn btn-primary btn-flat btn-sm"
                    data-toggle="tooltip" data-placement="top" title="Nova Sub Categoria"
                    ng-click="novo(item.id);"
            >
                <span class="fa fa-plus"></span>
            </button>
            <button class="btn btn-default btn-flat btn-sm"
                    data-toggle="tooltip" data-placement="top" title="Alterar Categoria: @{{ item.name }}"
                    ng-click="loadEntity(item);"
            >
                <span class="fa fa-pencil"></span>
            </button>
            <button class="btn btn-danger btn-flat btn-sm"
                    data-toggle="tooltip" data-placement="top" title="Excluir Categoria: @{{ item.name }}"
                    ng-click="delete($index, item);"
            >
                <span class="fa fa-close"></span>
            </button>
        </td>
    </tr>
    </tbody>
</table>
{{--<dir-pagination-controls on-page-change="pageChanged(newPageNumber)"></dir-pagination-controls>--}}
