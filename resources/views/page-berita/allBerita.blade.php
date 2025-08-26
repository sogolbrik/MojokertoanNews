<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MojokertoanNews | Semua</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/getbootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">

    <style>
        /* Custom CSS untuk mempercantik tampilan */
        .bg-primary-custom {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
        }

        .category-nav:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border-radius: 6px;
            transform: translateY(-1px);
            transition: all 0.3s ease;
        }

        .news-card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .category-header {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-left: 5px solid #3b82f6;
        }

        .category-badge {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .btn-read-more {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-read-more:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
            color: white;
        }

        .search-input {
            border-radius: 25px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 8px 20px;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            color: white;
        }

        .time-badge {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
        }

        .tech-icon {
            color: #3b82f6;
            font-size: 2rem;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: #6b7280;
        }
    </style>
</head>

<body>

    <!-- Header -->
    @include('layouts.partials.navbar-berita')

    <!-- Breadcrumb -->
    <div class="bg-light py-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ Route('landingPage') }}" class="text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Semua</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Category Header -->
    <section class="category-header py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-regular fa-newspaper tech-icon"></i>
                        <div>
                            <h2 class="h3 fw-bold mb-1">Semua Berita</h2>
                            <p class="text-muted mb-0">Menampilkan semua berita terbaru dan terpopuler dari berbagai kategori. Temukan informasi terkini dan baca artikel menarik yang telah kami
                                siapkan untuk Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-primary fs-6" id="newsCount">{{ $berita->total() }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology News Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row" id="newsGrid">
                {{-- Isi --}}
                @forelse ($berita as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card h-100">
                            @if ($item->gambar == null)
                                <img src="{{ asset('dummy/monarch-butterfly.png') }}" class="card-img-top" alt="Gambar Kosong" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->gambar }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <span class="category-badge mb-2">
                                    <i class="fa-solid fa-layer-group me-1"></i>{{ $item->kategori->nama }}
                                </span>
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($item->konten, 120) }}</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">
                                        <i class="fa fa-user me-1"></i>Oleh: Gilang Sampurno
                                    </small>
                                    <span class="time-badge">
                                        <i class="fa fa-clock me-1"></i>{{ $item->waktu->diffForHumans() }}
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted">
                                        <i class="fa fa-pencil me-1"></i>Diperbarui: {{ $item->updated_at->diffForHumans() }}
                                    </small>
                                </div>
                                <a href="#" class="btn-read-more text-center">
                                    <i class="fa fa-arrow-right me-1"></i>Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fa fa-search text-muted" style="font-size: 3rem;"></i>
                        <h4 class="text-muted mt-3">Tidak ada berita ditemukan</h4>
                        <p class="text-muted">Coba gunakan kata kunci yang berbeda</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.partials.footer-berita')

    <script src="{{ asset('vendor/getbootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/all.min.js') }}"></script>
</body>

</html>
