<!-- Role Form Imput -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label("parent_id", "Categoria Principal:") !!}
            {!! Form::select("parent_id", $select, null, [ 'class' => 'form-control select' ]) !!}
        </div>
    </div>
    <div class="col-sm-9">
        <div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
            {!! Form::label('name','Nome:') !!}
            {!! Form::text('name',null,['class'=>'form-control', 'placeholder' => 'Inserir o nome da categoria']) !!}
            @if($errors->has('name'))
                <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
</div>
