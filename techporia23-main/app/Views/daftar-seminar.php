<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Daftar Seminar | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container-form">
        <h1>Daftar Seminar</h1>
        <?= validation_list_errors(); ?>
        <?= form_open('payment/seminar'); ?>
        <div class="input-wrapper">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" />
        </div>
        <div class="input-wrapper">
            <label for="kontak">Nomor Whatsapp Aktif</label>
            <input type="text" name="kontak" id="kontak" placeholder="08xxxxxxxxxx" />
        </div>
        <div class="input-wrapper">
            <label for="instansi">Asal Instansi</label>
            <input type="text" name="instansi" id="instansi" placeholder="Asal Intansi" />
        </div>
        <div class="input-wrapper">
            <label for="domisili">Domisili Tinggal</label>
            <input type="text" name="domisili" id="domisili" placeholder="Domisili Tinggal" />
        </div>
        <div class="input-wrapper">
            <label for="kategori">Kategori</label>
            <div class="select-dropdown">
                <select name="kategori" id="kategori">
                    <option value="Reguler">Reguler (Rp. 75.000)</option>
                    <option value="VIP">VIP (Rp. 115.000)</option>
                </select>
            </div>
        </div>
        <div class="input-wrapper">
            <label for="status">Status</label>
            <div class="select-dropdown">
                <select name="status" id="status">
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Lainnya" id="lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Lanjutkan Pembayaran" class="btn btn-submit" />
        <?= form_close(); ?>
    </div>
</div>

<?= $this->endSection(); ?>