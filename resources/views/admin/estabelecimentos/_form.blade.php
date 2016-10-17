<div class="form-group">
    {!! Form::label('icone','Imagem:') !!}
    {!! Form::file('icone',null,['class'=>'form-control', 'placeholder' => 'Inserir Imagem']) !!}
</div>
<div class="form-group {{ $errors->has('cidade_id') ? 'has-error': '' }}">
    {!! Form::label('cidade_id','Cidade:') !!}
    {!! Form::select('cidade_id', $list, null, ['class'=>'form-control select2']) !!}
    @if($errors->has('cidade_id'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('cidade_id') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('nome') ? 'has-error': '' }}">
    {!! Form::label('nome','Nome:') !!}
    {!! Form::text('nome',null,['class'=>'form-control', 'placeholder' => 'Inserir Nome']) !!}
    @if($errors->has('nome'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('nome') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('descricao','Descrição:') !!}
    {!! Form::textarea('descricao',null,['class'=>'form-control', 'placeholder' => 'Inserir Descrição', 'rows' => 5, 'maxlength' => 255]) !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
    {!! Form::label('email','E-mail:') !!}
    {!! Form::text('email',null,['class'=>'form-control', 'placeholder' => 'Inserir E-mail']) !!}
    @if($errors->has('email'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('email') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('telefone') ? 'has-error': '' }}">
    {!! Form::label('telefone','Telefone:') !!}
    {!! Form::text('telefone',null,['class'=>'form-control telefone', 'placeholder' => 'Inserir Telefone']) !!}
    @if($errors->has('telefone'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('telefone') }}</span>
    @endif
</div>
<!-- Status Form Imput -->
<div class="form-group">
    {!! Form::label("status", "Status:") !!}
    {!! Form::select("status", [1 => 'Ativo', 2 => 'Inativo'], null, [ 'class' => 'form-control' ]) !!}
</div>
<!-- Status Form Imput -->
<div class="form-group">
    {!! Form::label("power", "Situação do Estabelecimento:") !!}
    {!! Form::select("power", [1 => 'Aberto', 2 => 'Fechado'], null, [ 'class' => 'form-control' ]) !!}
</div>

@section('js')
    @parent
    <script>
        $('.telefone').mask("(99) 9999-99999").ready(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unsetMask();
            if (phone.length > 10) {
                element.setMask("(99) 99999-9999");
            } else {
                element.setMask("(99) 9999-99999");
            }
        });
    </script>
@endsection