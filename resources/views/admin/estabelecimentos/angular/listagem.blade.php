<button class="btn btn-primary btn-flat mb" ng-click="novo();">
    <span class="fa fa-plus"></span> Novo
</button>
<input type="text" ng-model="search" class="form-control" placeholder="Pesquisar Estabelecimentos"/>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Opções</th>
    </tr>
    </thead>
    <tbody>
    <tr dir-paginate="item in listagem.data | itemsPerPage: perPage | filter: search" total-items="total" current-page="pagination.current">
        <td>@{{ item.nome }} <br>
            @{{ item.email }} <br>
            @{{ item.telefone }}
        </td>
        <td>
            <button class="btn btn-default" ng-click="loadEntity(item);">
                <span class="fa fa-search"></span>
            </button>
            <button class="btn btn-danger" ng-click="removeEntity(item);">
                <span class="fa fa-close"></span>
            </button>
        </td>
    </tr>
    </tbody>
</table>
<dir-pagination-controls on-page-change="pageChanged(newPageNumber)"></dir-pagination-controls>