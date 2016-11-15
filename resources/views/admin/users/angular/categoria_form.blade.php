<form role="form">
    <h3 ng-bind="titulo"></h3>
    <input type="hidden" name="_token" value="@{{ token }}" />
    <input type="hidden" name="estabelecimento_id" ng-model="entity.estabelecimento_id" value="{{ $estabelecimento->id }}">
    <input type="hidden" name="parent_id" ng-model="entity.parent_id" value="@{{ entity.parent_id }}">
    <div class="form-group">
        <label for="name">Nome: </label>
        <input type="text" name="name" class="form-control" ng-model="entity.name"   />
        <div>
            <span class='label label-danger' ng-show="errors.name[0]"><i class="fa fa-times"></i> @{{ errors.name[0] }}</span>
        </div>
    </div>
    <div class="form-group">
        <label for="tipo">Campo Obrigatório:</label>
        <p>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default btn-flat btn-sm" ng-class="{'active': entity.tipo == 0}">
                    <input type="radio" name="tipo" value="0" ng-model="entity.tipo"/> Não Obrigatório
                </label>
                <label class="btn btn-default btn-flat btn-sm" ng-class="{'active': entity.tipo == 1}">
                    <input type="radio" name="tipo" value="1" ng-model="entity.tipo"/> Obrigatório
                </label>
            </div>
        </p>

        {{--<div class="radio">--}}
        {{--<label for="tipo">--}}
        {{--<input type="radio" name="tipo" value="0" ng-selected="entity.tipo == 0" ng-model="entity.tipo"/> Não Obrigatório--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--<div class="radio">--}}
        {{--<label for="tipo">--}}
        {{--<input type="radio" name="tipo" value="1" ng-selected="entity.tipo == 1" ng-model="entity.tipo"/> Obrigatório--}}
        {{--</label>--}}
        {{--</div>--}}
    </div>
    <div class="form-group">
        <label for="multi">Quantos itens selecionar:</label>
        <p>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default btn-flat btn-sm" ng-class="{'active': entity.multi == 0}">
                    <input type="radio" name="multi" value="0" ng-model="entity.multi"/> Selecionar só uma opção
                </label>
                <label class="btn btn-default btn-flat btn-sm" ng-class="{'active': entity.multi == 1}">
                    <input type="radio" name="multi" value="1" ng-model="entity.multi"/> Selecionar várias opções
                </label>
            </div>
        </p>

        {{--<div class="radio">--}}
        {{--<label for="multi">--}}
        {{--<input type="radio" name="multi" value="0" ng-selected="entity.multi == 0" ng-model="entity.multi"/> Selecionar só uma opção--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--<div class="radio">--}}
        {{--<label for="multi">--}}
        {{--<input type="radio" name="multi" value="1" ng-selected="entity.multi == 1" ng-model="entity.multi"/> Selecionar várias opções--}}
        {{--</label>--}}
        {{--</div>--}}
    </div>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-flat" ng-click="saveEntity(entity)"><i class="fa fa-check"></i> Salvar</button>
        <button type="reset" class="btn btn-warning btn-flat" ng-click="cancelEntity()"><i class="fa fa-close"></i>
            Cancelar
        </button>
    </div>
</form>
<hr>