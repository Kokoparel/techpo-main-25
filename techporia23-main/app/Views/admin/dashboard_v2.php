<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pendaftar Seminar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($dataSeminar); ?>
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
                            Pendaftar Seminar (Settlement)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $jumlahSeminarSettlement; ?>
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
                            Pendaftar Lomba</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($dataTim); ?>
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
                            Pendaftar Lomba (Settlement)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $jumlahTimSettlement; ?>
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
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar Seminar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableSeminar" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Instansi</th>
                        <th>Kategori</th>
                        <th>Waktu Transaksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dataSeminar as $seminar): ?>
                        <tr>
                            <td><?= $seminar['name']; ?></td>
                            <td><?= $seminar['phone']; ?></td>
                            <td><?= $seminar['email']; ?></td>
                            <td><?= $seminar['instansi']; ?></td>
                            <td><?= $seminar['kategori']; ?></td>
                            <td><?= $seminar['transaction_time']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detail-seminar/'.$seminar['username']); ?>" class="btn btn-primary">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar Lomba</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableLomba" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Tim</th>
                        <th>Nama TIm</th>
                        <th>Kompetisi</th>
                        <th>Status Pembayaran</th>
                        <th>Status Berkas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dataTim as $tim): ?>
                        <tr>
                            <td><?= $tim['tim_id']; ?></td>
                            <td><?= $tim['nama_tim']; ?></td>
                            <td><?= $tim['nama_kompetisi']; ?></td>
                            <td><?= $tim['transaction_status']; ?></td>
                            <td><?= $tim['status']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detail-tim/'.$tim['tim_id']); ?>" class="btn btn-primary">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>