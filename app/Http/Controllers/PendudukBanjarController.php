<?php

namespace App\Http\Controllers;

use App\Models\PendudukBanjar;
use Illuminate\Http\Request;

class PendudukBanjarController extends Controller
{
    public function index()
    {
        return response()->json(PendudukBanjar::all());
    }

    public function show($id)
    {
        $item = PendudukBanjar::findOrFail($id);
        return response()->json($item);
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

        $item = PendudukBanjar::create($validated);
        return response()->json($item, 201);
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
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = PendudukBanjar::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
