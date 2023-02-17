@extends('layouts.app')

@section('title', 'History')

@push('style')
<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css" />
@endpush

@section('main')
<div class="main-content">
   <section class="section">
       <div class="section-header">
           <h1>Data Barang<h1>
       </div>
       <div class="row">
         <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                       <div class="card-title li">{{ __('Edit Kelas') }}</div>
                     
                        <form method="post" action="{{ url('/dashboard/data-kelas', $edit->id) }}">
                        
                           @csrf
                           @method('put')
                           
                           <div class="form-group">
                              <label>Nama Kelas</label>
                              <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ $edit->nama_kelas }}">
                              <span class="text-danger">@error('kelas') {{ $message }} @enderror</span>
                           </div>
                           
                           <div class="form-group">
                              <label>Kompeten Keahlian</label>
                              <input type="text" class="form-control @error('keahlian') is-invalid @enderror" name="keahlian" value="{{ $edit->kompetensi_keahlian }}">
                              <span class="text-danger">@error('keahlian') {{ $message }} @enderror</span>
                           </div>
                           
                           <button type="submit" class="btn btn-success btn-rounded">
                                 <i class="mdi mdi-check"></i> Simpan
                           </button>
                        
                        </form>
                  </div>
              </div>     
            </div>     
	</div>

@endsection

@section('sweet')

function deleteData(id){
      Swal.fire({
               title: 'PERINGATAN!',
               text: "Yakin ingin menghapus data kelas?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal',
            }).then((result) => {
               if (result.value) {
                     $('#delete'+id).submit();
                  }
               })

@endsection