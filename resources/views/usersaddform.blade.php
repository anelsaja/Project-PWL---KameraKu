@extends('layouts.main')
@section('title','Tambah User Baru')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Pengguna</h1>
        <a href="/users" class="btn btn-secondary btn-sm shadow-sm">
            <i class="bi bi-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            
            <div class="card shadow-sm mb-4 border-left-primary">
                <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="bi bi-person-plus-fill mr-2"></i>Form Tambah User
                    </h6>
                </div>
                
                <div class="card-body">
                    <form action="/users/save" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-bold small text-muted text-uppercase">Nama Lengkap</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-person"></i></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control border-left-0" placeholder="Masukkan nama lengkap..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold small text-muted text-uppercase">Alamat Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-envelope"></i></span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control border-left-0" placeholder="contoh@email.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-weight-bold small text-muted text-uppercase">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-lock"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control border-left-0" placeholder="Buat password yang aman..." required>
                            </div>
                            <small class="text-muted">Minimal 8 karakter disarankan.</small>
                        </div>

                        <div class="form-group">
                            <label for="foto" class="font-weight-bold small text-muted text-uppercase">Foto Profil (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" name="foto" id="foto" class="custom-file-input">
                                <label class="custom-file-label" for="foto">Pilih foto...</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary shadow-sm px-4">
                                <i class="bi bi-save2-fill mr-1"></i> Simpan User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection