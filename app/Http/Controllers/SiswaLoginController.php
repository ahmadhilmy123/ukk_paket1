<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Session;
use App\Models\Siswa;
use Dompdf\Dompdf;
use PDF;
use App\Models\Pembayaran;

class SiswaLoginController extends Controller
{
   
   public function siswaLogin(){
      
       if(session('nama') != null) :  
         return redirect('dashboard/siswa/histori');
       endif;
   
       return view('auth.siswa-login');
   }
   
    public function login(Request $req){
      
         $exists = Siswa::where('nisn', $req->nisn)->exists();
         
         if($exists) :
               $siswa = Siswa::where('nisn', $req->nisn)->get();
               
               foreach($siswa as $val) :
                   Session::put('id', $val->id); 
                   $nama = $val->nama;
               endforeach;
               
               if(strtolower($nama) == strtolower($req->nama_siswa)) :
                  
                     Session::put('nama', $nama);
                     Session::put('nisn', $req->nisn);
                     
                     return redirect('dashboard/siswa/histori');
               else :
               
                      Alert::error('Gagal Login!', 'NISN dan nama siswa tidak sesuai');
                     return back();
                     
               endif;
               
            else :
               Alert::error('Gagal Login!', 'Data siswa dengan NISN ini tidak ditemukan');
               return back();
            endif;
    }
   
    public function logout(){
      
        Session::flush();
        return redirect('login/siswa');
      
    }
   
    public function index(){
      
      if(session('nama') == null) :  
         return redirect('login/siswa');
     endif;
       
      $data = [
          'pembayaran' => Pembayaran::where('id_siswa', Session::get('id'))->paginate(10)
      ];
       
      return view('dashboard.siswa.index1', $data);
    }

    // public function create(){

    // $siswa = session('id');
    // $pembayaran = Pembayaran::where('id_siswa', $siswa)->orderBy('created_at', 'ASC')->get();

    // $html = view('pdf.laporan1', compact('pembayaran'))->render();
    // $dompdf = new Dompdf();
    // $dompdf->loadHtml($html);
    // $dompdf->setPaper('A4', 'portrait');
    // $dompdf->render();
    // return $dompdf->stream('BUKTI-PEMBAYARAN-SISWA');
    // }

    public function create(){
        $siswa = session('id');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
     
      $data = [
          'pembayaran' => Pembayaran::where('id_siswa', $siswa)->orderBy('created_at', 'ASC')->get()
        ];

        $pdf = PDF::loadView('pdf.laporan1', $data);
        return $pdf->stream('BUKTI-PEMBAYARAN-SISWA');
    }
}
