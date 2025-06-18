<?= $this->extend('user/layout'); ?>

<?= $this->section('title'); ?>Dashboard | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <!-- <div class="container top" id="notifikasi">
        <h1>Notifikasi</h1>
        <?php if ($notifikasi == null): ?>
            <p style="margin-top: 1rem;">
                Belum ada notifikasi ~
            </p>
        <?php else: ?>
            <table class="table-toggle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Notifikasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notifikasi as $no => $notif): ?>
                        <tr class="notif-item">
                            <td style="text-align: center">
                                <?= $no + 1 ?>
                            </td>
                            <td><strong>
                                    <?= $notif['nama'] ?>
                                </strong> Ingin bergabung di tim
                                <?= $notif['nama_tim'] ?>
                            </td>
                            <td style="text-align: center"><button class="btn btn-primary"
                                    id="notif-detail-button">Detail</button></td>
                        </tr>
                        <tr class="notif-detail">
                            <td colspan="3">
                                <div class="container-3">
                                    <div class="detail-grid">
                                        <div class="detail-flex">
                                            <span>Nama</span>
                                            <span>NIM</span>
                                            <span>Universitas</span>
                                        </div>
                                        <div class="detail-flex">
                                            <p>
                                                <?= $notif['nama'] ?>
                                            </p>
                                            <p>
                                                <?= $notif['nim'] ?>
                                            </p>
                                            <p>
                                                <?= $notif['universitas'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?= form_open('/profile/terima-anggota', ['class' => 'container-2']); ?>
                                    <input type="hidden" name="id" value="<?= $notif['notifikasi_id'] ?>">
                                    <input type="hidden" name="tim_id" value="<?= $notif['tim_id'] ?>">
                                    <input type="hidden" name="peminta" value="<?= $notif['peminta'] ?>">
                                    <div class="container-2">
                                        <input class="btn btn-danger" type="submit" name="action" value="Tolak" />
                                        <input class="btn btn-success" type="submit" name="action" value="Terima" />
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div> -->

    <div class="container" id="tim">
        <div class="container-4">
            <h1>Data Tim</h1>
            <button class="btn btn-outline-primary btn-icon" id="daftar-lomba-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" height="15" width="15">
                    <path
                        d="M453-280h60v-166h167v-60H513v-174h-60v174H280v60h173v166Zm27.266 200q-82.734 0-155.5-31.5t-127.266-86q-54.5-54.5-86-127.341Q80-397.681 80-480.5q0-82.819 31.5-155.659Q143-709 197.5-763t127.341-85.5Q397.681-880 480.5-880q82.819 0 155.659 31.5Q709-817 763-763t85.5 127Q880-563 880-480.266q0 82.734-31.5 155.5T763-197.684q-54 54.316-127 86Q563-80 480.266-80Zm.234-60Q622-140 721-239.5t99-241Q820-622 721.188-721 622.375-820 480-820q-141 0-240.5 98.812Q140-622.375 140-480q0 141 99.5 240.5t241 99.5Zm-.5-340Z" />
                </svg>
                Daftar
            </button>
        </div>
        <table class="table-toggle">
            <thead>
                <tr>
                    <th>Kode Tim</th>
                    <th>Nama Tim</th>
                    <th>Kompetisi</th>
                    <th>Status Pembayaran</th>
                    <th>Verifikasi Berkas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tim as $t): ?>
                    <tr class="tim-info">
                        <td style="text-align: center; width: 10%;">
                            <?= $t['tim_id']; ?>
                        </td>
                        <td style="text-align: center; width: 15%;">
                            <?= $t['nama_tim']; ?>
                        </td>
                        <td style="text-align: center; width: 30%;">
                            <?= $t['nama_kompetisi']; ?>
                        </td>
                        <td style="text-align: center; width: 20%;">
                            <?php if ($t['transaction_status'] == 'pending' || $t['transaction_status'] == 'not_start'): ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php elseif ($t['transaction_status'] == 'capture' || $t['transaction_status'] == 'settlement'): ?>
                                <span class="badge badge-success">Diterima</span>
                            <?php elseif ($t['transaction_status'] == 'expire'): ?>
                                <span class="badge badge-danger">Expired</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center; width: 20%;">
                            <?php if ($t['status'] == 'on_review'): ?>
                                <span class="badge badge-warning">On Review</span>
                            <?php elseif ($t['status'] == 'verified'): ?>
                                <span class="badge badge-success">Diterima</span>
                            <?php elseif ($t['status'] == 'rejected'): ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: right; width: 5%;">
                            <?php if ($t['transaction_status'] != 'settlement' && $t['transaction_status'] != 'capture'): ?>
                                <a href="<?= base_url('kompetisi/payment/' . $t['tim_id']) ?>" class="btn btn-outline-primary">Lanjutkan Pembayaran</a>
                            <?php elseif (!in_array($t['id_kompetisi'], [6, 7, 8]) && $t['status'] == 'verified'): ?>
                                <a href="<?= base_url('profile/submission?id=' . $t['tim_id']) ?>" class="btn btn-outline-primary">Submission</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr class="tim-detail">
                        <td colspan="6" class="anggota-detail">
                            <div class="card-flex">
                                <div class="card">
                                    <h1 class="card-title">Data Tim</h1>
                                    <div class="detail">
                                        <label>ID Tim</label>
                                        <?= $t['tim_id']; ?>
                                    </div>
                                    <div class="detail">
                                        <label>Nama Tim</label>
                                        <?= $t['nama_tim']; ?>
                                    </div>
                                    <div class="detail">
                                        <label>Cabang Kompetisi</label>
                                        <?= $t['nama_kompetisi']; ?>
                                    </div>
                                </div>
                                <div class="card-grid-wrapper">
                                    <h1 class="card-title">Data Anggota</h1>
                                    <div class="card-grid">
                                        <div class="card">
                                            <div class="detail">
                                                <label>Ketua Tim</label>
                                                <span>
                                                    <?= $t['ketua']['nama'] ?><span>
                                            </div>
                                            <?php if ($t['anggota']): ?>
                                                <?php foreach ($t['anggota'] as $anggota): ?>
                                                    <div class="detail">
                                                        <label>Anggota</label>
                                                        <span>
                                                            <?= $anggota['nama'] ?><span>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="float: right;">
                                <?php if ($t['transaction_status'] != 'settlement' && $t['transaction_status'] != 'capture'): ?>
                                    <a href="<?= base_url('kompetisi/payment/' . $t['tim_id']) ?>"
                                        class="btn btn-outline-primary">Lanjutkan Pembayaran</a>
                                <?php elseif (($t['id_kompetisi'] == 2 || $t['id_kompetisi'] == 3 || $t['id_kompetisi'] == 5) && $t['status'] == 'verified'): ?>
                                    <a href="<?= base_url('profile/submission?id=' . $t['tim_id']) ?>"
                                        class="btn btn-outline-primary">Submission</a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div class="container bottom">
        <h1>Pengaturan Akun</h1>
        <?= form_open('profile/ubah-password'); ?>
        <div class="input-wrapper-horizontal">
            <input type="password" id="password" name="password" placeholder="Ubah Password" />
            <button type="submit" class="btn btn-danger">Ubah</button>
        </div>
        <?= form_close(); ?>
        <?= form_open('profile/confirm'); ?>
        <div class="input-wrapper">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $userData['nama'] ?>" />
        </div>
        <div class="input-wrapper">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" placeholder="NIM" value="<?= $userData['nim'] ?>" />
        </div>
        <div class="input-wrapper">
            <label for="universitas">Universitas/Sekolah (isi "-"jika bukan keduanya)</label>
            <input type="text" name="universitas" id="universitas" placeholder="Universitas"
                value="<?= $userData['universitas'] ?>" />
        </div>
        <div class="input-wrapper">
            <label for="kontak">Nomor Whatsapp</label>
            <input type="text" name="kontak" id="kontak" placeholder="08xxxxxxxxxx"
                value="<?= $userData['kontak'] ?>" />
        </div>
        <input type="submit" value="Change" name="change" class="btn btn-submit" />
        <?= form_close(); ?>
    </div>
