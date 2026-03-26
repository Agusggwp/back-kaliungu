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
            'jam_pelayanan' => 'nullable|json',
        ]);

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
            'jam_pelayanan' => 'nullable|json',
        ]);

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
