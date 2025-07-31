<?= $this->extend('admin/layout/layout_v2'); ?>
<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Keuangan Workshop</h1>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Gross Amount Workshop Offline</div>
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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pendapatan Workshop Offline</div>
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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Gross Amount Workshop Online</div>
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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pendapatan Workshop Online</div>
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

<!-- TABEL WORKSHOP OFFLINE -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Workshop Offline</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableWorkshopOffline" width="100%" cellspacing="0">
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
                    <?php foreach ($workshopOffline as $w): ?>
                        <tr>
                            <td><?= esc($w['name']); ?></td>
                            <td><?= esc($w['instansi']); ?></td>
                            <td><?= esc($w['status']); ?></td>
                            <td><?= esc($w['kategori']); ?></td>
                            <td><?= 'Rp. ' . number_format($w['gross_amount'], 0, ',', '.'); ?></td>
                            <td><?= esc($w['payment_type']); ?></td>
                            <td><?= 'Rp. ' . number_format($w['fee'], 0, ',', '.'); ?></td>
                            <td><?= 'Rp. ' . number_format($w['pendapatan'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- TABEL WORKSHOP ONLINE -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Workshop Online</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableWorkshopOnline" width="100%" cellspacing="0">
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
                    <?php foreach ($workshopOnline as $w): ?>
                        <tr>
                            <td><?= esc($w['name']); ?></td>
                            <td><?= esc($w['instansi']); ?></td>
                            <td><?= esc($w['status']); ?></td>
                            <td><?= esc($w['kategori']); ?></td>
                            <td><?= 'Rp. ' . number_format($w['gross_amount'], 0, ',', '.'); ?></td>
                            <td><?= esc($w['payment_type']); ?></td>
                            <td><?= 'Rp. ' . number_format($w['fee'], 0, ',', '.'); ?></td>
                            <td><?= 'Rp. ' . number_format($w['pendapatan'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
