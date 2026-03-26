<?php

namespace App\Http\Controllers\Admin;

use App\Models\AwigRule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AwigRuleAdminController extends Controller
{
    public function index()
    {
        $items = AwigRule::all();
        return view('admin.awig-rule.index', compact('items'));
    }

    public function create()
    {
        return view('admin.awig-rule.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bab' => 'required|string',
            'judul' => 'required|string',
            'isi' => 'required|string',
        ]);

        AwigRule::create($validated);
        return redirect()->route('admin.awig-rule.index')->with('success', 'Awig Rule berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = AwigRule::findOrFail($id);
        return view('admin.awig-rule.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = AwigRule::findOrFail($id);

        $validated = $request->validate([
            'bab' => 'required|string',
            'judul' => 'required|string',
            'isi' => 'required|string',
        ]);

        $item->update($validated);
        return redirect()->route('admin.awig-rule.index')->with('success', 'Awig Rule berhasil diubah');
    }

    public function destroy($id)
    {
        $item = AwigRule::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.awig-rule.index')->with('success', 'Awig Rule berhasil dihapus');
    }
}
