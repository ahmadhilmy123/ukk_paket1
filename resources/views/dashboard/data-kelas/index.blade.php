@extends('layouts.app')

@section('title', 'Data Kelas')

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
            <h1>Data Kelas<h1>
        </div>
        <div class="row local">
            <div class="col-12">
                <div class="card-lu1">
                    <div class="card-body lu1 cal cal1">
                        <div class="card-title li">{{ __('Tambah Kelas') }}</div>
                        <form method="post" action="{{ url('/dashboard/data-kelas') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                    name="kelas" value="{{ old('kelas') }}">
                                <span class="text-danger">@error('kelas') {{ $message }} @enderror</span>
                            </div>

                            <div class="form-group">
                                <label>Kompeten Keahlian</label>
                                <input type="text" class="form-control @error('keahlian') is-invalid @enderror"
                                    name="keahlian" value="{{ old('keahlian') }}">
                                <span class="text-danger">@error('keahlian') {{ $message }} @enderror</span>
                            </div>

                            <button type="submit" class="btn btn-rounded">
                                <i class="mdi mdi-check"></i> Simpan
                            </button>
                           </form>
                        </div>
                    </div>     
                  </div>
         </div>
        <div class="row">
            <div class="col-md-12">
               <div class="card-lu1">
                  <div class="card-body lu1 cal">
                        <div class="card-title li">Data SPP</div>
                        <div class="table-responsive">
                            <table class="table-striped table" id="table-1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">KELAS</th>
                                        <th scope="col">KEAHLIAN</th>
                                        <th scope="col">DIBUAT</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($kelas as $value)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $value->nama_kelas }}</td>
                                        <td>{{ $value->kompetensi_keahlian }}</td>
                                        <td>{{ $value->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <div class="container d-flex" style="margin: 0;padding: 0;">
                                                <a href="{{ url('dashboard/data-kelas/'.$value->id.'/edit') }}" 
                                                   class="btn btn-primary m-1  mb-5 btn-lg">
                                                   <i class="fas fa-pencil-alt "></i>
                                               </a>
                                                <form method="post" action="{{ url('dashboard/data-kelas', $value->id) }}"
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
                        {{-- @if($kelas->lastPage() != 1)
                        <div class="btn-group float-right">
                            <a href="{{ $kelas->previousPageUrl() }}" class="btn btn-success">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                            @for($i = 1; $i <= $kelas->lastPage(); $i++)
                                <a class="btn btn-success {{ $i == $kelas->currentPage() ? 'active' : '' }}"
                                    href="{{ $kelas->url($i) }}">{{ $i }}</a>
                                @endfor
                                <a href="{{ $kelas->nextPageUrl() }}" class="btn btn-success">
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
                    text: "Yakin ingin menghapus data SPP?",
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