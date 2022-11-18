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
                    <a href="<?= base_url('admin/pembelian'); ?>" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian Bahan Baku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pemesanan'); ?>" class="nav-link">
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
                    <li class="breadcrumb-item"><a href="#">Pembelian</a></li>
                    <li class="breadcrumb-item active">Update</li>
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
            <?php
            foreach ($pembelian as $row) : ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Faktur Pembelian</label>
                            <input type="text" value="<?= $nomor; ?>" readonly class="form-control fakturpembelian <?= ($validation->hasError('fakturpembelian')) ? 'is-invalid' : ''; ?>" id="fakturpembelian" name="fakturpembelian" value="<?= old('fakturpembelian'); ?>" required placeholder="Masukan nomor pemesanan">
                            <div class="invalid-feedback">
                                <?= $validation->getError('fakturpembelian'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Pembelian</label>
                            <input type="date" value="<?= $row['pembelian_tanggal']; ?>" class="form-control tanggalpembelian <?= ($validation->hasError('tanggalpembelian')) ? 'is-invalid' : ''; ?>" id="tanggalpembelian" name="tanggalpembelian" value="<?= old('tanggalpembelian'); ?>" required placeholder="Masukan tanggalpembelian">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggalpembelian'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama Bahan</label>
                        <div class="input-group mb-3">
                            <input type="hidden" id="idbahanbaku" name="idbahanbaku" class="idbahanbaku">
                            <input type="text" id="namabahanbaku" name="namabahanbaku" required readonly class="form-control namabahanbaku" />
                            <button class="btn btn-info ml-1" data-toggle="modal" data-target="#searchBahanBaku" type="button">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" readonly class="form-control supplierbahanbaku <?= ($validation->hasError('supplierbahanbaku')) ? 'is-invalid' : ''; ?>" id="supplierbahanbaku" name="supplierbahanbaku" value="<?= old('supplierbahanbaku'); ?>" required">
                        <div class="invalid-feedback">
                            <?= $validation->getError('supplierbahanbaku'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" readonly class="form-control hargabahanbaku <?= ($validation->hasError('hargabahanbaku')) ? 'is-invalid' : ''; ?>" id="hargabahanbaku" name="hargabahanbaku" value="<?= old('hargabahanbaku'); ?>" required">
                        <div class="invalid-feedback">
                            <?= $validation->getError('hargabahanbaku'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" class="form-control qtybahanbaku <?= ($validation->hasError('qtybahanbaku')) ? 'is-invalid' : ''; ?>" id="qtybahanbaku" name="qtybahanbaku" value="<?= old('qtybahanbaku'); ?>" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('qtybahanbaku'); ?>
                        </div>
                        <input type="hidden" name="stokbahanbaku" class="stokbahanbaku" id="stokbahanbaku">
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
                                <th>Nama Bahan</th>
                                <th>Supplier</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="coba">
                            <?php $no = 0;
                            foreach ($detailpembelian as $row) : $no++ ?>
                                <tr>
                                    <td> <?= $row['bahan_baku_nama']; ?></td>
                                    <td> <?= $row['supplier_nama']; ?></td>
                                    <td>Rp. <?= $row['bahan_baku_harga']; ?></td>
                                    <td> <?= $row['detail_pembelian_qty']; ?></td>
                                    <td>Rp. <?= $row['detail_pembelian_jumlah']; ?></td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-sm btn-danger" onclick="ajaxDelete(<?= $row['detail_pembelian_id']; ?>, <?= $row['detail_pembelian_qty']; ?>, <?= $row['detail_pembelian_jumlah']; ?>)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <?php
            foreach ($pembelian as $row) : ?>
                <div class="row justify-content-end">
                    <div class="col-lg-4">
                        <label for="">Total Item :</label>
                        <input type="text" value="<?= $row['pembelian_total_item']; ?>" readonly class="form-control totalitem"></input>
                    </div>
                </div>
                <br>
                <div class="row justify-content-end">
                    <div class="col-lg-4">
                        <label for="">Total Harga :</label>
                        <input type="text" value="<?= $row['pembelian_total_harga']; ?>" readonly class="form-control totalharga"></input>
                    </div>
                </div>
            <?php endforeach; ?>
            <br>
            <div class="row justify-content-end">
                <div class="col-lg-4">
                    <a href="<?= base_url('admin/pembelian'); ?>" class="btn btn-secondary btn-sm">
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

<div id="searchBahanBaku" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
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
                            <th>Supplier</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($bahanbaku as $row) : $no++ ?>
                            <tr>
                                <td> <?= $row['bahan_baku_nama']; ?></td>
                                <td> <?= $row['supplier_nama']; ?></td>
                                <td> <?= $row['bahan_baku_satuan']; ?></td>
                                <td>Rp. <?= $row['bahan_baku_harga']; ?></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-sm btn-info btn-choosesatu" data-stok="<?= $row['bahan_baku_stok']; ?>" data-id="<?= $row['bahan_baku_id']; ?>" data-nama="<?= $row['bahan_baku_nama']; ?>" data-supplier="<?= $row['supplier_nama']; ?>" data-harga="<?= $row['bahan_baku_harga']; ?>"><i class="fa fa-arrow-left"></i></button>
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
    let qty = $('.totalitem').val();
    let totalharga = $('.totalharga').val();

    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    function hitungTotal() {
        let qtybahanbaku = $('.qtybahanbaku').val()
        let hargabahanbaku = $('.hargabahanbaku').val()

        let hargaxqty = hargabahanbaku * qtybahanbaku

        qty = parseInt(qty) + parseInt(qtybahanbaku)
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
            const idbahanbaku = $(this).data('id');
            const namabahanbaku = $(this).data('nama');
            const supplierbahanbaku = $(this).data('supplier');
            const hargabahanbaku = $(this).data('harga');
            const stokbahanbaku = $(this).data('stok');
            $('.idbahanbaku').val(idbahanbaku);
            $('.namabahanbaku').val(namabahanbaku);
            $('.supplierbahanbaku').val(supplierbahanbaku);
            $('.hargabahanbaku').val(hargabahanbaku);
            $('.stokbahanbaku').val(stokbahanbaku);

            $('.qtybahanbaku').val(1);

            $("#searchBahanBaku").modal('hide');
        });
    });

    function reload() {
        let fakturpembelian = $('.fakturpembelian').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/pembelian/detail-index'); ?>",
            data: {
                fakturpembelian: fakturpembelian
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
        let fakturpembelian = $('.fakturpembelian').val()
        let idbahanbaku = $('.idbahanbaku').val()
        let hargabahanbaku = $('.hargabahanbaku').val()
        let qtybahanbaku = $('.qtybahanbaku').val()
        let stokbahanbaku = $('.stokbahanbaku').val()

        let jumlahbahanbaku = parseInt(hargabahanbaku) * parseInt(qtybahanbaku)

        if (idbahanbaku.length == 0) {
            alert('Bahan baku tidak boleh kosong')
        } else if (qtybahanbaku.length == 0 || qtybahanbaku == 0) {
            alert('Qty tidak boleh kosong')
        } else {
            $.ajax({
                url: "<?= base_url('admin/pembelian/detail-save'); ?>",
                type: "POST",
                data: {
                    fakturpembelian: fakturpembelian,
                    idbahanbaku: idbahanbaku,
                    qtybahanbaku: qtybahanbaku,
                    hargabahanbaku: hargabahanbaku,
                    jumlahbahanbaku: jumlahbahanbaku,
                    stokbahanbaku: stokbahanbaku
                },
                success: function(data) {
                    reload();
                    hitungTotal();
                    $('.idbahanbaku').val('');
                    $('.namabahanbaku').val('');
                    $('.supplierbahanbaku').val('');
                    $('.hargabahanbaku').val('');
                    $('.qtybahanbaku').val('');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }
    }

    function ajaxDelete(id, quantity, jumlah) {
        $.ajax({
            url: "<?= base_url('admin/pembelian/detail-delete'); ?>",
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
        let fakturpembelian = $('.fakturpembelian').val()
        let tanggalpembelian = $('.tanggalpembelian').val()
        let totalitem = $('.totalitem').val()
        let totalharga = $('.totalharga').val()

        if (tanggalpembelian.length == 0) {
            alert('Tanggal pembelian tidak boleh kosong')
        } else if (totalitem.length == 0 || totalitem == 0) {
            alert('Item tidak boleh kosong')
        } else {
            $.ajax({
                url: "<?= base_url('admin/pembelian/edit'); ?>",
                type: "POST",
                data: {
                    fakturpembelian: fakturpembelian,
                    tanggalpembelian: tanggalpembelian,
                    totalitem: totalitem,
                    totalharga: totalharga,
                },
                success: function(data) {
                    cetakFaktur(fakturpembelian);
                    window.location = "<?= base_url('admin/pembelian'); ?>";
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }
    }

    function cetakFaktur(fakturpembelian) {
        window.open("/admin/pembelian/faktur/" + fakturpembelian, "_blank");
    }
</script>

<?= $this->endSection(); ?>