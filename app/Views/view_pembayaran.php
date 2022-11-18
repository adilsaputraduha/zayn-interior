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
                    <a href="<?= base_url('admin/pemesanan'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pemesanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pembayaran'); ?>" class="nav-link active">
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
                    <li class="breadcrumb-item active">Pembayaran</li>
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
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Faktur</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Bayar</th>
                        <th>Total Item</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($pembayaran as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['pemesanan_faktur']; ?></td>
                            <td> <?= $row['pelanggan_nama']; ?></td>
                            <td> <?= $row['pembayaran_tanggal']; ?></td>
                            <td> <?= $row['pemesanan_total_item']; ?></td>
                            <td>Rp. <?= $row['pemesanan_total_harga']; ?></td>
                            <td style="text-align: center;">
                                <a type="button" class="badge bg-info" data-toggle="modal" data-target="#showModal<?= $row['pemesanan_faktur']; ?>">Lihat Bukti</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<?php foreach ($pembayaran as $row) : ?>
    <?= csrf_field(); ?>
    <div class="modal" tabindex="-1" id="showModal<?= $row['pemesanan_faktur']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" required value="<?= $row['pemesanan_faktur']; ?>" />
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="<?= base_url(); ?>/uploadbukti/<?= $row['pembayaran_bukti']; ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>