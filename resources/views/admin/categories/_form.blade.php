<div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
    {!! Form::label('name','Nome:') !!}
    {!! Form::text('name',null,['class'=>'form-control', 'placeholder' => 'Inserir o nome da categoria']) !!}
    @if($errors->has('name'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('name') }}</span>
    @endif
</div>