@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
        <link rel="shortcut icon" href="{{ asset('img/avatar/taruna.ico') }}" type="image/x-icon">
@endpush

@section('main')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-25">
            <div class="card">
                <div class="card2">
                  <div class="form">
                    <p id="heading">{{ __('Login Siswa') }}</p> 
                    <form method="POST" action="{{ url('login/siswa/proses') }}">
                        @csrf

                        <div class="field">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }} </label>
                                <input type="text" class="input-field @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required autofocus>
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            

                        <div class="field">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                                <input id="nama_siswa" type="text" class="input-field @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nisn') }}" required>
                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                        

                        <div class="btn">
                            <button class="button1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Login') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            <button class="button2">Sign Up</button>
                            </div>
                            <div class="button3">
                            <a href="{{ url('login') }}" class="text-white" style="text-decoration:none;"><center>Login untuk <b>petugas</b> silahkan Klik Disini</center></a>
                             </div>
                        </div>
                   </div>
                        </form>
                 </div>
            </div>
        </div>
    </div>
@endsection
