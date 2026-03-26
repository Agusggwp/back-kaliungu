<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json(Kategori::all());
    }

    public function show($id)
    {
        $item = Kategori::findOrFail($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'jadwal' => 'nullable|json',
        ]);

        $item = Kategori::create($validated);
        return response()->json($item, 201);
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
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Kategori::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
