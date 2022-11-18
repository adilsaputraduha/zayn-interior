<?= $this->extend('main'); ?>

<?= $this->section('menu'); ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= base_url('/admin'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <?php if (session()->get('userLevel') == 0 || session()->get('userLevel') == 1) { ?>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-table"></i>
                <p>
                    Master
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ">
                <?php if (session()->get('userLevel') == 0) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/user'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pelanggan'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/supplier'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/kategori'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/interior'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Interior</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/bahanbaku'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bahan Baku</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa fa-receipt"></i>
                <p>
                    Transaksi
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ">
                <li class="nav-item">
                    <a href="<?= base_url('admin/pembelian'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian Bahan Baku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pemesanan'); ?>" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pemesanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pembayaran'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembayaran</p>
                    </a>
                </li>
            </ul>
        </li>
    <?php } ?>
    <?php if (session()->get('userLevel') == 0 || session()->get('userLevel') == 2) { ?>
        <li class="nav-item">
            <a href="<?= base_url('admin/report'); ?>" class="nav-link">
                <i class="nav-icon far fa fa-book"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>
    <?php } ?>
</ul>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Pemesanan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } else if (session()->getFlashdata('failed')) { ?>
            <div class="alert alert-danger icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('failed'); ?>
            </div>
        <?php } ?>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Faktur Pemesanan</label>
                        <input type="text" value="<?= $nomor; ?>" readonly class="form-control fakturpemesanan <?= ($validation->hasError('fakturpemesanan')) ? 'is-invalid' : ''; ?>" id="fakturpemesanan" name="fakturpemesanan" value="<?= old('fakturpemesanan'); ?>" required placeholder="Masukan nomor pemesanan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fakturpemesanan'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <div class="input-group mb-3">
                            <input type="hidden" id="idpelanggan" name="idpelanggan" class="idpelanggan">
                            <input type="text" id="namapelanggan" name="namapelanggan" required readonly class="form-control namapelanggan" />
                            <button class="btn btn-info ml-1" data-toggle="modal" data-target="#searchPelanggan" type="button">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Pemesanan</label>
                        <input type="date" class="form-control tanggalpemesanan <?= ($validation->hasError('tanggalpemesanan')) ? 'is-invalid' : ''; ?>" id="tanggalpemesanan" name="tanggalpemesanan" value="<?= old('tanggalpemesanan'); ?>" required placeholder="Masukan tanggalpemesanan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggalpemesanan'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Kode Interior</label>
                        <div class="input-group mb-3">
                            <input type="text" id="kodeinterior" name="kodeinterior" required readonly class="form-control kodeinterior" />
                            <button class="btn btn-info ml-1" data-toggle="modal" data-target="#searchInterior" type="button">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama Interior</label>
                        <input type="text" readonly class="form-control namainterior <?= ($validation->hasError('namainterior')) ? 'is-invalid' : ''; ?>" id="namainterior" name="namainterior" value="<?= old('namainterior'); ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('namainterior'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" readonly class="form-control hargainterior <?= ($validation->hasError('hargainterior')) ? 'is-invalid' : ''; ?>" id="hargainterior" name="hargainterior" value="<?= old('hargainterior'); ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hargainterior'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" class="form-control qtyinterior <?= ($validation->hasError('qtyinterior')) ? 'is-invalid' : ''; ?>" id="qtyinterior" name="qtyinterior" value="<?= old('qtyinterior'); ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('qtyinterior'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <label>Aksi</label>
                    <div class="form-group">
                        <button class="btn btn-info" onclick="ajaxSave()">+</button>
                    </div>
                </div>
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
                            foreach ($detailpemesanan as $row) : $no++ ?>
                                <tr>
                                    <td> <?= $row['detail_pemesanan_interior']; ?></td>
                                    <td> <?= $row['interior_nama']; ?></td>
                                    <td>Rp. <?= $row['interior_harga']; ?></td>
                                    <td> <?= $row['detail_pemesanan_qty']; ?></td>
                                    <td>Rp. <?= $row['detail_pemesanan_jumlah']; ?></td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-sm btn-danger" onclick="ajaxDelete(<?= $row['detail_pemesanan_id']; ?>, <?= $row['detail_pemesanan_qty']; ?>, <?= $row['detail_pemesanan_jumlah']; ?>)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div class="row justify-content-end">
                <div class="col-lg-4">
                    <label for="">Total Item :</label>
                    <input type="text" readonly class="form-control totalitem"></input>
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <div class="col-lg-4">
                    <label for="">Total Harga :</label>
                    <input type="text" readonly class="form-control totalharga"></input>
                </div>
            </div>
            <br>
            <div class="row justify-content-end">
                <div class="col-lg-4">
                    <a href="<?= base_url('admin/pemesanan'); ?>" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>
                    <button class="btn btn-info btn-sm" onclick="simpanTransaksi()">
                        Simpan & Cetak
                    </button>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div id="searchPelanggan" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="">Cari Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabledua" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No. Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($pelanggan as $row) : $no++ ?>
                            <tr>
                                <td> <?= $row['pelanggan_nama']; ?></td>
                                <td>
                                    <?php if ($row['pelanggan_jenkel'] == 1) { ?>
                                        <span class="badge bg-primary">Laki-Laki</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Perempuan</span>
                                    <?php } ?>
                                </td>
                                <td> <?= $row['pelanggan_alamat']; ?></td>
                                <td> <?= $row['pelanggan_nohp']; ?></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-sm btn-info btn-choosesatu" data-id="<?= $row['pelanggan_id']; ?>" data-nama="<?= $row['pelanggan_nama']; ?>"><i class="fa fa-arrow-left"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="searchInterior" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="">Cari Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabletiga" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($interior as $row) : $no++ ?>
                            <tr>
                                <td> <?= $row['interior_kode']; ?></td>
                                <td> <?= $row['interior_nama']; ?></td>
                                <td> <?= $row['kategori_nama']; ?></td>
                                <td> <?= $row['interior_harga']; ?></td>
                                <td> <?= $row['interior_stok']; ?></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-sm btn-info btn-choosedua" data-kode="<?= $row['interior_kode']; ?>" data-nama="<?= $row['interior_nama']; ?>" data-harga="<?= $row['interior_harga']; ?>"><i class="fa fa-arrow-left"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    let qty = 0;
    let totalharga = 0;

    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    function hitungTotal() {
        let qtyinterior = $('.qtyinterior').val()
        let hargainterior = $('.hargainterior').val()

        let hargaxqty = hargainterior * qtyinterior

        qty = parseInt(qty) + parseInt(qtyinterior)
        totalharga = parseInt(totalharga) + parseInt(hargaxqty)

        $('.totalitem').val(qty);
        $('.totalharga').val(totalharga);
    }

    function hitungTotalHapus(quantity, jumlah) {
        totalharga = parseInt(totalharga) - parseInt(jumlah)
        qty = parseInt(qty) - parseInt(quantity)

        $('.totalitem').val(qty);
        $('.totalharga').val(totalharga);
    }

    $(function() {
        $("#tabledua").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#tabletiga").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    $(document).ready(function() {
        $(".btn-choosesatu").click(function() {
            const idpelanggan = $(this).data('id');
            const namapelanggan = $(this).data('nama');
            $('.idpelanggan').val(idpelanggan);
            $('.namapelanggan').val(namapelanggan);

            $("#searchPelanggan").modal('hide');
        });

        $(".btn-choosedua").click(function() {
            const kodeinterior = $(this).data('kode');
            const namainterior = $(this).data('nama');
            const hargainterior = $(this).data('harga');
            $('.kodeinterior').val(kodeinterior);
            $('.namainterior').val(namainterior);
            $('.hargainterior').val(hargainterior);
            $('.qtyinterior').val(1);

            $("#searchInterior").modal('hide');
        });
    });

    function reload() {
        let fakturpemesanan = $('.fakturpemesanan').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/pemesanan/detail-index'); ?>",
            data: {
                fakturpemesanan: fakturpemesanan
            },
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

    function ajaxSave() {
        let fakturpemesanan = $('.fakturpemesanan').val()
        let kodeinterior = $('.kodeinterior').val()
        let hargainterior = $('.hargainterior').val()
        let qtyinterior = $('.qtyinterior').val()

        let jumlahharga = parseInt(hargainterior) * parseInt(qtyinterior)

        if (kodeinterior.length == 0) {
            alert('Interior tidak boleh kosong')
        } else if (qtyinterior.length == 0 || qtyinterior == 0) {
            alert('Qty tidak boleh kosong')
        } else {
            $.ajax({
                url: "<?= base_url('admin/pemesanan/detail-save'); ?>",
                type: "POST",
                data: {
                    fakturpemesanan: fakturpemesanan,
                    kodeinterior: kodeinterior,
                    qtyinterior: qtyinterior,
                    hargainterior: hargainterior,
                    jumlahharga: jumlahharga,
                },
                success: function(data) {
                    reload();
                    hitungTotal();
                    $('.kodeinterior').val('');
                    $('.namainterior').val('');
                    $('.hargainterior').val('');
                    $('.qtyinterior').val('');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }
    }

    function ajaxDelete(id, quantity, jumlah) {
        $.ajax({
            url: "<?= base_url('admin/pemesanan/detail-delete'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reload();
                hitungTotalHapus(quantity, jumlah);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }

    function simpanTransaksi() {
        let fakturpemesanan = $('.fakturpemesanan').val()
        let tanggalpemesanan = $('.tanggalpemesanan').val()
        let idpelanggan = $('.idpelanggan').val()
        let totalitem = $('.totalitem').val()
        let totalharga = $('.totalharga').val()

        if (idpelanggan.length == 0) {
            alert('Pelanggan tidak boleh kosong')
        } else if (tanggalpemesanan.length == 0) {
            alert('Tanggal pemesanan tidak boleh kosong')
        } else if (totalitem.length == 0 || totalitem == 0) {
            alert('Item tidak boleh kosong')
        } else {
            $.ajax({
                url: "<?= base_url('admin/pemesanan/save'); ?>",
                type: "POST",
                data: {
                    fakturpemesanan: fakturpemesanan,
                    tanggalpemesanan: tanggalpemesanan,
                    idpelanggan: idpelanggan,
                    totalitem: totalitem,
                    totalharga: totalharga,
                },
                success: function(data) {
                    cetakFaktur(fakturpemesanan);
                    window.location = "<?= base_url('admin/pemesanan'); ?>";
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }
    }

    function cetakFaktur(fakturpemesanan) {
        window.open("/admin/pemesanan/faktur/" + fakturpemesanan, "_blank");
    }
</script>

<?= $this->endSection(); ?>