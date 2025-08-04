<?= $this->extend('user/layout'); ?>

<?= $this->section('title'); ?>Dashboard | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container top" id="notifikasi">
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
    </div> 

    <div class="container" id="tim">
        <div class="container-4">
            <h1>Data Tim</h1>
            <a href="<?= base_url('profile/daftar-lomba') ?>" class="btn btn-outline-primary btn-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" height="15" width="15">
                    <path
                        d="M453-280h60v-166h167v-60H513v-174h-60v174H280v60h173v166Zm27.266 200q-82.734 0-155.5-31.5t-127.266-86q-54.5-54.5-86-127.341Q80-397.681 80-480.5q0-82.819 31.5-155.659Q143-709 197.5-763t127.341-85.5Q397.681-880 480.5-880q82.819 0 155.659 31.5Q709-817 763-763t85.5 127Q880-563 880-480.266q0 82.734-31.5 155.5T763-197.684q-54 54.316-127 86Q563-80 480.266-80Zm.234-60Q622-140 721-239.5t99-241Q820-622 721.188-721 622.375-820 480-820q-141 0-240.5 98.812Q140-622.375 140-480q0 141 99.5 240.5t241 99.5Zm-.5-340Z" />
                </svg>
                Daftar
            </a>
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
                <?php 
                // Array untuk link grup WhatsApp berdasarkan ID kompetisi
                $whatsapp_groups = [
                    1 => 'https://chat.whatsapp.com/competitive-programming-link', // Competitive Programming
                    2 => 'https://chat.whatsapp.com/web-development-link',        // Web Development
                    3 => 'https://chat.whatsapp.com/ui-ux-design-link',          // UI/UX Design
                    5 => 'https://chat.whatsapp.com/business-plan-link',         // Business Plan
                    9 => 'https://chat.whatsapp.com/mobile-legends-link'         // Mobile Legends
                ];
                ?>
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
                                                    <?= $t['ketua']['nama'] ?>
                                                    <?php if ($t['id_kompetisi'] == 9 && isset($t['ml_anggota']['ketua'])): ?>
                                                        <br><small>(Nickname: <?= $t['ml_anggota']['ketua']['nickname'] ?? '-' ?>, ID: <?= $t['ml_anggota']['ketua']['ml_id'] ?? '-' ?>)</small>
                                                    <?php endif; ?>
                                                </span>
                                            </div>

                                            <!-- Data Anggota Reguler (bukan Mobile Legends) -->
                                            <?php if ($t['id_kompetisi'] != 9): ?>
                                                <?php if ($t['anggota']): ?>
                                                    <?php foreach ($t['anggota'] as $anggota): ?>
                                                        <div class="detail">
                                                            <label>Anggota</label>
                                                            <span><?= $anggota['nama'] ?></span>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <!-- Data Anggota Mobile Legends -->
                                            <?php if ($t['id_kompetisi'] == 9): ?>
                                                <?php if (!empty($t['ml_anggota']['anggota'])): ?>
                                                    <?php foreach ($t['ml_anggota']['anggota'] as $index => $anggota): ?>
                                                        <div class="detail">
                                                            <label>Anggota <?= $index + 1 ?></label>
                                                            <span>
                                                                <?= $anggota['nama'] ?? '-' ?>
                                                                <br><small>(Nickname: <?= $anggota['nickname'] ?? '-' ?>, ID: <?= $anggota['ml_id'] ?? '-' ?>)</small>
                                                            </span>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <div class="detail">
                                                        <label>Anggota</label>
                                                        <span>Tidak ada anggota</span>
                                                    </div>
                                                <?php endif; ?>
                                                
                                                <div class="detail">
                                                    <label>Cadangan</label>
                                                    <span>
                                                        <?= $t['ml_anggota']['cadangan']['nama'] ?? '-' ?>
                                                        <br><small>(Nickname: <?= $t['ml_anggota']['cadangan']['nickname'] ?? '-' ?>, ID: <?= $t['ml_anggota']['cadangan']['ml_id'] ?? '-' ?>)</small>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tombol aksi di bagian detail dengan design yang diperbaiki -->
                            <div style="margin-top: 20px; text-align: center; border-top: 1px solid #ddd; padding-top: 15px;">
                                <?php if ($t['transaction_status'] != 'settlement' && $t['transaction_status'] != 'capture'): ?>
                                    <a href="<?= base_url('kompetisi/payment/' . $t['tim_id']) ?>"
                                        class="btn btn-outline-primary" style="margin-right: 10px;">Lanjutkan Pembayaran</a>
                                <?php elseif (($t['transaction_status'] == 'settlement' || $t['transaction_status'] == 'capture') && $t['status'] == 'verified'): ?>
                                    
                                    <!-- Tombol Grup WhatsApp dengan design menarik -->
                                    <?php if (isset($whatsapp_groups[$t['id_kompetisi']])): ?>
                                        <a href="<?= $whatsapp_groups[$t['id_kompetisi']] ?>" target="_blank" 
                                           style="
                                               background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
                                               color: white;
                                               padding: 12px 24px;
                                               border: none;
                                               border-radius: 25px;
                                               text-decoration: none;
                                               font-weight: 600;
                                               font-size: 14px;
                                               display: inline-flex;
                                               align-items: center;
                                               gap: 8px;
                                               box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
                                               transition: all 0.3s ease;
                                               margin-right: 10px;
                                               position: relative;
                                               overflow: hidden;
                                           "
                                           class="whatsapp-btn"
                                           onmouseover="this.style.transform='translateY(-2px) scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(37, 211, 102, 0.4)'"
                                           onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 15px rgba(37, 211, 102, 0.3)'">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" style="filter: drop-shadow(0 1px 2px rgba(0,0,0,0.1));">
                                                <path fill="white" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.051 3.488"/>
                                            </svg>
                                            <span style="text-shadow: 0 1px 2px rgba(0,0,0,0.1);">Join Grup WhatsApp</span>
                                            <div style="
                                                position: absolute;
                                                top: -50%;
                                                left: -50%;
                                                width: 200%;
                                                height: 200%;
                                                background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
                                                transform: rotate(45deg);
                                                transition: all 0.6s ease;
                                                opacity: 0;
                                            " class="shine-effect"></div>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div class="container bottom">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        
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
                                <option value="5">Business Plan</option>
                                <option value="9">Mobile Legends</option>
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

<!-- CSS untuk animasi WhatsApp button -->
<style>
.whatsapp-btn:hover .shine-effect {
    animation: shine 0.6s ease-in-out;
}

@keyframes shine {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
    50% { opacity: 1; }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
}

/* Responsif untuk mobile */
@media (max-width: 768px) {
    .whatsapp-btn {
        font-size: 12px !important;
        padding: 10px 18px !important;
        margin-right: 5px !important;
        margin-bottom: 10px !important;
    }
    
    .whatsapp-btn svg {
        width: 16px !important;
        height: 16px !important;
    }
}
</style>

<?= $this->endSection(); ?>