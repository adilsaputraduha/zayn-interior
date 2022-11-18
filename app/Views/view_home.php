<?= $this->extend('main'); ?>

<?= $this->section('menu'); ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= base_url('/admin'); ?>" class="nav-link active">
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
            <ul class="nav nav-treeview">
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
        <div class="row mt-2">
            <div class="col-sm-12">
                <div class="alert alert-info" role="alert">
                    <h6 class="mt-2 text-white">CV. ZAYN INTERIOR</h6>
                    <h5 class="m-0 text-white">Alamat : Sei. Lala, Kabupaten Inhu Riau</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $pelanggan; ?><sup style="font-size: 20px; margin-left: 5px;">Orang</sup></h3>
                        <p>Pelanggan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= base_url('admin/pelanggan'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $user; ?><sup style="font-size: 20px; margin-left: 5px;">Orang</sup></h3>
                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="<?= base_url('admin/user'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $interior; ?><sup style="font-size: 20px; margin-left: 5px;">Tamu</sup></h3>
                        <p>Interior</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-paper-airplane"></i>
                    </div>
                    <a href="<?= base_url('admin/interior'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $pemesanan; ?><sup style="font-size: 20px; margin-left: 5px;">Unit</sup></h3>
                        <p>Pemesanan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                    <a href="<?= base_url('admin/pemesanan'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $pembelian; ?><sup style="font-size: 20px; margin-left: 5px;">Unit</sup></h3>
                        <p>Pembelian</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                    <a href="<?= base_url('admin/pembelian'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?= $bahanbaku; ?><sup style="font-size: 20px; margin-left: 5px;">Unit</sup></h3>
                        <p>Bahan Baku</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                    <a href="<?= base_url('admin/bahanbaku'); ?>" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->endSection(); ?>