<!doctype html>
<html lang="en">
  <head>
    <title>Booking Berhasil - KameraKu</title>
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

        .card-ticket {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            background: white;
            position: relative;
            overflow: hidden;
        }
        .ticket-header {
            background: #28a745; /* Warna Sukses */
            padding: 30px;
            color: white;
            text-align: center;
        }
        .icon-success {
            font-size: 4rem;
            margin-bottom: 10px;
        }
        .dashed-line {
            border-bottom: 2px dashed #eee;
            margin: 20px 0;
        }
        .btn-home {
            background-color: #17a2b8;
            color: white;
            border-radius: 50px;
            padding: 10px 30px;
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-ticket">
                    <div class="ticket-header">
                        <i class="bi bi-check-circle-fill icon-success"></i>
                        <h3 class="font-weight-bold">Booking Berhasil!</h3>
                        <p class="mb-0">Pesanan Anda telah kami terima.</p>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <small class="text-muted">ID Booking</small>
                            <h2 class="font-weight-bold text-dark">#{{ $booking->id }}</h2>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6 text-muted">Penyewa</div>
                            <div class="col-6 text-right font-weight-bold text-dark">{{ $booking->penyewa->nama_lengkap ?? 'Data Penyewa Tidak Ditemukan' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6 text-muted">Barang</div>
                            <div class="col-6 text-right font-weight-bold text-dark">
                                @foreach($booking->details as $d)
                                    {{ $d->kamera->nama }} <br>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6 text-muted">Tanggal Sewa</div>
                            <div class="col-6 text-right font-weight-bold text-dark">
                                {{ date('d/m/Y', strtotime($booking->tanggal_mulai)) }} <br>
                                <span class="text-muted small">s/d</span> <br>
                                {{ date('d/m/Y', strtotime($booking->tanggal_selesai)) }}
                            </div>
                        </div>

                        <div class="dashed-line"></div>

                        <div class="row align-items-center">
                            <div class="col-5">
                                <span class="text-muted">Total Bayar</span>
                            </div>
                            <div class="col-7 text-right">
                                <h3 class="font-weight-bold text-info m-0">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pb-4">
                        <p class="small text-muted mb-3">Tunjukkan ID Booking ini saat pengambilan unit.</p>
                        <a href="/" class="btn btn-home shadow-sm">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
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