<!doctype html>
<html lang="en">
  <head>
    <title>Cek Status Pesanan - KameraKu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .navbar-custom { background-color: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .nav-link { color: #333; font-weight: 500; }
        
        .search-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            padding: 40px;
            text-align: center;
        }
        
        /* Status Steps (Timeline sederhana) */
        .status-badge {
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .status-pending { background-color: #ffc107; color: #fff; } /* Kuning */
        .status-disewa  { background-color: #17a2b8; color: #fff; } /* Biru */
        .status-selesai { background-color: #28a745; color: #fff; } /* Hijau */
        
        .result-card {
            border: none;
            border-left: 5px solid #17a2b8;
            border-radius: 10px;
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

    <div class="container py-5">
        
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="search-card">
                    <h3 class="font-weight-bold mb-3">Lacak Pesanan Anda</h3>
                    <p class="text-muted mb-4">Masukkan ID Booking yang Anda dapatkan setelah melakukan pemesanan.</p>
                    
                    <form action="/cek-pesanan" method="GET">
                        <div class="input-group input-group-lg">
                            <input type="number" name="kode_booking" class="form-control" placeholder="Contoh: 15" value="{{ $kode_input ?? '' }}" required>
                            <div class="input-group-append">
                                <button class="btn btn-info" type="submit">
                                    <i class="bi bi-search"></i> Cek Status
                                </button>
                            </div>
                        </div>
                    </form>
                    @if($message)
                        <div class="alert alert-danger mt-4 rounded-pill">
                            <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($booking)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body p-4 text-center">
                        
                        <h6 class="text-muted">Status Pesanan #{{ $booking->id }}</h6>
                        
                        @if($booking->status == 'pending')
                            <div class="status-badge status-pending">
                                <i class="bi bi-hourglass-split"></i> Menunggu Konfirmasi / Pembayaran
                            </div>
                            <p class="text-muted">Silakan hubungi Admin atau datang ke toko untuk verifikasi KTP.</p>
                        
                        @elseif($booking->status == 'disewa')
                            <div class="status-badge status-disewa">
                                <i class="bi bi-camera"></i> Sedang Disewa (Diambil)
                            </div>
                            <p class="text-muted">Barang sedang berada di tangan Anda. Harap kembalikan tepat waktu.</p>
                        
                        @elseif($booking->status == 'selesai')
                            <div class="status-badge status-selesai">
                                <i class="bi bi-check-circle-fill"></i> Selesai
                            </div>
                            <p class="text-muted">Terima kasih! Transaksi telah selesai.</p>
                        @endif

                        <hr>

                        <div class="text-left mt-4">
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">Nama Penyewa</div>
                                <div class="col-sm-8 font-weight-bold">{{ $booking->penyewa->nama_lengkap ?? $booking->penyewa->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">Barang Sewaan</div>
                                <div class="col-sm-8 font-weight-bold">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($booking->details as $d)
                                            <li><i class="bi bi-dot"></i> {{ $d->kamera->nama }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">Durasi Sewa</div>
                                <div class="col-sm-8">
                                    {{ date('d M Y', strtotime($booking->tanggal_mulai)) }} 
                                    s/d 
                                    {{ date('d M Y', strtotime($booking->tanggal_selesai)) }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 text-muted">Total Harga</div>
                                <div class="col-sm-8 font-weight-bold text-info">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <footer class="bg-white border-top py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2025 KameraKu Rental. All Rights Reserved.</p>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>