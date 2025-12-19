@extends('layouts.main')
@section('title','Tambah Kamera Baru')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Stok</h1>
        <a href="/kamera" class="btn btn-secondary btn-sm shadow-sm">
            <i class="bi bi-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm mb-4 border-left-primary">
        <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="bi bi-plus-circle-fill mr-2"></i>Form Tambah Kamera
            </h6>
        </div>
        
        <div class="card-body">
            <form action="/kamera/save" method="post" enctype="multipart/form-data">
                @csrf               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold small text-muted text-uppercase">Nama Kamera / Alat</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-camera"></i></span>
                                </div>
                                <input type="text" name="nama" id="nama" class="form-control border-left-0" placeholder="Contoh: Canon EOS R5" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="brand" class="font-weight-bold small text-muted text-uppercase">Merk / Brand</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-tag"></i></span>
                                </div>
                                <input type="text" name="brand" id="brand" class="form-control border-left-0" placeholder="Contoh: Canon, Sony, Nikon" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="font-weight-bold small text-muted text-uppercase">Kategori</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-grid"></i></span>
                                </div>
                                <select name="type" id="type" class="form-control border-left-0" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    <option value="Mirrorless">Mirrorless</option>
                                    <option value="DSLR">DSLR</option>
                                    <option value="Lensa">Lensa</option>
                                    <option value="Aksesoris">Aksesoris</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold small text-muted text-uppercase">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" placeholder="Tuliskan spesifikasi singkat atau kelengkapan..." required></textarea>
                        </div>

                    </div>

                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold small text-muted text-uppercase">Harga Sewa (Per Hari)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0 font-weight-bold">Rp</span>
                                </div>
                                <input type="number" name="harga" id="harga" class="form-control border-left-0" placeholder="0" min="0" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock" class="font-weight-bold small text-muted text-uppercase">Jumlah Stok</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-box-seam"></i></span>
                                </div>
                                <input type="number" name="stock" id="stock" class="form-control border-left-0" placeholder="0" min="1" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar" class="font-weight-bold small text-muted text-uppercase">Foto Produk</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" name="gambar" id="gambar" class="custom-file-input" required>
                                <label class="custom-file-label" for="gambar">Pilih file gambar...</label>
                            </div>
                            <small class="text-muted">Format yang disarankan: JPG, PNG. Ukuran maks 2MB.</small>
                        </div>

                        <div class="text-center p-4 bg-light rounded border border-light mt-3">
                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                            <p class="small text-muted mb-0">Preview gambar akan muncul setelah disimpan</p>
                        </div>

                    </div>
                </div>
                
                <hr class="my-4">

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary shadow-sm px-4">
                        <i class="bi bi-cloud-upload-fill mr-1"></i> Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection