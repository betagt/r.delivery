@extends('admin.base.template_angular')
@section('content')
    <section ng-controller="EstabelecimentoController">
        <div class="row">
            <div class="col-sm-6">
                <button class="btn btn-primary btn-flat mb" ng-click="Novo();">
                    <span class="fa fa-search"></span> Novo
                </button>
                <input type="text" ng-model="search" class="form-control" placeholder="Search"/>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="item in listagem.data | filter: search">
                            <td>@{{ item.nome }} <br>
                                @{{ item.email }} <br>
                                @{{ item.telefone }}
                            </td>
                            <td>
                                <button class="btn btn-default" ng-click="loadEntity(item);">
                                    <span class="fa fa-search"></span>
                                </button>
                                <button class="btn btn-default" ng-click="editEntity(item);">
                                    <span class="fa fa-pencil"></span>
                                </button>
                                <button class="btn btn-danger" ng-click="removeEntity(item);">
                                    <span class="fa fa-close"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                @{{ entity.id }} <br>
                @{{ entity.cidade_id }} <br>
                @{{ entity.nome }} <br>
                @{{ entity.icone }} <br>
                @{{ entity.descricao }} <br>
                @{{ entity.email }} <br>
                @{{ entity.telefone }} <br>
                @{{ entity.label_status }} <br>
                @{{ entity.label_power }}
            </div>
        </div>
    </section>
@endsection