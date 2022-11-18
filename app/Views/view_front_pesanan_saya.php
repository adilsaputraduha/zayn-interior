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
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">

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
                    <li><a class="nav-link scrollto" href="<?= base_url('/') ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('/') ?>">Our Product</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('/') ?>">Contact</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url('keranjang') ?>">Keranjang</a></li>
                    <li><a class="nav-link scrollto active" href="<?= base_url('pesanan-saya') ?>">Pesanan Saya</a></li>
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

    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Total Item</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="coba">
                                <?php $no = 0;
                                foreach ($pemesanan as $row) : $no++ ?>
                                    <tr>
                                        <td> <?= $row['pemesanan_faktur']; ?></td>
                                        <td> <?= $row['pemesanan_tanggal']; ?></td>
                                        <td> <?= $row['pemesanan_total_item']; ?></td>
                                        <td>Rp. <?= $row['pemesanan_total_harga']; ?></td>
                                        <td>
                                            <?php if ($row['pemesanan_status'] == 0) { ?>
                                                <span class="badge bg-danger">Belum Bayar</span>
                                            <?php } else if ($row['pemesanan_status'] == 1) { ?>
                                                <span class="badge bg-warning">Sudah Bayar</span>
                                            <?php } else if ($row['pemesanan_status'] == 2) { ?>
                                                <span class="badge bg-info">Dalam Pengerjaan</span>
                                            <?php } else if ($row['pemesanan_status'] == 3) { ?>
                                                <span class="badge bg-success">Selesai</span>
                                            <?php } else { ?>
                                                <span class="badge bg-info">Belum Lunas</span>
                                            <?php } ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if ($row['pemesanan_status'] == 0) { ?>
                                                <a type="button" class="badge bg-primary pointer" data-bs-toggle="modal" data-bs-target="#dpModal<?= $row['pemesanan_faktur']; ?>">DP 30%</a>
                                                <a type="button" class="badge bg-info pointer" data-bs-toggle="modal" data-bs-target="#lunasModal<?= $row['pemesanan_faktur']; ?>">Lunas</a>
                                            <?php } ?>
                                            <?php if ($row['pemesanan_status'] == 4 && $row['pembayaran_bayar'] == 0) { ?>
                                                <a type="button" class="badge bg-success pointer" data-bs-toggle="modal" data-bs-target="#pelunasanModal<?= $row['pemesanan_faktur']; ?>">Pelunasan</a>
                                            <?php } ?>
                                            <?php if ($row['pemesanan_status'] == 2 && $row['pembayaran_bayar'] == 0) { ?>
                                                <a type="button" class="badge bg-success pointer" data-bs-toggle="modal" data-bs-target="#pelunasanModal<?= $row['pemesanan_faktur']; ?>">Pelunasan</a>
                                            <?php } ?>
                                            <?php if ($row['pemesanan_status'] == 3 && $row['pembayaran_bayar'] == 0) { ?>
                                                <a type="button" class="badge bg-success pointer" data-bs-toggle="modal" data-bs-target="#pelunasanModal<?= $row['pemesanan_faktur']; ?>">Pelunasan</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php foreach ($pemesanan as $row) : ?>
            <form action="<?= base_url('pembayaran/save'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal" tabindex="-1" id="dpModal<?= $row['pemesanan_faktur']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Upload Bukti Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h6 class="text-dark">Nomor Faktur</h6>
                                            <input type="text" class="form-control fakturpemesanan" readonly id="fakturpemesanan" name="fakturpemesanan" value="<?= $row['pemesanan_faktur']; ?>">
                                        </div>
                                        <div class="form-group mt-2">
                                            <h6 class="text-dark">Jumlah Transfer</h6>
                                            <input type="text" class="form-control jumlahtransfer" value="<?= $row['pemesanan_total_harga'] * 30 / 100 ?>" readonly id="jumlahtransfer" name="jumlahtransfer">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <div class="form-group">
                                            <h6 class="text-dark">Silahkan transfer ke rekening resmi ZAYN Interior :</h6>
                                            <h6 class="text-dark">Nama Bank : Bank BRI</h6>
                                            <h6 class="text-dark">Nomor Rekening : 034101000743123</h6>
                                            <h6 class="text-dark">Atas Nama : ZAYN Interior</h6>
                                            <h6 class="text-danger mt-2">Harap hati-hati penipuan!</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <div class="form-group">
                                            <h6 class="text-dark">Bukti Pembayaran</h6>
                                            <input type="file" class="form-control gambar" id="gambar" required name="gambar">
                                            <input type="hidden" class="status" value="0" id="status" required name="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form action="<?= base_url('pembayaran/save'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal" tabindex="-1" id="lunasModal<?= $row['pemesanan_faktur']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Upload Bukti Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h6 class="text-dark">Nomor Faktur</h6>
                                            <input type="text" class="form-control fakturpemesanan" readonly id="fakturpemesanan" name="fakturpemesanan" value="<?= $row['pemesanan_faktur']; ?>">
                                        </div>
                                        <div class="form-group mt-2">
                                            <h6 class="text-dark">Jumlah Transfer</h6>
                                            <input type="text" class="form-control jumlahtransfer" value="<?= $row['pemesanan_total_harga']; ?>" readonly id="jumlahtransfer" name="jumlahtransfer">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <div class="form-group">
                                            <h6 class="text-dark">Silahkan transfer ke rekening resmi ZAYN Interior :</h6>
                                            <h6 class="text-dark">Nama Bank : Bank BRI</h6>
                                            <h6 class="text-dark">Nomor Rekening : 034101000743123</h6>
                                            <h6 class="text-dark">Atas Nama : ZAYN Interior</h6>
                                            <h6 class="text-danger mt-2">Harap hati-hati penipuan!</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <div class="form-group">
                                            <h6 class="text-dark">Bukti Pembayaran</h6>
                                            <input type="file" class="form-control gambar" id="gambar" required name="gambar">
                                            <input type="hidden" class="status" value="1" id="status" required name="status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form action="<?= base_url('pembayaran/pelunasan'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal" tabindex="-1" id="pelunasanModal<?= $row['pemesanan_faktur']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Upload Bukti Pelunasan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <h6 class="text-dark">Nomor Faktur</h6>
                                            <input type="text" class="form-control fakturpemesanan" readonly id="fakturpemesanan" name="fakturpemesanan" value="<?= $row['pemesanan_faktur']; ?>">
                                        </div>
                                        <div class="form-group mt-2">
                                            <h6 class="text-dark">Jumlah Transfer</h6>
                                            <input type="text" class="form-control totalharga" value="<?= $row['pemesanan_total_harga']; ?>" readonly id="totalharga" name="totalharga">
                                            <input type="hidden" class="form-control jumlahtransfer" value="<?= $row['pemesanan_total_harga'] - ($row['pemesanan_total_harga'] * 30 / 100) ?>" readonly id="jumlahtransfer" name="jumlahtransfer">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <div class="form-group">
                                            <h6 class="text-dark">Silahkan transfer ke rekening resmi ZAYN Interior :</h6>
                                            <h6 class="text-dark">Nama Bank : Bank BRI</h6>
                                            <h6 class="text-dark">Nomor Rekening : 034101000743123</h6>
                                            <h6 class="text-dark">Atas Nama : ZAYN Interior</h6>
                                            <h6 class="text-danger mt-2">Harap hati-hati penipuan!</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <div class="form-group">
                                            <h6 class="text-dark">Bukti Pembayaran</h6>
                                            <input type="file" class="form-control gambar" id="gambar" required name="gambar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>

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