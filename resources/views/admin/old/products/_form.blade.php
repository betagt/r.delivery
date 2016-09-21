<!-- Nome Form Imput -->
<div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
    {!! Form::label("name", "Nome:") !!}
    {!! Form::text("name", null, ['class' => 'form-control']) !!}
    @if($errors->has('name'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('name') }}</span>
    @endif
</div>

<!-- Categoria do Produto Form Imput -->
<div class="form-group {{ $errors->has('category_id') ? 'has-error': '' }}">
    {!! Form::label("category_id", "Categoria do Produto:") !!}
    {!! Form::select('category_id',$select,null,['class'=>'form-control']) !!}
    @if($errors->has('category_id'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('category_id') }}</span>
    @endif
</div>

<!-- Descrição Form Imput -->
<div class="form-group {{ $errors->has('description') ? 'has-error': '' }}">
    {!! Form::label("description", "Descrição:") !!}
    {!! Form::textarea("description", null, ['class' => 'form-control', 'rows' => 5]) !!}
    @if($errors->has('description'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('description') }}</span>
    @endif
</div>

<!-- Preço Form Imput -->
<div class="form-group {{ $errors->has('price') ? 'has-error': '' }}">
    {!! Form::label("price", "Preço:") !!}
    {!! Form::text("price", null, ['class' => 'form-control price']) !!}
    @if($errors->has('price'))
        <span class='help-block'><i class="fa fa-times"></i> {{ $errors->first('price') }}</span>
    @endif
</div>
@section('js')
    @parent
    <script src="{{ asset('src/node_modules/jquery-mask-plugin/src/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.price').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>
@endsection
