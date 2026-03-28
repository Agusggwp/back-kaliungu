<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Format profil data untuk API response
     */
    private function formatProfilData($profil)
    {
        // Decode JSON jam_pelayanan jika ada
        $jam_pelayanan = [];
        if ($profil->jam_pelayanan) {
            $jam_pelayanan = is_array($profil->jam_pelayanan) 
                ? $profil->jam_pelayanan 
                : json_decode($profil->jam_pelayanan, true);
        }
        
        return [
            'id' => $profil->id,
            'nama' => $profil->nama,
            'deskripsi' => $profil->deskripsi,
            'alamat' => $profil->alamat,
            'telepon' => $profil->telepon,
            'email' => $profil->email,
            'jam_pelayanan' => [
                'hari' => $jam_pelayanan['hari'] ?? null,
                'jam_buka' => $jam_pelayanan['jam_buka'] ?? null,
                'jam_tutup' => $jam_pelayanan['jam_tutup'] ?? null,
            ],
            'jadwal_layanan_khusus' => $jam_pelayanan['jam_layanan_khusus'] ?? [],
            'created_at' => $profil->created_at,
            'updated_at' => $profil->updated_at,
        ];
    }

    public function index()
    {
        try {
            $profil = Profil::first();
            
            if (!$profil) {
                return response()->json([
                    'success' => false,
                    'status' => 404,
                    'message' => 'Data profil tidak ditemukan',
                    'data' => null,
                ], 404);
            }

            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Data profil berhasil diambil',
                'data' => $this->formatProfilData($profil),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $item = Profil::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Data profil berhasil diambil',
                'data' => $this->formatProfilData($item),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Profil tidak ditemukan',
                'data' => null,
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string',
                'deskripsi' => 'nullable|string',
                'alamat' => 'nullable|string',
                'telepon' => 'nullable|string',
                'email' => 'nullable|email',
                'jam_hari' => 'nullable|string',
                'jam_buka' => 'nullable|date_format:H:i',
                'jam_tutup' => 'nullable|date_format:H:i',
            ]);

            // Build jam_pelayanan JSON
            $jam_pelayanan = [
                'hari' => $validated['jam_hari'] ?? null,
                'jam_buka' => $validated['jam_buka'] ?? null,
                'jam_tutup' => $validated['jam_tutup'] ?? null,
            ];

            if ($request->has('jadwal_khusus_tipe')) {
                $jadwal_khusus = [];
                $tipes = $request->input('jadwal_khusus_tipe', []);
                $haris = $request->input('jadwal_khusus_hari', []);
                $jams = $request->input('jadwal_khusus_jam', []);

                foreach ($tipes as $index => $tipe) {
                    if ($tipe !== null && $tipe !== '') {
                        $jadwal_khusus[] = [
                            'tipe' => $tipe,
                            'hari' => $haris[$index] ?? '',
                            'jam' => $jams[$index] ?? '',
                        ];
                    }
                }
                if (!empty($jadwal_khusus)) {
                    $jam_pelayanan['jam_layanan_khusus'] = $jadwal_khusus;
                }
            }

            $validated['jam_pelayanan'] = json_encode($jam_pelayanan);
            unset($validated['jam_hari'], $validated['jam_buka'], $validated['jam_tutup']);

            $item = Profil::create($validated);

            return response()->json([
                'success' => true,
                'status' => 201,
                'message' => 'Profil berhasil dibuat',
                'data' => $this->formatProfilData($item),
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'status' => 422,
                'message' => 'Validasi gagal',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $item = Profil::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string',
                'deskripsi' => 'nullable|string',
                'alamat' => 'nullable|string',
                'telepon' => 'nullable|string',
                'email' => 'nullable|email',
                'jam_hari' => 'nullable|string',
                'jam_buka' => 'nullable|date_format:H:i',
                'jam_tutup' => 'nullable|date_format:H:i',
            ]);

            // Build jam_pelayanan JSON
            $jam_pelayanan = [
                'hari' => $validated['jam_hari'] ?? null,
                'jam_buka' => $validated['jam_buka'] ?? null,
                'jam_tutup' => $validated['jam_tutup'] ?? null,
            ];

            if ($request->has('jadwal_khusus_tipe')) {
                $jadwal_khusus = [];
                $tipes = $request->input('jadwal_khusus_tipe', []);
                $haris = $request->input('jadwal_khusus_hari', []);
                $jams = $request->input('jadwal_khusus_jam', []);

                foreach ($tipes as $index => $tipe) {
                    if ($tipe !== null && $tipe !== '') {
                        $jadwal_khusus[] = [
                            'tipe' => $tipe,
                            'hari' => $haris[$index] ?? '',
                            'jam' => $jams[$index] ?? '',
                        ];
                    }
                }
                if (!empty($jadwal_khusus)) {
                    $jam_pelayanan['jam_layanan_khusus'] = $jadwal_khusus;
                }
            }

            $validated['jam_pelayanan'] = json_encode($jam_pelayanan);
            unset($validated['jam_hari'], $validated['jam_buka'], $validated['jam_tutup']);

            $item->update($validated);

            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Profil berhasil diperbarui',
                'data' => $this->formatProfilData($item),
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Profil tidak ditemukan',
                'data' => null,
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'status' => 422,
                'message' => 'Validasi gagal',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $item = Profil::findOrFail($id);
            $item->delete();

            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Profil berhasil dihapus',
                'data' => null,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Profil tidak ditemukan',
                'data' => null,
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

