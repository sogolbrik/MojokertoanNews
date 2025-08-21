@extends('layouts.main')
@section('title', 'Dashboard')

@section('main')
    <style>
        :root {
            --primary-color: #164e63;
            --secondary-color: #10b981;
            --light-cyan: #ecfeff;
            --dark-slate: #475569;
            --border-color: #d1d5db;
            --muted-bg: #f9fafb;
        }

        body {
            font-family: 'Inter', sans-serif;
            /* background-color: #ffffff;
                    color: var(--dark-slate); */
        }

        .main-content {
            /* background-color: #ffffff; */
            min-height: 100vh;
        }

        .stats-card {
            background: var(--light-cyan);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .stats-icon {
            width: 48px;
            height: 48px;
            background: var(--primary-color);
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content-card {
            background: var(--light-cyan);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .article-item {
            background: var(--muted-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .article-item:hover {
            background: #f3f4f6;
        }

        .badge-published {
            background: var(--primary-color);
            color: white;
        }

        .badge-draft {
            background: #6b7280;
            color: white;
        }

        .btn-primary-custom {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .btn-primary-custom:hover {
            background: #0f3a47;
            border-color: #0f3a47;
        }

        .btn-secondary-custom {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }

        .btn-secondary-custom:hover {
            background: #059669;
            border-color: #059669;
        }

        .progress-custom {
            background-color: #e5e7eb;
            height: 8px;
        }

        .progress-bar-custom {
            background-color: var(--primary-color);
        }

        .author-rank {
            width: 32px;
            height: 32px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }

        .schedule-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        .dot-primary {
            background: var(--primary-color);
        }

        .dot-secondary {
            background: var(--secondary-color);
        }

        .dot-accent {
            background: #f59e0b;
        }

        .text-primary-custom {
            color: var(--primary-color);
        }

        .text-secondary-custom {
            color: var(--secondary-color);
        }
    </style>

    <main class="main-content">
        <!-- Header -->
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Dashboard</h3>
                        <p class="text-subtitle text-muted"></p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-4">
                <!-- Kartu Statistik -->
                <div class="row g-4 mb-4">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="stats-card p-4 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1 fw-medium">Total Artikel</p>
                                    <h3 class="fw-bold mb-1" style="color: var(--primary-color);">1,247</h3>
                                    <small class="text-primary-custom">+12% dari bulan lalu</small>
                                </div>
                                <div class="stats-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="stats-card p-4 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1 fw-medium">Total Tampilan</p>
                                    <h3 class="fw-bold mb-1" style="color: var(--primary-color);">89,432</h3>
                                    <small class="text-primary-custom">+8% dari bulan lalu</small>
                                </div>
                                <div class="stats-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="stats-card p-4 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1 fw-medium">Pengguna Aktif</p>
                                    <h3 class="fw-bold mb-1" style="color: var(--primary-color);">5,678</h3>
                                    <small class="text-primary-custom">+15% dari bulan lalu</small>
                                </div>
                                <div class="stats-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="stats-card p-4 h-100">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted mb-1 fw-medium">Komentar</p>
                                    <h3 class="fw-bold mb-1" style="color: var(--primary-color);">2,341</h3>
                                    <small class="text-primary-custom">+23% dari bulan lalu</small>
                                </div>
                                <div class="stats-icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten Utama -->
                <div class="row g-4 mb-4">
                    <!-- Artikel Terbaru -->
                    <div class="col-12 col-lg-8">
                        <div class="content-card p-4 h-100">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-file-alt text-primary-custom me-2"></i>
                                <h5 class="mb-0 fw-bold" style="color: var(--primary-color);">Artikel Terbaru</h5>
                            </div>
                            <p class="text-muted mb-4">Artikel terbaru yang diterbitkan di situs Anda</p>

                            <div class="space-y-3">
                                <div class="article-item p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <h6 class="fw-semibold mb-2" style="color: var(--primary-color);">Breaking: Terobosan Teknologi Baru dalam AI</h6>
                                            <div class="d-flex flex-wrap gap-3 text-muted small">
                                                <span>Oleh John Smith</span>
                                                <span><i class="fas fa-eye me-1"></i>15,420</span>
                                                <span><i class="fas fa-comments me-1"></i>89</span>
                                                <span><i class="fas fa-clock me-1"></i>2 jam yang lalu</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-published">Diterbitkan</span>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="article-item p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <h6 class="fw-semibold mb-2" style="color: var(--primary-color);">KTT Perubahan Iklim Mencapai Kesepakatan Bersejarah</h6>
                                            <div class="d-flex flex-wrap gap-3 text-muted small">
                                                <span>Oleh Sarah Johnson</span>
                                                <span><i class="fas fa-eye me-1"></i>12,350</span>
                                                <span><i class="fas fa-comments me-1"></i>156</span>
                                                <span><i class="fas fa-clock me-1"></i>5 jam yang lalu</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-published">Diterbitkan</span>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="article-item p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <h6 class="fw-semibold mb-2" style="color: var(--primary-color);">Update Olahraga: Prabola Kejuaraan</h6>
                                            <div class="d-flex flex-wrap gap-3 text-muted small">
                                                <span>Oleh Mike Wilson</span>
                                                <span><i class="fas fa-eye me-1"></i>8,920</span>
                                                <span><i class="fas fa-comments me-1"></i>67</span>
                                                <span><i class="fas fa-clock me-1"></i>1 hari yang lalu</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-draft">Draf</span>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="article-item p-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <h6 class="fw-semibold mb-2" style="color: var(--primary-color);">Analisis Ekonomi: Tren Pasar untuk 2024</h6>
                                            <div class="d-flex flex-wrap gap-3 text-muted small">
                                                <span>Oleh Emily Davis</span>
                                                <span><i class="fas fa-eye me-1"></i>6,780</span>
                                                <span><i class="fas fa-comments me-1"></i>43</span>
                                                <span><i class="fas fa-clock me-1"></i>2 hari yang lalu</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-published">Diterbitkan</span>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Penulis Teratas -->
                    <div class="col-12 col-lg-4">
                        <div class="content-card p-4 h-100">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-star text-primary-custom me-2"></i>
                                <h5 class="mb-0 fw-bold" style="color: var(--primary-color);">Penulis Teratas</h5>
                            </div>
                            <p class="text-muted mb-4">Kreator konten paling aktif</p>

                            <div class="space-y-3">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="author-rank">1</div>
                                    <div class="bg-secondary rounded-circle"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                        JS</div>
                                    <div class="flex-grow-1">
                                        <p class="fw-medium mb-0" style="color: var(--primary-color);">John Smith</p>
                                        <small class="text-muted">45 artikel • 234,567 tampilan</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="author-rank">2</div>
                                    <div class="bg-secondary rounded-circle"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                        SJ</div>
                                    <div class="flex-grow-1">
                                        <p class="fw-medium mb-0" style="color: var(--primary-color);">Sarah Johnson</p>
                                        <small class="text-muted">38 artikel • 198,432 tampilan</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="author-rank">3</div>
                                    <div class="bg-secondary rounded-circle"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                        MW</div>
                                    <div class="flex-grow-1">
                                        <p class="fw-medium mb-0" style="color: var(--primary-color);">Mike Wilson</p>
                                        <small class="text-muted">32 artikel • 156,789 tampilan</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <div class="author-rank">4</div>
                                    <div class="bg-secondary rounded-circle"
                                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                        ED</div>
                                    <div class="flex-grow-1">
                                        <p class="fw-medium mb-0" style="color: var(--primary-color);">Emily Davis</p>
                                        <small class="text-muted">29 artikel • 134,567 tampilan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ikhtisar Analitik -->
                <div class="row g-4">
                    <div class="col-12 col-lg-6">
                        <div class="content-card p-4 h-100">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-chart-line text-primary-custom me-2"></i>
                                <h5 class="mb-0 fw-bold" style="color: var(--primary-color);">Kinerja Konten</h5>
                            </div>
                            <p class="text-muted mb-4">Metrik keterlibatan artikel</p>

                            <div class="space-y-4">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="small" style="color: var(--primary-color);">Rata-rata Tampilan per Artikel</span>
                                        <span class="fw-semibold" style="color: var(--primary-color);">1,247</span>
                                    </div>
                                    <div class="progress progress-custom">
                                        <div class="progress-bar progress-bar-custom" style="width: 75%"></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="small" style="color: var(--primary-color);">Tingkat Keterlibatan</span>
                                        <span class="fw-semibold" style="color: var(--primary-color);">8.3%</span>
                                    </div>
                                    <div class="progress progress-custom">
                                        <div class="progress-bar progress-bar-custom" style="width: 83%"></div>
                                    </div>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="small" style="color: var(--primary-color);">Tingkat Komentar</span>
                                        <span class="fw-semibold" style="color: var(--primary-color);">2.1%</span>
                                    </div>
                                    <div class="progress progress-custom">
                                        <div class="progress-bar progress-bar-custom" style="width: 21%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="content-card p-4 h-100">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-calendar text-primary-custom me-2"></i>
                                <h5 class="mb-0 fw-bold" style="color: var(--primary-color);">Jadwal Penerbitan</h5>
                            </div>
                            <p class="text-muted mb-4">Kalender konten yang akan datang</p>

                            <div class="space-y-3">
                                <div class="d-flex align-items-center gap-3 p-3 mb-3" style="background: var(--muted-bg); border: 1px solid var(--border-color); border-radius: 8px;">
                                    <span class="schedule-dot dot-primary"></span>
                                    <div class="flex-grow-1">
                                        <p class="fw-medium mb-0" style="color: var(--primary-color);">Ulasan Teknologi: Smartphone Terbaru</p>
                                        <small class="text-muted">Jadwal untuk besok, 9:00 AM</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 p-3 mb-3" style="background: var(--muted-bg); border: 1px solid var(--border-color); border-radius: 8px;">
                                    <span class="schedule-dot dot-secondary"></span>
                                    <div class="flex-grow-1">
                                        <p class="fw-medium mb-0" style="color: var(--primary-color);">Analisis Pasar Mingguan</p>
                                        <small class="text-muted">Jadwal untuk Jumat, 2:00 PM</small>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 p-3" style="background: var(--muted-bg); border: 1px solid var(--border-color); border-radius: 8px;">
                                    <span class="schedule-dot dot-accent"></span>
                                    <div class="flex-grow-1">
                                        <p class="fw-medium mb-0" style="color: var(--primary-color);">Rangkuman Akhir Pekan Olahraga</p>
                                        <small class="text-muted">Jadwal untuk Minggu, 6:00 PM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <script>
        // Vanilla JavaScript for interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to stats cards
            const statsCards = document.querySelectorAll('.stats-card');
            statsCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                    this.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.15)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
                });
            });

            // Add click handlers for article edit buttons
            const editButtons = document.querySelectorAll('.article-item button');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    alert('Edit article functionality would be implemented here');
                });
            });

            // Add click handler for new article button
            const newArticleBtn = document.querySelector('.btn-primary-custom');
            if (newArticleBtn) {
                newArticleBtn.addEventListener('click', function() {
                    alert('New article creation would be implemented here');
                });
            }

            // Animate progress bars on load
            const progressBars = document.querySelectorAll('.progress-bar-custom');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.transition = 'width 1s ease-in-out';
                    bar.style.width = width;
                }, 500);
            });
        });
    </script>
@endsection
