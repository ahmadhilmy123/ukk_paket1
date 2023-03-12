@extends('layouts.app')

@section('title', 'Laporan')

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
           <h1>Data Laporan<h1>
       </div>
       
       <div class="row local">
           <div class="col-12">
               <div class="card-lu1">
                   <div class="card-body lu1 cal cal1">
               <div class="card-title li"> Buat Laporan</div>
               
                  <div class="alert alert-pad">Buat laporan pembayaran SPP siswa, semua data siswa akan di rekap dan di buat laporannya.</div>
                  <form method="post" action="{{ url('dashboard/laporan/create') }}" id="create">
                    @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text">
                                        Kelas
                                    </label>
                                </div>
                                <select name="kelas" class="custom-select @error('kelas') is-invalid @enderror"
                                    {{ count($kelas) == 0 ? 'disabled' : '' }}>
                                    @if(count($kelas) == 0)
                                    <option>Pilihan tidak ada</option>
                                    @else
                                    <option value="">Semua Kelas</option>
                                    @foreach($kelas as $value)
                                    <option >{{ $value->nama_kelas }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <span class="text-danger">@error('kelas') {{ $message }} @enderror</span>
                              <button type="submit" class="btn btn-primary btn-rounded"> Buat Laporan</button>
                        </form>
                  {{-- <a href="{{ url('dashboard/laporan/create') }}" class="btn btn-primary btn-rounded">Buat Laporan</a> --}}
                                
            </div>
         </div>
      
      </div>
   </div>

@endsection