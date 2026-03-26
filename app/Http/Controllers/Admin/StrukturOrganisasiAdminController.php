<?php

namespace App\Http\Controllers\Admin;

use App\Models\StrukturOrganisasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiAdminController extends Controller
{
    public function index()
    {
        $items = StrukturOrganisasi::all();
        return view('admin.struktur-organisasi.index', compact('items'));
    }

    public function create()
    {
        return view('admin.struktur-organisasi.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jabatan' => 'required|string',
            'nama' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('struktur-organisasi', 'public');
        }

        StrukturOrganisasi::create($validated);
        return redirect()->route('admin.struktur-organisasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = StrukturOrganisasi::findOrFail($id);
        return view('admin.struktur-organisasi.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = StrukturOrganisasi::findOrFail($id);

        $validated = $request->validate([
            'jabatan' => 'required|string',
            'nama' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif|max:5120',
        ]);

        if ($request->hasFile('file')) {
            if ($item->file) {
                Storage::disk('public')->delete($item->file);
            }
            $validated['file'] = $request->file('file')->store('struktur-organisasi', 'public');
        }

        $item->update($validated);
        return redirect()->route('admin.struktur-organisasi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $item = StrukturOrganisasi::findOrFail($id);
        if ($item->file) {
            Storage::disk('public')->delete($item->file);
        }
        $item->delete();
        return redirect()->route('admin.struktur-organisasi.index')->with('success', 'Data berhasil dihapus');
    }
}
