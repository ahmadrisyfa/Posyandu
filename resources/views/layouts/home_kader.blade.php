<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="description" content="">
  <title>Posyandu</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../public/assets/css/style.css">
  <link rel="stylesheet" href="../public/assets/css/components.css">

  <link href="{{ asset('/vendor/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ asset('/ui/css/utilities.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/ui/css/utilities.css') }}" rel="stylesheet">

</head>

<body>
  <!-- navbar -->
  <div id="app">
    <div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            {{ Auth::user()->name }}
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Log Out
              </a>
            </div>
            </div>
          </li>
        </ul>
    </nav>
      <!-- sidebar -->
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="###">Posyandu Mawar 1</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="###">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{ route('kader.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{ route('kader.index') }}" class="nav-link"><i class="far fa-user"></i><span>Data User</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{ route('bayibalita.indexkader') }}" class="nav-link"><i class="fas fa-fire"></i><span>Data Bayi dan Balita</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{ route('ibuhamil.indexkader') }}" class="nav-link"><i class="fas fa-fire"></i><span>Data Ibu Hami</span></a>
              </li>
              <li class="menu-header">Menu</li>
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" aria-current="page"><i class="far fa-file-alt"></i> <span>Pelayanan Kesehatan Bayi & Balita</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('kader_daftar_hadirbayi.index') }}">Daftar Hadir</a></li>
                  <li><a class="nav-link" href="{{ route('bayibalita.indexkader') }}">Data Penimbangan</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" aria-current="page"><i class="far fa-file-alt"></i> <span>Pelayanan Kesehatan Ibu Hamil</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('kader_daftar_hadiribu') }}">Daftar Hadir</a></li>
                </ul>
              </li>
              <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown">
                <a href="###" class="nav-link"><i class="fas fa-th-large"></i> <span>Laporan Posyandu Bayi & Balita</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="###" class="nav-link"><i class="fas fa-th"></i> <span>Laporan Posyandu Ibu Hamil</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="###" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Log Out</span></a>
              </li>
          </ul>
        </aside>
    </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://ananda.in/">Ananda ayu</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
