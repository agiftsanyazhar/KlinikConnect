<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = [
            ['title' => 'Jam Operasional Baru', 'description' => 'Kami sekarang buka dari jam 7 pagi hingga jam 6 sore.'],
            ['title' => 'Jadwal Hari Libur', 'description' => 'Kami akan tutup pada hari libur umum.'],
            ['title' => 'Seminar Kesehatan', 'description' => 'Bergabunglah dengan kami dalam seminar kesehatan pada tanggal 15 bulan depan.'],
            ['title' => 'Vaksin Flu Tersedia', 'description' => 'Vaksin flu sekarang tersedia. Hubungi resepsionis untuk informasi lebih lanjut.'],
            ['title' => 'Spesialis Baru', 'description' => 'Kami menyambut Dr. Smith, seorang spesialis dalam neurologi.'],
            ['title' => 'Pembaruan Parkir', 'description' => 'Konstruksi parkir akan dimulai minggu depan.'],
            ['title' => 'Janji Online', 'description' => 'Anda sekarang dapat memesan janji online.'],
            ['title' => 'Portal Pasien', 'description' => 'Akses rekam medis Anda melalui portal pasien kami yang baru.'],
            ['title' => 'Pedoman Covid-19', 'description' => 'Mohon ikuti pedoman Covid-19 kami yang diperbarui.'],
            ['title' => 'Acara Amal', 'description' => 'Bergabunglah dengan kami dalam acara amal tahunan kami.'],
            ['title' => 'Tips Gizi', 'description' => 'Lihat blog kami untuk tips gizi mingguan.'],
            ['title' => 'Pelatihan Staf', 'description' => 'Klinik akan tutup untuk pelatihan staf pada tanggal 10.'],
            ['title' => 'Program Keterlibatan Masyarakat', 'description' => 'Bergabunglah dengan program keterlibatan masyarakat kami.'],
            ['title' => 'Umpan Balik', 'description' => 'Kami menghargai umpan balik Anda. Silakan isi survei kami.'],
            ['title' => 'Kontak Darurat', 'description' => 'Perbarui kontak darurat Anda di resepsionis.'],
        ];

        foreach ($announcements as $announcement) {
            Announcement::create($announcement);
        }
    }
}
