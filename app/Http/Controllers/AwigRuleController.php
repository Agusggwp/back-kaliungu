<?php

namespace App\Http\Controllers;

use App\Models\AwigRule;
use Illuminate\Http\Request;

class AwigRuleController extends Controller
{
    public function index()
    {
        return response()->json(AwigRule::all());
    }

    public function show($id)
    {
        $item = AwigRule::findOrFail($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bab' => 'required|string',
            'judul' => 'required|string',
            'isi' => 'required|string',
        ]);

        $item = AwigRule::create($validated);
        return response()->json($item, 201);
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
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = AwigRule::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
