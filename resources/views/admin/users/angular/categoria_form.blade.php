<form role="form">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">@{{ titulo }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" ng-click="cancelar();">
                    <i class="fa fa-close"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <input type="hidden" name="_token" value="@{{ token }}"/>
            <input type="hidden" name="estabelecimento_id" ng-model="entity.estabelecimento_id" value="{{ $entity->id }}">
            <input type="hidden" name="parent_id" ng-model="entity.parent_id" value="@{{ entity.parent_id }}">
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" name="name" class="form-control" ng-model="entity.name"/>
                <div>
                    <span class='label label-danger' ng-show="errors.name[0]">
                        <i class="fa fa-times"></i> @{{ errors.name[0] }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="tipo">Campo Obrigatório:</label>
                        <br>
                        <div class="radio">
                            <label>
                                <input type="radio" name="tipo" value="0" ng-model="entity.tipo" />
                                Não Obrigatório
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="tipo" value="1" ng-model="entity.tipo" />
                                Obrigatório
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="multi">Quantos itens selecionar:</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="multi" value="0" ng-model="entity.multi" />
                                Selecionar só uma opção
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="multi" value="1" ng-model="entity.multi" />
                                Selecionar várias opções
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay" ng-show="loading">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <div class="box-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-flat" ng-click="saveEntity(entity)">
                    <i class="fa fa-check"></i> Salvar Categoria
                </button>
            </div>
        </div>
    </div>
</form>