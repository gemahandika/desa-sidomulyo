<?php
include '../../app_home/models/home_models.php';
include '../../app_home/models/page_view.php';
updatePageView('home'); // Sesuaikan dengan nama halaman
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Website Resmi Desa Sidomulyo</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="../../app_home/assets_home/img/desa/Logo_DeliSerdang.png" rel="icon">
    <link href="../../app_home/assets_home/img/desa/Logo_DeliSerdang.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../app_home/assets_home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../app_home/assets_home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../app_home/assets_home/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../app_home/assets_home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../app_home/assets_home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://unpkg.com/leaflet/dist/leaflet.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../../app_home/assets_home/css/main.css" rel="stylesheet">
    <link href="../../app_home/assets_home/css/custom.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Lumia
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top bg-success">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="../../app_home/assets_home/img/desa/Logo_DeliSerdang.png"
                    alt=""
                    class="img-fluid"
                    style="height: 50px; width: auto;">
                <span class=" text-white ms-2 mb-0 fs-4 fs-sm-2 fs-md-3 fs-lg-2">Desa Sidomulyo</span>
            </a>


            <nav id="navmenu" class="navmenu">
                <ul>

                    <li><a href="" class="text-white">Home</a></li>
                    <li><a href="" class="text-white">Berita</a></li>
                </ul>
                <i class="text-white mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links d-none d-sm-block">
                <span class="text-white small me-0"><?= $formatTanggal; ?> - <span id="jam"></span></span>
            </div>

        </div>
    </header>