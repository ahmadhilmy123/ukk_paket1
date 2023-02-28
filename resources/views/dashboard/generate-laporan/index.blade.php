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
           <h1>Data Laporan<h1>
       </div>
       <div class="row local">
           <div class="col-12">
               <div class="card-lu1">
                   <div class="card-body lu1 cal cal1">
               <div class="card-title li"> Buat Laporan</div>
               
                  <div class="alert alert-pad">Buat laporan pembayaran SPP siswa, semua data siswa akan di rekap dan di buat laporannya.</div>
                       
                  <a href="{{ url('dashboard/laporan/create') }}" class="btn btn-primary btn-rounded">Buat Laporan</a>
                                
            </div>
         </div>
      
      </div>
   </div>

@endsection