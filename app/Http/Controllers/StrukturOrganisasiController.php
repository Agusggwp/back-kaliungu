<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        return response()->json(StrukturOrganisasi::all());
    }

    public function show($id)
    {
        $item = StrukturOrganisasi::findOrFail($id);
        return response()->json($item);
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

        $item = StrukturOrganisasi::create($validated);
        return response()->json($item, 201);
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
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = StrukturOrganisasi::findOrFail($id);
        if ($item->file) {
            Storage::disk('public')->delete($item->file);
        }
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
