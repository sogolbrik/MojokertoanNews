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

    public function cariBerita(Request  $request)
    {
        $query = $request->input('search'); // Ambil input pencarian
        $berita = News::where('judul', 'like', '%' . $query . '%')
            ->paginate(10); // Sesuaikan jumlah per halaman

        return view('page-berita.pencarian-berita', [
            'berita' => $berita,
            'query'  => $query,
        ]);
    }

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

    public function detailBerita($id)
    {
        $berita = News::with('kategori')->findOrFail($id);

        return view('page-berita.detailBerita', [
            'berita'  => News::with('kategori')->findOrFail($id),
            'terkait' => News::where('id_category', $berita->id_category)
                ->where('id', '!=', $berita->id)
                ->latest()->take(3)->get(),
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
}
