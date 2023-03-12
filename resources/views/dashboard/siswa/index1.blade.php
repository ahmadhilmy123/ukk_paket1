@extends('layouts.app1')

@section('title', 'History')

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
            <h1>Histori Pembayaran<h1>
        </div>
        <div class="col-12">
            <div class="card-lu1">
                <div class="card-body lu1 li">
                    <div class="bd-highlight d-flex">
                        <div class="p-2 flex-grow-1 bd-highlight text-right">
                        <a href="{{ url('dashboard/laporan1/create') }}" class="btn btn-primary btn-rounded">Tanda Bukti</a>

                    </div>
                </div>
               <!--  Row -->
                              @foreach($pembayaran as $history)
                                <div class="d-flex flex-row comment-row">
                                    <i class="mdi mdi-account display-3"></i>
                                    <div class="comment-text active w-100">
                                    <hr>
                                    <span class="badge badge-success badge-rounded float-right">{{ $history->created_at->diffforHumans() }}</span>                                    
                                        <h6 class="font-medium p1">{{ $history->siswa->nama }}</h6>                                       
                                        <span class="m-b-15 d-block">
                                             <ul class="list-group list-group-flush lu1">
                                                <li class="list-group-item lu1 p1">Kelas {{ $history->siswa->kelas->nama_kelas }}</li>
                                                <li class="list-group-item lu1 p1">Jumlah Bayar Rp.{{ $history->jumlah_bayar }}</li>
                                                <li class="list-group-item lu1 p1">SPP Bulan <b  class="text-capitalize text-bold">{{ $history->spp_bulan }}</b></li>                                   
                                           </ul>
                                        </span>
                                        <div class="comment-footer ">
                                            <span class="text-muted float-right">{{ $history->created_at->format('M d, Y') }}</span>                                            
                                            <span class="action-icons active">
                                                    <a href="{{ url('dashboard/pembayaran/'. $history->id .'/edit') }}"><i class="ti-pencil-alt"></i></a>                                                  
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              
                          <!-- Pagination -->
					@if($pembayaran->lastPage() != 1)
						<div class="btn-group float-right mt-4">		
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
					<!-- End Pagination -->

                                @if(count($pembayaran) == 0)
				  			   <div class="text-center">Tidak ada histori!</div>
					         @endif
                            </div>
               
            </div>
         
      
      </div>
   </div>

@endsection