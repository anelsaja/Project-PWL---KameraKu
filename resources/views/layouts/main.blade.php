<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>@yield('title', 'KameraKu Dashboard')</title>
    <style>
      /* --- CUSTOM CSS --- */
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f3f4f6;
        overflow-x: hidden;
      }
      
      /* Sidebar Gelap */
      .sidebar {
        background-color: #1e293b;
        min-height: 100vh;
        color: #fff;
      }
      .sidebar .nav-link {
        color: #cbd5e1;
        padding: 12px 20px;
        margin-bottom: 5px;
        border-radius: 8px;
        transition: 0.3s;
        display: flex;
        align-items: center;
      }
      .sidebar .nav-link:hover {
        background-color: rgba(255,255,255,0.1);
        color: #fff;
        text-decoration: none;
      }
      .sidebar .nav-link.active {
        background-color: #3b82f6;
        color: #fff;
        font-weight: 600;
        box-shadow: 0 4px 6px rgba(59, 130, 246, 0.4);
      }
      .sidebar .nav-link i {
        font-size: 1.1rem;
        margin-right: 12px;
      }
      
      /* Navbar */
      .navbar-custom {
        background-color: #ffffff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      }

      /* Card Content */
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }
      
      /* Foto Profil */
      .user-avatar {
        width: 35px;
        height: 35px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #e2e8f0;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top px-4">
      <a class="navbar-brand font-weight-bold text-dark" href="#">
        <div class="text-center">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo KameraKu" style="width: 120px; height: auto; opacity: 0.8;"> KameraKu: Website Penyewaan Kamera
        </div>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto align-items-center">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                      <img src="{{ Auth::user()->foto ? asset('storage/foto/'.Auth::user()->foto) : asset('storage/foto/nogambar.jpg') }}" class="user-avatar mr-2">
                      <span class="text-dark font-weight-bold">{{ Auth::user()->name }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right border-0 shadow mt-2">
                      <div class="px-4 py-2 bg-light mb-2">
                          <small class="text-muted">Login sebagai:</small><br>
                          <strong>{{ Auth::user()->email }}</strong>
                      </div>
                      
                      <a class="dropdown-item" href="/changepass"><i class="bi bi-gear mr-2"></i> Ubah Password</a>
                      
                      <div class="dropdown-divider"></div>
                      
                      <a class="dropdown-item text-danger" href="/logout">
                          <i class="bi bi-box-arrow-right mr-2"></i> Log Out
                      </a>
                  </div>
              </li>
          </ul>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            
            <nav class="col-md-2 d-none d-md-block sidebar py-4">
                <div class="nav flex-column nav-pills">
                    <p class="px-3 text-uppercase text-muted small font-weight-bold mb-2">Menu Utama</p>
                    
                    <a class="nav-link {{ ($key == 'home') ? 'active':'' }}" href="/home" role="tab">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>

                    <a class="nav-link {{ ($key == 'kamera') ? 'active':'' }}" href="/kamera" role="tab">
                        <i class="bi bi-camera"></i> Data Kamera
                    </a>

                    <a class="nav-link {{ ($key == 'penyewa') ? 'active':'' }}" href="/penyewa" role="tab">
                        <i class="bi bi-people"></i> Data Penyewa
                    </a>

                    <a class="nav-link {{ ($key == 'booking') ? 'active':'' }}" href="/booking" role="tab">
                        <i class="bi bi-calendar-check"></i> Data Booking
                    </a>

                    <a class="nav-link {{ ($key == 'users') ? 'active':'' }}" href="/users" role="tab">
                        <i class="bi bi-person-badge"></i> Data Admin
                    </a>

                </div>
            </nav>

            <main class="col-md-10 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title', 'Halaman')</h1>
                </div>

                <div class="content-wrapper">
                    @yield('content')
                </div>

                <footer class="mt-3 text-muted text-center small">
                    &copy; 2025 KameraKu Rental System
                </footer>
            </main>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
    <script>
        new DataTable('#ex');
    </script>
  </body>
</html>