<!doctype html>
<html lang="en">
  <head>
    <title>Form Sewa Kamera - KameraKu</title>
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
        
        /* Custom Card untuk Form */
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .card-header-custom {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
            padding: 20px;
            border: none;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #ddd;
        }
        .form-control:focus { box-shadow: none; border-color: #17a2b8; }
        .btn-custom {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 50px;
            font-weight: 600;
            width: 100%;
            transition: 0.3s;
        }
        .btn-custom:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(23, 162, 184, 0.4); color: white; }
    </style>
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
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card card-custom h-100">
                    <div class="card-header card-header-custom">
                        <h5 class="m-0 font-weight-bold"><i class="bi bi-pencil-square mr-2"></i> Lengkapi Data Penyewa</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="/booking/simpan" method="POST">
                            @csrf
                            <input type="hidden" name="id_kamera" value="{{ $kamera->id }}">

                            <h6 class="text-muted mb-3">Informasi Personal</h6>
                            <div class="form-group">
                                <label>Nama Lengkap (Sesuai KTP)</label>
                                <input type="text" name="nama_penyewa" class="form-control" required placeholder="Masukkan nama lengkap Anda">
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Nomor Identitas (KTP/SIM)</label>
                                    <input type="number" name="no_ktp" class="form-control" required placeholder="Contoh: 3302...">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>No. WhatsApp Aktif</label>
                                    <input type="number" name="no_hp" class="form-control" required placeholder="Contoh: 0812...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Domisili</label>
                                <textarea name="alamat" class="form-control" rows="2" required placeholder="Alamat lengkap tempat tinggal saat ini"></textarea>
                            </div>

                            <hr class="my-4">
                            <h6 class="text-muted mb-3">Detail Sewa</h6>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Tanggal Ambil Unit</label>
                                    <input type="date" name="tanggal_mulai" id="tgl_mulai" class="form-control" 
                                        required min="{{ date('Y-m-d') }}">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Tanggal Kembalikan Unit</label>
                                    <input type="date" name="tanggal_selesai" id="tgl_selesai" class="form-control" 
                                        required min="{{ date('Y-m-d') }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-custom mt-3">
                                <i class="bi bi-bag-check-fill"></i> Konfirmasi Booking
                            </button>
                            <a href="/" class="btn btn-link text-secondary btn-block mt-2" style="text-decoration: none;">Batal & Kembali</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card card-custom">
                    <div class="card-body text-center p-4">
                        <div class="mb-3 rounded overflow-hidden" style="height: 200px; background: #f1f1f1; display: flex; align-items: center; justify-content: center;">
                            @if($kamera->gambar)
                                <img src="{{ asset('storage/gambar/'.$kamera->gambar) }}" class="img-fluid" style="width:100%; height:100%; object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </div>

                        <h5 class="font-weight-bold mb-1">{{ $kamera->nama }}</h5>
                        <div class="mb-3">
                            <span class="badge badge-info p-2">{{ $kamera->brand }}</span>
                            <span class="badge badge-secondary p-2">{{ $kamera->type }}</span>
                        </div>

                        <div class="alert alert-light border border-info rounded-lg">
                            <small class="text-muted">Harga Sewa per Hari</small>
                            <h3 class="font-weight-bold text-info m-0">Rp {{ number_format($kamera->harga, 0, ',', '.') }}</h3>
                        </div>

                        <ul class="list-group list-group-flush text-left small">
                            <li class="list-group-item bg-transparent pl-0"><i class="bi bi-check-circle text-success mr-2"></i> Kondisi Fisik 98%</li>
                            <li class="list-group-item bg-transparent pl-0"><i class="bi bi-check-circle text-success mr-2"></i> Baterai & Charger Termasuk</li>
                            <li class="list-group-item bg-transparent pl-0"><i class="bi bi-check-circle text-success mr-2"></i> Tas Kamera Included</li>
                        </ul>
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
     <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tglMulai = document.getElementById('tgl_mulai');
            const tglSelesai = document.getElementById('tgl_selesai');

            tglMulai.addEventListener('change', function() {
                tglSelesai.min = this.value;
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>