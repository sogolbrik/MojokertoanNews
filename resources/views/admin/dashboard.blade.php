@extends('layouts.main')
@section('title', 'Dashboard')

@section('main')
    <style>
        :root {
            --primary-blue: #1e3a8a;
            --secondary-blue: #3b82f6;
            --accent-teal: #0d9488;
            --light-gray: #f8fafc;
            --white: #ffffff;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
        }

        .modern-dashboard {
            background: linear-gradient(135deg, var(--light-gray) 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 2rem 2rem;
            box-shadow: 0 10px 30px rgba(30, 58, 138, 0.2);
        }

        .page-header h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .page-header .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            padding: 0.5rem 1rem;
            backdrop-filter: blur(10px);
        }

        .breadcrumb-item a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-item a:hover {
            color: #fbbf24;
            transition: color 0.3s ease;
        }

        .stats-card {
            background: var(--white);
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue) 0%, var(--accent-teal) 100%);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--white);
            margin-bottom: 1rem;
        }

        .stats-icon.kategori {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
        }

        .stats-icon.berita {
            background: linear-gradient(135deg, var(--accent-teal) 0%, #06b6d4 100%);
        }

        .stats-label {
            font-size: 1rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stats-trend {
            font-size: 0.875rem;
            color: var(--accent-teal);
            font-weight: 600;
        }

        .welcome-section {
            background: var(--white);
            border-radius: 1.5rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border-left: 5px solid var(--primary-blue);
        }

        .welcome-title {
            color: var(--primary-blue);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .welcome-text {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.6;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-delay-1 {
            animation-delay: 0.1s;
        }

        .animate-delay-2 {
            animation-delay: 0.2s;
        }

        @media (max-width: 768px) {
            .page-header h3 {
                font-size: 2rem;
            }

            .stats-number {
                font-size: 2.5rem;
            }

            .stats-card {
                padding: 1.5rem;
            }
        }
    </style>

    <div class="modern-dashboard">
        <!-- Enhanced Header -->
        <div class="page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-8">
                        <h3 class="animate-fade-in text-white">Dashboard</h3>
                        <p class="subtitle animate-fade-in animate-delay-1">Selamat datang di panel kontrol admin</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <nav aria-label="breadcrumb" class="float-start float-md-end">
                            <ol class="breadcrumb animate-fade-in animate-delay-2">
                                <li class="breadcrumb-item">
                                    <a href="{{ Route('dashboard') }}">
                                        <i class="fas fa-home me-1"></i>Dashboard
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Welcome Section -->
            <div class="welcome-section animate-fade-in">
                <h4 class="welcome-title">
                    <i class="fas fa-chart-line me-2"></i>Ringkasan Statistik
                </h4>
                <p class="welcome-text">
                    Berikut adalah ringkasan data terkini dari sistem manajemen konten Anda.
                    Monitor perkembangan kategori dan berita dengan mudah melalui dashboard ini.
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="stats-card animate-fade-in animate-delay-1" onclick="animateCard(this)">
                        <div class="stats-icon kategori">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="stats-label">Total Kategori</div>
                        <div class="stats-number" id="kategori-count">{{ $kategori->count() }}</div>
                        <div class="stats-trend">
                            <i class="fas fa-arrow-up me-1"></i>Kategori Aktif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="stats-card animate-fade-in animate-delay-2" onclick="animateCard(this)">
                        <div class="stats-icon berita">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="stats-label">Total Berita</div>
                        <div class="stats-number" id="berita-count">{{ $berita->count() }}</div>
                        <div class="stats-trend">
                            <i class="fas fa-arrow-up me-1"></i>Artikel Terpublikasi
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="stats-card animate-fade-in animate-delay-3">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="mb-2" style="color: var(--primary-blue); font-weight: 700;">
                                    <i class="fas fa-info-circle me-2"></i>Informasi Sistem
                                </h5>
                                <p class="mb-0" style="color: var(--text-muted);">
                                    Dashboard ini menampilkan data real-time dari sistem manajemen konten.
                                    Data diperbarui secara otomatis setiap kali ada perubahan.
                                </p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="stats-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%); margin: 0 auto;">
                                    <i class="fas fa-cog"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pure JavaScript for interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Animate numbers on load
            animateNumbers();

            // Add hover effects
            addHoverEffects();
        });

        function animateNumbers() {
            const kategoriCount = parseInt(document.getElementById('kategori-count').textContent);
            const beritaCount = parseInt(document.getElementById('berita-count').textContent);

            animateCounter('kategori-count', 0, kategoriCount, 1000);
            animateCounter('berita-count', 0, beritaCount, 1200);
        }

        function animateCounter(elementId, start, end, duration) {
            const element = document.getElementById(elementId);
            const range = end - start;
            const increment = range / (duration / 16);
            let current = start;

            const timer = setInterval(function() {
                current += increment;
                if (current >= end) {
                    current = end;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 16);
        }

        function animateCard(card) {
            card.style.transform = 'scale(0.95)';
            setTimeout(function() {
                card.style.transform = 'translateY(-5px) scale(1)';
            }, 100);
        }

        function addHoverEffects() {
            const cards = document.querySelectorAll('.stats-card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        }

        // Add smooth scrolling for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
