<?php

namespace App\Http\Controllers\Admin;

use App\Models\AwigFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwigFileAdminController extends Controller
{
    public function index()
    {
        $items = AwigFile::all();
        return view('admin.awig-file.index', compact('items'));
    }

    public function create()
    {
        return view('admin.awig-file.form');
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

        AwigFile::create($validated);
        return redirect()->route('admin.awig-file.index')->with('success', 'File berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = AwigFile::findOrFail($id);
        return view('admin.awig-file.form', compact('item'));
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
        return redirect()->route('admin.awig-file.index')->with('success', 'File berhasil diubah');
    }

    public function destroy($id)
    {
        $item = AwigFile::findOrFail($id);
        if ($item->file_path) {
            Storage::disk('public')->delete($item->file_path);
        }
        $item->delete();
        return redirect()->route('admin.awig-file.index')->with('success', 'File berhasil dihapus');
    }
}
