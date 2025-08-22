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

        .footer-custom {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
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
    </style>
</head>

<body>

    <!-- Header -->
    <header class="bg-primary-custom text-white shadow-lg">
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h1 class="h3 mb-0 fw-bold">Mojokertoan News</h1>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <nav class="d-flex justify-content-center gap-3">
                        <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="all">Semua</button>
                        <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Politik">Politik</button>
                        <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Teknologi">Teknologi</button>
                        <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Kesehatan">Kesehatan</button>
                        <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Ekonomi">Ekonomi</button>
                    </nav>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control search-input" placeholder="Cari berita..." id="searchInput">
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <div class="d-md-none bg-light py-2">
        <div class="container">
            <div class="d-flex flex-wrap gap-2" id="mobileCategories">
                <button class="btn btn-outline-primary btn-sm category-nav-mobile active" data-category="all">Semua</button>
                <button class="btn btn-outline-primary btn-sm category-nav-mobile" data-category="Politik">Politik</button>
                <button class="btn btn-outline-primary btn-sm category-nav-mobile" data-category="Teknologi">Teknologi</button>
                <button class="btn btn-outline-primary btn-sm category-nav-mobile" data-category="Olahraga">Olahraga</button>
                <button class="btn btn-outline-primary btn-sm category-nav-mobile" data-category="Kesehatan">Kesehatan</button>
                <button class="btn btn-outline-primary btn-sm category-nav-mobile" data-category="Ekonomi">Ekonomi</button>
                <button class="btn btn-outline-primary btn-sm category-nav-mobile" data-category="Lingkungan">Lingkungan</button>
            </div>
        </div>
    </div>

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
                        <a href="#" class="btn-read-more">Baca Selengkapnya</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->gambar }}" class="img-fluid rounded shadow-lg">
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
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->gambar }}" style="height: 200px; object-fit: cover;">
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
                                <a href="#" class="btn-read-more text-center">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Trending Sidebar -->
    <section class="bg-light py-5">
        <div class="container">
            <h3 class="h4 fw-bold mb-4">Berita Trending</h3>
            <div class="row">
                <div class="col-lg-8">
                    <div id="trendingNews">
                        <div class="trending-item">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <img src="${news.image}" alt="${news.title}" class="img-fluid rounded" style="height: 60px; object-fit: cover;">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-custom text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold mb-3">Mojokertoan News</h5>
                    <p class="small opacity-75">Portal berita terpercaya yang menyajikan informasi terkini dan akurat
                        untuk masyarakat Mojokerto dan Indonesia.</p>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="fw-semibold mb-3">Kategori</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50 text-decoration-none small">Politik</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none small">Teknologi</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none small">Olahraga</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none small">Kesehatan</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="fw-semibold mb-3">Tentang</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50 text-decoration-none small">Tentang Kami</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none small">Kontak</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none small">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="fw-semibold mb-3">Ikuti Kami</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white-50">Facebook</a>
                        <a href="#" class="text-white-50">Twitter</a>
                        <a href="#" class="text-white-50">Instagram</a>
                    </div>
                </div>
            </div>
            <hr class="border-white-50">
            <div class="text-center">
                <p class="small mb-0">&copy; 2024 Mojokertoan News. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // News data

        let currentCategory = 'all';
        let searchTerm = '';

        // Time formatting functions
        function getTimeAgo(date) {
            const now = new Date();
            const diffInMinutes = Math.floor((now.getTime() - date.getTime()) / (1000 * 60));

            if (diffInMinutes < 60) {
                return `${diffInMinutes} menit yang lalu`;
            } else if (diffInMinutes < 1440) {
                const hours = Math.floor(diffInMinutes / 60);
                return `${hours} jam yang lalu`;
            } else {
                const days = Math.floor(diffInMinutes / 1440);
                return `${days} hari yang lalu`;
            }
        }

        // Category navigation
        document.querySelectorAll('.category-nav, .category-nav-mobile').forEach(button => {
            button.addEventListener('click', function() {
                currentCategory = this.dataset.category;

                // Update active states
                document.querySelectorAll('.category-nav, .category-nav-mobile').forEach(btn => {
                    btn.classList.remove('active');
                });
                document.querySelectorAll(`[data-category="${currentCategory}"]`).forEach(btn => {
                    btn.classList.add('active');
                });

                displayNews();
            });
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            searchTerm = this.value;
            displayNews();
        });

        // Initialize
        displayNews();
        displayTrendingNews();

        // Update time every minute
        setInterval(() => {
            displayNews();
            displayTrendingNews();
        }, 60000);
    </script>

    <script src="{{ asset('vendor/getbootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/all.min.js') }}"></script>
</body>

</html>
