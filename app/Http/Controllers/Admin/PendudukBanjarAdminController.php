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
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        PendudukBanjar::create($validated);
        return redirect()->route('admin.penduduk-banjar.index')->with('success', 'Data penduduk berhasil ditambahkan');
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
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        $item->update($validated);
        return redirect()->route('admin.penduduk-banjar.index')->with('success', 'Data penduduk berhasil diubah');
    }

    public function destroy($id)
    {
        $item = PendudukBanjar::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.penduduk-banjar.index')->with('success', 'Penduduk berhasil dihapus');
    }
}
