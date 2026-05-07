@extends('layouts.master')

@section('content')
    <!-- ======= Header ======= -->
    <header id="header">

        <div class="container">
            <h1><a href="/">{{ $web->meta_title }}</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="mr-auto"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a> -->
            <!-- <h2>I'm a passionate <span>illustrators</span> from Kediri</h2> -->
            <h2>
                Saya seorang
                <span class="typed" data-typed-items="Freelancer, Fotografer, Ilustrator, Programmer"></span>
            </h2>
            <h2 class="mt-0">dari Kediri</h2>
            <!-- <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p> -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="#header">Beranda</a></li>
                    <li><a class="nav-link" href="#about">Tentang</a></li>
                    <li><a class="nav-link" href="#resume">Riwayat</a></li>
                    <!-- <li><a class="nav-link" href="#services">Layanan</a></li> -->
                    <!-- <li><a class="nav-link" href="#portfolio">Portofolio</a></li> -->
                    <li><a class="nav-link" href="#articles">Artikel</a></li>
                    <li><a class="nav-link" href="#contact">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

            <div class="social-links">

                @foreach ($sosmeds as $sosmed)
                    @if ((int) $sosmed['is_active'] === 1)
                        <a href="{{ $sosmed['link'] }}" class="{{ strtolower($sosmed['name']) }}" target="_blank"
                            aria-label="{{ $sosmed['name'] }}">
                            <i class="{{ $sosmed['icon'] }}"></i>
                        </a>
                    @endif
                @endforeach

            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= About Section ======= -->
    @include('about')
    <!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    @include('resume')
    <!-- End Resume Section -->

    <!-- ======= Services Section ======= -->
    @include('service')
    <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    @include('portfolio')
    <!-- End Portfolio Section -->

    <!-- ======= Articles Section ======= -->
    @include('artikel')
    <!-- End Articles Section -->

    <!-- ======= Contact Section ======= -->
    @include('contact')
    <!-- End Contact Section -->
@endsection