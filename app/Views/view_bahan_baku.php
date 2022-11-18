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
                    <a href="<?= base_url('admin/interior'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Interior</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/bahanbaku'); ?>" class="nav-link active">
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
                    <li class="breadcrumb-item active">Bahan Baku</li>
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
        <div class="card-header">
            <button data-toggle="modal" data-target="#addModal" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah</button>
            <a href="<?= base_url('admin/bahanbaku/report'); ?>" target="__blank" class="btn btn-success btn-sm"><i class="fa fa-print mr-2"></i>Laporan</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Supplier</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($bahanbaku as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['bahan_baku_nama']; ?></td>
                            <td> <?= $row['supplier_nama']; ?></td>
                            <td> <?= $row['bahan_baku_satuan']; ?></td>
                            <td> <?= $row['bahan_baku_stok']; ?></td>
                            <td>Rp. <?= $row['bahan_baku_harga']; ?></td>
                            <td style="text-align: center;">
                                <a type="button" class="badge bg-info pointer" data-toggle="modal" data-target="#updateModal<?= $row['bahan_baku_id']; ?>">Edit</a>
                                <a type="button" class="badge bg-danger" data-toggle="modal" data-target="#deleteModal<?= $row['bahan_baku_id']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div id="addModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="">Tambah bahan baku</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/bahanbaku/save'); ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Bahan</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" required placeholder="Masukan nama">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Supplier</label>
                                <select name="supplier" id="supplier" required class="form-control <?= ($validation->hasError('supplier')) ? 'is-invalid' : ''; ?>">
                                    <?php foreach ($supplier as $row) : ?>
                                        <option value="<?= $row['supplier_id']; ?>"><?= $row['supplier_nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('supplier'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Satuan</label>
                                <select name="satuan" id="satuan" required class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>">
                                    <option value="Gram">Gram</option>
                                    <option value="Kilogram">Kilogram</option>
                                    <option value="Centimeter">Centimeter</option>
                                    <option value="Meter">Meter</option>
                                    <option value="Lain-Lain">Lain-Lain</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('satuan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= old('stok'); ?>" required placeholder="Masukan stok">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stok'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>" required placeholder="Masukan harga">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            </div>
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
    </div>
</div>

<?php foreach ($bahanbaku as $row) : ?>
    <div id="updateModal<?= $row['bahan_baku_id']; ?>" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Update bahan baku</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/bahanbaku/edit'); ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $row['bahan_baku_id']; ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Bahan</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $row['bahan_baku_nama']; ?>" required placeholder="Masukan nama">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplier" id="supplier" required class="form-control <?= ($validation->hasError('supplier')) ? 'is-invalid' : ''; ?>">
                                        <?php foreach ($supplier as $rowsatu) : ?>
                                            <?php if ($row['bahan_baku_supplier'] == $rowsatu['supplier_id']) { ?>
                                                <option selected value="<?= $rowsatu['supplier_id']; ?>"><?= $rowsatu['supplier_nama']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $rowsatu['supplier_id']; ?>"><?= $rowsatu['supplier_nama']; ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('supplier'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select name="satuan" id="satuan" required class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>">
                                        <?php if ($row['bahan_baku_satuan'] == 'Gram') { ?>
                                            <option selected value="Gram">Gram</option>
                                            <option value="Kilogram">Kilogram</option>
                                            <option value="Centimeter">Centimeter</option>
                                            <option value="Meter">Meter</option>
                                            <option value="Lain-Lain">Lain-Lain</option>
                                        <?php } else if ($row['bahan_baku_satuan'] == 'Kilogram') { ?>
                                            <option selected value="Kilogram">Kilogram</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Centimeter">Centimeter</option>
                                            <option value="Meter">Meter</option>
                                            <option value="Lain-Lain">Lain-Lain</option>
                                        <?php } else if ($row['bahan_baku_satuan'] == 'Centimeter') { ?>
                                            <option selected value="Centimeter">Centimeter</option>
                                            <option value="Kilogram">Kilogram</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Meter">Meter</option>
                                            <option value="Lain-Lain">Lain-Lain</option>
                                        <?php } else if ($row['bahan_baku_satuan'] == 'Meter') { ?>
                                            <option selected value="Meter">Meter</option>
                                            <option value="Kilogram">Kilogram</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Centimeter">Centimeter</option>
                                            <option value="Lain-Lain">Lain-Lain</option>
                                        <?php } else { ?>
                                            <option selected value="Lain-Lain">Lain-Lain</option>
                                            <option value="Gram">Gram</option>
                                            <option value="Kilogram">Kilogram</option>
                                            <option value="Centimeter">Centimeter</option>
                                            <option value="Meter">Meter</option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('satuan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= $row['bahan_baku_stok']; ?>" required placeholder="Masukan stok">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('stok'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= $row['bahan_baku_harga']; ?>" required placeholder="Masukan harga">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <form action="<?= base_url('admin/bahanbaku/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['bahan_baku_id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus bahan baku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['bahan_baku_id']; ?>" />
                        <h6>Yakin ingin menghapus data ini?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary mt-2 mb-2 mr-2">Yakin</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php endforeach; ?>

<?= $this->endSection(); ?>