<style>
    .footer-custom {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        }
</style>

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
                    @foreach ($navKategori->take(4) as $item)
                    <li><a href="{{ $item->slug }}" class="text-white-50 text-decoration-none small">{{ $item->nama }}</a></li>
                    @endforeach
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
            <p class="small mb-0">&copy; 2025 Mojokertoan News. Semua hak dilindungi.</p>
        </div>
    </div>
</footer>