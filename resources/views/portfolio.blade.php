<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="section-title">
            <h2>Portofolio</h2>
            <p>Proyek Saya</p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">Semua</li>
                    <li data-filter=".filter-app">Fotografi</li>
                    <li data-filter=".filter-card">Ilustrasi</li>
                    <li data-filter=".filter-web">Web Sederhana</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">
            @foreach($portfolios as $portfolio)
                @php
                    $imgPath = $portfolio->image ? (str_starts_with($portfolio->image, '/') ? $portfolio->image : Storage::url($portfolio->image)) : '/assets/img/portfolio/error.png';
                    $catMap = [
                        'filter-app' => 'Fotografi',
                        'filter-card' => 'Ilustrasi',
                        'filter-web' => 'Web Sederhana'
                    ];
                    $catDisplay = $catMap[$portfolio->category] ?? 'Lainnya';
                @endphp
                <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->category }}">
                    <div class="portfolio-wrap">
                        <img src="{{ $imgPath }}" class="img-fluid" alt="{{ $portfolio->title }}" />
                        <div class="portfolio-info">
                            <h4>{{ $portfolio->title }}</h4>
                            <p>{{ $catDisplay }}</p>
                            <div class="portfolio-links">
                                <a href="{{ $imgPath }}" data-gallery="portfolioGallery" class="portfolio-lightbox"
                                    title="{{ $portfolio->title }}"><i class="bx bx-plus"></i></a>
                                <a href="{{ $portfolio->link ?? 'javascript:void(0)' }}"
                                    data-gallery="portfolioDetailsGallery" data-glightbox="type: external"
                                    class="portfolio-details-lightbox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>