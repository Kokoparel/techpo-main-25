<?= $this->extend('user/layout'); ?>

<?= $this->section('title'); ?>Daftar Lomba | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container-form" style="display:flex; flex-direction:column; gap:1rem;">
        <h1>Daftar Kompetisi Technology Euphoria</h1>

        <?= validation_list_errors(); ?>

        <div class="btn-group">
            <button class="tab-link active btn btn-info btn-lg" onclick="openform(event, 'daftar')">Daftar Tim</button>
            <button class="tab-link btn btn-info btn-lg" onclick="openform(event, 'gabung')">Gabung Tim</button>
        </div>
        <div id="daftar" class="tab-content" style="display: block;">
            <?= form_open('profile/daftar-lomba'); ?>
            <div class="input-wrapper">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim" required>
            </div>
            <div class="input-wrapper">
                <label for="universitas">Universitas/Sekolah (isi"-" jika bukan keduanya)</label>
                <input type="text" name="universitas" id="universitas" value="<?= $userData['universitas'] ?>" disabled>
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
                                <option value="6">Painting </option>
                                <option value="7">Dance competition</option>
                                <option value="8">Band/acoustic </option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Daftar" class="btn btn-submit" />
            <p>*NB: Pembuat tim otomatis menjadi ketua tim</p>
            <?= form_close(); ?>
        </div>
        <div id="gabung" class="tab-content">
            <p>Gabung dengan tim yang sudah dibuat ketua kamu dengan memasukkan ID tim</p>
            <?= form_open('dashboard/join-tim'); ?>
            <div class="input-wrapper">
                <label for="kode_tim">Kode unik tim</label>
                <input type="text" name="kode_tim" id="kode_tim" placeholder="Kode unik tim" required>
            </div>
            <input type="submit" value="Daftar" class="btn btn-submit" />
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>