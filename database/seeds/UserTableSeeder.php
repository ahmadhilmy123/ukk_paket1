<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@spp.com',
            'password' => Hash::make('admin'),
            'level' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
         ]);
         
         \App\Models\User::create([
            'name' => 'petugas',
            'email' => 'petugas@spp.com',
            'password' => Hash::make('petugas'),
            'level' => 'petugas',
            'created_at' => now(),
            'updated_at' => now()
         ]);

         \App\Models\Kelas::create([
            'nama_kelas' => 'XII RPL 1',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII RPL 2',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII TKJ 1',
            'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII TKJ 2',
            'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII MM 1',
            'kompetensi_keahlian' => 'Multimedia'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII MM 2',
            'kompetensi_keahlian' => 'Multimedia'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII BC 1',
            'kompetensi_keahlian' => 'Broadcast'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII BC 2',
            'kompetensi_keahlian' => 'Broadcast'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII TEI 1',
            'kompetensi_keahlian' => 'Teknik Elektronika Industri'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XII TEI 2',
            'kompetensi_keahlian' => 'Teknik Elektronika Industri'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI RPL 1',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI RPL 2',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI TKJ 1',
            'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI TKJ 2',
            'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI MM 1',
            'kompetensi_keahlian' => 'Multimedia'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI MM 2',
            'kompetensi_keahlian' => 'Multimedia'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI BC 1',
            'kompetensi_keahlian' => 'Broadcast'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI BC 2',
            'kompetensi_keahlian' => 'Broadcast'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI TEI 1',
            'kompetensi_keahlian' => 'Teknik Elektronika Industri'
        ]);
         \App\Models\Kelas::create([
            'nama_kelas' => 'XI TEI 2',
            'kompetensi_keahlian' => 'Teknik Elektronika Industri'
        ]);

        \App\Models\Spp::create([
            'tahun' => 2023,
            'nominal' => '500.000'
        ]);

        \App\Models\Siswa::create([
            'nisn' => '123456789876',
            'nis'  => '22373687',
            'nama' => 'siswa',
            'id_kelas' => 1,
            'nomor_telp' => '089689957106',
            'alamat' => 'Majalengka',
            'id_spp' => 1
        ]);

        \App\Models\Pembayaran::create([
            'id_petugas' => 2,
            'id_siswa' => 1,
            'spp_bulan' => 'februari',
            'jumlah_bayar' => '500.000'

        ]);
    }
}
