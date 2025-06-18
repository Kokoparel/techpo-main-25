<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Seminar</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Daftar Seminar</h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('errors')): ?>
            <ul class="list-group mb-4">
                <?php foreach (session()->getFlashdata('errors') as $err): ?>
                    <li class="list-group-item list-group-item-danger">
                        <?= $err; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?= form_open('admin/seminar/add', ['method' => 'POST']); ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="contoh: techphoria2023"
                required value="<?= old('username'); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="contoh: techpho@example.com"
                required value="<?= old('email'); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" required
                value="<?= old('password'); ?>">
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required
                value="<?= old('nama'); ?>">
        </div>
        <div class="form-group">
            <label for="phone">Nomor Whatsapp</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="08xxxxxxx" required
                value="<?= old('phone'); ?>">
        </div>
        <div class="form-group">
            <label for="instansi">Asal Instansi</label>
            <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" required
                value="<?= old('instansi'); ?>">
        </div>
        <div class="form-group">
            <label for="domisili">Domisili Tinggal</label>
            <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Domisili" required
                value="<?= old('domisili'); ?>">
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori">
                <option value="Reguler">Reguler</option>
                <option value="VIP">VIP</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Siswa">Siswa</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control btn btn-primary mt-3" value="Submit" />
        </div>
        <?= form_close(); ?>
    </div>
</div>

<?= $this->endSection() ?>