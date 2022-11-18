<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ZAYN Interior</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/front/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="<?= base_url(); ?>/front/assets/css/variables.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/front/assets/css/main.css" rel="stylesheet">
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0 ms-4">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>ZAYN Interior<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.html#hero-animated">Home</a></li>
                    <li><a class="nav-link scrollto" href="index.html#product">Our Product</a></li>
                    <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('keranjang') ?>">Keranjang</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('pesanan-saya') ?>">Pesanan Saya</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->

            <?php if (session()->get('pelangganId')) { ?>
                <a type="button" class="btn-getstarted me-4" href="<?= base_url('logout'); ?>">Logout</a>
            <?php } else { ?>
                <a type="button" class="btn-getstarted me-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            <?php } ?>
        </div>
    </header><!-- End Header -->

    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-12">
                <?php
                if (session()->getFlashdata('message')) { ?>
                    <div class="alert alert-danger m-2">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php } ?>
                <?php if (session()->getFlashdata('success')) { ?>
                    <div class="alert alert-success m-2">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
            <img src="<?= base_url(); ?>/front/assets/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
            <h2>Welcome to <span>ZAYN Interior</span></h2>
            <p>Penyedia interior untuk anda dengan <span>#Cepat</span> <span>#Mudah</span> <span>#Murah</span> dan <span>#Terpercaya</span>.</p>
            <div class="d-flex">
                <a href="#product" class="btn-get-started scrollto">Get Started</a>
            </div>
        </div>
    </section>

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity icon"></i></div>
                            <h4><a href="" class="stretched-link">#Cepat</a></h4>
                            <p>Cepat dalam pembuatan pesanan interior anda.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                            <h4><a href="" class="stretched-link">#Mudah</a></h4>
                            <p>Mudah dalam proses pemesanan interior.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                            <h4><a href="" class="stretched-link">#Murah</a></h4>
                            <p>Harga terjangkau untuk kualitas interior yang luar biasa.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                            <h4><a href="" class="stretched-link">#Terpercaya</a></h4>
                            <p>Terpercaya karena sudah banyak klien ZAYN Interior.</p>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= Services Section ======= -->
        <section id="product" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Product</h2>
                    <p>Produk interior yang tersedia di ZAYN Interior.</p>
                </div>

                <div class="row gy-5">
                    <?php $no = 0;
                    foreach ($interior as $row) : $no++ ?>
                        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                            <div class="service-item">
                                <div class="img">
                                    <img src="<?= base_url(); ?>/uploads/<?= $row['interior_gambar']; ?>" class="img-fluid" alt="">
                                </div>
                                <div class="details position-relative">
                                    <div class="icon">
                                        <i class="bi bi-activity"></i>
                                    </div>
                                    <a data-bs-toggle="modal" data-bs-target="#detailModal<?= $row['interior_kode']; ?>" class="stretched-link">
                                        <h3><?= $row['interior_nama']; ?></h3>
                                    </a>
                                    <p><?= $row['interior_deskripsi']; ?>.</p>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    <?php endforeach; ?>
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-header">
                    <h2>Contact Us</h2>
                    <p>Konsultasikan masalah anda terkait interior kepada kami.</p>
                </div>

            </div>

            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            <h3>Get in touch</h3>
                            <p>Hubungi ZAYN Interior disini!.</p>

                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p>Gang Mawar Desa Kelawat Kec. Sei Lala Kab. Inhu Riau</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>zayninterior@gmail.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <p>0822-8324-3272</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>ZAYN Interior</h3>
                            <p>
                                Sei. Lala <br>
                                Inhu, Riau<br><br>
                                <strong>Phone:</strong> 0822-8324-3272<br>
                                <strong>Email:</strong> zayninterior@gmail.com<br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Product</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-5 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Dapatkan info terbaru dari kami disini</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center">
            <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>ZAYN Interior</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                </div>

            </div>
        </div>

        <?php foreach ($interior as $row) : ?>
            <form action="<?= base_url('keranjang/save'); ?>" method="POST">
                <div class="modal" tabindex="-1" id="detailModal<?= $row['interior_kode']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Detail product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="fakturpemesanan" id="fakturpemesanan" value="<?= $nomor; ?>">
                                <input type="hidden" name="idpelanggan" id="idpelanggan" value="<?= session()->get('pelangganId') ?>">
                                <input type="hidden" name="kode" id="kode" value="<?= $row['interior_kode']; ?>">
                                <input type="hidden" name="hargainterior" id="hargainterior" value="<?= $row['interior_harga']; ?>">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h6 class="text-dark">Nama Interior</h6>
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="text-dark form-control" readonly id="nama" name="nama" value="<?= $row['interior_nama']; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-5">
                                        <h6 class="text-dark">Kategori</h6>
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="text-dark form-control" readonly id="kategori" name="kategori" value="<?= $row['kategori_nama']; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-5">
                                        <h6 class="text-dark">Harga</h6>
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="text-dark form-control" readonly id="harga" name="harga" value="Rp. <?= $row['interior_harga']; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-5">
                                        <h6 class="text-dark">Stok</h6>
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="text-dark form-control" readonly id="stok" name="stok" value="<?= $row['interior_stok']; ?>" />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-5">
                                        <h6 class="text-dark">Deskripsi</h6>
                                    </div>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" readonly name="deskripsi" id="deskripsi" rows="5"><?= $row['interior_deskripsi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12">
                                        <img src="<?= base_url(); ?>/uploads/<?= $row['interior_gambar']; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>

        <form action="<?= base_url('login/ceklogin'); ?>" method="POST">
            <div class="modal" tabindex="-1" id="loginModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Login terlebih dahulu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="emaillogin" class="text-dark mb-2 fs-7">Email</label>
                                    <input type="email" name="emaillogin" class="form-control" id="emaillogin" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 form-group">
                                    <label for="passwordlogin" class="text-dark mb-2 fs-7">Password</label>
                                    <input type="password" class="form-control" name="passwordlogin" id="passwordlogin" placeholder="Your Password" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 form-group">
                                    <label for="passwordlogin" class="text-dark mb-2 fs-7">Belum punya akun? <a type="button" data-bs-toggle="modal" data-bs-target="#registerModal" class="text-info">Daftar disini</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="<?= base_url('register/save'); ?>" method="POST">
            <div class="modal" tabindex="-1" id="registerModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Daftar terlebih dahulu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="emailregister" class="text-dark mb-2 fs-7">Email</label>
                                    <input type="email" name="emailregister" class="form-control" id="emailregister" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 form-group">
                                    <label for="namaregister" class="text-dark mb-2 fs-7">Nama</label>
                                    <input type="text" class="form-control" name="namaregister" id="namaregister" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 form-group">
                                    <label for="passwordregister" class="text-dark mb-2 fs-7">Password</label>
                                    <input type="password" class="form-control" name="passwordregister" id="passwordregister" placeholder="Your Password" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 form-group">
                                    <label for="alamatregister" class="text-dark mb-2 fs-7">Alamat</label>
                                    <input type="text" class="form-control" name="alamatregister" id="alamatregister" placeholder="Your Address" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 form-group">
                                    <label for="nohpregister" class="text-dark mb-2 fs-7">No. Hp</label>
                                    <input type="text" class="form-control" name="nohpregister" id="nohpregister" placeholder="Your No. Hp" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url(); ?>/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/front/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url(); ?>/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>/front/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>/front/assets/js/main.js"></script>
</body>

</html>