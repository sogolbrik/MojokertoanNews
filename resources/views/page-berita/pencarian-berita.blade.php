<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MojokertoanNews | {{ $query }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/getbootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">

    <style>
        /* Enhanced modern styling with dark blue theme and beautiful UI/UX */
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #f1f5f9 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .search-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .search-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .search-header h1 {
            position: relative;
            z-index: 2;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            margin: 0;
        }

        .search-query {
            color: #fbbf24;
            font-weight: 800;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .category-header {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-left: 5px solid #1e40af;
            border-radius: 0 8px 8px 0;
        }

        .category-badge {
            background: linear-gradient(135deg, #1e40af, #1e3a8a);
            color: white;
            padding: 6px 16px;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(30, 64, 175, 0.3);
            transition: all 0.3s ease;
        }

        .category-badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(30, 64, 175, 0.4);
        }

        .news-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            overflow: hidden;
            background: white;
            position: relative;
        }

        .news-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #1e40af, #3b82f6, #60a5fa);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .news-card:hover::before {
            opacity: 1;
        }

        .card-img-top {
            transition: transform 0.4s ease;
            border-radius: 0;
        }

        .news-card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            color: #1e293b;
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.4;
            margin-bottom: 1rem;
            transition: color 0.3s ease;
        }

        .news-card:hover .card-title {
            color: #1e40af;
        }

        .card-text {
            color: #64748b;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .btn-read-more {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(30, 64, 175, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-read-more::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-read-more:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(30, 64, 175, 0.4);
            color: white;
        }

        .btn-read-more:hover::before {
            left: 100%;
        }

        .time-badge {
            background: linear-gradient(135deg, rgba(30, 64, 175, 0.1), rgba(59, 130, 246, 0.1));
            color: #1e40af;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid rgba(30, 64, 175, 0.2);
        }

        .author-info {
            color: #64748b;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .author-info i {
            color: #1e40af;
        }

        .update-info {
            color: #94a3b8;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .update-info i {
            color: #64748b;
        }

        .tech-icon {
            color: #1e40af;
            font-size: 2rem;
        }

        .no-results {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 2rem 0;
        }

        .no-results i {
            color: #94a3b8;
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.7;
        }

        .no-results h4 {
            color: #475569;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .no-results p {
            color: #94a3b8;
            font-size: 1.1rem;
        }

        .container {
            max-width: 1200px;
        }

        /* Enhanced responsive design */
        @media (max-width: 768px) {
            .search-header {
                padding: 2rem 0;
            }

            .search-header h1 {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 1.25rem;
            }

            .btn-read-more {
                padding: 10px 20px;
                font-size: 0.85rem;
            }
        }

        /* Smooth loading animation */
        .news-card {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .news-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .news-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .news-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .news-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .news-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .news-card:nth-child(6) {
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    @include('layouts.partials.navbar-berita')

    <!-- Enhanced search header with beautiful gradient and typography -->
    <div class="search-header">
        <div class="container">
            <h1 class="text-center">
                Hasil Pencarian: "<span class="search-query">{{ $query }}</span>"
            </h1>
        </div>
    </div>

    <!-- News Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row" id="newsGrid">
                {{-- Isi --}}
                @if ($berita->isEmpty())
                    <!-- Enhanced no results design -->
                    <div class="col-12">
                        <div class="no-results">
                            <i class="fa fa-search"></i>
                            <h4>Tidak ada berita ditemukan</h4>
                            <p>Coba gunakan kata kunci yang berbeda untuk pencarian Anda</p>
                        </div>
                    </div>
                @else
                    @foreach ($berita as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card news-card h-100">
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->gambar }}" style="height: 220px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    {{-- <span class="category-badge mb-2">
                                <i class="fa-solid fa-layer-group me-1"></i>{{ $kategori->nama }}
                            </span> --}}
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                    <p class="card-text flex-grow-1">{{ Str::limit($item->konten, 120) }}</p>

                                    <!-- Enhanced author and time info layout -->
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="author-info">
                                            <i class="fa fa-user"></i>
                                            <span>Gilang Sampurno</span>
                                        </div>
                                        <span class="time-badge">
                                            <i class="fa fa-clock me-1"></i>{{ $item->waktu->diffForHumans() }}
                                        </span>
                                    </div>

                                    <div class="mb-3">
                                        <div class="update-info">
                                            <i class="fa fa-pencil"></i>
                                            <span>Diperbarui: {{ $item->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                    <a href="{{ Route('detailBerita', $item->id) }}" class="btn-read-more text-center">
                                        <i class="fa fa-arrow-right me-2"></i>Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{ $berita->links() }}
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.partials.footer-berita')

    <script src="{{ asset('vendor/getbootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/all.min.js') }}"></script>

    <!-- Added smooth scroll and enhanced interactions -->
    <script>
        // Smooth scroll enhancement
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth hover effects for cards
            const newsCards = document.querySelectorAll('.news-card');

            newsCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Enhanced button interactions
            const readMoreBtns = document.querySelectorAll('.btn-read-more');

            readMoreBtns.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });

                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>

</html>
