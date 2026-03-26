<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriAdminController extends Controller
{
    public function index()
    {
        $items = Kategori::all();
        return view('admin.kategori.index', compact('items'));
    }

    public function create()
    {
        return view('admin.kategori.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jadwal' => 'nullable|json',
        ]);

        Kategori::create($validated);
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Kategori::findOrFail($id);
        return view('admin.kategori.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Kategori::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jadwal' => 'nullable|json',
        ]);

        $item->update($validated);
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $item = Kategori::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
