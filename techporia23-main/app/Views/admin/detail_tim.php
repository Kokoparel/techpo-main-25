<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Tim</h1>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Tim</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID Tim</th>
                            <td>
                                <?= $data['tim_id']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Tim</th>
                            <td>
                                <?= $data['nama_tim']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Cabang Kompetisi</th>
                            <td>
                                <?= $data['nama_kompetisi']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Asal Universitas</th>
                            <td>
                                <?= $data['ketua']['universitas']; ?>
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
            </div>
        </div>

        <?php if ($data['id_kompetisi'] == 9): // Khusus untuk Mobile Legends ?>
            <?php if (!empty($data['ml_follow_proof'])): ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Bukti Follow Instagram (ML)</h6>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-info" href="<?= base_url($data['ml_follow_proof']); ?>" target="_blank">Lihat Bukti</a>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Data Ketua Tim ML -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Ketua Tim</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td><?= $data['ketua']['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $data['ketua']['secret']; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?= $data['ketua']['kontak']; ?></td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td><?= $data['ketua']['nim']; ?></td>
                            </tr>
                            <tr>
                                <th>Asal Universitas</th>
                                <td><?= $data['ketua']['universitas']; ?></td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('admin/user/' . $data['ketua']['username']); ?>"
                                class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="text">Download Berkas</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Anggota Tim ML -->
            <?php if (isset($data['anggota_ml']) && !empty($data['anggota_ml'])): ?>
                <?php 
                $ketua_ml = array_filter($data['anggota_ml'], function($member) {
                    return $member['posisi'] == 'ketua';
                });
                $anggota_ml = array_filter($data['anggota_ml'], function($member) {
                    return $member['posisi'] == 'anggota';
                });
                $cadangan_ml = array_filter($data['anggota_ml'], function($member) {
                    return $member['posisi'] == 'cadangan';
                });
                ?>

                <!-- Ketua ML -->
                <?php if (!empty($ketua_ml)): ?>
                    <?php foreach ($ketua_ml as $ketua): ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fas fa-crown text-warning mr-2"></i>Ketua Tim ML
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $ketua['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nickname</th>
                                            <td><strong><?= $ketua['nickname']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile Legends ID</th>
                                            <td><code><?= $ketua['ml_id']; ?></code></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Anggota ML -->
                <?php if (!empty($anggota_ml)): ?>
                    <?php $no_anggota = 1; ?>
                    <?php foreach ($anggota_ml as $anggota): ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fas fa-user text-success mr-2"></i>Anggota <?= $no_anggota; ?>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $anggota['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nickname</th>
                                            <td><strong><?= $anggota['nickname']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile Legends ID</th>
                                            <td><code><?= $anggota['ml_id']; ?></code></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php $no_anggota++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Cadangan ML -->
                <?php if (!empty($cadangan_ml)): ?>
                    <?php $no_cadangan = 1; ?>
                    <?php foreach ($cadangan_ml as $cadangan): ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fas fa-user-plus text-info mr-2"></i>Cadangan <?= $no_cadangan; ?>
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $cadangan['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nickname</th>
                                            <td><strong><?= $cadangan['nickname']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile Legends ID</th>
                                            <td><code><?= $cadangan['ml_id']; ?></code></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php $no_cadangan++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <div class="text-muted">
                            <i class="fas fa-exclamation-circle fa-2x mb-3"></i>
                            <p>Belum ada data anggota tim Mobile Legends</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: // Untuk kompetisi selain ML ?>
            <!-- Data Ketua (untuk non-ML) -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Ketua</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td><?= $data['ketua']['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $data['ketua']['secret']; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?= $data['ketua']['kontak']; ?></td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td><?= $data['ketua']['nim']; ?></td>
                            </tr>
                            <tr>
                                <th>Asal Universitas</th>
                                <td><?= $data['ketua']['universitas']; ?></td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('admin/user/' . $data['ketua']['username']); ?>"
                                class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="text">Download Berkas</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Anggota (untuk non-ML) -->
            <?php if (isset($data['anggota']) && !empty($data['anggota'])): ?>
                <?php foreach ($data['anggota'] as $key => $anggota): ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Anggota <?= $key + 1; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $anggota['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?= $anggota['secret']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td><?= $anggota['kontak']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIM</th>
                                        <td><?= $anggota['nim']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Asal Universitas</th>
                                        <td><?= $anggota['universitas']; ?></td>
                                    </tr>
                                </table>
                                <div class="d-flex justify-content-end">
                                    <a href="<?= base_url('admin/user/' . $anggota['username']); ?>"
                                        class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-download"></i>
                                        </span>
                                        <span class="text">Download Berkas</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Status Verifikasi Berkas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="dropdown mb-4">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if ($data['status'] == 'on_review'): ?>
                                Sedang Diverifikasi
                            <?php elseif ($data['status'] == 'verified'): ?>
                                Sudah Diverifikasi
                            <?php elseif ($data['status'] == 'rejected'): ?>
                                Ditolak
                            <?php endif; ?>
                        </button>
                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                                href="<?= base_url('admin/terima-berkas/' . $data['tim_id']); ?>">Terima</a>
                            <a class="dropdown-item"
                                href="<?= base_url('admin/tolak-berkas/' . $data['tim_id']); ?>">Tolak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <div class="text-muted">Belum ada bukti pembayaran yang diupload.</div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if ($data['id_kompetisi'] != 1 && $data['id_kompetisi'] != 9): // Proposal hanya untuk kompetisi tertentu ?>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Berkas Proposal</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php if ($berkasProposal): ?>
                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('admin/download/' . $berkasProposal['berkas_id']); ?>"
                                class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-download"></i>
                                </span>
                                <span class="text">Download Berkas</span>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info"></i>
                                </span>
                                <span class="text">Belum di Upload</span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($data['id_kompetisi'] == 2): ?>
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Berkas Source Code</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php if ($berkasSourceCode): ?>
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('admin/download/' . $berkasSourceCode['berkas_id']); ?>"
                                    class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text">Download Berkas</span>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info"></i>
                                    </span>
                                    <span class="text">Belum di Upload</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>