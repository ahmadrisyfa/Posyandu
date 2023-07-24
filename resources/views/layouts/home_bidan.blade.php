<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="description" content="">
  <title>Posyandu Mawar 1</title>

  <!-- General CSS Files -->
  <link  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" rel="stylesheet" >
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" rel="stylesheet" >
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" rel="stylesheet" >
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link href=" {{ asset('/assets/css/style.css') }}" rel="stylesheet">
  <link href=" {{ asset('/assets/css/components.css') }}" rel="stylesheet">

  <link href="{{ asset('/vendor/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ asset('/ui/css/utilities.css') }}" rel="stylesheet">
  <link href="{{ asset('/ui/css/utilities.css') }}" rel="stylesheet">
 <script src="https://kit.fontawesome.com/8acb223874.js" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href=" {{ asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href=" {{ asset('/assets/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">


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
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src=" {{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">

            {{ Auth::user()->name }}
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile Akun
              </a>
            <div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon">
                <i class="fas fa-sign-out-alt"></i> Log Out
              </a>
            </div>
          </li>
        </ul>
    </nav>
      <!-- sidebar -->
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="###">Posyandu Mawar 1<p>Desa Sukadana</p></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="###">Posyandu</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{ route('bidan.index') }}" class="nav-link"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
              </li>
              @if(auth()->user()->role_id=="1")
              <li class="nav-item dropdown">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fa-solid fa-users"></i><span>Data user</span></a>
              </li>
              @endif
              @if(auth()->user()->role_id=="1" OR auth()->user()->role_id=="1")
              <li class="nav-item dropdown">
                <a href="{{ route('obat.master') }}" class="nav-link"><i class="fa-solid fa-database"></i><span>Data Obat</span></a>
              </li>
              @endif
              <li class="nav-item dropdown">
                <a href="{{ route('jadwal.index') }}" class="nav-link has-dropdown"><i class="fa-sharp fa-solid fa-database"></i><span>Data Posyandu</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('jadwal.index') }}" class="nav-link"><span>Data Jadwal Posyandu</span></a></li>
                  <li><a href="{{ route('bayibalita.indexbidan') }}" class="nav-link"><span>Data Bayi dan Balita</span></a></li>
                  @if(auth()->user()->role_id=="1" OR auth()->user()->role_id=="1")
                  <li><a href="{{ route('vaksinanak.index') }}">Data Vaksin Anak</a></li> 
                  @endif 
                  <li><a href="{{ route('ibuhamil.indexbidan') }}" class="nav-link"><span>Data Ibu Hamil</span></a></li>
                  @if(auth()->user()->role_id=="1" OR auth()->user()->role_id=="1")  
                  <li><a href="{{ route('vaksinibu.index') }}">Data Vaksin Ibu Hamil</a></li>
                  @endif
                </ul>
              </li>
              <li class="menu-header">Menu</li>
              @if(auth()->user()->role_id=="1" OR auth()->user()->role_id =="1")
              <li class="nav-item dropdown">
                <a href="{{ route('obat.index') }}" class="nav-link has-dropdown" aria-current="page"><i class="fas fa-columns"></i> <span>Persediaan Obat</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('obat.index') }}">Data Obat</a></li>
                  <li><a class="nav-link" href="{{ route('obat.dataobat') }}">Data Obat Kosong</a></li>
                </ul>
              </li>
              @endif
              
              <li class="nav-item dropdown">
                <a href="{{ route('bidan.daftarhadir') }}" class="nav-link has-dropdown" aria-current="page"><i class="fas fa-th-large"></i> <span>Pelayanan Kesehatan Bayi & Balita</span></a>
                <ul class="dropdown-menu">
                @if(auth()->user()->role_id=="1" OR auth()->user()->role_id=="2")
                  <li><a class="nav-link" href="{{ route('bidan.daftarhadir') }}">Pendaftaran </a></li>
                  @endif
                  @if(auth()->user()->role_id=="1" OR auth()->user()->role_id=="3")
                  <li><a class="nav-link" href="{{ route('bidan.penimbangan') }}">Penimbangan Anak</a></li>
                  @endif
                </ul>
              </li>
              @if(auth()->user()->role_id=="1" OR auth()->user()->role_id=="2")
              <li class="nav-item dropdown">
                <a href="{{ route('daftar_hadiribu.indexbidan') }}" class="nav-link has-dropdown" aria-current="page"><i class="fas fa-th"></i><span>Pelayanan Kesehatan Ibu Hamil</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('daftar_hadiribu.indexbidan') }}">Pendaftaran</a></li>
                  @endif
                  @if(auth()->user()->role_id=="1" OR auth()->user()->role_id=="1")
                  <li><a class="nav-link" href="{{ route('bidan.pemeriksaan') }}">Pemeriksaan Ibu Hamil</a></li>
                  @endif
                </ul>
              </li>
              <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown">
                <a href="###" class="nav-link"><i class="fa-solid  fa-file-arrow-down"></i> <span>Laporan Posyandu Bayi & Balita</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="###" class="nav-link"><i class="fa-solid  fa-file-arrow-down"></i> <span>Laporan Posyandu Ibu Hamil</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Log Out</span></a>
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
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://ananda.in/">Ananda Ayu Oktaviany</a>
        </div>
        <div class="footer-right">
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
  <script src="{{ asset('/assets/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('/assets/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('/assets/js/page/modules-datatables.js') }}"></script>

</body>
</html>
