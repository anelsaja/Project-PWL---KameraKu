@extends('layouts.main')
@section('title', 'Data Kamera & Peralatan')
@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="m-0 font-weight-bold text-primary"><i class="bi bi-camera-fill mr-2"></i>Data Kamera</h5>
            <a href="/kamera/add-form" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-lg mr-1"></i> Tambah Kamera Baru
            </a>
        </div>

        <div class="card-body">
            @if (session('alert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill mr-2"></i> <strong>{{ session('alert') }}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table id="ex" class="table table-bordered table-hover table-striped display" style="width: 100%;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th width="15%">Gambar</th>
                            <th>Nama Kamera</th>
                            <th>Brand & Tipe</th>
                            <th>Harga Sewa</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($kmr as $idx => $k)
                        <tr>
                            <td class="text-center align-middle">{{ $idx + 1 }}</td>
                            
                            <td class="text-center align-middle">
                                @if ($k->gambar)
                                    <img src="{{ asset('storage/gambar/'.$k->gambar) }}" alt="{{ $k->nama }}" 
                                         class="img-fluid rounded shadow-sm" 
                                         style="width: 80px; height: 60px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/gambar/nogambar.jpg') }}" alt="No Image" 
                                         class="img-fluid rounded border" 
                                         style="width: 80px; height: 60px; object-fit: cover;">
                                @endif
                            </td>

                            <td class="align-middle font-weight-bold">{{ $k->nama }}</td>
                            <td class="align-middle">
                                <span class="badge badge-info">{{ $k->brand }}</span><br>
                                <small class="text-muted">{{ $k->type }}</small>
                            </td>
                            
                            <td class="align-middle text-success font-weight-bold">
                                Rp {{ number_format($k->harga ?? $k->price_per_day, 0, ',', '.') }} <small>/hari</small>
                            </td>

                            <td class="align-middle text-center">
                                @if($k->stock > 0)
                                    <span class="badge badge-success px-2 py-1">{{ $k->stock }} Unit</span>
                                @else
                                    <span class="badge badge-danger px-2 py-1">Habis</span>
                                @endif
                            </td>

                            <td class="text-center align-middle">
                                <div class="btn-group" role="group">
                                    <a href="/kamera/editform/{{ $k->id }}" class="btn btn-warning mr-2" title="Edit Data">
                                        <i class="bi bi-pencil-square text-white"></i>
                                    </a>
                                    <a href="/kamera/delete/{{ $k->id }}" class="btn btn-danger" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus kamera {{ $k->nama }}? Data yang dihapus tidak bisa dikembalikan.')" 
                                       title="Hapus Data">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection