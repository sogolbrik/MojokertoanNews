@extends('layouts.main')
@section('title', 'Berita')

@section('main')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Berita</h3>
                <p class="text-subtitle text-muted">Tempat data tersimpan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Table Data Berita</h4>
                            <a href="{{ Route('berita.create') }}" class="btn btn-primary" wire:navigate>
                                <i class="bi bi-plus-lg me-1"></i>Tambah</a>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berita as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                                <td style="width: 30%">
                                                    <form action="{{ Route('berita.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="{{ Route('berita.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
                                                        <button class="btn btn-danger">Hapus</button>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                                                            Detail
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($berita as $item)
        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column align-items-center mb-2">
                            <p>Gambar:</p>
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->gambar }}" class="img-fluid" style="width: 50%">
                        </div>
                        <p>Waktu: {{ $item->waktu }}</p>
                        <p>Konten: {{ $item->konten }}</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
