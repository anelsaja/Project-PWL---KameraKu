@extends('layouts.main')
@section('title','Data Penyewa')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="m-0 font-weight-bold text-primary">
                <i class="bi bi-people-fill mr-2"></i>Data Penyewa
            </h5>
            {{-- Tombol tambah kita hilangkan karena data masuk dari Form Booking --}}
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
                            <th>Nama Penyewa</th>
                            <th>No. KTP</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th class="text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyewa as $idx => $p)
                        <tr>
                            <td class="text-center align-middle">{{ $idx + 1 }}</td>
                            
                            <td class="align-middle">
                                <span class="font-weight-bold text-dark">{{ $p->nama_lengkap }}</span>
                            </td>

                            <td class="align-middle">{{ $p->no_identitas }}</td>
                            
                            <td class="align-middle text-success">
                                <i class="bi bi-whatsapp mr-1"></i> {{ $p->no_hp }}
                            </td>

                            <td class="align-middle text-muted">{{ $p->alamat }}</td>

                            <td class="text-center align-middle">
                                <a href="/penyewa/delete/{{ $p->id }}" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus history penyewa {{ $p->nama }}?')"
                                   title="Hapus Data">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection