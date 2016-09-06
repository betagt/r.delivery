<div class="form-group {{ $errors->has('questao') ? 'has-error': '' }}">
    {!! Form::label('questao','Questão:') !!}
    {!! Form::text('questao',null,['class'=>'form-control', 'placeholder' => 'Inserir o nome da categoria']) !!}
    @if($errors->has('questao'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('questao') }}</span>
    @endif
</div>
<!-- Status Form Imput -->
<div class="form-group">
    {!! Form::label("status", "Status:") !!}
    {!! Form::select("status", [1 => 'Ativo', 2 => 'Inativo'], null, [ 'class' => 'form-control' ]) !!}
</div>