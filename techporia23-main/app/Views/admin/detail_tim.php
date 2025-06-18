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
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Ketua</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>
                                <?= $data['ketua']['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?= $data['ketua']['secret']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>
                                <?= $data['ketua']['kontak']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>
                                <?= $data['ketua']['nim']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Asal Universitas</th>
                            <td>
                                <?= $data['ketua']['universitas']; ?>
                            </td>
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

        <?php foreach ($data['anggota'] as $key => $anggota): ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Anggota
                        <?= $key + 1; ?>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <td>
                                    <?= $anggota['nama']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <?= $anggota['secret']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>
                                    <?= $anggota['kontak']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>
                                    <?= $anggota['nim']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Asal Universitas</th>
                                <td>
                                    <?= $anggota['universitas']; ?>
                                </td>
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
        <?php if ($data['id_kompetisi'] != 1): ?>
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