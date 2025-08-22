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

    public function kategori()
    {
        return view('page-berita.kategori', [
            'title'         => 'Mojokertoan',
            'heroBerita'    => News::latest()->take(1)->get(),
            'berita'        => News::latest()->get(),
            'kategori'      => Category::all(),
        ]);
    }
}
