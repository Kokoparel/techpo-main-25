<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Workshop</h1>
    <a href="<?= base_url('admin/add-workshop'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Peserta Workshop
    </a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- VIP Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pendaftar VIP</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $dataVip; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-crown fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VIP Settlement Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            VIP (Settlement)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $dataVipSettlement; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reguler Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Pendaftar Reguler</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $dataReguler; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reguler Settlement Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Reguler (Settlement)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $dataRegulerSettlement; ?>
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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar Workshop</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Instansi</th>
                        <th>Domisili</th>
                        <th>Kategori</th>
                        <th>Status Transaksi</th>
                        <th>Waktu Transaksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dataWorkshop as $workshop): ?>
                        <tr>
                            <td><?= $workshop['name']; ?></td>
                            <td><?= $workshop['phone']; ?></td>
                            <td><?= $workshop['email']; ?></td>
                            <td><?= $workshop['instansi']; ?></td>
                            <td><?= $workshop['domisili']; ?></td>
                            <td>
                                <span class="badge badge-<?= $workshop['kategori'] == 'VIP' ? 'warning' : 'info'; ?>">
                                    <?= $workshop['kategori']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-<?= $workshop['transaction_status'] == 'settlement' || $workshop['transaction_status'] == 'capture' ? 'success' : 'danger'; ?>">
                                    <?= ucfirst($workshop['transaction_status']); ?>
                                </span>
                            </td>
                            <td><?= $workshop['transaction_time']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detail-workshop/'.$workshop['username']); ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>