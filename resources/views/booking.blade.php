@extends('layouts.main')
@section('title','Data Booking')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="m-0 font-weight-bold text-primary">
                <i class="bi bi-cart-check-fill mr-2"></i>Data Booking Masuk
            </h5>
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
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th>Nama Penyewa</th>
                            <th>Unit Kamera</th>
                            <th>Tanggal Sewa</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $idx => $b)
                        <tr>
                            <td class="text-center align-middle">{{ $idx + 1 }}</td>
                            
                            <td class="align-middle font-weight-bold">
                                {{ $b->penyewa->nama_lengkap ?? 'Data Terhapus' }} <br>
                                <small class="text-muted">{{ $b->penyewa->no_hp ?? '-' }}</small>
                            </td>

                            <td class="align-middle">
                                <ul class="pl-3 m-0">
                                    @foreach($b->details as $detail)
                                        <li>{{ $detail->kamera->nama ?? 'Produk Dihapus' }}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="align-middle text-center small">
                                <div>Mulai: <strong>{{ date('d-m-Y', strtotime($b->tanggal_mulai)) }}</strong></div>
                                <div>Selesai: <strong>{{ date('d-m-Y', strtotime($b->tanggal_selesai)) }}</strong></div>
                            </td>

                            <td class="align-middle text-right">
                                Rp {{ number_format($b->total_harga, 0, ',', '.') }}
                            </td>

                            <td class="align-middle text-center">
                                <form action="/booking/updatestatus/{{ $b->id }}" method="POST">
                                    @csrf
                                    @php
                                        $classStatus = '';
                                        if($b->status == 'pending') {
                                            $classStatus = 'border-warning text-warning font-weight-bold';
                                        } elseif($b->status == 'disewa') {
                                            $classStatus = 'border-primary text-primary font-weight-bold';
                                        } elseif($b->status == 'selesai') {
                                            $classStatus = 'border-success text-success font-weight-bold';
                                        }
                                    @endphp
                                    <select name="status" class="form-control form-control-sm {{ $classStatus }}" 
                                        onchange="this.form.submit()" style="border-width: 2px;">
                                        
                                        <option value="pending" {{ $b->status == 'pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                        
                                        <option value="disewa" {{ $b->status == 'disewa' ? 'selected' : '' }}>
                                            Sedang Disewa
                                        </option>
                                        
                                        <option value="selesai" {{ $b->status == 'selesai' ? 'selected' : '' }}>
                                            Selesai
                                        </option>

                                    </select>
                                </form>
                            </td>

                            <td class="text-center align-middle">
                                <a href="/booking/delete/{{ $b->id }}" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                title="Hapus Booking">
                                    <i class="bi bi-trash-fill"></i>
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