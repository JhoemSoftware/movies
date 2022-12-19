@section('sidebar')
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nombre de Usuario</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Inicio</span></a></li>
        {{-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li> --}}
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Crear Usuario</a></li>
            <li><a href="#">Listado Usuarios</a></li>
          </ul>
        </li>

        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Clientes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Crear Cliente</a></li>
              <li><a href="#">Listado Clientes</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Películas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Crear Película</a></li>
              <li><a href="#">Listado Películas</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Alquiler</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Crear Alquiler</a></li>
              <li><a href="#">Listado Películas Alquiladas</a></li>
            </ul>
          </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
@endsection