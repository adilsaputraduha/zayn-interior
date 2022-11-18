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
        <li class="nav-item has-treeview menu-open">
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
                    <a href="<?= base_url('admin/interior'); ?>" class="nav-link active">
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
        <li class="nav-item has-treeview">
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
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('interior') ?>">Interior</a></li>
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
            <form action="<?= base_url('admin/interior/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Interior</label>
                                <input type="text" readonly class="form-control kode <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" value="<?= $kodeinterior ?>" required placeholder="Masukan kode">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Interior</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" required placeholder="Masukan nama">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori" id="kategori" required class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>">
                                    <?php foreach ($kategori as $row) : ?>
                                        <option value="<?= $row['kategori_id']; ?>"><?= $row['kategori_nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kategori'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>" required placeholder="Masukan harga">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= old('stok'); ?>" required placeholder="Masukan stok">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stok'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="gambar">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>" required placeholder="Masukan deskripsi">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-sm-5">
                            <label>Nama Bahan Baku</label>
                            <div class="input-group">
                                <input type="text" readonly class="form-control detailnama" id="detailnama" name="detailnama">
                                <button class="btn btn-primary ml-1" data-toggle="modal" data-target="#searchBahanBaku" type="button">Cari Bahan Baku</button>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>QTY</label>
                                <input type="text" class="form-control detailqty" id="detailqty" name="detailqty">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Aksi</label>
                                <button class="btn btn-primary btn-block" onclick="ajaxSave()" type="button">+</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" id="detailid" name="detailid" class="detailid">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table" class="table table-bordered tabledua">
                                <thead>
                                    <tr>
                                        <th>Nama Bahan Baku</th>
                                        <th>QTY</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="coba">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div id="searchBahanBaku" class="modal fade" role="dialog" aria-hidden="true" tabindex="1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="">Cari Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tablelima" class="table table-bordered tablelima">
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
                                    <button class="btn btn-sm btn-info btn-choosedua" data-id="<?= $row['bahan_baku_id']; ?>" data-nama="<?= $row['bahan_baku_nama']; ?>"><i class="fa fa-arrow-left"></i></button>
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
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });


    $(function() {
        $(".tablelima").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

    $(document).ready(function() {
        $(".btn-choosedua").click(function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $('.detailid').val(id);
            $('.detailnama').val(nama);
            $('.detailqty').val(1);

            $("#searchBahanBaku").modal('hide');
        });
    });

    function reload() {
        let kode = $('.kode').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/interior/detail-index'); ?>",
            data: {
                kode: kode
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
        let kode = $('.kode').val()
        let detailid = $('.detailid').val()
        let detailqty = $('.detailqty').val()

        if (detailid.length == 0) {
            alert('Bahan baku tidak boleh kosong')
        } else if (detailqty.length == 0 || detailqty == 0) {
            alert('Qty tidak boleh kosong')
        } else {
            $.ajax({
                url: "<?= base_url('admin/interior/detail-save'); ?>",
                type: "POST",
                data: {
                    kode: kode,
                    bahanbaku: detailid,
                    qty: detailqty,
                },
                success: function(data) {
                    reload();
                    $('.detailid').val('');
                    $('.detailnama').val('');
                    $('.detailqty').val('');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert(xhr.status + '\n' + thrownError)
                }
            });
        }
    }

    function ajaxDelete(id) {
        $.ajax({
            url: "<?= base_url('admin/interior/detail-delete'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reload();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }
</script>

<?= $this->endSection(); ?>