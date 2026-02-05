<section id="articles" class="articles">
    <div class="container">
        <div class="section-title">
            <h2>Artikel</h2>
            <p>Berbagi Cerita & Ilmu</p>
        </div>

        <div class="row">
            @foreach($articles as $article)
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="article-item"
                        style="background: rgba(255, 255, 255, 0.05); padding: 20px; border-radius: 10px;">
                        @if($article->thumbnail)
                            <img src="{{ Storage::url($article->thumbnail) }}" class="img-fluid rounded mb-3"
                                alt="{{ $article->title }}">
                        @endif
                        <h3>{{ $article->title }}</h3>
                        <div class="meta mb-2" style="font-size: 0.9em; opacity: 0.8;">
                            <span class="badge bg-success me-2">{{ $article->category?->name ?? 'Uncategorized' }}</span>
                            <span class="me-3"><i class="bx bx-calendar"></i>
                                {{ $article->published_at?->format('d M Y') }}</span>
                            <span class="me-3"><i class="bx bx-star text-warning"></i>
                                {{ number_format($article->ratings_avg_rating, 1) }} / 5.0</span>
                            <span><i class="bx bx-comment"></i> {{ $article->comments_count }} Komentar</span>
                        </div>
                        <div class="content mb-3">
                            {!! Str::limit(strip_tags($article->content), 150) !!}
                        </div>

                        <div class="text-start">
                            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-sm"
                                style="background: red; color: #fff; border-radius: 4px; padding: 8px 20px;">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>