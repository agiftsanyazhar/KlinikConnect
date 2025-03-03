<?php

namespace Database\Seeders;

use App\Models\Guide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guides = [
            ['title' => 'Panduan Jadwal Kerja', 'description' => 'Jadwal lengkap jadwal kerja.', 'file' => 'panduan_jadwal_kerja.pdf'],
            ['title' => 'Pedoman Hari Libur', 'description' => 'Informasi tentang penutupan kantor saat hari libur.', 'file' => 'pedoman_hari_libur.pdf'],
            ['title' => 'Detail Seminar Kesehatan', 'description' => 'Informasi tentang seminar kesehatan yang akan datang.', 'file' => 'seminar_kesehatan.pdf'],
            ['title' => 'Informasi Vaksin Flu', 'description' => ' Detail tentang ketersediaan vaksin flu.', 'file' => 'informasi_vaksin_flu.pdf'],
            ['title' => 'Pengenalan Spesialis', 'description' => 'Profil Dr. Smith, spesialis neurologi.', 'file' => 'profil_dr_smith.pdf'],
            ['title' => 'Pemberitahuan Konstruksi Parkir', 'description' => 'Pemberitahuan tentang konstruksi parkir.', 'file' => 'pemberitahuan_konstruksi_parkir.pdf'],
            ['title' => 'Panduan Janji Temu Online', 'description' => 'Langkah-langkah untuk memesan janji temu online.', 'file' => 'panduan_janji_temu_online.pdf'],
            ['title' => 'Instruksi Portal Pasien', 'description' => 'Cara mengakses dan menggunakan portal pasien.', 'file' => 'instruksi_portal_pasien.pdf'],
            ['title' => 'Protokol Kemanan Covid-19', 'description' => 'Protokol kemanan Covid-19 yang diperbarui.', 'file' => 'protokol_kemanan_covid-19.pdf'],
            ['title' => 'Ringkasan Acara Amal', 'description' => 'Detail tentang acara amal tahunan.', 'file' => 'ringkasan_acara_amal.pdf'],
        ];

        foreach ($guides as $guide) {
            Guide::create($guide);
        }
    }
}
