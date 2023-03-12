<!DOCTYPE html>
<head>
    <title>Bukti Pembayaran</title>
    <meta charset="utf-8">
    <style>
        /* @font-face {
          font-family: 'broadwayscd-regular';
          src: url({{ storage_path("fonts/BroadwaySCD.ttf") }}') format('truetype');
        } */
        @font-face {
          font-family: 'Cherolina';
          src: url({{ storage_path("fonts/Cherolina.ttf") }}') format('truetype');
        }

        #judul{
            text-align:center;
        }
        /* .font{
         font-family: 'broadwayscd-regular', sans-serif;
        } */

        #halaman{
            width: 600px; 
            height: auto; 
            position: absolute; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
        }

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>BUKTI PEMBAYARAN</h3>
        @foreach($pembayaran as $history)
        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $history->siswa->nama }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Kelas</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $history->siswa->kelas->nama_kelas }}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Jumlah</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">Rp.{{ $history->jumlah_bayar }}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Spp Bulan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{ $history->spp_bulan }}</td>
            </tr>
        </table>

        <p>menyatakan Siswa telah membayar SPP Tersebut.</p>

        <div style="width: 50%; text-align: left; float: right;">Depok,{{ $history->created_at->format('M d,Y') }}</div><br><br>
        <div style="width: 50%; text-align: left; float: right; font;">Yang bertanda tangan,</div><br><br>
        @foreach($pembayaran as $val)
         <div style="width: 50%; text-align: left; float: right; font-family: 'Cherolina', sans-serif; font-size: 30px">{{ $val->users->name }} </div><br><br><br>
         <div style="width: 50%; text-align: left; float: right; ">{{ $val->users->name }} </div>

    </div>
    @endforeach
    @endforeach
</body>
</html>