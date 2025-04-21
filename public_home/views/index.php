<?php
include '../header.php';
?>

<main class="main">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="marquee-container">
                    <span class="marquee">
                        <b>| Selamat Datang di Website Resmi Desa Sidomulyo | Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Desa</b>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <!-- Hero Section -->
    <div class="card text-white">
        <div class="container-fluid p-2 bg-white">
            <!-- Gambar full width -->
            <img src="../../app_home/assets_home/img/desa/merdeka.jpeg" alt="" class="img-fluid w-100" data-aos="fade-in">
        </div>
        <div class="container text-center position-absolute mt-4 top-50 start-50 translate-middle text-white" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="text-center p-4">
                    <!-- Untuk layar besar -->
                    <h1 class="d-none d-sm-block fw-bold fs-1 text-outline">Welcome</h1>
                    <p class="d-none d-sm-block fw-bold fs-1 text-outline">Website Resmi Desa Sidomulyo Kec. Biru-biru</p>

                    <!-- Untuk layar kecil -->
                    <span class="d-block d-sm-none fw-bold fs-4 text-outline opacity-0">Welcome</span>
                    <span class="d-block d-sm-none fw-bold fs-6 text-outline opacity-0">Website Resmi Desa Sidomulyo Kec. Biru-biru</span>

                    <!-- Tombol -->
                    <a href="https://www.youtube.com/watch?v=op4o6g2Lwow&t=5s" class="btn btn-success mt-3">Watch Video</a>
                </div>
            </div>
        </div>
    </div>

    <!-- VISI MISI -->
    <section id="what-we-do" class="what-we-do section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Visi & Misi</h2>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-box bg-success  ">
                        <h3>JELAJAHI DESA</h3>
                        <p>
                            Melalui website ini Anda dapat menjelajahi segala hal yang terkait dengan Desa. Aspek pemerintahan, penduduk, demografi, potensi Desa, dan juga berita tentang Desa.
                        </p>
                        <div class="text-center">
                            <a href="#" class="more-btn bg-info"><span>Wacth Videos</span> <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-xl-6">
                            <div class="icon-box d-flex flex-row align-items-center gap-3 p-3 border rounded shadow-sm">
                                <img src="../../app_home/assets_home/img/desa/visi.png" alt="Visi" class="img-fluid" style="max-width: 100px;">
                                <div>
                                    <h1><b>VISI</b></h1>
                                    <p><?= $visi; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="icon-box d-flex flex-row align-items-center gap-3 p-3 border rounded shadow-sm">
                                <img src="../../app_home/assets_home/img/desa/misi.png" alt="Visi" class="img-fluid" style="max-width: 100px;">
                                <div>
                                    <h1><b>MISI</b></h1>
                                    <p><?= $misi; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- END VISI MISI -->

    <!-- KATA SAMBUTAN -->
    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kata Sambutan</h2>
        </div>
        <div class="container">
            <div class="row g-2 border rounded p-2 shadow-sm align-items-center" style="background-color: #fff;" data-aos="fade-up">
                <div class="col-lg-4 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="../../app_home/assets_home/img/desa/Logo_DeliSerdang.png" alt="Logo" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                </div>

                <div class="col-lg-8 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-2 p-3 rounded" style="background-color: #f1f5f9;">
                        <h3 class="mb-1 text-success">Sambutan Kepala Desa</h3>
                        <h4 class="mb-1">Nama Kepala Desa</h4>
                        <p class="fst-italic mb-2">Kepala Desa</p>
                        <p class="mb-0">
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END KATA SAMBUTAN -->

    <!-- PETA -->
    <section class="team-15 team section" id="team">
        <div class="container section-title" data-aos="fade-up">
            <h2>Peta</h2>
            <p>Menampilkan Peta Desa Dengan Interest Point Desa Sidomulyo</p>
        </div><!-- End Section Title -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-6 mb-4 d-flex justify-content-center">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            var map = L.map('map', {
                center: [3.471448, 98.687599],
                zoom: 14,
                scrollWheelZoom: false // Nonaktifkan zoom dengan scroll secara default
            });

            // Tambahkan tile layer satelit
            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/' +
                'World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles © Esri'
                }).addTo(map);

            // Tambahkan marker biru
            var blueIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                iconSize: [32, 32],
                iconAnchor: [16, 32]
            });

            L.marker([3.471448, 98.687599], {
                    icon: blueIcon
                }).addTo(map)
                .bindPopup(" Desa Sidomulyo").openPopup();

            // Tambahkan polygon batas wilayah
            var batasDesa = [
                [3.472169, 98.686448],
                [3.473672, 98.687519],
                [3.474069, 98.695106],
                [3.471001, 98.699403],
                [3.459958, 98.693204],
                [3.460111, 98.687386],
                [3.462365, 98.686397],
                [3.462378, 98.685683],
                [3.464762, 98.683446],
                [3.464880, 98.681455],
                [3.463554, 98.677371],
                [3.473676, 98.683404]
            ];

            L.polygon(batasDesa, {
                color: 'white',
                fillColor: 'transparent',
                fillOpacity: 0.4,
                weight: 2
            }).addTo(map).bindPopup("Batas Wilayah Desa Sidomulyo");

            // Aktifkan scroll zoom hanya saat Ctrl ditekan
            map.getContainer().addEventListener('wheel', function(e) {
                if (e.ctrlKey) {
                    map.scrollWheelZoom.enable();
                } else {
                    map.scrollWheelZoom.disable();
                }
            });
        </script>
    </section><!--END PETA -->

    <!-- APARATUR -->
    <section id="testimonials" class="testimonials section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>SOTK</h2>
            <p>Struktur Organisasi dan Tata Kerja Desa Sidomulyo</p>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 2000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                            },
                            "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 10
                            }
                        }
                    }
                </script>
                <div class="swiper-wrapper">
                    <?php
                    $sql_aparatur = mysqli_query($koneksi, "SELECT * FROM tb_aparatur") or die(mysqli_error($koneksi));
                    $result_aparatur = array();
                    while ($data_aparatur = mysqli_fetch_array($sql_aparatur)) {
                        $result_aparatur[] = $data_aparatur;
                    }
                    foreach ($result_aparatur as $data_aparatur) {
                    ?>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <?php
                                if (!empty($data_aparatur['poto_aparatur'])) {
                                    $gambar = "../../dash-app/app/assets/img/aparatur/" . $data_aparatur['poto_aparatur'];
                                } else {
                                    $gambar = "../../dash-app/app/assets/img/berita/User.png"; // Gambar default
                                }
                                ?>
                                <img src="<?= $gambar ?>" class="img-fluid rounded-top img-fit" alt="">
                                <h3 class="text-center"><?= $data_aparatur['nama_aparatur'] ?></h3>
                                <h4 class="text-center"><?= $data_aparatur['jabatan'] ?></h4>
                            </div>
                        </div><!-- End testimonial item -->
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Aparatur -->

    <!-- Administrasi Penduduk-->
    <section id="stats" class="stats section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Administrasi Penduduk</h2>
            <p>Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait dengan kependudukan dan pendayagunaannya untuk pelayanan publik yang efektif dan efisien</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="card shadow-sm">
                <div class="row text-center p-4">

                    <div class="col-6 col-lg-2 mb-4  p-3 rounded " data-aos="fade-up" data-aos-delay="100">
                        <img src="../../app_home/assets_home/img/desa/penduduk.png" alt="" class="img-fluid" style="max-width: 40%; height: 70px;"><br>
                        <p class=" mt-1 mb-0">PENDUDUK</p>
                        <span class="purecounter fw-bold  text-dark fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsToday(); ?>" data-purecounter-duration="1"></span>

                    </div>

                    <div class="col-6 col-lg-2 mb-4 p-3 rounded" data-aos="fade-up" data-aos-delay="200">
                        <img src="../../app_home/assets_home/img/desa/kepala-keluarga.png" alt="" class="img-fluid" style="max-width: 40%; height: 70px;"><br>
                        <p class=" mt-1 mb-0">KEPALA KELUARGA</p>
                        <span class="purecounter fw-bold  fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsYesterday(); ?>" data-purecounter-duration="1"></span>
                    </div>

                    <div class="col-6 col-lg-2 mb-4 p-3 rounded" data-aos="fade-up" data-aos-delay="300">
                        <img src="../../app_home/assets_home/img/desa/laki-laki.png" alt="" class="img-fluid" style="max-width: 40%; height: 70px;"><br>
                        <p class="mt-1 mb-0">LAKI-LAKI</p>
                        <span class="purecounter fw-bold fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsThisWeek(); ?>" data-purecounter-duration="1"></span>
                    </div>

                    <div class="col-6 col-lg-2 mb-4 p-3 rounded" data-aos="fade-up" data-aos-delay="400">
                        <img src="../../app_home/assets_home/img/desa/perempuan.png" alt="" class="img-fluid" style="max-width: 40%; height: 70px;"><br>
                        <p class="mt-1 mb-0">PEREMPUAN</p>
                        <span class="purecounter fw-bold fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsThisWeek(); ?>" data-purecounter-duration="1"></span>
                    </div>

                    <div class="col-6 col-lg-2 mb-4 p-3 rounded" data-aos="fade-up" data-aos-delay="500">
                        <img src="../../app_home/assets_home/img/desa/penduduk-mutasi.png" alt="" class="img-fluid" style="max-width: 40%; height: 70px;"><br>
                        <p class="mt-1 mb-0">PENDUDUK MUTASI</p>
                        <span class="purecounter fw-bold fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsThisWeek(); ?>" data-purecounter-duration="1"></span>
                    </div>

                    <div class="col-6 col-lg-2 mb-4 p-3 rounded" data-aos="fade-up" data-aos-delay="600">
                        <img src="../../app_home/assets_home/img/desa/penduduk-sementara.png" alt="" class="img-fluid" style="max-width: 40%; height: 70px;"><br>
                        <p class="mt-1 mb-0">PENDUDUK SEMENTARA</p>
                        <span class="purecounter fw-bold fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsThisWeek(); ?>" data-purecounter-duration="1"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Administrasi Penduduk -->


    <!-- Berita -->
    <section id="services" class="services section light-background">
        <div class="container section-title" data-aos="fade-up">
            <h2>Berita Desa</h2>
            <p>Menyajikan informasi terbaru tentang peristiwa, berita terkini, dan artikel-artikel jurnalistik dari Desa Sidomulyo</p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                <?php
                $sql_berita = mysqli_query($koneksi, "SELECT * FROM tb_berita LIMIT 6") or die(mysqli_error($koneksi));
                $result_berita = array();

                while ($row = mysqli_fetch_array($sql_berita)) {
                    $result_berita[] = $row;
                }
                foreach ($result_berita as $data_berita) {
                ?>

                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 shadow-sm border-0 position-relative">
                            <?php
                            if (!empty($data_berita['poto_1'])) {
                                $gambar = "../../dash-app/app/assets/img/berita/" . $data_berita['poto_1'];
                            } elseif (!empty($data_berita['poto_2'])) {
                                $gambar = "../../dash-app/app/assets/img/berita/" . $data_berita['poto_2'];
                            } elseif (!empty($data_berita['poto_3'])) {
                                $gambar = "../../dash-app/app/assets/img/berita/" . $data_berita['poto_3'];
                            } else {
                                $gambar = "../../dash-app/app/assets/img/berita/User.png"; // Gambar default
                            }


                            ?>
                            <img src="<?= $gambar ?>" class="card-img-top" alt="Gambar Berita" style="height: 230px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <a href="service-details.html" class="stretched-link text-decoration-none text-dark text-truncate d-block" style="max-width: 100%;">
                                        <?= $data_berita['judul']; ?>
                                    </a>
                                </h5>
                                <p class="card-text text-muted overflow-hidden small" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    <?= $data_berita['isi_berita']; ?>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center px-3 pb-3">
                                <div class="text-muted small d-flex flex-column">
                                    <span><i class="bi bi-person"></i> Administrator</span>
                                    <span><i class="bi bi-eye"></i> Dilihat 23 kali</span>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-3">
                                <div class="text-white text-center px-3 py-2 fw-bold shadow-sm"
                                    style="line-height: 1.2; background: linear-gradient(135deg, #f44336, #ff6f61); border-top-left-radius: 12px; border-top-right-radius: 0; border-bottom-right-radius: 0; border-bottom-left-radius: 0;">
                                    <?= date('d M', strtotime($data_berita['tgl_buat'])) ?><br>
                                    <?= date('Y', strtotime($data_berita['tgl_buat'])) ?>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section><!--End Berita-->







    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri Desa</h2>
            <p>Menampilkan kegiatan-kegiatan yang berlangsung di Desa</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="../../app_home/assets_home/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <img src="../../app_home/assets_home/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Product 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <img src="../../app_home/assets_home/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Branding 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <img src="../../app_home/assets_home/img/portfolio/books-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Books 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/books-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="../../app_home/assets_home/img/portfolio/app-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/app-2.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <img src="../../app_home/assets_home/img/portfolio/product-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Product 2</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/product-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <img src="../../app_home/assets_home/img/portfolio/branding-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Branding 2</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/branding-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <img src="../../app_home/assets_home/img/portfolio/books-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Books 2</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/books-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="../../app_home/assets_home/img/portfolio/app-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/app-3.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <img src="../../app_home/assets_home/img/portfolio/product-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Product 3</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/product-3.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <img src="../../app_home/assets_home/img/portfolio/branding-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Branding 3</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/branding-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <img src="../../app_home/assets_home/img/portfolio/books-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Books 3</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="../../app_home/assets_home/img/portfolio/books-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->

    <!-- Page View -->
    <section id="stats" class="stats section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kunjungan Website</h2>
            <p>Detail Data Kunjungan Website Desa Sidomulyo</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="card shadow-sm">
                <div class="row text-center p-4">

                    <div class="col-4 col-lg-2 mb-4  p-3 rounded text-white" style="background: linear-gradient(135deg, #17a2b8, #1cc8eb);">
                        <img src="../../app_home/assets_home/img/desa/gear.png" alt="" class="img-fluid" style="max-width: 40%; height: auto;"><br>
                        <span class="purecounter fw-bold text-white text-dark fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsToday(); ?>" data-purecounter-duration="1"></span>
                        <p class="text-white mt-1 mb-0"> Hari Ini</p>
                    </div>

                    <div class="col-4 col-lg-2 mb-4 border p-3 rounded text-white" style="background: linear-gradient(135deg, #17a2b8, #1cc8eb);">
                        <img src="../../app_home/assets_home/img/desa/gear.png" alt="" class="img-fluid" style="max-width: 40%; height: auto;"><br>
                        <span class="purecounter fw-bold text-white fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsYesterday(); ?>" data-purecounter-duration="1"></span>
                        <p class="text-white mt-1 mb-0"> Kemarin</p>
                    </div>

                    <div class="col-4 col-lg-2 mb-4 border p-3 rounded text-white" style="background: linear-gradient(135deg, #17a2b8, #1cc8eb);">
                        <img src="../../app_home/assets_home/img/desa/gear.png" alt="" class="img-fluid" style="max-width: 40%; height: auto;"><br>
                        <span class="purecounter fw-bold text-white fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsThisWeek(); ?>" data-purecounter-duration="1"></span>
                        <p class="text-white mt-1 mb-0">Minggu Ini</p>
                    </div>

                    <div class="col-4 col-lg-2 mb-4 border p-3 rounded text-white" style="background: linear-gradient(135deg, #17a2b8, #1cc8eb);">
                        <img src="../../app_home/assets_home/img/desa/gear.png" alt="" class="img-fluid" style="max-width: 40%; height: auto;"><br>
                        <span class="purecounter fw-bold text-white fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsThisMonth(); ?>" data-purecounter-duration="1"></span>
                        <p class="text-white mt-1 mb-0">Bulan Ini</p>
                    </div>

                    <div class="col-4 col-lg-2 mb-4 border p-3 rounded text-white" style="background: linear-gradient(135deg, #17a2b8, #1cc8eb);">
                        <img src="../../app_home/assets_home/img/desa/gear.png" alt="" class="img-fluid" style="max-width: 40%; height: auto;"><br>
                        <span class="purecounter fw-bold  text-white fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsLastMonth(); ?>" data-purecounter-duration="1"></span>
                        <p class="text-white mt-1 mb-0 ">Bulan Lalu</p>
                    </div>

                    <div class="col-4 col-lg-2 mb-4 border p-3 rounded text-white" style="background: linear-gradient(135deg, #17a2b8, #1cc8eb);">
                        <img src="../../app_home/assets_home/img/desa/gear.png" alt="" class="img-fluid" style="max-width: 40%; height: auto;"><br>
                        <span class="purecounter fw-bold text-white fs-4" data-purecounter-start="0" data-purecounter-end="<?php echo viewsTotal(); ?>" data-purecounter-duration="1"></span>
                        <p class="text-white mt-1 mb-0">Total</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page View -->

    <!-- Contact Section -->
    <!-- <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Address</h3>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

</main>

<?php
include '../footer.php';
?>