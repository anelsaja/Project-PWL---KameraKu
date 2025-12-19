<!doctype html>
<html lang="en">
  <head>
    <title>KameraKu - Sewa Kamera Profesional</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Navbar */
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .nav-link {
            color: #333;
            font-weight: 500;
        }

        /* Hero Section (Banner Biru) */
        .hero-section {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
            padding: 80px 0 60px;
            margin-bottom: 40px;
            border-radius: 0 0 30px 30px;
        }

        /* Card Kamera */
        .card-kamera {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            background: #fff;
            height: 100%;
            position: relative; /* Penting untuk badge */
        }
        .card-kamera:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .img-container {
            height: 200px;
            overflow: hidden;
            background: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Badge Brand (Pojok Kanan Atas Gambar) */
        .badge-brand {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0,0,0,0.6);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            z-index: 10;
        }

        /* Search Box */
        .search-box {
            background: rgba(255,255,255,0.2);
            padding: 8px;
            border-radius: 50px;
            display: flex;
        }
        .search-input {
            border: none;
            background: transparent;
            color: white;
            padding-left: 20px;
        }
        .search-input::placeholder { color: rgba(255,255,255,0.8); }
        .search-input:focus { background: transparent; color: white; box-shadow: none; }
        
        .btn-sewa {
            border-radius: 50px;
            font-weight: 600;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-info" href="/">
                <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo KameraKu" style="width: 120px; height: auto; opacity: 0.8;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cek-pesanan">Cek Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section text-center">
        <div class="container">
            <h1 class="font-weight-bold display-4">Sewa Kamera, Abadikan Momen.</h1>
            <p class="lead mb-4" style="opacity: 0.9;">Temukan kamera terbaik untuk kebutuhan fotografi Anda.</p>
            
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="/actsearchkamera" method="GET">
                        <div class="input-group search-box">
                            <input type="text" name="cari" class="form-control search-input" placeholder="Cari kamera (Canon, Sony, dll)..." value="{{ request('cari') }}">
                            <div class="input-group-append">
                                <button class="btn btn-light rounded-pill px-4" type="submit">
                                    <i class="bi bi-search text-info"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container pb-5">
        
        
        @if(session('success'))
            <div class="alert alert-success text-center mb-4 shadow-sm">
                <h4>🎉 {{ session('success') }}</h4>
                <p class="mb-0">Silakan cek status pesanan Anda di menu "Cek Status Pesanan".</p>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="font-weight-bold text-dark border-left border-primary pl-3" style="border-width: 5px !important;">Katalog Terbaru</h4>
            <span class="text-muted small">Menampilkan {{ $cameras->count() }} Unit</span>
        </div>

        <div class="row">
            @forelse($cameras as $c)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-kamera shadow-sm h-100">
                    
                    <div class="badge-brand">{{ $c->brand ?? 'Kamera' }}</div>

                    <div class="img-container">
                        @if ($c->gambar)
                            <img src="{{ asset('/storage/gambar/'.$c->gambar) }}" alt="{{ $c->nama }}">
                        @else
                            <img src="/storage/gambar/nogambar.jpg" alt="No Image">
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold mb-1">{{ $c->nama }}</h5>
                        <p class="text-muted small mb-2">{{ $c->type ?? 'Universal' }}</p>

                        <div class="mb-2">
                            @if($c->stock > 0)
                                <span class="badge badge-warning text-black px-2 py-1">
                                    <i class="bi bi-exclamation-triangle"></i> Tersedia: {{ $c->stock }}
                                </span>
                            @else
                                <span class="badge badge-danger px-2 py-1">
                                    <i class="bi bi-x-circle"></i> Habis
                                </span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <h5 class="text-info font-weight-bold mb-3">
                                Rp {{ number_format($c->harga, 0, ',', '.') }}
                                <small class="text-muted text-small" style="font-size: 0.7rem">/hari</small>
                            </h5>
                            
                            @if($c->stock > 0)
                                <a href="/booking/kamera/{{ $c->id }}" class="btn btn-primary btn-block btn-sewa">
                                    Sewa Sekarang
                                </a>
                            @else
                                <button class="btn btn-secondary btn-block btn-sewa" disabled>Stok Habis</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-12 text-center py-5">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" width="200" alt="Empty">
                <h5 class="text-muted mt-3">Belum ada kamera yang tersedia saat ini.</h5>
            </div>
            @endforelse
        </div>
    </div>

    <footer class="bg-white border-top py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2025 KameraKu Rental. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>