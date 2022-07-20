
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>
        @yield('title') - {{ config('app.name') }}
    </title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex" />

    <!-- Custom Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&amp;display=swap"
      rel="stylesheet"
    />

    <!-- Perfect Scrollbar -->
    <link
      type="text/css"
      href="{{asset('assets/vendor/perfect-scrollbar.css')}}"
      rel="stylesheet"
    />

    <!-- Material Design Icons -->
    <link
      type="text/css"
      href="{{asset('assets/css/material-icons.css')}}"
      rel="stylesheet"
    />

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{asset('assets/css/fontawesome.css')}}" rel="stylesheet" />

    <!-- Preloader -->
    <link type="text/css" href="{{asset('assets/vendor/spinkit.css')}}" rel="stylesheet" />

    <!-- App CSS -->
    <link type="text/css" href="{{asset('assets/css/app.css')}}" rel="stylesheet" />
  </head>

  <body class="layout-fluid">
    <div class="preloader">
      <div class="sk-chase">
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
        <div class="sk-chase-dot"></div>
      </div>

      <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

    
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
      <!-- Header -->

      <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
        <div class="mdk-header__content">
          <!-- Navbar -->
          <nav
            id="default-navbar"
            class="navbar navbar-expand navbar-dark bg-primary m-0"
          >
            <div class="container-fluid">
              <!-- Toggle sidebar -->
              <button
                class="navbar-toggler d-block"
                data-toggle="sidebar"
                type="button"
              >
                <span class="material-icons">menu</span>
              </button>

              <!-- Brand -->
              <a href="student-dashboard.html" class="navbar-brand">
                <img
                  src="{{asset('assets/images/logo/white.svg')}}"
                  class="mr-2"
                  alt="SMAN1"
                />
                <span class="d-none d-xs-md-block">SMAN1</span>
              </a>

              <!-- Search -->
              <form class="search-form d-none d-md-flex">
                <input type="text" class="form-control" placeholder="Search" />
                <button class="btn" type="button">
                  <i class="material-icons font-size-24pt">search</i>
                </button>
              </form>
              <!-- // END Search -->

              <div class="flex"></div>

              <!-- Menu -->
            

              <!-- Menu -->
              <ul class="nav navbar-nav flex-nowrap">
              
                <!-- User dropdown -->
                <li class="nav-item dropdown ml-1 ml-md-3">
                  <a
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    href="#"
                    role="button"
                    ><img
                      src="{{asset('assets/images/people/50/guy-6.jpg')}}"
                      alt="Avatar"
                      class="rounded-circle"
                      width="40"
                  /></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="guest-login.html">
                      <i class="material-icons">lock</i> Logout
                    </a>
                  </div>
                </li>
                <!-- // END User dropdown -->
              </ul>
              <!-- // END Menu -->
            </div>
          </nav>
          <!-- // END Navbar -->
        </div>
      </div>

      <!-- // END Header -->

      <!-- Header Layout Content -->
    
      <div class="mdk-header-layout__content">
        <div
          data-push
          data-responsive-width="992px"
          class="mdk-drawer-layout js-mdk-drawer-layout"
        >
          <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__container p-0">
              <div class="row m-0">
                <div class="col-lg container-fluid page__container">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="student-dashboard.html">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{-- Yield Title --}}
                        @yield('title')
                    </li>
                  </ol>
                    @yield('content')
                </div>
              </div>
            </div>
          </div>
    
          <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
            <div class="mdk-drawer__content">
              <div
                class="sidebar sidebar-left sidebar-dark bg-dark o-hidden"
                data-perfect-scrollbar
              >
                <div class="sidebar-p-y"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('assets/vendor/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('assets/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>

    <!-- MDK -->
    <script src="{{asset('assets/vendor/dom-factory.js')}}"></script>
    <script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>

    <!-- App JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Highlight.js -->
    <script src="{{asset('assets/js/hljs.js')}}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{asset('assets/js/app-settings.js')}}"></script>

    <!-- List.js -->
    <script src="{{asset('assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('assets/js/list.js')}}"></script>
  </body>

 
</html>
