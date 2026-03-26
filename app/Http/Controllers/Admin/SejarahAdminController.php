<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sejarah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahAdminController extends Controller
{
    public function index()
    {
        $items = Sejarah::all();
        return view('admin.sejarah.index', compact('items'));
    }

    public function create()
    {
        return view('admin.sejarah.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'year_founded' => 'nullable|integer',
            'lokasi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('sejarah', 'public');
            $validated['image'] = $path;
            \Log::info('File uploaded successfully', ['path' => $path, 'name' => $file->getClientOriginalName()]);
        }

        Sejarah::create($validated);
        return redirect()->route('admin.sejarah.index')->with('success', 'Sejarah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Sejarah::findOrFail($id);
        return view('admin.sejarah.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Sejarah::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'year_founded' => 'nullable|integer',
            'lokasi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
                \Log::info('Old image deleted', ['path' => $item->image]);
            }
            $file = $request->file('image');
            $path = $file->store('sejarah', 'public');
            $validated['image'] = $path;
            \Log::info('New file uploaded', ['path' => $path, 'name' => $file->getClientOriginalName()]);
        }

        $item->update($validated);
        return redirect()->route('admin.sejarah.index')->with('success', 'Sejarah berhasil diubah');
    }

    public function destroy($id)
    {
        $item = Sejarah::findOrFail($id);
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return redirect()->route('admin.sejarah.index')->with('success', 'Sejarah berhasil dihapus');
    }
}
