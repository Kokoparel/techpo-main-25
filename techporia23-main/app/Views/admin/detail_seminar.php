<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Seminar</h1>
</div>

<div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar Seminar</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>
                            <?= $data['name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>
                            <?= $data['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <?= $data['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Asal Instansi</th>
                        <td>
                            <?= $data['instansi']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Domisili</th>
                        <td>
                            <?= $data['domisili']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?= $data['status']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>
                            <?= $data['kategori']; ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Nomor Tiket</th>
                        <td>
                            <?php if ($tiket): ?>
                                <?= $tiket; ?>
                            <?php else: ?>
                                Belum ada tiket
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Order ID</th>
                        <td>
                            <?= $data['order_id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Pembayaran</th>
                        <td>
                            <?= $data['transaction_status']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Waktu Pembayaran</th>
                        <td>
                            <?= $data['transaction_time']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>
                            <?= $data['payment_type']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <?php if ($data['transaction_status'] == 'settlement' || $data['transaction_status'] == 'capture'): ?>
                <div class="d-flex flex-row-reverse">
                    <?php if (!$tiket): ?>
                        <a href="<?= base_url('admin/seminar/create-tiket/' . $data['username']); ?>" class="btn btn-primary">
                            Buat Tiket
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('admin/seminar/download-tiket/' . $data['username']); ?>" class="btn btn-primary">
                            Download Tiket
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Payment Proof Section -->
<div class="col-xl-12 col-lg-7">
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

<?= $this->endSection() ?>