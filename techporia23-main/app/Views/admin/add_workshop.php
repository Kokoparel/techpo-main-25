<?= $this->extend('admin/layout/layout_v2'); ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Peserta Workshop</h1>
    <a href="<?= base_url('admin/workshop'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
    </a>
</div>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Terdapat kesalahan dalam input:
        <ul class="mb-0 mt-2">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<!-- Form Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peserta Workshop</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/workshop/add'); ?>" method="POST" id="workshopForm">
            <?= csrf_field(); ?>
            
            <div class="row">
                <div class="col-md-6">
                    <!-- Informasi Akun Login -->
                    <div class="alert alert-primary">
                        <h6><i class="fas fa-user-lock"></i> <strong>Data Akun Login Peserta</strong></h6>
                        <p class="mb-0 small">Peserta akan menggunakan username dan password ini untuk login dan mengakses tiket serta invoice mereka.</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="username"><strong>Username Login</strong></label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>" required>
                        <small class="form-text text-muted">Username unik untuk login peserta ke sistem</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="password"><strong>Password Login</strong></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <small class="form-text text-muted">Password untuk login peserta (min. 8 karakter)</small>
                    </div>
                    
                    <hr class="my-4">
                    
                    <!-- Informasi Data Peserta -->
                    <div class="alert alert-success">
                        <h6><i class="fas fa-user-graduate"></i> <strong>Data Peserta Workshop</strong></h6>
                        <p class="mb-0 small">Informasi peserta yang akan ditampilkan di tiket dan sertifikat.</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama"><strong>Nama Lengkap</strong></label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" required>
                        <small class="form-text text-muted">Nama yang akan tampil di tiket dan sertifikat</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="email"><strong>Email Peserta</strong></label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= old('email'); ?>" required>
                        <small class="form-text text-muted">Email untuk pengiriman tiket dan notifikasi</small>
                        <div id="emailError" class="invalid-feedback" style="display: none;">
                            <i class="fas fa-exclamation-triangle"></i> Email admin tidak boleh digunakan untuk pendaftaran peserta workshop!
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone"><strong>No. Telepon</strong></label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= old('phone'); ?>" required>
                        <small class="form-text text-muted">Nomor telepon yang bisa dihubungi</small>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <!-- Informasi Data Workshop -->
                    <div class="alert alert-info">
                        <h6><i class="fas fa-graduation-cap"></i> <strong>Informasi Workshop</strong></h6>
                        <p class="mb-0 small">Detail kategori dan status peserta dalam workshop.</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="instansi"><strong>Instansi/Asal Sekolah</strong></label>
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?= old('instansi'); ?>">
                        <small class="form-text text-muted">Nama instansi, sekolah, atau universitas</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="domisili"><strong>Domisili/Kota Asal</strong></label>
                        <input type="text" class="form-control" id="domisili" name="domisili" value="<?= old('domisili'); ?>">
                        <small class="form-text text-muted">Kota atau daerah tempat tinggal</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="status"><strong>Status Peserta</strong></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Mahasiswa" <?= old('status') == 'Mahasiswa' ? 'selected' : ''; ?>>Mahasiswa</option>
                            <option value="Siswa" <?= old('status') == 'Siswa' ? 'selected' : ''; ?>>Siswa</option>
                            <option value="Lainnya" <?= old('status') == 'Lainnya' ? 'selected' : ''; ?>>Lainnya</option>
                        </select>
                        <small class="form-text text-muted">Status pendidikan peserta saat ini</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="kategori"><strong>Kategori Workshop</strong></label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Reguler" <?= old('kategori') == 'Reguler' ? 'selected' : ''; ?>>Reguler - Rp. 75.000</option>
                            <option value="VIP" <?= old('kategori') == 'VIP' ? 'selected' : ''; ?>>VIP - Rp. 115.000</option>
                        </select>
                        <small class="form-text text-muted">Pilih paket workshop yang diinginkan</small>
                    </div>
                    
                    <!-- Informasi Penting -->
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-info-circle"></i> <strong>Informasi Penting</strong></h6>
                        <ul class="mb-0 small">
                            <li>Peserta akan otomatis mendapat status pembayaran <strong>"Lunas"</strong></li>
                            <li>Tiket dapat langsung dibuat setelah data tersimpan</li>
                            <li>Email dan SMS notifikasi akan dikirim otomatis</li>
                            <li>Peserta dapat login dengan username dan password yang dibuat</li>
                        </ul>
                    </div>
                    
                    <div class="alert alert-danger">
                        <h6><i class="fas fa-exclamation-triangle"></i> <strong>Peringatan</strong></h6>
                        <p class="mb-0 small">Email admin tidak diperbolehkan untuk pendaftaran peserta workshop.</p>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="form-group text-right">
                <button type="button" class="btn btn-secondary" onclick="history.back()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('workshopForm');
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const submitBtn = document.getElementById('submitBtn');
    
    // Daftar email admin yang tidak boleh digunakan
    // Sesuaikan dengan email admin yang ada di sistem Anda
    const adminEmails = [
        '<?= auth()->user()->email ?? ''; ?>', // Email admin yang sedang login
        // Tambahkan email admin lainnya jika ada
        // 'admin@example.com',
        // 'superadmin@example.com'
    ].filter(email => email.length > 0); // Filter email kosong
    
    // Fungsi untuk validasi email
    function validateEmail() {
        const email = emailInput.value.toLowerCase().trim();
        const isAdminEmail = adminEmails.some(adminEmail => 
            adminEmail.toLowerCase() === email
        );
        
        if (isAdminEmail) {
            emailInput.classList.add('is-invalid');
            emailError.style.display = 'block';
            submitBtn.disabled = true;
            return false;
        } else {
            emailInput.classList.remove('is-invalid');
            emailError.style.display = 'none';
            submitBtn.disabled = false;
            return true;
        }
    }
    
    // Event listener untuk input email
    emailInput.addEventListener('input', validateEmail);
    emailInput.addEventListener('blur', validateEmail);
    
    // Event listener untuk form submit
    form.addEventListener('submit', function(e) {
        if (!validateEmail()) {
            e.preventDefault();
            
            // Tampilkan alert tambahan
            Swal.fire({
                title: 'Email Tidak Valid!',
                text: 'Email admin tidak boleh digunakan untuk pendaftaran peserta workshop.',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc3545'
            });
            
            // Focus ke input email
            emailInput.focus();
        }
    });
    
    // Validasi awal saat halaman dimuat (untuk old values)
    if (emailInput.value) {
        validateEmail();
    }
});
</script>

<!-- SweetAlert2 CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.min.css">

<?= $this->endSection() ?>