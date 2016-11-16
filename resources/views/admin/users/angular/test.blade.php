@extends('admin.base.template')
@section('content')
    <section ng-app="app">
        <div class="row" ng-controller="TestController" ng-init="init(1);">
            <div ng-class="column">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Categorias dos Produtos
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <button class="btn btn-primary btn-flat" ng-click="novo();">
                            <i class="fa fa-plus"></i> Adicionar Categoria
                        </button>
                        <div class="form-group has-feedback mt">
                            <label for="search">Filtrar Categoria:</label>
                            <input type="text" name="search" class="form-control"
                                   placeholder="Informe o nome da categoria"
                            />
                            <span class="fa fa-search form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Categoria Responsável</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="item in lista.data|filter:search">
                                <td>@{{ item.id }}</td>
                                <td>@{{ item.name }}</td>
                                <td>
                                    <div ng-switch on="item.parent_id">
                                        <div ng-switch-when="0">
                                            Categoria Principal
                                        </div>
                                        <div ng-switch-default>
                                            @{{ item.parent.data.name }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-default btn-flat" ng-click="novo(item.id);"
                                            data-toggle="tooltip" data-placement="top" title="Adicionar Sub Categoria"
                                    >
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button class="btn btn-default btn-flat"
                                            data-toggle="tooltip" data-placement="top" title="Alterar Categoria"
                                    >
                                        <i class="fa fa-pencil"></i>
                                    </button>

                                    <button class="btn btn-default btn-flat"
                                            data-toggle="tooltip" data-placement="top" title="Adicionar Produto"
                                    >
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button class="btn btn-danger btn-flat"
                                            data-toggle="tooltip" data-placement="top" title="Excluir Categoria"
                                    >
                                        <i class="fa fa-close"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="overlay" ng-show="loadList">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection