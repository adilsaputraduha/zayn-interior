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
                    <li><a class="nav-link scrollto active" href="<?= base_url('keranjang') ?>">Keranjang</a></li>
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
                <div class="row gy-5 gx-lg-5">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Faktur</label>
                                <input type="text" name="fakturpemesanan" readonly value="<?= $nomor; ?>" class="form-control fakturpemesanan" id="fakturpemesanan" placeholder="Faktur" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label>Tanggal Order</label>
                                <input type="date" class="form-control tanggal" name="tanggal" id="tanggal">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <input type="hidden" id="kodekeranjang" name="kodekeranjang" class="kodekeranjang">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Kode Interior</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="kodeinterior" name="kodeinterior" required readonly class="form-control kodeinterior" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nama Interior</label>
                                    <input type="text" readonly class="form-control namainterior" id="namainterior" name="namainterior" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('namainterior'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" readonly class="form-control hargainterior" id="hargainterior" name="hargainterior" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('hargainterior'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Qty</label>
                                    <input type="text" class="form-control qtyinterior" id="qtyinterior" name="qtyinterior" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('qtyinterior'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <label>Aksi</label>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info text-white" onclick="ajaxUpdate()">+</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Contact Form -->
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Interior</th>
                                    <th>Nama Interior</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="coba">
                                <?php $no = 0;
                                foreach ($keranjang as $row) : $no++ ?>
                                    <tr>
                                        <td> <?= $row['keranjang_interior']; ?></td>
                                        <td> <?= $row['interior_nama']; ?></td>
                                        <td>Rp. <?= $row['interior_harga']; ?></td>
                                        <td> <?= $row['keranjang_qty']; ?></td>
                                        <td>Rp. <?= $row['keranjang_jumlah']; ?></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-sm btn-info btn-choosesatu" data-idkeranjang="<?= $row['keranjang_id']; ?>" data-kode="<?= $row['keranjang_interior']; ?>" data-nama="<?= $row['interior_nama']; ?>" data-harga="<?= $row['interior_harga']; ?>" data-qty="<?= $row['keranjang_qty']; ?>"><i class="fa fa-arrow-left text-white"></i></button>
                                            <button class="btn btn-sm btn-danger" onclick="ajaxDelete(<?= $row['keranjang_id']; ?>, <?= $row['keranjang_qty']; ?>, <?= $row['keranjang_jumlah']; ?>)"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row justify-content-start">
                    <div class="col-3">
                        <a type="button" class="btn btn-secondary text-white" href="<?= base_url('/') ?>">Kembali</a>
                        <button type="button" class="btn btn-info text-white" onclick="simpanTransaksi()">Checkout</button>
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

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script>
        $(document).ready(function() {
            document.getElementById("qtyinterior").disabled = true;
        });

        $(document).ready(function() {
            $(".btn-choosesatu").click(function() {
                const kodekeranjang = $(this).data('idkeranjang');
                const kodeinterior = $(this).data('kode');
                const namainterior = $(this).data('nama');
                const hargainterior = $(this).data('harga');
                const qtyinterior = $(this).data('qty');

                $('.kodekeranjang').val(kodekeranjang);
                $('.kodeinterior').val(kodeinterior);
                $('.namainterior').val(namainterior);
                $('.hargainterior').val(hargainterior);
                $('.qtyinterior').val(qtyinterior);

                document.getElementById("qtyinterior").disabled = false;
            });
        });

        function reload() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('keranjang/detail-index'); ?>",
                beforeSend: function(f) {
                    $('#coba').html(`<div class="text-center">
                Mencari data...
                </div>`);
                },
                success: function(response) {
                    $('#coba').html(response);
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }

        function ajaxUpdate() {
            let kodekeranjang = $('.kodekeranjang').val()
            let qtyinterior = $('.qtyinterior').val()
            let hargainterior = $('.hargainterior').val()

            let jumlahharga = parseInt(hargainterior) * parseInt(qtyinterior)

            if (kodekeranjang.length == 0) {
                alert('Keranjang tidak boleh kosong')
            } else if (qtyinterior.length == 0 || qtyinterior == 0) {
                alert('Qty tidak boleh kosong')
            } else {
                $.ajax({
                    url: "<?= base_url('keranjang/detail-update'); ?>",
                    type: "POST",
                    data: {
                        kodekeranjang: kodekeranjang,
                        qtyinterior: qtyinterior,
                        jumlahharga: jumlahharga,
                    },
                    success: function(data) {
                        reload();
                        // hitungTotal();
                        $('.kodekeranjang').val('');
                        $('.kodeinterior').val('');
                        $('.namainterior').val('');
                        $('.hargainterior').val('');
                        $('.qtyinterior').val('');
                        document.getElementById("qtyinterior").disabled = true;
                    },
                    error: function(xhr, ajaxOption, thrownError) {
                        alert(xhr.status + '\n' + thrownError)
                    }
                });
            }
        }

        function ajaxDelete(id, quantity, jumlah) {
            $.ajax({
                url: "<?= base_url('keranjang/detail-delete'); ?>",
                type: "POST",
                data: {
                    detailid: id,
                },
                success: function(data) {
                    reload();
                    // hitungTotalHapus(quantity, jumlah);
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }

        function simpanTransaksi() {
            let fakturpemesanan = $('.fakturpemesanan').val()
            let tanggal = $('.tanggal').val()

            if (tanggal.length == 0) {
                alert('Tanggal pemesanan tidak boleh kosong')
            } else {
                $.ajax({
                    url: "<?= base_url('keranjang/save-transaksi'); ?>",
                    type: "POST",
                    data: {
                        fakturpemesanan: fakturpemesanan,
                        tanggalpemesanan: tanggal,
                    },
                    success: function(data) {
                        cetakFaktur(fakturpemesanan);
                        window.location = "<?= base_url('/'); ?>";
                    },
                    error: function(xhr, ajaxOption, thrownError) {
                        alert(xhr.status + '\n' + thrownError)
                    }
                });
            }
        }

        function cetakFaktur(fakturpemesanan) {
            window.open("/pemesanan/faktur/" + fakturpemesanan, "_blank");
        }
    </script>


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