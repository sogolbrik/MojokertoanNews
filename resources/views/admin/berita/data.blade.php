@extends('layouts.main')
@section('title', 'Berita')

@section('main')
    <style>
        :root {
            --primary-dark-blue: #1e3a8a;
            --secondary-blue: #3b82f6;
            --accent-teal: #0d9488;
            --light-gray: #f8fafc;
            --white: #ffffff;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --border-light: #e5e7eb;
            --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .modern-page-header {
            background: linear-gradient(135deg, var(--primary-dark-blue) 0%, var(--secondary-blue) 100%);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: var(--white);
            box-shadow: var(--shadow-medium);
        }

        .modern-page-header h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--white);
        }

        .modern-page-header .text-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        .modern-breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            backdrop-filter: blur(10px);
        }

        .modern-breadcrumb .breadcrumb {
            margin-bottom: 0;
        }

        .modern-breadcrumb .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .modern-breadcrumb .breadcrumb-item a:hover {
            color: var(--white);
        }

        .modern-breadcrumb .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.7);
        }

        .modern-card {
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow-soft);
            background: var(--white);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .modern-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .modern-card-header {
            background: var(--light-gray);
            border-bottom: 2px solid var(--border-light);
            padding: 1.5rem 2rem;
        }

        .modern-card-title {
            color: var(--primary-dark-blue);
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 0;
        }
        
        .modern-btn-primary {
            background: var(--secondary-blue);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-soft);
        }

        .modern-btn-primary:hover {
            background: var(--primary-dark-blue);
            transform: translateY(-1px);
            box-shadow: var(--shadow-medium);
        }

        .modern-btn-warning {
            background: #f59e0b;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: var(--white);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .modern-btn-warning:hover {
            background: #d97706;
            transform: translateY(-1px);
        }

        .modern-btn-danger {
            background: #ef4444;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: var(--white);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .modern-btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .modern-btn-info {
            background: var(--accent-teal);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: var(--white);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .modern-btn-info:hover {
            background: #0f766e;
            transform: translateY(-1px);
        }

        .modern-table {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
        }

        .modern-table thead th {
            background: var(--primary-dark-blue);
            color: var(--white);
            font-weight: 600;
            padding: 1rem;
            border: none;
            font-size: 1rem;
        }

        .modern-table tbody tr {
            transition: background-color 0.3s ease;
        }

        .modern-table tbody tr:hover {
            background-color: rgba(30, 58, 138, 0.05);
        }

        .modern-table tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
        }

        .modern-table tbody tr:last-child td {
            border-bottom: none;
        }

        .modern-modal .modal-content {
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow-medium);
        }

        .modern-modal .modal-header {
            background: var(--primary-dark-blue);
            color: var(--white);
            border-radius: 20px 20px 0 0;
            padding: 1.5rem 2rem;
        }

        .modern-modal .modal-title {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .modern-modal .btn-close {
            filter: invert(1);
        }

        .modern-modal .modal-body {
            padding: 2rem;
        }

        .modern-modal .modal-footer {
            border-top: 1px solid var(--border-light);
            padding: 1.5rem 2rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .image-preview {
            border-radius: 12px;
            box-shadow: var(--shadow-soft);
            max-width: 100%;
            height: auto;
        }

        .detail-item {
            background: var(--light-gray);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .detail-label {
            font-weight: 600;
            color: var(--primary-dark-blue);
            margin-bottom: 0.5rem;
        }

        .detail-content {
            color: var(--text-dark);
            line-height: 1.6;
        }
    </style>

    <div class="modern-page-header">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h3><i class="bi bi-newspaper"></i> Berita</h3>
                <p class="text-subtitle">Kelola dan pantau semua berita dengan mudah</p>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class="modern-breadcrumb float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ Route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card modern-card">
                    <div class="card-header modern-card-header">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <h4 class="modern-card-title"><i class="fa fa-th-list me-1"></i> Data Berita</h4>
                            <a href="{{ Route('berita.create') }}" class="btn modern-btn-primary text-white" wire:navigate>
                                <i class="bi bi-plus-lg me-2"></i>Tambah Berita Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table modern-table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 40%">Judul Berita</th>
                                        <th style="width: 20%">Kategori</th>
                                        <th style="width: 35%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($berita as $item)
                                        <tr>
                                            <td>
                                                <span class="badge bg-primary rounded-pill">{{ $loop->iteration }}</span>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $item->judul }}</div>
                                            </td>
                                            <td>
                                                @if ($item->kategori)
                                                    <span class="badge bg-info rounded-pill">{{ $item->kategori->nama }}</span>
                                                @else
                                                    <span class="badge bg-secondary rounded-pill">Tidak ada kategori</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ Route('berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="action-buttons">
                                                        <button type="button" class="btn modern-btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                                                            <i class="bi bi-eye me-1"></i>Detail
                                                        </button>
                                                        <a href="{{ Route('berita.edit', $item->id) }}" class="btn modern-btn-warning btn-sm">
                                                            <i class="bi bi-pencil me-1"></i>Ubah
                                                        </a>
                                                        <button type="submit" class="btn modern-btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                            <i class="bi bi-trash me-1"></i>Hapus
                                                        </button>
                                                    </div>
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
    </section>

    @foreach ($berita as $item)
        <div class="modal fade modern-modal" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="detailModalLabel{{ $item->id }}">
                            <i class="bi bi-newspaper me-2"></i>Detail Berita
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label">📰 Judul Berita</div>
                                    <div class="detail-content">{{ $item->judul }}</div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">🏷️ Kategori</div>
                                    <div class="detail-content">
                                        @if ($item->kategori)
                                            <span class="badge bg-info">{{ $item->kategori->nama }}</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak ada kategori</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">⏰ Waktu Publikasi</div>
                                    <div class="detail-content">{{ $item->waktu }}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-item">
                                    <div class="detail-label">🖼️ Gambar Berita</div>
                                    <div class="detail-content text-center">
                                        <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->gambar }}" class="image-preview"
                                            style="max-width: 100%; max-height: 200px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-label">📝 Konten Berita</div>
                            <div class="detail-content">{{ $item->konten }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        // Add smooth animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation for buttons
            const buttons = document.querySelectorAll('.modern-btn-primary, .modern-btn-warning, .modern-btn-danger, .modern-btn-info');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    if (this.type === 'submit' || this.tagName === 'A') {
                        this.style.opacity = '0.7';
                        this.style.pointerEvents = 'none';

                        setTimeout(() => {
                            this.style.opacity = '1';
                            this.style.pointerEvents = 'auto';
                        }, 2000);
                    }
                });
            });

            // Add table row hover effects
            const tableRows = document.querySelectorAll('.modern-table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.01)';
                });

                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });

            // Add modal animation
            const modals = document.querySelectorAll('.modern-modal');
            modals.forEach(modal => {
                modal.addEventListener('show.bs.modal', function() {
                    this.querySelector('.modal-content').style.transform = 'scale(0.8)';
                    this.querySelector('.modal-content').style.opacity = '0';

                    setTimeout(() => {
                        this.querySelector('.modal-content').style.transform = 'scale(1)';
                        this.querySelector('.modal-content').style.opacity = '1';
                        this.querySelector('.modal-content').style.transition = 'all 0.3s ease';
                    }, 50);
                });
            });
        });
    </script>

@endsection
