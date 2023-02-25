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
      <div class="alert alert-success text-center"><b>Selamat Datang</b> di aplikasi pembayaran SPP Smk taruna bhakti</div>                 
        <div class="col-12">
         <div class="card-lu1">
            <div class="card-body lu1 li">

            <div class="card-title li">Histori Terbaru</div>
               <div class="comment-widgets scrollable li">
                             
                              <!--  Row -->
                              @foreach($pembayaran as $history)
                                <div class="d-flex flex-row comment-row">
                                    <i class="mdi mdi-account display-3"></i>
                                    <div class="comment-text active w-100">
                                    <hr>
                                    <span class="badge badge-success badge-rounded float-right">{{ $history->created_at->diffforHumans() }}</span>                                    
                                        <h6 class="font-medium">{{ $history->siswa->nama }}</h6>                                       
                                        <span class="m-b-15 d-block">
                                             <ul class="list-group list-group-flush lu1">
                                                <li class="list-group-item lu1 p1">Kelas {{ $history->siswa->kelas->nama_kelas }}</li>
                                                <li class="list-group-item lu1 p1">Jumlah Bayar Rp.{{ $history->jumlah_bayar }}</li>
                                                <li class="list-group-item lu1 p1">SPP Bulan <b  class="text-capitalize text-bold">{{ $history->spp_bulan }}</b></li>                                   
                                           </ul>
                                        </span>
                                        <div class="comment-footer ">
                                            <span class="p1 float-right">{{ $history->created_at->format('M d, Y') }}</span>                                            
                                            <span class="action-icons active">
                                                    <a href="{{ url('dashboard/pembayaran/'. $history->id .'/edit') }}"><i class="ti-pencil-alt"></i></a>                                                  
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              
                                @if(count($pembayaran) == 0)
				  			   <div class="text-center"> Tidak ada histori!</div>
					         @endif
                            </div>
               
         </div>
      </div>
   </div>
</div>

@endsection