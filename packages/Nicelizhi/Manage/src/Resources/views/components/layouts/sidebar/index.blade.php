<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ bagisto_asset('images/logo.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 774px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ bagisto_asset('images/logo.svg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @foreach ($menu->items as $key=>$menuItem)
          <li class="nav-item  {{ $menu->getActive($menuItem) == 'active' ? 'menu-open' : '' }}">
            <a href="{{ $menuItem['url'] }}" class="nav-link  {{ $menu->getActive($menuItem) == 'active' ? 'active' : '' }}">
              <i class="nav-icon fas {{ $menuItem['icon'] }}"></i>
              <p>
                @lang($menuItem['name'])
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @if (count($menuItem['children']))
            <ul class="nav nav-treeview">
              @foreach ($menuItem['children'] as $subMenuItem)
              <li class="nav-item">
                <a href="{{ $subMenuItem['url'] }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang($subMenuItem['name'])</p>
                </a>
              </li>
              @endforeach
            </ul>
            @endif
          </li>
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div>
    <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
      <div class="os-scrollbar-track">
      <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
    </div>
  </div>
  <div class="os-scrollbar os-scrollbar-vertical">
    <div class="os-scrollbar-track">
      <div class="os-scrollbar-handle" style="height: 61.2215%; transform: translate(0px, 0px);"></div>
    </div>
  </div>
  <div class="os-scrollbar-corner"></div>
</div>
    <!-- /.sidebar -->
  </aside>