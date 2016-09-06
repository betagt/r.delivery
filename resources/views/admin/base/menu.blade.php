<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('src/node_modules/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Navegação</li>
            <li>
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}">
                    <i class="fa fa-calculator"></i>
                    <span>Pedidos</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span>Cupons de Desconto</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.cupons.index') }}">
                            <i class="fa fa-list-ul"></i> Listar/Pesquisar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.cupons.create') }}">
                            <i class="fa fa-plus"></i> Novo Registro
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Clientes</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.clients.index') }}"><i class="fa fa-list-ul"></i> Listar/Pesquisar</a></li>
                    <li><a href="{{ route('admin.clients.create') }}"><i class="fa fa-plus"></i> Novo Registro</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-institution"></i>
                    <span>Estabelecimentos Comerc.</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.estabelecimentos.index') }}">
                            <i class="fa fa-list-ul"></i> Listar/Pesquisar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.estabelecimentos.create') }}">
                            <i class="fa fa-plus"></i> Novo Registro
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Questões/Avaliação</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.avaliacoes.index') }}"><i class="fa fa-list-ul"></i> Listar/Pesquisar</a></li>
                    <li><a href="{{ route('admin.avaliacoes.create') }}"><i class="fa fa-plus"></i> Novo Registro</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Categorias dos Produtos</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-list-ul"></i> Listar/Pesquisar</a></li>
                    <li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-plus"></i> Novo Registro</a></li>
                </ul>
            </li>
            <li>
                <a href="/auth/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>