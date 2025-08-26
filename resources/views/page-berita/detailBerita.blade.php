<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MojokertoanNews | {{ $berita->judul }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/getbootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">

    <style>
        :root {
            --primary-color: #007BFF;
            --primary-dark: #0056B3;
            --secondary-color: #6C757D;
            --accent-color: #28A745;
            --text-dark: #2C3E50;
            --text-light: #6C757D;
            --bg-light: #F8F9FA;
            --border-color: #E9ECEF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.7;
            color: var(--text-dark);
            background-color: #fff;
        }

        /* Breadcrumb */
        .breadcrumb-section {
            background: var(--bg-light);
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .breadcrumb {
            background: none;
            margin: 0;
            padding: 0;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--text-light);
        }

        /* Article Header */
        .article-header {
            padding: 3rem 0 2rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .article-category {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .article-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.3;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 2rem;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .article-meta i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        /* Article Image */
        .article-image {
            margin: 2rem 0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .article-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .article-image:hover img {
            transform: scale(1.02);
        }

        /* Article Content */
        .article-content {
            padding: 2rem 0;
        }

        .article-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .article-body p {
            margin-bottom: 1.5rem;
        }

        .article-body h2,
        .article-body h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            margin: 2rem 0 1rem;
            color: var(--text-dark);
        }

        .article-body h2 {
            font-size: 1.8rem;
            border-left: 4px solid var(--primary-color);
            padding-left: 1rem;
        }

        .article-body h3 {
            font-size: 1.4rem;
        }

        /* Author Info */
        .author-info {
            background: var(--bg-light);
            border-radius: 15px;
            padding: 2rem;
            margin: 3rem 0;
            border-left: 4px solid var(--primary-color);
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }

        .author-name {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .author-bio {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* Related Articles */
        .related-articles {
            background: var(--bg-light);
            padding: 3rem 0;
            margin-top: 3rem;
        }

        .related-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .related-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .related-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .related-card-body {
            padding: 1.5rem;
        }

        .related-card-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.1rem;
            line-height: 1.4;
            margin-bottom: 0.8rem;
        }

        .related-card-title a {
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .related-card-title a:hover {
            color: var(--primary-color);
        }

        .related-card-meta {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        /* Share Buttons */
        .share-buttons {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin: 2rem 0;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            margin-right: 0.8rem;
            transition: all 0.3s ease;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .share-btn.facebook {
            background: #3b5998;
        }

        .share-btn.twitter {
            background: #1da1f2;
        }

        .share-btn.whatsapp {
            background: #25d366;
        }

        .share-btn.telegram {
            background: #0088cc;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .article-title {
                font-size: 2rem;
            }

            .article-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.8rem;
            }

            .article-image img {
                height: 250px;
            }

            .author-info {
                text-align: center;
            }
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation */
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

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

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ Route('allBerita') }}">Berita</a></li>
                    <li class="breadcrumb-item"><a href="{{ Route('byKategori', $berita->kategori->slug) }}">{{ $berita->kategori->nama }}</a></li>
                    <li class="breadcrumb-item active">{{ Str::limit($berita->judul, 50) }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Article Header -->
    <section class="article-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="fade-in">
                        <span class="article-category">{{ $berita->kategori->nama }}</span>
                        <h1 class="article-title">{{ $berita->judul }}</h1>
                        <div class="article-meta">
                            <div>
                                <i class="fas fa-user"></i>
                                <strong>Gilang Sampurno</strong>
                            </div>
                            <div>
                                <i class="fas fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($berita->waktu)->locale('id')->translatedFormat('d F Y') }}
                            </div>
                            <div>
                                <i class="fas fa-clock"></i>
                                {{ \Carbon\Carbon::parse($berita->waktu)->format('H:i') }} WIB
                            </div>
                            <div>
                                <i class="fas fa-eye"></i>
                                100 Pengunjung
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="article-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Article Image -->
                    <div class="article-image fade-in">
                        <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid">
                    </div>

                    <!-- Share Buttons -->
                    <div class="share-buttons fade-in">
                        <h6 class="mb-3"><i class="fas fa-share-alt me-2"></i>Bagikan Artikel</h6>
                        <a href="#" class="share-btn facebook" onclick="shareToFacebook()" title="Share to Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="share-btn twitter" onclick="shareToTwitter()" title="Share to Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="share-btn whatsapp" onclick="shareToWhatsApp()" title="Share to WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="share-btn telegram" onclick="shareToTelegram()" title="Share to Telegram">
                            <i class="fab fa-telegram-plane"></i>
                        </a>
                    </div>

                    <!-- Article Body -->
                    <div class="article-body fade-in">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>

                    <!-- Author Info -->
                    <div class="author-info fade-in">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center mb-3 mb-md-0">
                                <img src="{{ asset('dummy/avatar.jpeg') }}" alt="Sogol" class="author-avatar">
                            </div>
                            <div class="col-md-10">
                                <div class="author-name">Gilang Sampurno</div>
                                <div class="author-bio">Gilang Sampurno adalah seorang jurnalis dengan pengalaman lebih dari 5 tahun di bidang berita dan media. Ia memiliki ketertarikan khusus dalam
                                    isu-isu sosial dan budaya.</div>
                                <div class="mt-2">
                                    <a href="#" class="text-primary me-3">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="text-primary me-3">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="text-primary">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    <section class="related-articles">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h3 class="text-center mb-5">
                        <i class="fas fa-newspaper me-2"></i>Berita Terkait
                    </h3>
                    <div class="row">
                        @foreach ($terkait as $item)
                        <div class="col-md-4 mb-4">
                            <div class="related-card fade-in">
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
                                <div class="related-card-body">
                                    <h5 class="related-card-title">
                                        <a href="{{ Route('detailBerita', $item->id) }}">{{ $item->judul }}</a>
                                    </h5>
                                    <div class="related-card-meta">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($item->waktu)->locale('id')->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.partials.footer-berita')

    <script src="{{ asset('vendor/getbootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/all.min.js') }}"></script>

    <script>
        // Share functions
        function shareToFacebook() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
        }

        function shareToTwitter() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${title}`, '_blank', 'width=600,height=400');
        }

        function shareToWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            window.open(`https://wa.me/?text=${title} ${url}`, '_blank');
        }

        function shareToTelegram() {
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            window.open(`https://t.me/share/url?url=${url}&text=${title}`, '_blank');
        }

        // Smooth scroll for internal links
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

        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Reading progress indicator
        window.addEventListener('scroll', () => {
            const article = document.querySelector('.article-body');
            if (article) {
                const articleTop = article.offsetTop;
                const articleHeight = article.offsetHeight;
                const windowHeight = window.innerHeight;
                const scrollTop = window.pageYOffset;

                const progress = Math.min(
                    Math.max((scrollTop - articleTop + windowHeight / 2) / articleHeight, 0),
                    1
                );

                // You can use this progress value to show a reading progress bar
                console.log('Reading progress:', Math.round(progress * 100) + '%');
            }
        });

        // Copy link functionality
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('Link berhasil disalin!');
            });
        }
    </script>
</body>

</html>
