<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profil;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilAdminController extends Controller
{
    public function index()
    {
        $items = Profil::all();
        return view('admin.profil.index', compact('items'));
    }

    public function create()
    {
        return view('admin.profil.form');
    }

    public function store(Request $request)
    {
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
            'hari' => $validated['jam_hari'] ?? '',
            'jam_buka' => $validated['jam_buka'] ?? '',
            'jam_tutup' => $validated['jam_tutup'] ?? '',
        ];

        // Add jadwal layanan khusus if provided
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

        Profil::create($validated);
        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Profil::findOrFail($id);
        return view('admin.profil.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
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
            'hari' => $validated['jam_hari'] ?? '',
            'jam_buka' => $validated['jam_buka'] ?? '',
            'jam_tutup' => $validated['jam_tutup'] ?? '',
        ];

        // Add jadwal layanan khusus if provided
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
        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil diubah');
    }

    public function destroy($id)
    {
        $item = Profil::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil dihapus');
    }
}
