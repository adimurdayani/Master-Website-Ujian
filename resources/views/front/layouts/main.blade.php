<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sitem Informasi Laboratorium Teknik | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/landing/assets/img/favicon.png" rel="icon">
  <link href="/landing/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  @if (request()->routeIs('informatika.*'))
  <link href="/frontend/assets/css/style.css" rel="stylesheet">
  @elseif(request()->routeIs('sipil.*'))
  <link href="/frontendsipil/assets/css/style.css" rel="stylesheet">
  @endif

  {{-- box-icon --}}
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <!-- =======================================================
  * Template Name: MyResume - v4.7.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  {{-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button>
  --}}
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="navbar">

    @include('front.partials.navbar')

  </header><!-- End Header -->

  @yield('Hero')

  <main id="main">

    @yield('container')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MyResume</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: [license-url] -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/frontend/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/frontend/assets/vendor/aos/aos.js"></script>
  <script src="/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/frontend/assets/vendor/typed.js/typed.min.js"></script>
  <script src="/frontend/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/frontend/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  @if (request()->routeIs('informatika.*'))
  <script src="/frontend/assets/js/main.js"></script>
  @elseif(request()->routeIs('sipil.*'))
  <script src="/frontendsipil/assets/js/main.js"></script>
  @endif

</body>

</html>