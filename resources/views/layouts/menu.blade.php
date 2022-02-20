{{-- <li class="side-menus {{ $activePage == 'home' ? 'active' : '' }}">
<a class="nav-link" href="/home">
    <i class=" fas fa-building"></i><span>Dashboard</span>
</a>
</li> --}}
@can('user_index')
<li class="side-menus {{ $activePage == 'usuarios' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('usuarios.index')  }}">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
</li>
@endcan
@can('role_index')
<li class="side-menus {{ $activePage == 'roles' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('roles.index')  }}">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
</li>
@endcan
@can('permission_index')
<li class="side-menus {{ $activePage == 'permissions' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('permissions.index')  }}">
        <i class=" fas fa-user-plus"></i><span>Permisos</span>
    </a>
</li>
@endcan
@can('servicio_index')
<li class="side-menus {{ $activePage == 'servicios' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('servicios.index')  }}">
        <i class=" fas fa-cogs"></i><span>Servicios</span>
    </a>
</li>
@endcan
@can('producto_index')
<li class="side-menus {{ $activePage == 'productos' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('productos.index')  }}">
        <i class=" fas fa-shopping-bag"></i><span>Productos</span>
    </a>
</li>
@endcan
@can('inventario_index')
<li class="side-menus {{ $activePage == 'inventarios' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('inventarios.index')  }}">
        <i class=" fas fa-shopping-basket"></i><span>Inventarios</span>
    </a>
</li>
@endcan
@can('promocion_index')
<li class="side-menus {{ $activePage == 'promociones' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('promociones.index')  }}">
        <i class=" fas fa-hand-peace"></i><span>Promociones</span>
    </a>
</li>
@endcan
@can('venta_index')
<li class="side-menus {{ $activePage == 'ventas' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('ventas.index')  }}">
        <i class=" fas fa-shopping-cart"></i><span>Ventas</span>
    </a>
</li>
@endcan
@can('compra_index')
<li class="side-menus {{ $activePage == 'compras' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('compras.index')  }}">
        <i class=" fas fa-cart-plus"></i><span>Compras</span>
    </a>
</li>
@endcan
<li class="side-menus ">
    <a class="nav-link">
        <i></i><span></span>
    </a>
</li>
<li class="side-menus">
    <a class="nav-link">
        <i></i><span></span>
    </a>
</li>
