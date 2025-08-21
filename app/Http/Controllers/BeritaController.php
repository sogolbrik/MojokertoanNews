<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.berita.data', [
            'berita' => News::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.form', [
            'kategori' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'judul'       => 'required',
            'id_category' => 'required',
            'konten'      => 'required',
            'gambar'      => 'image|file|max:2048'
        ]);

        $validation['waktu'] = now();

        if ($request->hasFile("gambar")) {

            $file = $request->file("gambar");

            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita/'), $file_name);

            $validation["gambar"] = $file_name;
        }

        News::create($validation);

        return redirect()->route('berita.index')->with('success-message', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.berita.form-edit', [
            'berita'   => News::findOrFail($id),
            'kategori' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'judul'       => 'required',
            'id_category' => 'required',
            'konten'      => 'required',
            'gambar'      => 'image|file|max:2048'
        ]);

        $berita = News::findOrFail($id);

        if ($request->hasFile("gambar")) {

            $file_path = public_path("uploads/berita/" . $berita->gambar);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file("gambar");

            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita/'), $file_name);

            $validation["gambar"] = $file_name;
        }

        News::findOrFail($id)->update($validation);

        return redirect()->route('berita.index')->with('success-message', 'Berita berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = News::find($id);

        $file_path = public_path("uploads/berita/" . $berita->picture);

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success-message', 'Berita berhasil dihapus');
    }
}
