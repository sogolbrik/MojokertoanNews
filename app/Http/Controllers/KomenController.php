<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function create(Request $request)
    {
        $validation = $request->validate([
            'id_berita' => 'required',
            'nama'      => 'required|string|max:255',
            'komen'     => 'required',
        ]);

        // $berita = News::findOrFail($id);
        $berita = News::findOrFail($request->id_berita);

        $berita->komen()->create([
            'nama'  => $validation['nama'],
            'komen' => $validation['komen'],
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
