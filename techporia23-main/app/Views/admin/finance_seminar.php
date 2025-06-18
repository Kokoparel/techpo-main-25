<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Keuangan</h1>
</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Gross Amount Seminar Offline</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= 'Rp. ' . number_format($grossAmountOffline, 0, ',', '.'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pendapatan Seminar Offline</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= 'Rp. ' . number_format($pendapatanOffline, 0, ',', '.'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Gross Amount Seminar Online</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= 'Rp. ' . number_format($grossAmountOnline, 0, ',', '.'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pendapatan Seminar Online</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= 'Rp. ' . number_format($pendapatanOnline, 0, ',', '.'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Seminar Offline</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Others Action :</div>
                <a class="dropdown-item" href="<?= base_url('admin/seminar/add'); ?>">Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableSeminar" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Gross Amount</th>
                        <th>Metode Pembayaran</th>
                        <th>Fee</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($seminarOffline as $s): ?>
                        <tr>
                            <td>
                                <?= $s['name']; ?>
                            </td>
                            <td>
                                <?= $s['instansi']; ?>
                            </td>
                            <td>
                                <?= $s['status']; ?>
                            </td>
                            <td>
                                <?= $s['kategori']; ?>
                            </td>
                            <td>
                                <?= 'Rp. ' . $s['gross_amount']; ?>
                            </td>
                            <td>
                                <?= $s['payment_type']; ?>
                            </td>
                            <td>
                                <?= 'Rp. ' . $s['fee']; ?>
                            </td>
                            <td>
                                <?= 'Rp. ' . $s['pendapatan']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Seminar Offline</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Others Action :</div>
                <a class="dropdown-item" href="<?= base_url('admin/seminar/add'); ?>">Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableLomba" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Gross Amount</th>
                        <th>Metode Pembayaran</th>
                        <th>Fee</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($seminarOnline as $s): ?>
                        <tr>
                            <td>
                                <?= $s['name']; ?>
                            </td>
                            <td>
                                <?= $s['instansi']; ?>
                            </td>
                            <td>
                                <?= $s['status']; ?>
                            </td>
                            <td>
                                <?= $s['kategori']; ?>
                            </td>
                            <td>
                                <?= 'Rp. ' . $s['gross_amount']; ?>
                            </td>
                            <td>
                                <?= $s['payment_type']; ?>
                            </td>
                            <td>
                                <?= 'Rp. ' . $s['fee']; ?>
                            </td>
                            <td>
                                <?= 'Rp. ' . $s['pendapatan']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>