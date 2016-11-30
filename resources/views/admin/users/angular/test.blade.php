@extends('admin.base.template')
@section('content')
    <section ng-app="app">
        <div class="row" ng-controller="TestController" ng-init="init({{ $entity->id }});">
            <div ng-class="column" ng-show="edit">
                @include('admin.users.angular.categoria_form')
            </div>
            <div ng-class="column" ng-show="editProdutro">
                @include('admin.users.angular.categoria_form')
            </div>
            <div ng-class="column">
                <div class="box box-warning">
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
                        <button class="btn btn-warning btn-flat" ng-click="novo();">
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
                                <th>Nome</th>
                                <th>Categoria Responsável</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="item in lista.data|filter:search">
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-warning btn-flat dropdown-toggle" type="button" id="dropdownMenu_@{{ item.id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-gears"></i> Opções
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu_@{{ item.id }}">
                                            <li><a href="#" ng-click="novo(item.id);"><i class="fa fa-plus"></i> Incluir Sub Categoria</a></li>
                                            <li><a href="#" ng-click="loadEntity(item)"><i class="fa fa-pencil"></i> Alterar Categoria</a></li>
                                            <li><a href="#"  ng-click="loadEntity(item)"><i class="fa fa-close"></i> Excluir Categoria</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#"><i class="fa fa-plus"></i> Adicionr Produto</a></li>
                                        </ul>
                                    </div>
                                </td>
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