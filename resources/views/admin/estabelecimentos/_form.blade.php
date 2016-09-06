<div class="form-group {{ $errors->has('icone') ? 'has-error': '' }}">
    {!! Form::label('icone','Logomarca:') !!}
    {!! Form::file('icone') !!}
    @if($errors->has('icone'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('icone') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('nome') ? 'has-error': '' }}">
    {!! Form::label('nome','Nome:') !!}
    {!! Form::text('nome',null,['class'=>'form-control', 'placeholder' => 'Inserir o Nome']) !!}
    @if($errors->has('nome'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('nome') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('descricao','Descrição:') !!}
    {!! Form::textarea('descricao',null,['class'=>'form-control', 'placeholder' => 'Inserir a Descrição', 'maxlenght' => 255 ]) !!}
</div>
<div class="form-group {{ $errors->has('telefone') ? 'has-error': '' }}">
    {!! Form::label('telefone','Telefone:') !!}
    {!! Form::text('telefone',null,['class'=>'form-control telefone', 'placeholder' => 'Inserir o Telefone de Contato']) !!}
    @if($errors->has('telefone'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('telefone') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
    {!! Form::label('email','E-mail:') !!}
    {!! Form::text('email',null,['class'=>'form-control', 'placeholder' => 'Inserir o Telefone de Contato']) !!}
    @if($errors->has('email'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('email') }}</span>
    @endif
</div>
<!-- Status Form Imput -->
<div class="form-group">
    {!! Form::label("status", "Status:") !!}
    {!! Form::select("status", [1 => 'Ativo', 2 => 'Inativo'], null, [ 'class' => 'form-control' ]) !!}
</div>
<!-- Status Form Imput -->
<div class="form-group">
    {!! Form::label("power", "Power:") !!}
    {!! Form::select("power", [1 => 'on', 2 => 'off'], null, [ 'class' => 'form-control' ]) !!}
</div>
@section('js')
    @parent
    <script src="{{ asset('src/node_modules/jquery-mask-plugin/src/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function () {
            var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

            $('.telefone').mask(SPMaskBehavior, spOptions);
        });
    </script>
@endsection