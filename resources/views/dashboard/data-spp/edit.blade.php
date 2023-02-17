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
       <div class="col-12">
         <div class="card">
                  <div class="card-body">
                       <div class="card-title">{{ __('Edit SPP') }}</div>
                     
                        <form method="post" action="{{ url('/dashboard/data-spp', $edit->id) }}">
                           @csrf
                           @method('put')
                           
                           <div class="form-group">
                              <label>Tahun</label>
                              <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ $edit->tahun }}">
                              <span class="text-danger">@error('tahun') {{ $message }} @enderror</span>
                           </div>
                           
                           <div class="form-group">
                              <label>Nominal</label>
                              <input type="text" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ $edit->nominal }}">
                              <span class="text-danger">@error('nominal') {{ $message }} @enderror</span>
                           </div>
                           
                           <a href="{{ url('dashboard/data-spp') }}" class="btn btn-primary btn-rounded">
                              <i class="mdi mdi-chevron-left"></i> Kembali
                           </a>
                           
                           <button type="submit" class="btn btn-success btn-rounded  float-right">
                                 <i class="mdi mdi-check"></i> Simpan
                           </button>
                        
                        </form>
                  </div>
              </div>     
            </div>
            
	</div>
@endsection