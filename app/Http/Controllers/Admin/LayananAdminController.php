<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananAdminController extends Controller
{
    public function index()
    {
        $items = Layanan::all();
        return view('admin.layanan.index', compact('items'));
    }

    public function create()
    {
        return view('admin.layanan.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:layanans,slug',
            'nama' => 'required|string',
            'category' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'short_description' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|string',
            'jadwal' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'telepon' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        Layanan::create($validated);
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Layanan::findOrFail($id);
        return view('admin.layanan.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Layanan::findOrFail($id);

        $validated = $request->validate([
            'slug' => 'required|string|unique:layanans,slug,' . $id,
            'nama' => 'required|string',
            'category' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'short_description' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|string',
            'jadwal' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'telepon' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $item->update($validated);
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = Layanan::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus');
    }
}
