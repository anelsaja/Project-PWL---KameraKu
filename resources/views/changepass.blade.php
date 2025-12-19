@extends('layouts.main')
@section('title','Ubah Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Keamanan Akun</h1>
        </div>

        <div class="card shadow-sm mb-4 border-left-primary">
            <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="bi bi-shield-lock-fill mr-2"></i>Form Ubah Password
                </h6>
            </div>
            
            <div class="card-body">
                @if (session('alert'))
                    <div class="alert alert-warning alert-dismissible fade show border-left-warning" role="alert">
                        <i class="bi bi-exclamation-triangle-fill mr-2"></i> {{ session('alert') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="/password/update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="passwordbaru" class="font-weight-bold small text-muted text-uppercase">Password Baru</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="bi bi-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="passwordbaru" id="passwordbaru" 
                                class="form-control border-left-0" placeholder="Masukkan password baru..." required>
                        </div>
                        <small class="form-text text-muted">Gunakan kombinasi huruf dan angka agar lebih aman.</small>
                    </div>

                    <div class="form-group">
                        <label for="passwordkonfirmasi" class="font-weight-bold small text-muted text-uppercase">Konfirmasi Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                            </div>
                            <input type="password" name="passwordkonfirmasi" id="passwordkonfirmasi" 
                                class="form-control border-left-0" placeholder="Ulangi password baru..." required>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-sm shadow-sm px-4">
                            <i class="bi bi-save2-fill mr-1"></i> Simpan Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection