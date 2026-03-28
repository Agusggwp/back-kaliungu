<?php

namespace App\Http\Controllers;

use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all()->map(function($item) {
            return [
                'id' => $item->slug,
                'category' => $item->category,
                'title' => $item->nama,
                'subtitle' => $item->subtitle,
                'shortDescription' => $item->short_description,
                'description' => $item->deskripsi,
                'image' => $item->image,
                'schedule' => $item->jadwal,
                'location' => $item->lokasi,
                'contact' => $item->telepon,
                'email' => $item->email,
                'services' => is_string($item->services) ? json_decode($item->services, true) : $item->services,
                'requirements' => is_string($item->requirements) ? json_decode($item->requirements, true) : $item->requirements,
            ];
        });

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Data layanan berhasil diambil',
            'data' => $layanans
        ], 200);
    }
}
