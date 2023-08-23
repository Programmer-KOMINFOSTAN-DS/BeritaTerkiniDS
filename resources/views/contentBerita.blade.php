<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Berita</h2>
            <h3 class="section-subheading text-muted">Anda bisa menambah komentar dengan klik gambar di setiap
                berita</h3>
        </div>
        <div class="row">
            @foreach ($news as $item)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" href="{{ route('DetailBerita.show', ['id' => $item->id]) }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('gambarberita/'.$item->gambar) }}" alt="{{ $item->judul }}" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{ $item->judul }}</div>
                            <div class="portfolio-caption-subheading text-muted">{{ $item->deskripsi }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
