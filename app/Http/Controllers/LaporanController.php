<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App;
use PDF;

class LaporanController extends Controller
{
   
   public function __construct(){
         $this->middleware([
            'auth',
            'privilege:admin'
         ]);
    }
   
    public function index(){
   
       $data = [
          'user' => User::find(auth()->user()->id),
          'kelas' => Kelas::orderBy('nama_kelas', 'ASC')->get(),
        ];
      
        return view('dashboard.generate-laporan.index', $data);
    }
   
    public function create(){
      
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
     
        $pembayaran = Pembayaran::orderBy('created_at', 'ASC')->get();

        $kelas = request('kelas');
        // $kelas = '';
        // $kelas = 'XII RPL 1';
        try {
            
          if ($kelas =="") {
            $data = [
              'pembayaran' => Pembayaran::orderBy('created_at', 'ASC')->get()
            ];

          }  else {
            $i = 0;
            foreach ($pembayaran as $value) {
              if ($value->siswa->kelas->nama_kelas == $kelas) {
                $data[$i] = $value;
              }
            }
            $data = [
              'pembayaran' => $data
            ];
          }
          

        // dd($data);
          $pdf = PDF::loadView('pdf.laporan', $data);
          return $pdf->stream('Laporan-pembayaran-spp.pdf');
        } catch (\Throwable $th) {
          return redirect('dashboard/laporan/');
        }
    }
}
