@section('breadcrumbs')
    {!! Breadcrumbs::render('admin_users_show', $entity) !!}
@endsection

@section('header')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-flat mt mb">
        <i class="fa fa-plus"></i>
        Novo Registro
    </a>
@endsection

@section('content')

@endsection