@extends('layouts.main')
@section('title','Data Admin')
@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="m-0 font-weight-bold text-primary"><i class="bi bi-person-badge-fill mr-2"></i>Data Admin</h5>
            <a href="/users/add-form" class="btn btn-primary shadow-sm">
                <i class="bi bi-person-plus-fill mr-1"></i> Tambah User Baru
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
                            <th class="text-center" width="10%">Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Email Login</th>
                            <th class="text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($km as $idx => $n)
                        <tr>
                            <td class="text-center align-middle">{{ $idx + 1 }}</td>
                            
                            <td class="text-center align-middle">
                                @if ($n->foto)
                                    <img src="{{ asset('storage/foto/'.$n->foto) }}" alt="{{ $n->name }}" 
                                         class="rounded-circle shadow-sm border" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/foto/nogambar.jpg') }}" alt="No Image" 
                                         class="rounded-circle shadow-sm border" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @endif
                            </td>

                            <td class="align-middle">
                                <span class="font-weight-bold text-dark">{{ $n->name }}</span>
                                @if(Auth::id() == $n->id)
                                    <span class="badge badge-success ml-2">Saya (Sedang Login)</span>
                                @endif
                            </td>

                            <td class="align-middle text-muted">{{ $n->email }}</td>

                            <td class="text-center align-middle">
                                @if(Auth::id() != $n->id)
                                    <a href="/users/delete/{{ $n->id }}" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus user {{ $n->name }}?')"
                                       title="Hapus User">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </a>
                                @else
                                    <button class="btn btn-secondary" disabled title="Tidak bisa hapus akun sendiri">
                                        <i class="bi bi-lock-fill"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection