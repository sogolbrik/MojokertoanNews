<style>
    .bg-primary-custom {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
    }

    .search-container {
        position: relative;
        width: 100%;
    }

    .search-input {
        border-radius: 25px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        padding: 8px 50px 8px 20px;
        /* Added right padding for button space */
        width: 100%;
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .search-input:focus {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        color: white;
        outline: none;
    }

    .search-btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.8);
        padding: 5px 10px;
        border-radius: 20px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .search-btn:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }

    .search-btn:focus {
        outline: none;
        background: rgba(255, 255, 255, 0.15);
    }

    /* Icon styling */
    .search-btn i {
        font-size: 14px;
    }

    .category-nav {
        padding: 12px 20px;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .category-nav:hover {
        background: rgba(255, 255, 255, 0.15) !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px var(--shadow-light);
    }

    .category-nav::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .category-nav:hover::before {
        left: 100%;
    }
</style>

<header class="bg-primary-custom text-white shadow-lg">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="{{ Route('landingPage') }}" class="h3 mb-0 fw-bold text-decoration-none">Mojokertoan News</a>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <nav class="d-flex justify-content-center gap-3">
                    <a href="{{ Route('allBerita') }}" class="btn btn-link text-white text-decoration-none category-nav px-3 py-2">Semua</a>
                    @foreach ($navKategori->take(4) as $item)
                        <a href="{{ Route('byKategori', $item->slug) }}" class="btn btn-link text-white text-decoration-none category-nav px-3 py-2">{{ $item->nama }}</a>
                    @endforeach
                </nav>
            </div>
            <div class="col-md-3">
                <form action="{{ Route('cariBerita') }}" method="GET">
                    <div class="search-container">
                        <input type="text" name="search" class="form-control search-input" placeholder="Cari berita..." id="searchInput">
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<script>
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

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        searchTerm = this.value;
        displayNews();
    });

    // Update time every minute
    setInterval(() => {
        displayNews();
    }, 60000);
</script>
