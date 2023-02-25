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
         <div class="card-lu1">
            <div class="card-body lu1 li">
               <div class="card-title li">Histori Pembayaran</div>
               
                  @foreach($pembayaran as $value)
                     <div class="border-top">
                        <div class="float-right">
                           <i class="mdi mdi-check text-success "></i> {{ $value->created_at->format('d M, Y') }}
                        </div>
                        <div class="mt-4 text-uppercase ">
                           {{ $value->siswa->nama .' - '. $value->siswa->kelas->nama_kelas }}
                        </div>
                           <div>SPP Bulan <b class="text-capitalize ">{{ $value->spp_bulan }}</b></div>
                           <div>Nominal SPP Rp.{{ $spp = $value->siswa->spp->nominal }}</div>
                           <div>Bayar Rp.{{ $bayar = $value->jumlah_bayar }}</div>
                           <div>Tunggakan Rp.{{ $spp - $bayar }}</div>                        
                     </div>
                  @endforeach 
                         <!-- Pagination -->
					@if($pembayaran->lastPage() != 1)
						<div class="btn-group float-right">		
						   <a href="{{ $pembayaran->previousPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-left"></i>
						    </a>
						    @for($i = 1; $i <= $pembayaran->lastPage(); $i++)
								<a class="btn btn-success {{ $i == $pembayaran->currentPage() ? 'active' : '' }}" href="{{ $pembayaran->url($i) }}">{{ $i }}</a>
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

@endsection