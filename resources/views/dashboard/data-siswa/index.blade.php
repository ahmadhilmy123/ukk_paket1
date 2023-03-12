@extends('layouts.app')

@section('title', 'Data-Siswa')


@push('style')
<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css" />
<link rel="shortcut icon" href="{{ asset('img/avatar/taruna.ico') }}" type="image/x-icon">
@endpush

@section('main')
<div class="main-content warna">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa<h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-lu1">
                    <div class="card-body lu1 cal1">
                        <a href="{{ url('dashboard/data-siswa/create') }}"
                            class="btn btn-success btn-rounded float-right mb-3">
                            <i class="mdi mdi-plus-circle"></i> {{ __('Tambah Siswa') }}
                        </a>
                        <div class="table-responsive">
                            <table class="table-striped table" id="table-1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NISN</th>
                                        <th scope="col">NIS</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">NOMOR TELEPON</th>
                                        <th scope="col">ALAMAT</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($siswa as $value)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $value->nisn }}</td>
                                        <td>{{ $value->nis }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->kelas->nama_kelas }}</td>
                                        <td>{{ $value->nomor_telp }}</td>
                                        <td>{{ $value->alamat }}</td>
                                        <td>
                                            <div class="container d-flex" style="margin: 0;padding: 0;">
                                                <a href="{{ url('dashboard/data-siswa/'.$value->id.'/edit') }}" 
                                                   class="btn btn-primary m-1  mb-5 btn-lg">
                                                   <i class="fas fa-pencil-alt "></i>
                                               </a>
                                                <form method="post" action="{{ url('dashboard/data-siswa', $value->id) }}"
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

                        <!-- Pagination -->
                        {{-- @if($siswa->lastPage() != 1)
                        <div class="btn-group float-right">
                            <a href="{{ $siswa->previousPageUrl() }}" class="btn btn-success">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                            @for($i = 1; $i <= $siswa->lastPage(); $i++)
                                <a class="btn btn-success {{ $i == $siswa->currentPage() ? 'active' : '' }}"
                                    href="{{ $siswa->url($i) }}">{{ $i }}</a>
                                @endfor
                                <a href="{{ $siswa->nextPageUrl() }}" class="btn btn-success">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                        </div>
                        @endif --}}
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