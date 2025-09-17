<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Workshop - <?= $data['name']; ?></h1>
    <a href="<?= base_url('admin/workshop'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Content Row -->
<div class="row">

    <!-- Workshop Information Card -->
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Peserta Workshop</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Username</strong></td>
                                <td>: <?= $data['username']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nama Lengkap</strong></td>
                                <td>: <?= $data['name']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>: <?= $data['email']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>No. Telepon</strong></td>
                                <td>: <?= $data['phone']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>: <?= $data['status']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Instansi</strong></td>
                                <td>: <?= $data['instansi']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Domisili</strong></td>
                                <td>: <?= $data['domisili']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kategori</strong></td>
                                <td>: <span class="badge badge-<?= $data['kategori'] == 'VIP' ? 'warning' : 'info'; ?>"><?= $data['kategori']; ?></span></td>
                            </tr>
                            <tr>
                                <td><strong>Order ID</strong></td>
                                <td>: <?= $data['order_id']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Information Card -->
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Informasi Transaksi</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Status</strong></td>
                        <td>
                            <span class="badge badge-<?= $data['transaction_status'] == 'settlement' || $data['transaction_status'] == 'capture' ? 'success' : 'danger'; ?>">
                                <?= ucfirst($data['transaction_status']); ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Metode</strong></td>
                        <td><?= ucfirst($data['payment_type'] ?? 'N/A'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Waktu</strong></td>
                        <td><?= $data['transaction_time']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Ticket Management Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Manajemen Tiket</h6>
            </div>
            <div class="card-body">
                <?php if ($tiket): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> Tiket sudah dibuat
                        <br><strong>Kode Tiket:</strong> <?= $tiket; ?>
                    </div>
                    <a href="<?= base_url('admin/download-tiket-workshop/'.$data['username']); ?>" class="btn btn-success btn-block">
                        <i class="fas fa-download"></i> Download Tiket
                    </a>
                <?php else: ?>
                    <?php if ($data['transaction_status'] == 'settlement' || $data['transaction_status'] == 'capture'): ?>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> Tiket belum dibuat
                        </div>
                        <a href="<?= base_url('admin/create-tiket-workshop/'.$data['username']); ?>" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin ingin membuat tiket?')">
                            <i class="fas fa-ticket-alt"></i> Buat Tiket
                        </a>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-times-circle"></i> Pembayaran belum diverifikasi
                        </div>
                        <button class="btn btn-secondary btn-block" disabled>
                            <i class="fas fa-ticket-alt"></i> Buat Tiket
                        </button>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<!-- Payment Proof Section -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bukti Pembayaran</h6>
                <?php if ($data['transaction_status'] === 'pending_manual'): ?>
                    <div>
                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/payment/approve/' . $data['order_id']); ?>">Terima</a>
                        <a class="btn btn-sm btn-danger" href="<?= base_url('admin/payment/reject/' . $data['order_id']); ?>" onclick="return confirm('Tolak pembayaran ini?');">Tolak</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php if (!empty($paymentProofs)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($paymentProofs as $pp): ?>
                                    <tr>
                                        <td><?= date('d M Y H:i', strtotime($pp['created_at'])); ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="<?= base_url($pp['path']); ?>" target="_blank">Lihat</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Belum ada bukti pembayaran yang diupload.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>