<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderAdminController extends Controller
{
    public function index()
    {
        $items = Slider::all();
        return view('admin.slider.index', compact('items'));
    }

    public function create()
    {
        return view('admin.slider.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('slider', 'public');
        }

        Slider::create($validated);
        return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Slider::findOrFail($id);
        return view('admin.slider.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Slider::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $validated['image'] = $request->file('image')->store('slider', 'public');
        }

        $item->update($validated);
        return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil diubah');
    }

    public function destroy($id)
    {
        $item = Slider::findOrFail($id);
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider berhasil dihapus');
    }
}