</div>

<div class="modal" id="daftar-lomba-modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h1>Daftar Lomba</h1>
        </div>
        <div class="modal-body">
            <div class="btn-group">
                <button class="tab-link active btn btn-info btn-lg" onclick="openform(event, 'daftar')">Daftar
                    Tim</button>
            </div>
            <div id="daftar" class="tab-content" style="display: block;">
                <h2>Daftarkan Tim</h3>
                    <?= form_open('profile/daftar-lomba'); ?>
                    <div class="input-wrapper">
                        <label for="nama_tim">Nama Tim</label>
                        <input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim" required>
                    </div>
                    <div class="input-wrapper">
                        <label for="universitas">Universitas</label>
                        <input type="text" name="universitas" id="universitas" value="<?= $userData['universitas'] ?>"
                            disabled>
                    </div>
                    <div class="input-wrapper">
                        <label for="kompetisi">Cabang Kompetisi</label>
                        <div class="select-dropdown">
                            <select name="kompetisi" id="kompetisi">
                            <option value="1">Competitive Programming</option>
                                <option value="2">Web Development</option>
                                <option value="3">UI/UX Design</option>
                                <option value="4">Essay</option>
                                <option value="5">Business Plan</option>
                                <option value="6">Painting</option>
                                <option value="7">Dance Creation</option>
                                <option value="8">Band / Acoustic

</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Daftar" class="btn btn-submit" />
                    <p>*NB: Pembuat tim otomatis menjadi ketua tim</p>
                    <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>