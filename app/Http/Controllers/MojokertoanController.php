<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class MojokertoanController extends Controller
{
    public function landingPage()
    {
        return view('page-berita.landing-page', [
            'title'         => 'Mojokertoan',
            'heroBerita'    => News::latest()->take(1)->get(),
            'beritaTerbaru' => News::latest()->take(6)->get(),
            'kategori'      => Category::all(),
        ]);
    }

    // public function trending($id)
    // {
    //     $berita = News::with('kategori')->findOrFail($id);

    //     // Tambah views setiap kali berita dibuka
    //     $berita->increment('views');

    //     return view('page-berita.landingPage', [
    //         'trending' => $berita
    //     ]);
    // }

    public function byKategori($slug)
    {
        $kategori = Category::where('slug', $slug)->firstOrFail();
        $berita = $kategori->berita()->latest()->paginate(6);

        return view('page-berita.byKategori', [
            'berita'   => $berita,
            'kategori' => $kategori,
        ]);
    }

    public function allBerita()
    {
        $berita = News::with('kategori')->latest()->paginate(9);

        return view('page-berita.allBerita', [
            'berita' => $berita,
        ]);
    }
}
