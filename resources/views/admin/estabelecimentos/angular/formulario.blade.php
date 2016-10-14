<div ng-show="editing">
    <div ng-class="column">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title" ng-bind="title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <input type="hidden" name="_token" value="@{{ token }}" />
                    <div class="form-group">
                        {!! Form::label('id','Código:') !!}
                        {!! Form::text('id',null,['class'=>'form-control', 'placeholder' => 'Código do Estabelecimento', 'ng-model' => 'entity.id', 'readonly' => true]) !!}
                    </div>
                    <div class="form-group {{ $errors->has('cidade_id') ? 'has-error': '' }}">
                        {!! Form::label('cidade_id','Cidade:') !!}
                        <select name="cidade_id" class="form-control" >
                            <option ng-repeat="item in listagemCidades" ng-selected="entity.cidade_id == item.id" value="@{{ item.id }}">@{{ item.nome }}</option>
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('nome') ? 'has-error': '' }}">
                        {!! Form::label('nome','Nome:') !!}
                        {!! Form::text('nome',null,['class'=>'form-control', 'placeholder' => 'Inserir Nome', 'ng-model' => 'entity.nome']) !!}
                        @if($errors->has('nome'))
                            <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('nome') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('telefone') ? 'has-error': '' }}">
                        {!! Form::label('telefone','Telefone:') !!}
                        {!! Form::text('telefone',null,['class'=>'form-control', 'telefone','placeholder' => 'Inserir Telefone', 'ng-model' => 'entity.telefone']) !!}
                        @if($errors->has('telefone'))
                            <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('telefone') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
                        {!! Form::label('email','Email:') !!}
                        {!! Form::text('email',null,['class'=>'form-control', 'placeholder' => 'Inserir Email', 'ng-model' => 'entity.email']) !!}
                        @if($errors->has('email'))
                            <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('descricao','Descricao:') !!}
                        {!! Form::textarea('descricao',null,['class'=>'form-control', 'placeholder' => 'Inserir Descricao', 'rows' => 5, 'ng-model' => 'entity.descricao']) !!}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button class="btn btn-primary btn-flat" ng-click="saveEntity(entity);"><i class="fa fa-save"></i> Salvar</button>
                    <button class="btn btn-warning btn-flat" ng-click="cancelEntity();"><i class="fa fa-stop"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--@section('js')--}}
    {{--@parent--}}
    {{--<script>--}}
        {{--$('.telefone').mask("(99) 9999-99999").ready(function (event) {--}}
            {{--var target, phone, element;--}}
            {{--target = (event.currentTarget) ? event.currentTarget : event.srcElement;--}}
            {{--phone = target.value.replace(/\D/g, '');--}}
            {{--element = $(target);--}}
            {{--element.unsetMask();--}}
            {{--if (phone.length > 10) {--}}
                {{--element.setMask("(99) 99999-9999");--}}
            {{--} else {--}}
                {{--element.setMask("(99) 9999-99999");--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}