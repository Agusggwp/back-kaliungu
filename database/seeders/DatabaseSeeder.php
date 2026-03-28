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
use App\Models\Layanan;
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
            'nama' => 'Banjar Kaliungu Kaja',
            'deskripsi' => 'Website resmi Banjar Kaliungu Kaja sebagai pusat informasi, pelayanan masyarakat, dan kegiatan adat.',
            'alamat' => 'Jl. Belimbing No.39, Dangin Puri, Kaja Denpasar Utara, Bali 80232',
            'telepon' => '+62 813-5359-2271',
            'email' => 'banjar.kaliungu@example.com',
            'jam_pelayanan' => json_encode([
                'hari' => 'Senin - Sabtu',
                'jam_buka' => '08:00',
                'jam_tutup' => '18:30',
                'jam_layanan_khusus' => [
                    [
                        'tipe' => 'Layanan Administrasi',
                        'hari' => 'Senin',
                        'jam' => '09:00 - 12:00'
                    ],
                    [
                        'tipe' => 'Layanan Keanggotaan',
                        'hari' => 'Setiap hari',
                        'jam' => '08:00 - 17:00'
                    ]
                ]
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
            'jumlah_laki_laki' => 45,
            'jumlah_perempuan' => 38,
        ]);

        PendudukBanjar::create([
            'jumlah_laki_laki' => 52,
            'jumlah_perempuan' => 48,
        ]);

        // Seed Layanan (6 Layanan Paten)
        Layanan::create([
            'slug' => 'posyandu',
            'nama' => 'Posyandu',
            'category' => 'Kesehatan',
            'subtitle' => 'Pelayanan Kesehatan Masyarakat untuk Ibu, Bayi, dan Balita Secara Terpadu',
            'short_description' => 'Posyandu adalah layanan kesehatan masyarakat yang menyediakan pemeriksaan balita, imunisasi, penimbangan, dan edukasi kesehatan',
            'deskripsi' => 'Posyandu (Pos Pelayanan Terpadu) adalah bentuk Upaya Kesehatan Bersumberdaya Masyarakat (UKBM) yang dikelola dan diselenggarakan dari, oleh, untuk, dan bersama masyarakat. Posyandu bertujuan untuk memberdayakan masyarakat serta memberikan kemudahan dalam memperoleh pelayanan kesehatan dasar, khususnya bagi ibu hamil, bayi, dan balita. Melalui kegiatan pemeriksaan kesehatan, imunisasi, pemantauan pertumbuhan, serta edukasi kesehatan, Posyandu berperan penting dalam upaya pencegahan penyakit dan peningkatan kualitas kesehatan masyarakat.',
            'image' => '/images/posyandu.jpg',
            'jadwal' => 'Setiap Senin & Kamis, 08:00 - 12:00 WITA',
            'lokasi' => 'Balai Banjar Kaliungu Kaja',
            'telepon' => '0812-3456-7890',
            'email' => 'posyandu.kaliungu@gmail.com',
            'services' => json_encode([
                'Pemeriksaan kesehatan ibu hamil',
                'Imunisasi bayi dan balita',
                'Penimbangan dan pengukuran pertumbuhan anak',
                'Pemberian vitamin dan suplemen',
                'Konseling kesehatan ibu dan anak',
                'Penyuluhan gizi dan kesehatan',
            ]),
            'requirements' => json_encode([
                'Buku KIA (Kesehatan Ibu dan Anak)',
                'Kartu identitas orang tua (KTP/KK)',
                'Kartu BPJS/JKN (jika ada)',
            ]),
        ]);

        Layanan::create([
            'slug' => 'pecalang',
            'nama' => 'Pecalang',
            'category' => 'Keamanan',
            'subtitle' => 'Petugas Keamanan Tradisional Bali dalam Menjaga Ketertiban Banjar',
            'short_description' => 'Pecalang adalah petugas keamanan tradisional di Bali yang bertugas menjaga ketertiban dan keamanan di lingkungan banjar',
            'deskripsi' => 'Pecalang adalah petugas keamanan tradisional Bali yang bertugas menjaga keamanan dan ketertiban dalam pelaksanaan upacara adat, hari raya keagamaan, serta kegiatan kemasyarakatan lainnya. Pecalang memiliki peran penting dalam mengatur kelancaran kegiatan adat, menjaga ketertiban lingkungan, serta membantu koordinasi keamanan agar kegiatan masyarakat dapat berjalan dengan aman dan tertib sesuai dengan nilai-nilai adat Bali.',
            'image' => '/images/pecalang.jpg',
            'jadwal' => 'Siaga 24 jam untuk upacara adat',
            'lokasi' => 'Kantor Banjar Kaliungu Kaja',
            'telepon' => '0813-3456-7890',
            'email' => 'pecalang.kaliungu@gmail.com',
            'services' => json_encode([
                'Pengamanan upacara adat dan keagamaan',
                'Pengaturan lalu lintas saat upacara',
                'Menjaga ketertiban di area banjar',
                'Koordinasi keamanan dengan aparat',
                'Patroli keamanan lingkungan',
                'Pendampingan acara kemasyarakatan',
            ]),
            'requirements' => json_encode([
                'Pengajuan permohonan pengamanan',
                'Surat keterangan dari kelihan banjar',
                'Informasi jadwal dan lokasi acara',
            ]),
        ]);

        Layanan::create([
            'slug' => 'paud',
            'nama' => 'PAUD',
            'category' => 'Pendidikan',
            'subtitle' => 'Layanan Pendidikan Anak Usia Dini untuk Mendukung Perkembangan Dasar Anak',
            'short_description' => 'PAUD adalah lembaga pendidikan yang menyediakan pembelajaran bagi anak usia dini untuk mengembangkan potensi mereka secara optimal',
            'deskripsi' => 'PAUD (Pendidikan Anak Usia Dini) adalah jenjang pendidikan sebelum pendidikan dasar yang merupakan upaya pembinaan bagi anak sejak lahir hingga usia enam tahun. PAUD dilaksanakan melalui pemberian rangsangan pendidikan untuk membantu pertumbuhan dan perkembangan jasmani serta rohani anak, sehingga anak memiliki kesiapan dalam memasuki pendidikan pada jenjang berikutnya.',
            'image' => '/images/paud.jpg',
            'jadwal' => 'Senin - Jumat, 08:00 - 11:00 WITA',
            'lokasi' => 'Gedung PAUD Banjar Kaliungu Kaja',
            'telepon' => '0814-3456-7890',
            'email' => 'paud.kaliungu@gmail.com',
            'services' => json_encode([
                'Pembelajaran berbasis bermain',
                'Pengembangan motorik kasar dan halus',
                'Stimulasi kognitif dan bahasa',
                'Pendidikan karakter dan sosial emosional',
                'Pengenalan budaya dan adat Bali',
                'Kegiatan seni dan kreativitas',
            ]),
            'requirements' => json_encode([
                'Usia 3-6 tahun',
                'Fotokopi akta kelahiran',
                'Fotokopi KK (Kartu Keluarga)',
                'Pas foto anak 3x4 (2 lembar)',
                'Surat keterangan sehat dari dokter',
            ]),
        ]);

        Layanan::create([
            'slug' => 'seka-gong',
            'nama' => 'Seka Gong',
            'category' => 'Budaya & Seni',
            'subtitle' => 'Kelompok Seni Gamelan Tradisional Bali untuk Kegiatan Adat dan Budaya',
            'short_description' => 'Seka Gong adalah kelompok seni tradisional Bali yang memainkan alat musik gamelan untuk mengiringi upacara adat dan pertunjukan seni',
            'deskripsi' => 'Seka Gong adalah kelompok kesenian gamelan tradisional Bali yang memainkan berbagai jenis gamelan untuk mengiringi upacara adat, kegiatan keagamaan, dan pertunjukan seni. Seka Gong berperan penting dalam menjaga keberlangsungan seni musik tradisional Bali serta menjadi sarana pelestarian budaya di lingkungan masyarakat.',
            'image' => '/images/seka-gong.jpg',
            'jadwal' => 'Latihan: Selasa & Jumat, 19:00 - 21:00 WITA',
            'lokasi' => 'Bale Gong Banjar Kaliungu Kaja',
            'telepon' => '0815-3456-7890',
            'email' => 'sekagong.kaliungu@gmail.com',
            'services' => json_encode([
                'Iringan upacara keagamaan (odalan, piodalan)',
                'Pertunjukan seni budaya',
                'Pembelajaran gamelan untuk pemula',
                'Iringan tari tradisional Bali',
                'Pentas seni di acara kemasyarakatan',
                'Pelestarian musik tradisional Bali',
            ]),
            'requirements' => json_encode([
                'Surat permohonan penggunaan jasa',
                'Informasi jenis acara dan lokasi',
                'Konfirmasi jadwal minimal 1 minggu sebelumnya',
            ]),
        ]);

        Layanan::create([
            'slug' => 'seka-shanti',
            'nama' => 'Seka Shanti',
            'category' => 'Sosial & Pemuda',
            'subtitle' => 'Organisasi Pemuda Banjar dalam Kegiatan Sosial, Budaya, dan Keagamaan',
            'short_description' => 'Seka Shanti adalah kelompok pemuda di banjar yang berperan aktif dalam kegiatan sosial, budaya, dan keagamaan di komunitasnya',
            'deskripsi' => 'Seka Shanti adalah organisasi pemuda di Banjar Kaliungu Kaja yang berperan aktif dalam kegiatan sosial, budaya, dan keagamaan. Seka Shanti menjadi wadah bagi pemuda untuk berpartisipasi dalam kegiatan kemasyarakatan, mendukung pelaksanaan upacara adat, serta memperkuat kebersamaan dan kepedulian sosial di lingkungan banjar.',
            'image' => '/images/seka-shanti.jpg',
            'jadwal' => 'Rapat rutin: Minggu pertama setiap bulan',
            'lokasi' => 'Balai Banjar Kaliungu Kaja',
            'telepon' => '0816-3456-7890',
            'email' => 'sekashanti.kaliungu@gmail.com',
            'services' => json_encode([
                'Kegiatan bakti sosial',
                'Gotong royong lingkungan',
                'Pendampingan upacara adat',
                'Event budaya dan olahraga',
                'Pelatihan keterampilan pemuda',
                'Kegiatan keagamaan pemuda',
            ]),
            'requirements' => json_encode([
                'Usia 17-35 tahun',
                'Warga Banjar Kaliungu Kaja',
                'Fotokopi KTP',
                'Mengisi formulir pendaftaran',
            ]),
        ]);

        Layanan::create([
            'slug' => 'awig',
            'nama' => 'Awig-awig',
            'category' => 'Hukum Adat',
            'subtitle' => 'Peraturan Adat Banjar Kaliungu Kaja yang Mengatur Kehidupan Masyarakat',
            'short_description' => 'Awig-awig adalah peraturan adat yang mengatur kehidupan masyarakat banjar dalam segala aspek sosial, ekonomi, dan budaya',
            'deskripsi' => 'Awig-awig adalah peraturan adat Banjar Kaliungu Kaja yang mengatur kehidupan masyarakat dalam berbagai aspek kehidupan sosial, ekonomi, dan budaya. Awig-awig berlaku mengikat bagi semua warga banjar dan merupakan hasil dari musyawarah mufakat yang telah disepakati. Peraturan adat ini mencerminkan nilai-nilai luhur budaya Bali dan tradisi yang telah berkembang di komunitas banjar selama bertahun-tahun.',
            'image' => '/images/awig.jpg',
            'jadwal' => 'Berlaku setiap hari',
            'lokasi' => 'Balai Banjar Kaliungu Kaja',
            'telepon' => '0817-3456-7890',
            'email' => 'awig.kaliungu@gmail.com',
            'services' => json_encode([
                'Informasi peraturan adat banjar',
                'Konsultasi masalah adat',
                'Mediasi sengketa adat',
                'Sosialisasi awig-awig kepada masyarakat',
                'Dokumentasi dan pelestarian awig-awig',
                'Penyelesaian kasus adat di banjar',
            ]),
            'requirements' => json_encode([
                'Warga Banjar Kaliungu Kaja atau yang terkait',
                'Surat pengantar dari kelihan banjar dalam kasus formal',
                'Kehadiran para pihak yang bersengketa',
                'Keterbukaan untuk menerima keputusan adat',
            ]),
        ]);
    }
}
