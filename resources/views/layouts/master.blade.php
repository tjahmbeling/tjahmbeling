<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>{{ $web->meta_title ?? '' }}</title>
    <meta content="{{ $web->meta_description ?? '' }}" name="description" />
    <meta property="og:site_name" content="{{ $web->meta_title ?? '' }}" />
    <meta property="og:title" content="{{ $web->meta_title ?? '' }}" />
    <meta property="og:description" content="{{ $web->meta_description ?? '' }}" />
    <meta property="og:image" itemprop="image" content="{{asset('/assets/img/me.png')}}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:type" content="website" />

    <meta name="google-site-verification" content="google7362bec73ae7be20.html" />
    <!--<meta name="google-site-verification" content="fRlzd57LNle5y4juUFvSH2-Dj5EcYhFdKSXtxWwVESk" />-->

    <!-- Favicons -->
    <!-- <link href="/assets/img/favicon.png" rel="icon"> -->
    <link href="{{ asset('/storage/' . $web->meta_favicon ?? '') }}" rel="icon" />
    <link href="{{ asset('/storage/' . $web->meta_favicon ?? '') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    
    <!-- jQuery (required for Toastr) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            setTimeout(() => {
                document.querySelector("#header").style.opacity = "1";
                document.querySelector("#header").style.filter = "none";
            }, 800);
        });
    </script>
</head>

    @yield('content')

    <div class="credits">
        © 2025 <a href="/" target="_blank" rel="noopener">{{ $web->meta_title ?? '' }}</a>. All rights reserved.
    </div>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/assets/vendor/typed.js/typed.umd.js"></script>
    <!-- <script src="/assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>

</body>

</html>