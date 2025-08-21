@extends('layouts.main')
@section('title', 'Edit Kategori')

@section('main')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Edit Berita</h3>
                    <p class="text-subtitle text-muted">Tempat edit data.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item " aria-current="page">Berita</li>
                            <li class="breadcrumb-item active" aria-current="page">Form-edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Form Edit Berita</h4>
                            <a href="{{ Route('berita.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ Route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="basicInput">Judul</label>
                                <input type="text" name="judul" value="{{ $berita->judul }}" class="form-control" id="basicInput" placeholder="isi Judul" />
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Kategori</label>
                                <select name="id_category" id="" class="form-select">
                                    @foreach ($kategori as $item)
                                        <option selected disabled>- Pilih kategori -</option>
                                        <option {{ $item->id == $berita->id_category ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Konten</label>
                                <input type="text" name="konten" value="{{ $berita->konten }}" class="form-control" id="basicInput" placeholder="isi konten berita" />
                                @error('konten')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Gambar</label>
                                <input type="file" name="gambar" class="form-control mb-2" id="basicInput" placeholder="isi nama kategori" />
                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <label for="">Foto Lama</label>
                            <div class="form-group">
                                <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" class="img-fluid mb-2" style="width: 30%" alt="{{ $berita->gambar }}">
                            </div>
                            
                            <button class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
