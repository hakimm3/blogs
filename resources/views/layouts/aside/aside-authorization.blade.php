<li class="nav-item  {{ request()->is('authorization/*') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->is('auhtorization/*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-key"></i>
      <p>
        Authorization
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
     @can('read role')
     <li class="nav-item">
      <a href="{{ route('authorization.role.index') }}" class="nav-link {{ request()->is('authorization/role') ? 'active' : ''}}">
        <i class="far fa-circle nav-icon"></i>
        <p>Master Role</p>
      </a>
    </li>
     @endcan
      @can('read permission')
      <li class="nav-item">
        <a href="{{ route('authorization.permission.index') }}" class="nav-link  {{ request()->is('authorization/permission') ? 'active' : ''}}">
          <i class="far fa-circle nav-icon"></i>
          <p>Master Permission</p>
        </a>
      </li>
      @endcan
    </ul>
  </li>