@extends('layouts.main')
@section('title', 'Kategori')

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

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
    </style>

    <!-- Updated header with modern gradient styling and category-specific content -->
    <div class="modern-page-header">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h3><i class="bi bi-tags"></i> Kategori</h3>
                <p class="text-subtitle">Kelola dan atur semua kategori dengan mudah</p>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class="modern-breadcrumb float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <!-- Applied modern card styling with rounded corners and shadows -->
                <div class="card modern-card">
                    <div class="card-header modern-card-header">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <h4 class="modern-card-title"><i class="fa fa-th-list me-1"></i> Data Kategori</h4>
                            <a href="{{ Route('kategori.create') }}" class="btn modern-btn-primary text-white" wire:navigate>
                                <i class="bi bi-plus-lg me-2"></i>Tambah Kategori Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Applied modern table styling with hover effects and better spacing -->
                            <table class="table modern-table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th style="width: 60%">Nama Kategori</th>
                                        <th style="width: 30%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td>
                                                <span class="badge bg-primary rounded-pill">{{ $loop->iteration }}</span>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $item->nama }}</div>
                                            </td>
                                            <td>
                                                <form action="{{ Route('kategori.destroy', $item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <!-- Applied modern button styling with hover effects and better spacing -->
                                                    <div class="action-buttons">
                                                        <a href="{{ Route('kategori.edit', $item->id) }}" class="btn modern-btn-warning btn-sm">
                                                            <i class="bi bi-pencil me-1"></i>Ubah
                                                        </a>
                                                        <button type="submit" class="btn modern-btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
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

    <!-- Added modern JavaScript interactions for smooth animations -->
    <script>
        // Add smooth animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation for buttons
            const buttons = document.querySelectorAll('.modern-btn-primary, .modern-btn-warning, .modern-btn-danger');
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
        });
    </script>

@endsection
