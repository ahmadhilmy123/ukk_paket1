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
                       <div class="card-title">{{ __('Tambah Petugas') }}</div>
                     
                        <form method="post" action="{{ url('/dashboard/data-petugas') }}" id="create">
                           @csrf
                           
                           <div class="input-group mb-3">									
                        <div class="input-group-prepend">										
                           <label class="input-group-text">										 	
                              Level	
                           </label>
                        </div>
                        <select name="level" class="custom-select @error('level') is-invalid @enderror">							
                              <option value="">Silahkan Pilih</option>											
                              <option value="admin">admin</option>
                              <option value="petugas">petugas</option>
                       </select>
                     </div>
                     <span class="text-danger">@error('level') {{ $message }} @enderror</span>
               
   
                           <div class="form-group">
                              <label>Nama</label>
                              <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                              <span class="text-danger">@error('nama') {{ $message }} @enderror</span>
                           </div>
                           
                           <div class="form-group">
                              <label>Email</label>
                              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                              <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                           </div>
                           
                           <div class="form-group">
                              <label>Password</label>
                              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password">
                              <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                           </div>
                           
                           <div class="form-group">
                              <label>Konfirmasi Password</label>
                              <input type="password" id="konfirmasi_password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password">
                              <span class="text-danger">@error('confirm_password') {{ $message }} @enderror</span>
                           </div>
                           
                           <button type="button" class="btn btn-success btn-rounded" onclick="button()">
                                 <i class="mdi mdi-check"></i> Simpan
                           </button>
                        
                        </form>
                  </div>
              </div>     
            </div>
            
	</div>

@endsection

@section('sweet')

    function button()
   {
        var password = $('#password').val()
        var confirm_password = $('#konfirmasi_password').val()
        
        if(password == confirm_password){
             $('#create').submit()
         }else{
            swal.fire({
               title: 'Terjadi Kesalahan!',
               text: "Konfirmasi password kamu tidak cocok, tolong coba lagi",
               icon: 'error',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            })
         }
   }
   
@endsection