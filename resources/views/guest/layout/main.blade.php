<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Desa Labanasem</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/guest/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/guest/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/guest/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/guest/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/guest/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/guest/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/guest/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/guest/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/guest/css/core.css" class="template-customizer-core-css" />
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="/Beranda" class="logo"><img src="../images/tulisan/logo-desa.png" alt="logo" class="logo-img" style="max-width: 100%; max-height: 50px;"></a>
        <div class="header-right">
          <!-- Navbar -->
          {{-- navbar --}}
          @section('navbar')
          @include('guest.part.navbar')
          @show
          <!-- / Navbar -->
        </div>
    </div>
  </header>

      <!-- Content -->
      @yield('content')
      <!-- End Content -->

      <!-- Footer -->
      {{-- footer --}}
      @section('footer')
      @include('guest.part.footer')
      @show
      <!-- / Navbar -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/guest/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/guest/vendor/aos/aos.js"></script>
  <script src="../assets/guest/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/guest/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/guest/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/guest/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/guest/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/guest/js/main.js"></script>

</body>

</html>