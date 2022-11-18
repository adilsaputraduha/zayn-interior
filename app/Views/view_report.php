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
            <a href="<?= base_url('admin/report'); ?>" class="nav-link active">
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
                    <li class="breadcrumb-item active">Laporan</li>
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
                        <th>Nama Laporan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Laporan Pemesanan (Keseluruhan)</td>
                        <td style="text-align: center;">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#printPemesananKeseluruhan"><i class="fa fa-print"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Laporan Pemesanan (Dalam Pengerjaan)</td>
                        <td style="text-align: center;">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#printPemesananDalamPengerjaan"><i class="fa fa-print"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Laporan Pemesanan (Selesai)</td>
                        <td style="text-align: center;">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#printPemesananSelesai"><i class="fa fa-print"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Laporan Pembelian</td>
                        <td style="text-align: center;">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#printPembelian"><i class="fa fa-print"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Laporan Pembayaran</td>
                        <td style="text-align: center;">
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#printPembayaran"><i class="fa fa-print"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<form action="<?= base_url('admin/report/pemesanan'); ?>" enctype="multipart/form-data" method="POST">
    <div id="printPemesananKeseluruhan" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Filter Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="status" id="status" value="10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control tanggalawalpemesanan" id="tanggalawalpemesanan" name="tanggalawalpemesanan" required placeholder="Masukan tanggalawalpemesanan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control tanggalakhirpemesanan" id="tanggalakhirpemesanan" name="tanggalakhirpemesanan" required placeholder="Masukan tanggalakhirpemesanan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?= base_url('admin/report/pemesanan'); ?>" enctype="multipart/form-data" method="POST">
    <div id="printPemesananDalamPengerjaan" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Filter Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="status" id="status" value="2">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control tanggalawalpemesanan" id="tanggalawalpemesanan" name="tanggalawalpemesanan" required placeholder="Masukan tanggalawalpemesanan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control tanggalakhirpemesanan" id="tanggalakhirpemesanan" name="tanggalakhirpemesanan" required placeholder="Masukan tanggalakhirpemesanan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?= base_url('admin/report/pemesanan'); ?>" enctype="multipart/form-data" method="POST">
    <div id="printPemesananSelesai" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Filter Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="status" id="status" value="3">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control tanggalawalpemesanan" id="tanggalawalpemesanan" name="tanggalawalpemesanan" required placeholder="Masukan tanggalawalpemesanan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control tanggalakhirpemesanan" id="tanggalakhirpemesanan" name="tanggalakhirpemesanan" required placeholder="Masukan tanggalakhirpemesanan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?= base_url('admin/report/pembelian'); ?>" enctype="multipart/form-data" method="POST">
    <div id="printPembelian" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Filter Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control tanggalawalpembelian" id="tanggalawalpembelian" name="tanggalawalpembelian" required placeholder="Masukan tanggalawalpembelian">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control tanggalakhirpembelian" id="tanggalakhirpembelian" name="tanggalakhirpembelian" required placeholder="Masukan tanggalakhirpembelian">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<form action="<?= base_url('admin/report/pembayaran'); ?>" enctype="multipart/form-data" method="POST">
    <div id="printPembayaran" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Filter Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" class="form-control tanggalawalpembayaran" id="tanggalawalpembayaran" name="tanggalawalpembayaran" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control tanggalakhirpembayaran" id="tanggalakhirpembayaran" name="tanggalakhirpembayaran" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>