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
             <div class="card-body p-0">
                 <div class="bd-highlight d-flex">
             <div class="card-title li">{{ __('Tambah Siswa') }}</div>
                
             <form method="post" action="{{ url('dashboard/data-siswa') }}">
                @csrf
                
                 <div class="form-group">
                   <label>NISN</label>
                   <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}">
                   <span class="text-danger">@error('nisn') {{ $message }} @enderror</span>
                </div>
                
                <div class="form-group">
                   <label>NIS</label>
                   <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}">
                   <span class="text-danger">@error('nis') {{ $message }} @enderror</span>
                </div>
                
                <div class="form-group">
                   <label>Nama</label>
                   <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                   <span class="text-danger">@error('nama') {{ $message }} @enderror</span>
                </div>
                
                   <div class="input-group mb-3">									
                      <div class="input-group-prepend">										
                         <label class="input-group-text">										 	
                            Kelas	
                         </label>
                      </div>
                      <select name="kelas" class="custom-select @error('kelas') is-invalid @enderror" {{ count($kelas) == 0 ? 'disabled' : '' }}>
                         @if(count($kelas) == 0)											
                            <option>Pilihan tidak ada</option>
                         @else											
                            <option value="">Silahkan Pilih</option>											
                               @foreach($kelas as $value) 			
                                  <option value="{{ $value->id }}">{{ $value->nama_kelas }}</option>
                               @endforeach
                         @endif	
                     </select>
                   </div>
                   <span class="text-danger">@error('kelas') {{ $message }} @enderror</span>
                                  
                <div class="form-group">
                   <label>Nomor Telepon</label>
                   <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}">
                   <span class="text-danger">@error('nomor_telepon') {{ $message }} @enderror</span>
                </div>
                
                <div class="form-group">
                   <label>Alamat</label>
                   <textarea class="form-control @error('alamat') is-invalid @enderror" rows="5" name="alamat">{{ old('alamat') }}</textarea>
                   <span class="text-danger">@error('alamat') {{ $message }} @enderror</span>
                </div>
                
                <div class="input-group mb-3">									
                      <div class="input-group-prepend">										
                         <label class="input-group-text">										 	
                            SPP	
                         </label>
                      </div>
                      <select name="spp" class="custom-select @error('spp') is-invalid @enderror" {{ count($spp) == 0 ? 'disabled' : '' }}>
                         @if(count($spp) == 0)											
                            <option>Pilihan tidak ada</option>
                         @else											
                            <option value="">Silahkan Pilih</option>											
                               @foreach($spp as $value) 			
                                  <option value="{{ $value->id }}">{{ 'Tahun '.$value->tahun.' - '.'Rp.'.$value->nominal }}</option>
                               @endforeach
                         @endif	
                     </select>
                   </div>
                   <span class="text-danger">@error('spp') {{ $message }} @enderror</span>
             
                    <div class="border-top">
          
             <button type="submit" class="btn btn-success btn-rounded float-right mt-3">
                   <i class="mdi mdi-check"></i> {{ __('Simpan') }}
               </button>
               
               <a href="{{ url('dashboard/data-siswa') }}" class="btn btn-primary btn-rounded mt-3">
                   <i class="mdi mdi-chevron-left"></i> {{ __('Kembali') }}
               </a>
             </form>
             
          </div>
          </div>
         
       </div>
    </div>
 </div>

@endsection