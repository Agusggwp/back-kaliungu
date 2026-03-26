<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StrukturOrganisasi;
use App\Models\Slider;
use App\Models\Galeri;
use App\Models\Sejarah;
use App\Models\Profil;
use App\Models\Kategori;
use App\Models\AwigRule;
use App\Models\AwigFile;
use App\Models\PendudukBanjar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Seed Struktur Organisasi
        StrukturOrganisasi::create([
            'jabatan' => 'Kepala Banjar',
            'nama' => 'I Wayan Suardana',
            'file' => 'strukturorganisasi-img/kepala.jpg',
        ]);

        StrukturOrganisasi::create([
            'jabatan' => 'Bendahara',
            'nama' => 'I Made Wirawan',
            'file' => 'strukturorganisasi-img/bendahara.jpg',
        ]);

        // Seed Slider
        Slider::create([
            'title' => 'Selamat Datang',
            'description' => 'Halaman resmi Banjar Dinas Adat',
            'image' => 'slider/welcome.jpg',
            'url' => null,
        ]);

        Slider::create([
            'title' => 'Pengumuman Penting',
            'description' => 'Lihat pengumuman terbaru dari banjar',
            'image' => 'slider/pengumuman.jpg',
            'url' => '/pengumuman',
        ]);

        // Seed Galeri
        Galeri::create([
            'title' => 'Acara Keagamaan',
            'description' => 'Dokumentasi acara keagamaan banjar',
            'image' => 'galeri/acara-1.jpg',
        ]);

        Galeri::create([
            'title' => 'Kegiatan Sosial',
            'description' => 'Kegiatan sosial kemasyarakatan',
            'image' => 'galeri/sosial-1.jpg',
        ]);

        // Seed Sejarah
        Sejarah::create([
            'title' => 'Sejarah Banjar',
            'content' => 'Banjar kami memiliki sejarah panjang yang kaya dengan tradisi budaya Bali yang kuat. Didirikan pada tahun 1850, banjar ini telah menjadi pusat kehidupan komunitas lokal.',
            'year_founded' => 1850,
        ]);

        // Seed Profil
        Profil::create([
            'nama' => 'Banjar Dinas Adat',
            'deskripsi' => 'Organisasi tradisional Bali yang mengurus kehidupan masyarakat secara adat',
            'alamat' => 'Jl. Raya Banjar, Bali',
            'telepon' => '+62-123-456-789',
            'email' => 'banjar@example.com',
            'jam_pelayanan' => json_encode([
                'hari' => 'Senin - Jumat',
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
            ]),
        ]);

        // Seed Kategori
        Kategori::create([
            'nama' => 'Layanan Administrasi',
            'deskripsi' => 'Layanan administrasi banjar',
            'jadwal' => json_encode([
                'hari' => 'Senin, Rabu',
                'jam' => '09:00 - 12:00',
            ]),
        ]);

        Kategori::create([
            'nama' => 'Layanan Keagamaan',
            'deskripsi' => 'Layanan keagamaan banjar',
            'jadwal' => json_encode([
                'hari' => 'Setiap Hari',
                'jam' => '08:00 - 17:00',
            ]),
        ]);

        // Seed Awig Rules
        AwigRule::create([
            'bab' => 'I',
            'judul' => 'Ketentuan Umum',
            'isi' => 'Awig-awig banjar memiliki ketentuan umum yang berlaku untuk semua warga banjar.',
        ]);

        AwigRule::create([
            'bab' => 'II',
            'judul' => 'Hak dan Kewajiban',
            'isi' => 'Setiap warga banjar memiliki hak dan kewajiban yang sama di depan hukum adat.',
        ]);

        // Seed Awig File
        AwigFile::create([
            'nama_file' => 'Awig-Awig Banjar 2023',
            'deskripsi' => 'File lengkap awig-awig banjar tahun 2023',
            'file_path' => 'awig/awig-awig-banjar-2023.pdf',
            'tanggal_upload' => now()->toDateString(),
        ]);

        // Seed Penduduk Banjar
        PendudukBanjar::create([
            'nama' => 'I Wayan Suardana',
            'nik' => '1234567890123456',
            'status' => 'Kepala Banjar',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Raya Banjar No. 1',
        ]);

        PendudukBanjar::create([
            'nama' => 'I Made Wirawan',
            'nik' => '1234567890123457',
            'status' => 'Bendahara',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Raya Banjar No. 2',
        ]);
    }
}
