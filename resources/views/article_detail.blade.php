@extends('layouts.master')

@section('content')
    <header id="header" class="header-top" style="opacity: 1; filter: none;">
        <div class="container">
            <h1><a href="{{ route('home') }}">{{ $web->meta_title }}</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link active" href="#">Artikel</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="article-detail" class="section-show">
        <div class="container">
            <div class="section-title">
                <h2>{{ $article->category?->name ?? 'Artikel' }}</h2>
                <p>{{ $article->title }}</p>
            </div>

            <div class="article-content" style="background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 10px;">
                @if($article->thumbnail)
                    <img src="{{ Storage::url($article->thumbnail) }}" class="img-fluid rounded mb-4"
                        alt="{{ $article->title }}" style="width: 100%; max-height: 500px; object-fit: cover;">
                @endif

                <div class="meta mb-4"
                    style="opacity: 0.8; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                    <span class="me-3"><i class="bx bx-calendar"></i>
                        {{ $article->published_at?->format('d M Y') }}</span>
                    <span class="me-3"><i class="bx bx-star text-warning"></i>
                        {{ number_format($article->ratings_avg_rating, 1) }} / 5.0</span>
                    <span><i class="bx bx-comment"></i> {{ $article->comments_count }} Komentar</span>
                </div>

                <div class="full-content mb-5" style="color: rgba(255,255,255,0.9); line-height: 1.8;">
                    {!! $article->content !!}
                </div>

                <hr style="border-color: rgba(255,255,255,0.1);">

                <!-- Star Rating Section -->
                <div class="rating-section mb-5 mt-5">
                    <h4 class="mb-3">Berikan Rating</h4>
                    <form action="{{ route('articles.rate', $article->slug) }}" method="POST" id="rating-form">
                        @csrf
                        <div class="stars mb-3">
                            <input type="radio" name="rating" value="5" id="star5" class="visually-hidden" required><label
                                for="star5" class="bx bxs-star" title="5 bintang"></label>
                            <input type="radio" name="rating" value="4" id="star4" class="visually-hidden"><label
                                for="star4" class="bx bxs-star" title="4 bintang"></label>
                            <input type="radio" name="rating" value="3" id="star3" class="visually-hidden"><label
                                for="star3" class="bx bxs-star" title="3 bintang"></label>
                            <input type="radio" name="rating" value="2" id="star2" class="visually-hidden"><label
                                for="star2" class="bx bxs-star" title="2 bintang"></label>
                            <input type="radio" name="rating" value="1" id="star1" class="visually-hidden"><label
                                for="star1" class="bx bxs-star" title="1 bintang"></label>
                        </div>
                        <button type="submit" class="btn btn-sm"
                            style="background: red; color: #fff; padding: 8px 25px; border-radius: 4px;">Kirim
                            Rating</button>
                    </form>
                </div>

                <!-- Comments Section -->
                <div class="comments-section mb-5 mt-5">
                    <h4 class="mb-4">Komentar ({{ $article->comments->count() }})</h4>

                    <div class="comment-list mb-5">
                        @forelse($article->comments as $comment)
                            <div class="comment-item mb-4"
                                style="background: rgba(255,255,255,0.03); padding: 20px; border-radius: 8px; border-left: 3px solid red;">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong style="color: red;">{{ $comment->name }}</strong>
                                    <small class="opacity-70">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-0" style="color: rgba(255,255,255,0.8);">{{ $comment->comment }}</p>
                            </div>
                        @empty
                            <p class="opacity-50 italic text-center py-4">Belum ada komentar disetujui untuk artikel ini.
                                Jadilah yang pertama!</p>
                        @endforelse
                    </div>

                    <div class="comment-form-container"
                        style="background: rgba(255,255,255,0.03); padding: 30px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.1);">
                        <h5 class="mb-4">Tulis Komentar</h5>
                        <form action="{{ route('articles.comment', $article->slug) }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small opacity-70">Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Anda" required
                                        style="background: #111; color: #fff; border: 1px solid #333; padding: 10px;">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small opacity-70">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email Anda" required
                                        style="background: #111; color: #fff; border: 1px solid #333; padding: 10px;">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small opacity-70">Komentar</label>
                                <textarea name="comment" class="form-control" rows="5"
                                    placeholder="Tulis komentar Anda di sini..." required
                                    style="background: #111; color: #fff; border: 1px solid #333; padding: 10px;"></textarea>
                            </div>
                            <button type="submit" class="btn w-100"
                                style="background: red; color: #fff; font-weight: 600; padding: 12px;">Kirim
                                Komentar</button>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-5 pt-4" style="border-top: 1px solid rgba(255,255,255,0.1);">
                    <a href="{{ route('home') }}#articles" class="btn btn-sm" style="color: #fff; opacity: 0.6;"><i
                            class="bx bx-chevron-left"></i> Kembali ke Daftar Artikel</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .stars {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
        }

        .stars label {
            font-size: 2.5rem;
            color: rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: color 0.2s, transform 0.2s;
        }

        .stars label:hover,
        .stars label:hover~label,
        .stars input:checked~label {
            color: #ffc107;
            transform: scale(1.1);
        }

        .full-content h1,
        .full-content h2,
        .full-content h3 {
            color: red;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .full-content p {
            margin-bottom: 20px;
        }

        .full-content blockquote {
            border-left: 4px solid red;
            padding-left: 20px;
            font-style: italic;
            margin: 30px 0;
            background: rgba(255, 255, 255, 0.02);
            padding: 20px;
        }

        /* Adjustment for standard master.blade positions */
        #header.header-top {
            z-index: 1000;
        }

        #article-detail {
            transition: none !important;
            margin-bottom: 100px;
        }

        @media (max-width: 768px) {
            .stars label {
                font-size: 2rem;
            }

            .article-content {
                padding: 20px;
            }
        }
    </style>
@endsection