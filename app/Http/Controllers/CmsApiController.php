<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CmsApiController extends Controller
{
    /**
     * Fetch struktur organisasi data
     * Returns: array of { id, jabatan, nama, file, ... }
     */
    public function getStrukturOrganisasi(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return StrukturOrganisasi::all();
        
        return response()->json([
            [
                'id' => 1,
                'jabatan' => 'Kepala Banjar',
                'nama' => 'I Wayan Suardana',
                'file' => 'strukturorganisasi-img/kepala.jpg',
            ],
            [
                'id' => 2,
                'jabatan' => 'Bendahara',
                'nama' => 'I Made Wirawan',
                'file' => 'strukturorganisasi-img/bendahara.jpg',
            ],
        ]);
    }

    /**
     * Fetch slider data
     * Returns: array of slider items
     */
    public function getSlider(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return Slider::all();
        
        return response()->json([
            [
                'id' => 1,
                'title' => 'Selamat Datang',
                'description' => 'Halaman resmi Banjar',
                'image' => 'slider/welcome.jpg',
                'url' => null,
            ],
            [
                'id' => 2,
                'title' => 'Pengumuman Penting',
                'description' => 'Lihat pengumuman terbaru',
                'image' => 'slider/pengumuman.jpg',
                'url' => '/pengumuman',
            ],
        ]);
    }

    /**
     * Fetch galeri data
     * Returns: array of gallery items
     */
    public function getGaleri(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return Galeri::all();
        
        return response()->json([
            [
                'id' => 1,
                'title' => 'Acara Keagamaan',
                'description' => 'Acara keagamaan banjar',
                'image' => 'galeri/acara-1.jpg',
            ],
            [
                'id' => 2,
                'title' => 'Kegiatan Sosial',
                'description' => 'Kegiatan sosial banjar',
                'image' => 'galeri/sosial-1.jpg',
            ],
        ]);
    }

    /**
     * Fetch sejarah data
     * Returns: sejarah object
     */
    public function getSejarah(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return Sejarah::first();
        
        return response()->json([
            'id' => 1,
            'title' => 'Sejarah Banjar',
            'content' => 'Banjar kami memiliki sejarah panjang yang kaya...',
            'year_founded' => 1850,
        ]);
    }

    /**
     * Fetch profil data (including jam pelayanan)
     * Returns: profil object
     */
    public function getProfil(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return Profil::first();
        
        return response()->json([
            'id' => 1,
            'nama' => 'Banjar Dinas Adat',
            'deskripsi' => 'Organisasi tradisional Bali',
            'alamat' => 'Jl. Raya Banjar, Bali',
            'telepon' => '+62-123-456-789',
            'email' => 'banjar@example.com',
            'jam_pelayanan' => [
                'hari' => 'Senin - Jumat',
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
            ],
        ]);
    }

    /**
     * Fetch kategori data (service categories with schedules)
     * Returns: array of kategori items
     */
    public function getKategori(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return Kategori::all();
        
        return response()->json([
            [
                'id' => 1,
                'nama' => 'Layanan Administrasi',
                'deskripsi' => 'Layanan administrasi banjar',
                'jadwal' => [
                    'hari' => 'Senin, Rabu',
                    'jam' => '09:00 - 12:00',
                ],
            ],
            [
                'id' => 2,
                'nama' => 'Layanan Keagamaan',
                'deskripsi' => 'Layanan keagamaan banjar',
                'jadwal' => [
                    'hari' => 'Setiap Hari',
                    'jam' => '08:00 - 17:00',
                ],
            ],
        ]);
    }

    /**
     * Fetch awig rules data
     * Returns: array of awig rule items
     */
    public function getAwigRules(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return AwigRules::all();
        
        return response()->json([
            [
                'id' => 1,
                'bab' => 'I',
                'judul' => 'Ketentuan Umum',
                'isi' => 'Awig-awig banjar memiliki ketentuan umum...',
            ],
            [
                'id' => 2,
                'bab' => 'II',
                'judul' => 'Hak dan Kewajiban',
                'isi' => 'Setiap warga banjar memiliki hak dan kewajiban...',
            ],
        ]);
    }

    /**
     * Fetch awig file data
     * Returns: awig file object
     */
    public function getAwigFile(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return AwigFile::first();
        
        return response()->json([
            'id' => 1,
            'nama_file' => 'Awig-Awig Banjar 2023',
            'deskripsi' => 'File lengkap awig-awig banjar',
            'file_path' => 'awig/awig-awig-banjar-2023.pdf',
            'tanggal_upload' => '2023-01-01',
        ]);
    }

    /**
     * Fetch penduduk banjar data
     * Returns: array of penduduk banjar items
     */
    public function getPendudukBanjar(): JsonResponse
    {
        // TODO: Replace with actual database query
        // return PendudukBanjar::all();
        
        return response()->json([
            [
                'id' => 1,
                'nama' => 'I Wayan Suardana',
                'nik' => '1234567890123456',
                'status' => 'Kepala Banjar',
                'alamat' => 'Jl. Raya Banjar No. 1',
            ],
            [
                'id' => 2,
                'nama' => 'I Made Wirawan',
                'nik' => '1234567890123457',
                'status' => 'Bendahara',
                'alamat' => 'Jl. Raya Banjar No. 2',
            ],
        ]);
    }
}
