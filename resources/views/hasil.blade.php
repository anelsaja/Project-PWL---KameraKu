<!doctype html>
<html lang="en">
  <head>
    <title>Hasil Pencarian - KameraKu</title>
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
        .nav-link { color: #333; font-weight: 500; }

        /* Header Halaman Pencarian */
        .page-header {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
        }

        /* --- STYLE KHUSUS CARD SESUAI REQUEST --- */
        .card-kamera {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            background: #fff;
            height: 100%;
            position: relative; /* Penting untuk badge absolute */
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

        /* Badge Brand di pojok kanan atas gambar */
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

        .btn-sewa {
            border-radius: 50px;
            font-weight: 600;
        }
        /* ---------------------------------------- */

        /* Search Box Kecil di Header */
        .search-box-sm .form-control {
            border: none;
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
    

    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="font-weight-bold mb-1">Hasil Pencarian</h2>
                    <p class="mb-0 opacity-8">Menampilkan hasil untuk kata kunci: <strong>"{{ request('cari') }}"</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        
        @if(count($data) > 0)
            <div class="alert alert-light border shadow-sm mb-4">
                Ditemukan <strong>{{ count($data) }}</strong> produk yang sesuai.
            </div>
        @endif

        <div class="row">
            @forelse ($data as $n)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card card-kamera shadow-sm h-100">
                    <div class="badge-brand">{{ $n->brand ?? 'Kamera' }}</div>
                    
                    <div class="img-container">
                        @if($n->gambar)
                            <img src="{{ asset('storage/gambar/'.$n->gambar) }}" alt="{{ $n->nama }}">
                        @else
                            <img src="{{ asset('storage/gambar/nogambar.jpg') }}" alt="No Image">
                        @endif
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold mb-1">{{ $n->nama }}</h5>
                        <p class="text-muted small mb-2">{{ $n->type ?? 'Universal' }}</p>
                        
                        <div class="mb-2">
                            @if($n->stock > 0)
                                <span class="badge badge-warning text-black px-2 py-1">
                                    <i class="bi bi-exclamation-circle"></i> Tersedia: {{ $n->stock }} Unit
                                </span>
                            @else
                                <span class="badge badge-danger px-2 py-1">
                                    <i class="bi bi-x-circle"></i> Stok Habis
                                </span>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <h5 class="text-primary font-weight-bold mb-3">
                                Rp {{ number_format($n->harga ?? $n->price_per_day, 0, ',', '.') }}
                                <small class="text-muted text-small" style="font-size: 0.7rem">/hari</small>
                            </h5>
                            
                            @if($n->stock > 0)
                                <a href="/booking/kamera/{{ $n->id }}" class="btn btn-primary btn-block btn-sewa">
                                    Sewa Sekarang
                                </a>
                            @else
                                <button class="btn btn-secondary btn-block btn-sewa" disabled>Tidak Tersedia</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-emoji-frown empty-icon"></i>
                    <h3>Yah, barang tidak ditemukan.</h3>
                    <p class="text-muted">Coba gunakan kata kunci lain atau lihat semua katalog kami.</p>
                    <a href="/" class="btn btn-info btn-lg rounded-pill px-5 mt-3">Kembali ke Beranda</a>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <footer class="bg-white border-top py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2025 KameraKu Rental. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>