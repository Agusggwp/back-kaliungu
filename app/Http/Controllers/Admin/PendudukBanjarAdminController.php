<?php

namespace App\Http\Controllers\Admin;

use App\Models\PendudukBanjar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendudukBanjarAdminController extends Controller
{
    public function index()
    {
        $items = PendudukBanjar::all();
        return view('admin.penduduk-banjar.index', compact('items'));
    }

    public function create()
    {
        return view('admin.penduduk-banjar.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string|unique:penduduk_banjar',
            'status' => 'required|string',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
        ]);

        PendudukBanjar::create($validated);
        return redirect()->route('admin.penduduk-banjar.index')->with('success', 'Penduduk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = PendudukBanjar::findOrFail($id);
        return view('admin.penduduk-banjar.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = PendudukBanjar::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string|unique:penduduk_banjar,nik,' . $id,
            'status' => 'required|string',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
        ]);

        $item->update($validated);
        return redirect()->route('admin.penduduk-banjar.index')->with('success', 'Penduduk berhasil diubah');
    }

    public function destroy($id)
    {
        $item = PendudukBanjar::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.penduduk-banjar.index')->with('success', 'Penduduk berhasil dihapus');
    }
}
