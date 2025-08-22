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

    <header class="bg-primary-custom text-white shadow-lg">
        <div class="container py-3">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h1 class="h3 mb-0 fw-bold">
                        <a href="index.html" class="text-white text-decoration-none">Mojokertoan News</a>
                    </h1>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <nav class="d-flex justify-content-center gap-3">
                        <a href="index.html"
                            class="btn btn-link text-white text-decoration-none category-nav px-3 py-2">Beranda</a>
                        <a href="#"
                            class="btn btn-link text-white text-decoration-none category-nav px-3 py-2">Politik</a>
                        <a href="teknologi.html"
                            class="btn btn-link text-white text-decoration-none category-nav px-3 py-2 active">Teknologi</a>
                        <a href="#"
                            class="btn btn-link text-white text-decoration-none category-nav px-3 py-2">Kesehatan</a>
                        <a href="#"
                            class="btn btn-link text-white text-decoration-none category-nav px-3 py-2">Ekonomi</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control search-input" placeholder="Cari berita teknologi..."
                        id="searchInput">
                </div>
            </div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <div class="bg-light py-2">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Teknologi</li>
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
                        <i class="bi bi-cpu tech-icon"></i>
                        <div>
                            <h2 class="h3 fw-bold mb-1">Berita Teknologi</h2>
                            <p class="text-muted mb-0">Informasi terkini seputar perkembangan teknologi, inovasi, dan
                                digital</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-primary fs-6" id="newsCount">12 artikel</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology News Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row" id="newsGrid">
                <!-- News cards will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
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
                        <li><a href="teknologi.html" class="text-white-50 text-decoration-none small">Teknologi</a></li>
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
                        <a href="#" class="text-white-50"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-instagram"></i></a>
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
        // Technology news data
        const techNews = [
            {
                id: 1,
                title: "Kecerdasan Buatan Revolusioner Mengubah Industri Pendidikan Indonesia",
                content: "Teknologi AI terbaru mulai diterapkan di berbagai sekolah dan universitas di Indonesia, memberikan pengalaman belajar yang lebih personal dan efektif bagi siswa.",
                category: "Teknologi",
                author: "Gilang Sampurno",
                uploadTime: new Date(Date.now() - 2 * 60 * 60 * 1000), // 2 hours ago
                editTime: new Date(Date.now() - 1 * 60 * 60 * 1000), // 1 hour ago
                image: "/placeholder.svg?height=200&width=300"
            },
            {
                id: 2,
                title: "Startup Fintech Indonesia Raih Pendanaan 50 Miliar Rupiah",
                content: "Perusahaan teknologi finansial asal Jakarta berhasil meraih pendanaan seri B untuk ekspansi layanan digital banking ke seluruh Asia Tenggara.",
                category: "Teknologi",
                author: "Gilang Sampurno",
                uploadTime: new Date(Date.now() - 4 * 60 * 60 * 1000), // 4 hours ago
                editTime: new Date(Date.now() - 3 * 60 * 60 * 1000), // 3 hours ago
                image: "/placeholder.svg?height=200&width=300"
            },
            {
                id: 3,
                title: "Peluncuran Satelit Komunikasi Pertama Buatan Indonesia",
                content: "LAPAN berhasil meluncurkan satelit komunikasi pertama yang sepenuhnya dikembangkan oleh anak bangsa, menandai era baru teknologi antariksa Indonesia.",
                category: "Teknologi",
                author: "Gilang Sampurno",
                uploadTime: new Date(Date.now() - 6 * 60 * 60 * 1000), // 6 hours ago
                editTime: new Date(Date.now() - 5 * 60 * 60 * 1000), // 5 hours ago
                image: "/placeholder.svg?height=200&width=300"
            },
            {
                id: 4,
                title: "Breakthrough Teknologi 5G Meningkatkan Konektivitas Rural",
                content: "Implementasi jaringan 5G di daerah terpencil Indonesia membuka akses internet berkecepatan tinggi untuk jutaan masyarakat pedesaan.",
                category: "Teknologi",
                author: "Gilang Sampurno",
                uploadTime: new Date(Date.now() - 8 * 60 * 60 * 1000), // 8 hours ago
                editTime: new Date(Date.now() - 7 * 60 * 60 * 1000), // 7 hours ago
                image: "/placeholder.svg?height=200&width=300"
            },
            {
                id: 5,
                title: "Platform E-Commerce Lokal Saingi Raksasa Global",
                content: "Startup e-commerce Indonesia mengembangkan fitur AI yang mampu memprediksi kebutuhan konsumen dengan akurasi 95%, menyaingi platform internasional.",
                category: "Teknologi",
                author: "Gilang Sampurno",
                uploadTime: new Date(Date.now() - 10 * 60 * 60 * 1000), // 10 hours ago
                editTime: new Date(Date.now() - 9 * 60 * 60 * 1000), // 9 hours ago
                image: "/placeholder.svg?height=200&width=300"
            },
            {
                id: 6,
                title: "Inovasi Blockchain untuk Transparansi Pemilu Digital",
                content: "Teknologi blockchain dikembangkan untuk sistem pemungutan suara digital yang transparan dan aman, siap diimplementasikan pada pemilu mendatang.",
                category: "Teknologi",
                author: "Gilang Sampurno",
                uploadTime: new Date(Date.now() - 12 * 60 * 60 * 1000), // 12 hours ago
                editTime: new Date(Date.now() - 11 * 60 * 60 * 1000), // 11 hours ago
                image: "/placeholder.svg?height=200&width=300"
            }
        ];

        let filteredNews = [...techNews];
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

        // Display news function
        function displayNews() {
            const newsGrid = document.getElementById('newsGrid');
            const newsCount = document.getElementById('newsCount');

            // Filter news based on search term
            filteredNews = techNews.filter(news =>
                news.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
                news.content.toLowerCase().includes(searchTerm.toLowerCase())
            );

            newsCount.textContent = `${filteredNews.length} artikel`;

            if (filteredNews.length === 0) {
                newsGrid.innerHTML = `
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
                        <h4 class="text-muted mt-3">Tidak ada berita ditemukan</h4>
                        <p class="text-muted">Coba gunakan kata kunci yang berbeda</p>
                    </div>
                `;
                return;
            }

            newsGrid.innerHTML = filteredNews.map(news => `
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card news-card h-100">
                        <img src="${news.image}" class="card-img-top" alt="${news.title}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <span class="category-badge mb-2">
                                <i class="bi bi-cpu me-1"></i>${news.category}
                            </span>
                            <h5 class="card-title">${news.title}</h5>
                            <p class="card-text text-muted flex-grow-1">${news.content.substring(0, 120)}...</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-person me-1"></i>Oleh: ${news.author}
                                </small>
                                <span class="time-badge">
                                    <i class="bi bi-clock me-1"></i>${getTimeAgo(news.uploadTime)}
                                </span>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-pencil me-1"></i>Diperbarui: ${getTimeAgo(news.editTime)}
                                </small>
                            </div>
                            <a href="#" class="btn-read-more text-center">
                                <i class="bi bi-arrow-right me-1"></i>Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            searchTerm = this.value;
            displayNews();
        });

        // Initialize
        displayNews();

        // Update time every minute
        setInterval(() => {
            displayNews();
        }, 60000);
    </script>

    <script src="{{ asset('vendor/getbootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/all.min.js') }}"></script>
</body>

</html>
