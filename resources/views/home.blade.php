@extends('layouts.main')
@section('title', 'Dashboard Admin')
@section('content')
    <div class="jumbotron jumbotron-fluid bg-white rounded shadow-sm p-4 mb-4 border-left-primary">
        <div class="container-fluid">
            <h2 class="text-dark font-weight-bold">Halo, {{ Auth::user()->name }}! 👋</h2>
            <p class="lead text-muted mb-0">Selamat datang kembali di Panel Admin KameraKu. Berikut adalah ringkasan aktivitas toko hari ini.</p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1 font-weight-bold" style="font-size: 0.8rem; opacity: 0.9;">Pesanan Baru</p>
                            <h2 class="mb-0 font-weight-bold">{{ $booking_pending ?? 0 }}</h2>
                        </div>
                        <i class="bi bi-bell-fill display-4" style="opacity: 0.3;"></i>
                    </div>
                    <small class="mt-2 d-block" style="opacity: 0.9;">Perlu konfirmasi Anda</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1 font-weight-bold" style="font-size: 0.8rem; opacity: 0.9;">Sedang Disewa</p>
                            <h2 class="mb-0 font-weight-bold">{{ $booking_active ?? 0 }}</h2>
                        </div>
                        <i class="bi bi-camera-reels-fill display-4" style="opacity: 0.3;"></i>
                    </div>
                    <small class="mt-2 d-block" style="opacity: 0.9;">Unit di tangan pelanggan</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1 font-weight-bold" style="font-size: 0.8rem; opacity: 0.9;">Total Kamera</p>
                            <h2 class="mb-0 font-weight-bold">{{ $total_kamera ?? 0 }}</h2>
                        </div>
                        <i class="bi bi-camera-fill display-4" style="opacity: 0.3;"></i>
                    </div>
                    <small class="mt-2 d-block" style="opacity: 0.9;">Unit terdaftar di sistem</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-uppercase mb-1 font-weight-bold" style="font-size: 0.8rem; opacity: 0.9;">Pelanggan</p>
                            <h2 class="mb-0 font-weight-bold">{{ $total_user ?? 0 }}</h2>
                        </div>
                        <i class="bi bi-people-fill display-4" style="opacity: 0.3;"></i>
                    </div>
                    <small class="mt-2 d-block" style="opacity: 0.9;">User terdaftar</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-clock-history mr-2"></i>Pesanan Masuk Terkini</h6>
                    <a href="/booking" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID Resi</th>
                                <th>Nama Penyewa</th>
                                <th>Tanggal Sewa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_bookings as $booking)
                            <tr>
                                <td class="font-weight-bold text-primary">
                                    #{{ $booking->id }}
                                </td>
                                <td>
                                    <div class="font-weight-bold">
                                        {{ $booking->penyewa->nama_lengkap ?? 'User Terhapus' }}
                                    </div>
                                    <small class="text-muted">
                                        {{ $booking->penyewa->no_hp ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    {{ date('d M', strtotime($booking->tanggal_mulai)) }} - 
                                    {{ date('d M', strtotime($booking->tanggal_selesai)) }}
                                </td>
                                <td>
                                    @if($booking->status == 'pending')
                                        <span class="badge badge-warning">Menunggu</span>
                                    @elseif($booking->status == 'disewa')
                                        <span class="badge badge-primary">Sedang Disewa</span>
                                    @elseif($booking->status == 'selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @else
                                        <span class="badge badge-danger">{{ $booking->status }}</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                    Belum ada pesanan masuk.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="bi bi-grid-fill mr-2"></i>Pintasan Menu</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted small mb-3">Akses cepat ke menu yang sering digunakan:</p>
                    
                    <a href="/kamera/add-form" class="btn btn-light btn-block text-left mb-3 shadow-sm border py-3 hover-effect">
                        <div class="d-flex align-items-center text-primary">
                            <i class="bi bi-plus-circle-fill h4 mb-0 mr-3"></i>
                            <div>
                                <h6 class="font-weight-bold mb-0">Tambah Kamera</h6>
                                <small class="text-muted">Input stok barang baru</small>
                            </div>
                        </div>
                    </a>
                    
                    <a href="/booking" class="btn btn-light btn-block text-left mb-3 shadow-sm border py-3 hover-effect">
                        <div class="d-flex align-items-center text-success">
                            <i class="bi bi-calendar-check-fill h4 mb-0 mr-3"></i>
                            <div>
                                <h6 class="font-weight-bold mb-0">Kelola Pesanan</h6>
                                <small class="text-muted">Cek konfirmasi & pengembalian</small>
                            </div>
                        </div>
                    </a>
                    
                    <a href="/users" class="btn btn-light btn-block text-left mb-3 shadow-sm border py-3 hover-effect">
                        <div class="d-flex align-items-center text-info">
                            <i class="bi bi-shield-lock-fill h4 mb-0 mr-3"></i>
                            <div>
                                <h6 class="font-weight-bold mb-0">Data Admin</h6>
                                <small class="text-muted">Kelola akun karyawan</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .border-left-primary {
            border-left: 5px solid #3b82f6 !important;
        }
        .hover-effect:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            transition: all 0.2s;
        }
    </style>
@endsection