@extends('layouts.main')
@section('title','Edit Data Kamera')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Stok</h1>
        <a href="/kamera" class="btn btn-secondary btn-sm shadow-sm">
            <i class="bi bi-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm mb-4 border-left-warning">
        <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-warning">
                <i class="bi bi-pencil-square mr-2"></i>Form Edit Kamera
            </h6>
        </div>
        
        <div class="card-body">
            {{-- Pastikan action mengarah ke route update dengan ID --}}
            <form action="/kamera/update/{{ $k->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Wajib untuk proses Update --}}
                
                <div class="row">
                    {{-- KOLOM KIRI: Informasi Utama --}}
                    <div class="col-md-6">
                        
                        {{-- Nama Barang --}}
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold small text-muted text-uppercase">Nama Kamera / Alat</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-camera"></i></span>
                                </div>
                                <input type="text" name="nama" id="nama" class="form-control border-left-0" 
                                       value="{{ $k->nama }}" required>
                            </div>
                        </div>

                        {{-- Brand --}}
                        <div class="form-group">
                            <label for="brand" class="font-weight-bold small text-muted text-uppercase">Merk / Brand</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-tag"></i></span>
                                </div>
                                <input type="text" name="brand" id="brand" class="form-control border-left-0" 
                                       value="{{ $k->brand }}" required>
                            </div>
                        </div>

                        {{-- Tipe (Dengan Logika Selected) --}}
                        <div class="form-group">
                            <label for="type" class="font-weight-bold small text-muted text-uppercase">Kategori</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-grid"></i></span>
                                </div>
                                <select name="type" id="type" class="form-control border-left-0" required>
                                    <option value="Mirrorless" {{ $k->type == 'Mirrorless' ? 'selected' : '' }}>Mirrorless</option>
                                    <option value="DSLR" {{ $k->type == 'DSLR' ? 'selected' : '' }}>DSLR</option>
                                    <option value="Lensa" {{ $k->type == 'Lensa' ? 'selected' : '' }}>Lensa</option>
                                    <option value="Aksesoris" {{ $k->type == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                </select>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold small text-muted text-uppercase">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" required>{{ $k->deskripsi }}</textarea>
                        </div>

                    </div>

                    {{-- KOLOM KANAN: Detail Penjualan --}}
                    <div class="col-md-6">
                        
                        {{-- Harga --}}
                        <div class="form-group">
                            <label for="harga" class="font-weight-bold small text-muted text-uppercase">Harga Sewa (Per Hari)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0 font-weight-bold">Rp</span>
                                </div>
                                <input type="number" name="harga" id="harga" class="form-control border-left-0" 
                                       value="{{ $k->harga }}" min="0" required>
                            </div>
                        </div>

                        {{-- Stok --}}
                        <div class="form-group">
                            <label for="stock" class="font-weight-bold small text-muted text-uppercase">Jumlah Stok</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="bi bi-box-seam"></i></span>
                                </div>
                                <input type="number" name="stock" id="stock" class="form-control border-left-0" 
                                       value="{{ $k->stock }}" min="1" required>
                            </div>
                        </div>

                        {{-- Upload Gambar Baru --}}
                        <div class="form-group">
                            <label for="gambar" class="font-weight-bold small text-muted text-uppercase">Update Foto (Opsional)</label>
                            <div class="custom-file">
                                <input type="file" accept="image/*" name="gambar" id="gambar" class="custom-file-input">
                                <label class="custom-file-label" for="gambar">Ganti gambar...</label>
                            </div>
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        </div>

                        {{-- Preview Gambar Saat Ini --}}
                        <div class="mt-3">
                            <p class="font-weight-bold small text-muted text-uppercase mb-2">Gambar Saat Ini:</p>
                            <div class="text-center p-2 bg-light rounded border">
                                @if($k->gambar)
                                    <img src="{{ asset('storage/gambar/'.$k->gambar) }}" alt="{{ $k->nama }}" class="img-fluid rounded" style="max-height: 200px;">
                                @else
                                    <div class="py-4">
                                        <i class="bi bi-image text-muted display-4"></i>
                                        <p class="small text-muted mt-2">Belum ada gambar</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                
                <hr class="my-4">

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning shadow-sm px-4 text-white">
                        <i class="bi bi-check-circle-fill mr-1"></i> Update Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection