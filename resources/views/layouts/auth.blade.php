
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
        @yield('title') | {{ config('app.name', 'Laravel') }}
    </title>
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

  <body class="login">
    @yield('content')

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
  </body>

  
</html>
