<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriAdminController extends Controller
{
    public function index()
    {
        $items = Galeri::all();
        return view('admin.galeri.index', compact('items'));
    }

    public function create()
    {
        return view('admin.galeri.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('galeri', 'public');
        }

        Galeri::create($validated);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Galeri::findOrFail($id);
        return view('admin.galeri.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Galeri::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('galeri', 'public');
        }

        $item->update($validated);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diubah');
    }

    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}
