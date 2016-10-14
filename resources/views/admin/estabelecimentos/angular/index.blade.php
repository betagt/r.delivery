@extends('admin.base.template_angular')
@section('content')
    <section ng-controller="EstabelecimentoController">
        <div class="row">
            <div ng-class="column">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#list_1" data-toggle="tab"><i class="fa fa-list ul"></i> Listagem de Registros</a></li>
                        {{--<li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>--}}
                        {{--<li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                                {{--Dropdown <span class="caret"></span>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>--}}
                                {{--<li role="presentation" class="divider"></li>--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>--}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="list_1">
                            @include('admin.estabelecimentos.angular.listagem')
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            @include('admin.estabelecimentos.angular.formulario')
            <!-- /.col -->
        </div>
    </section>
@endsection