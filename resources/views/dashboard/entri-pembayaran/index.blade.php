@extends('layouts.app')

@section('title', 'History')

@push('style')
<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css" />
@endpush

@section('main')
<div class="main-content warna">
    <section class="section">
        <div class="section-header">
            <h1>Data Barang<h1>
        </div>
        <div class="row local">
            <div class="col-12">
                <div class="card-lu1">
                    <div class="card-body lu1 cal cal1">
                <div class="card-title li">Entri Pembayaran</div>

                <form method="post" action="{{ url('dashboard/pembayaran') }}">
                    @csrf

                    <div class="form-group">
                        <label>NISN Siswa</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn">
                        <span class="text-danger">@error('nisn') {{ $message }} @enderror</span>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">
                                SPP Bulan
                            </label>
                        </div>
                        <select class="custom-select @error('spp_bulan') is-invalid @enderror" name="spp_bulan">

                            <option value="">Silahkan Pilih</option>
                            <option value="januari">Januari</option>
                            <option value="februari">Februari</option>
                            <option value="maret">Maret</option>
                            <option value="april">April</option>
                            <option value="mei">Mei</option>
                            <option value="juni">Juni</option>
                            <option value="juli">Juli</option>
                            <option value="agustus">Agustus</option>
                            <option value="september">September</option>
                            <option value="oktober">Oktober</option>
                            <option value="november">November</option>
                            <option value="desember">Desember</option>
                        </select>
                    </div>
                    <span class="text-danger">@error('spp_bulan') {{ $message }} @enderror</span>

                    <div class="form-group">
                        <label>Jumlah Bayar</label>
                        <input type="text" class="form-control @error('jumlah_bayar') is-invalid @enderror"
                            name="jumlah_bayar">
                        <span class="text-danger">@error('jumlah_bayar') {{ $message }} @enderror</span>
                    </div>

                    <button type="submit" class="btn btn-rounded">
                        <i class="mdi mdi-check"></i> Simpan
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

<div class="row local">
    <div class="col-12">
        <div class="card-lu1">
            <div class="card-body lu1 cal">
                <div class="card-title li">Data Pembayaran</div>
                <div class="table-responsive">
                    <table class="table-striped table" id="table-1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">PETUGAS</th>
                                <th scope="col">NISN SISWA</th>
                                <th scope="col">NAMA SISWA</th>
                                <th scope="col">SPP</th>
                                <th scope="col">JUMLAH BAYAR</th>
                                <th scope="col">TANGGAL BAYAR</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($pembayaran as $value)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $value->users->name }}</td>
                                <td>{{ $value->siswa->nisn }}</td>
                                <td>{{ $value->siswa->nama }}</td>
                                <td>{{ $value->siswa->spp->nominal }}</td>
                                <td>{{ $value->jumlah_bayar }}</td>
                                <td>{{ $value->created_at->format('d M, Y') }}</td>
                                <td>
                                     <div class="container d-flex" style="margin: 0;padding: 0;">
                                                <a href="{{ url('dashboard/pembayaran/'.$value->id.'/edit') }}" 
                                                   class="btn btn-primary m-1  mb-5 btn-lg">
                                                   <i class="fas fa-pencil-alt "></i>
                                               </a>
                                                <form method="post" action="{{ url('dashboard/pembayaran', $value->id) }}"
                                                    id="delete{{ $value->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-icon btn-danger m-1 ml-3  mb-3 btn-lg delete swal-confrim"
                                                        onclick="deleteData1({{ $value->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <! -- Pagination -->
                    @if($pembayaran->lastPage() != 1)
                    <div class="btn-group float-right">
                        <a href="{{ $pembayaran->previousPageUrl() }}" class="btn btn-success">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                        @for($i = 1; $i <= $pembayaran->lastPage(); $i++)
                            <a class="btn btn-success {{ $i == $pembayaran->currentPage() ? 'active' : '' }}"
                                href="{{ $pembayaran->url($i) }}">{{ $i }}</a>
                            @endfor
                            <a href="{{ $pembayaran->nextPageUrl() }}" class="btn btn-success">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                    </div>
                    @endif
            </div>
        </div>

    </div>
</div>
@include('sweetalert::alert')
<script>
    function deleteData1(id) {
        Swal.fire({
            title: 'PERINGATAN!',
            text: "Yakin ingin menghapus data siswa? data pembayaran atas nama siswa ini pun akan dihapus jika ada.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                $('#delete' + id).submit();
            }
        })
    }
   </script>
    @endsection