@php
    $user = Auth::user();

@endphp
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
        <img src="/logo.png" alt="">
        <span class="d-none d-lg-block">Recargas</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-sidebar" aria-controls="offcanvas-sidebar"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->




        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="rounded-circle border border-primary px-2 py-1 me-2">{{ substr($user->name,0,1) }}</span>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="">
            <li class="dropdown-header">
              <h6>{{ $user->name }}</h6>
              <span>{{ $user->email }}</span>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesión</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
