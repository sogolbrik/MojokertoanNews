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

                    {{-- <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="all">Semua</button>
                    <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Politik">Politik</button>
                    <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Teknologi">Teknologi</button>
                    <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Kesehatan">Kesehatan</button>
                    <button class="btn btn-link text-white text-decoration-none category-nav px-3 py-2" data-category="Ekonomi">Ekonomi</button> --}}
                </nav>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control search-input" placeholder="Cari berita..." id="searchInput">
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
