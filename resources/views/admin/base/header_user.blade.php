<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

            <p>
                {{ Auth::user()->name }}
            </p>
        </li>
        {{--<!-- Menu Body -->--}}
        {{--<li class="user-body">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Followers</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Sales</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4 text-center">--}}
                    {{--<a href="#">Friends</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.row -->--}}
        {{--</li>--}}
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">
                    <i class="fa fa-user"></i>
                    Perfil do Usuário
                </a>
            </div>
            <div class="pull-right">
                <a href="/auth/logout" class="btn btn-default btn-flat">
                    <i class="fa fa-sign-out"></i>
                    Sair
                </a>
            </div>
        </li>
    </ul>
</li>