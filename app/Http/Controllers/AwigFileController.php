<?php

namespace App\Http\Controllers;

use App\Models\AwigFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwigFileController extends Controller
{
    public function index()
    {
        return response()->json(AwigFile::all());
    }

    public function show($id)
    {
        $item = AwigFile::findOrFail($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_file' => 'required|string',
            'deskripsi' => 'nullable|string',
            'file_path' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif,zip|max:5120',
            'tanggal_upload' => 'nullable|date',
        ]);

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('awig-file', 'public');
        }

        $item = AwigFile::create($validated);
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = AwigFile::findOrFail($id);

        $validated = $request->validate([
            'nama_file' => 'required|string',
            'deskripsi' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif,zip|max:5120',
            'tanggal_upload' => 'nullable|date',
        ]);

        if ($request->hasFile('file_path')) {
            if ($item->file_path) {
                Storage::disk('public')->delete($item->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('awig-file', 'public');
        }

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = AwigFile::findOrFail($id);
        if ($item->file_path) {
            Storage::disk('public')->delete($item->file_path);
        }
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
