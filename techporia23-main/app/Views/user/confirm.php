<?= $this->extend('user/layout'); ?>

<?= $this->section('title'); ?>Data Diri | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container-form">
        <h1>Isi Data Diri</h1>
        <p>Isi data diri kamu untuk melanjutkan</p>

        <?= validation_list_errors(); ?>

        <?= form_open_multipart('profile/confirm'); ?>
        <div class="input-wrapper">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" />
        </div>
        <div class="input-wrapper">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" placeholder="NIM" />
        </div>
        <div class="input-wrapper">
            <label for="universitas">Universitas/Sekolah (isi "-"jika bukan keduanya)</label>
            <input type="text" name="universitas" id="universitas" placeholder="Universitas" />
        </div>
        <div class="input-wrapper">
            <label for="kontak">Nomor Whatsapp</label>
            <input type="text" name="kontak" id="kontak" placeholder="08xxxxxxxxxx" />
        </div>
        <div class="input-wrapper">
            <label for="kpm">Upload KPM / KTP / Kartu Pelajar (pdf)</label>
            <input type="file" name="kpm" id="kpm"/>
        </div>
        <input type="submit" value="submit" name="confirm" class="btn btn-submit" />
        <?= form_close(); ?>
    </div>
</div>

<?= $this->endSection(); ?>