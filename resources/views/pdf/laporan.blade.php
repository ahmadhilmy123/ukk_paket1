<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   
    <title>Laporan pembayaran SPP</title>

</head>
<body>

   <style>

      @font-face {
          font-family: 'broadwayscd-regular';
          src: url({{ storage_path("fonts/BroadwaySCD.ttf") }}') format('truetype');
        }

      .page-break{
         page-break-after:always;
       }
      .text-center{
         text-align:center;
       }
      .text-header {
         font-size:1.1rem; 
      }

      .p3{
         margin-top: 100px;
      }
      .size2 {
         font-size:1.4rem;
      }
      .size4 {
         font-size:1.8rem;
         line-height: 17px
      }
      .size1 {
         font-size:1rem;
      }
      .border-bottom {
         border-bottom:1px black solid;
      }
      .border {
         border: 2px block solid;
         margin: 0,1px
      }
      .lp {
         border: 2px
      }
      .border-top {
         border-top:1px black solid;
      }
      .float-right {
         float:right;
      }
      .mt-4 {
         margin-top:4px;
       }
      .mx-1 {
         margin:1rem 0 1rem 0;
      }
      .mr-1 {
         margin-right:1rem;
      }
      .mt-1 {
         margin-top:1rem;
      }
      ml-2 {
         margin-left:2rem;
      }
      .ml-min-5 {
         margin-left:-5px;
      }
      .text-uppercase {
         font:uppercase;
      }
      .d1 {
         font-size:2rem;
      }
      .img {
         position:absolute;
         margin-top: -15px;
         height: 160px;
      }
      .link {
         font-style:underline;
      }
      .text-desc {
         font-size:13px;
         font-style:bold;
      }
      .text-desc1 {
         font-size:10px;
         font-style:bold;
      }
      .text-bold {
         /* font-family: 'broadwayscd-regular', sans-serif; */
         font-style: bold;

      }
      .font{
         font-family: 'broadwayscd-regular', sans-serif;
         margin-top: 100px;
         /* line-height: 17px */
      }
      .size3{
         font-size:1.5rem;
      }
      .underline {
         text-decoration:underline;
         color: rgb(5, 100, 163);
      }
      .l1{
         font-size: 15px;
         font-style: bold;
      }
      table {
         font-family: Arial, Helvetica, sans-serif;
         color: #0f0f11;
         text-shadow: 1px 1px 0px #8a8787;
         background: #505152;
         border: #b3a1a1 1px solid;
      }
      table th {
           padding: 10px 15px;
           border-left:1px solid #065fa8;
           border-bottom: 1px solid #065fa8;
           background: #065fa8;
       }  
       table tr {
           text-align: center;
            padding-left: 20px;
       }
       table td {
             padding: 10px 15px;
             border-top: 1px solid #ffffff;
             border-bottom: 1px solid #e0e0e0;
             border-left: 1px solid #e0e0e0;
             background: #fafafa;
             background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
             background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
      }
      .table-center {
         margin-left:auto;
         margin-right:auto;
      }
      .mb-1 {
         margin-bottom:1rem;
      }
   </style>
   
   <!-- header -->
   <div class="text-center">
      <img src="{{ public_path('img/avatar/logo1.png') }}" class="img" alt="logo.png" width="180">
      <div style="margin-left:5rem;">
         <span class="text-header text-bold text-danger size3">
            YAYASAN SETYA BHAKTI<br></span>
            <span class="font size4">
                SMK TARUNA BHAKTI DEPOK<br>
                <span class="text-header text-bold text-danger size1">
                  TERAKREDITASI: "A" No: 02.00/203/BAN-SM/XII/2018 <br>
            <span class="l1">Izin No: 421.4/1150/DISDIK/2004-NPSN: 20229232</span> <br> 
         </span>
         <span class="text-desc1">PROGRAM KEAHLIAN SMK PUSAT KEUNGGULAN:<br>ANIMASI | <span class="text-desc1">TEKNIK JARINGAN KOMPUTER DAN KOMUNIKASI |</span> TEKNIK ELEKTRO <br><span class="text-desc1">BROADCASTING DAN PERFILMAN | </span> PENGEMBANGAN PERANGKAT LUNAK DAN GIM<br> </span>
         <span class="text-desc">JALAN PEKAPURAN CIMANGGIS DEPOK 16953 Telepon (021) 8744810<br>FAX (021) 87743374 Website <span class="underline">http://www.smktarunabhakti.net/</span> E-mail <span class="underline">taruna@smktarunabhakti.net</span>
      </div>    
      </div>
   <div>
   <!-- /header -->
   
   <!-- content -->
   <hr class="border">
   
   <hr class="border lp">
   
   <hr class="border">
   
   
   <div class="size2 text-center mb-1">LAPORAN PEMBAYARAN SPP</div>
   
  <table class="table-center mb-1">
      <thead>
         <tr>
            {{-- <th>Petugas</th> --}}
            <th>Siswa</th>
            <th>Kelas</th>
            <th>SPP Bulan</th>
            <th>SPP Nominal</th>
            <th>Nominal Bayar</th>
            <th>Tanggal Bayar</th>
            <th>Tunggakan</th>
         </tr>
      </thead>
      <tbody>
         @foreach($pembayaran as $value)
         <tr>
            {{-- <td>{{ $value->users->name }}</td> --}}
            <td>{{$value->siswa->nama}}</td>
            <td>{{$value->siswa->kelas->nama_kelas}}</td>
            <td>{{$value->spp_bulan }}</td>
            <td>Rp.{{ $spp = $value->siswa->spp->nominal }}</td>
            <td>Rp.{{ $bayar = $value->jumlah_bayar }}</td>
            <td>Rp.{{ $spp - $bayar }}.000</td>
            <td>{{ $value->created_at->format('d M, Y') }}</td>
         
         </tr>
         @endforeach
      </tbody>


</table>
   <!-- /content -->
   
   <!-- footer -->
    <div>Pembuat : {{ auth()->user()->name }}</div>
   <!-- /footer -->
</body>
</html>