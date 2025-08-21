<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kategori.data', [
            'kategori' => Category::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required'
        ]);

        Category::create($validation);

        return redirect()->route('kategori.index')->with('success-message', 'Kategori berhasil ditambahkan');
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
        return view('admin.kategori.form-edit', [
            'kategori' => Category::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'nama' => 'required'
        ]);

        Category::findOrFail($id)->update($validation);

        return redirect()->route('kategori.index')->with('success-message', 'Kategori berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('kategori.index')->with('success-message', 'Kategori berhasil dihapus');
    }
}
