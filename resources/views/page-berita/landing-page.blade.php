<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MojokertoanNews</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/getbootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">

    <style>
        .news-card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .hero-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
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

        .trending-item {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .trending-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .time-badge {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
        }
    </style>
</head>

<body>

    <!-- Header -->
    @include('layouts.partials.navbar-berita')

    <!-- Hero Section -->
    @foreach ($heroBerita as $item)
        <section class="hero-section py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <span class="category-badge">{{ $item->kategori->nama }}</span>
                        <h2 class="display-5 fw-bold mt-3 mb-4">{{ $item->judul }}</h2>
                        <p class="lead text-muted mb-4">{{ Str::limit($item->konten, 335) }}</p>
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <small class="text-muted">Oleh: Gilang Sampurno</small>
                            <small class="text-muted">•</small>
                            <span class="time-badge">{{ $item->waktu->diffForHumans() }}</span>
                        </div>
                        <a href="{{ Route('detailBerita', $item->id) }}" class="btn-read-more">Baca Selengkapnya</a>
                    </div>
                    <div class="col-lg-6">
                        @if ($item->gambar == null)
                            <img src="{{ asset('dummy/monarch-butterfly.png') }}" alt="No Image" class="img-fluid rounded shadow-lg">
                        @else
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->gambar }}" class="img-fluid rounded shadow-lg">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <!-- News Grid -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h4 fw-bold">Berita Terbaru</h3>
                <span class="text-muted" id="newsCount">{{ $beritaTerbaru->count() }} artikel ditemukan</span>
            </div>

            <div class="row" id="newsGrid">
                @foreach ($beritaTerbaru as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card h-100">
                            @if ($item->gambar == null)
                                <img src="{{ asset('dummy/monarch-butterfly.png') }}" alt="No Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->gambar }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <span class="category-badge mb-2">{{ $item->kategori->nama }}</span>
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($item->konten, 120) }}</p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted">Oleh: Gilang Sampurno</small>
                                    <span class="time-badge">{{ $item->waktu->diffForHumans() }}</span>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Diperbarui: {{ $item->updated_at->diffForHumans() }}</small>
                                </div>
                                <a href="{{ Route('detailBerita', $item->id) }}" class="btn-read-more text-center">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Trending Sidebar -->
    {{-- <section class="bg-light py-5">
        <div class="container">
            <h3 class="h4 fw-bold mb-4">Berita Trending</h3>
            <div class="row">
                <div class="col-lg-8">
                    <div id="trendingNews">
                        @foreach ($trending as $item)
                            <div class="trending-item">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        @if ($item->gambar == null)
                                            <img src="{{ asset('dummy/monarch-butterfly.png') }}" alt="No Image" class="img-fluid rounded" style="height: 60px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->gambar }}" class="img-fluid rounded" style="height: 60px; object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="col-9">
                                        <h6 class="mb-1">${news.title}</h6>
                                        <div class="d-flex align-items-center gap-2">
                                            <small class="text-muted">${news.category}</small>
                                            <small class="text-muted">•</small>
                                            <span class="time-badge">${getTimeAgo(news.uploadTime)}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Footer -->
    @include('layouts.partials.footer-berita')

    <script src="{{ asset('vendor/getbootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/all.min.js') }}"></script>
</body>

</html>
