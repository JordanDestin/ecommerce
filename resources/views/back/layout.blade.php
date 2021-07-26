<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Administration</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- Theme style 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/css/adminlte.min.css">
  -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('css')

  @yield('extra-scriptjs') 


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        @auth
        
          <a class="dropdown-item" href="{{ route('logout.admin') }}">
                  {{ __('Déconnexion') }}
              </a>
              
        @endauth
      </li>

      
    </ul>
  </nav>

  <div class="content-wrapper">

    <div class="content">
      <div id="app" class="container-fluid">

        <example-component></example-component>
          @yield('main')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<script src="{{ asset('/js/app.js') }}"></script>


@yield('js')
</body>
</html>