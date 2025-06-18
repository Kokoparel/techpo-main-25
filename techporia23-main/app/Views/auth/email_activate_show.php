<?= $this->extend('auth/layout'); ?>

<?= $this->section('title'); ?>Verifikasi Email | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main-section">
    <div class="auth-section">
        <h1>Verify Email</h1>
        <h2>Masukan kode verifikasi yang telah kami kirimkan ke email kamul</h2>

        <?php if (session('error')) : ?>
            <div class="alert"><?= session('error') ?></div>
        <?php endif ?>

        <form action="<?= site_url('auth/a/verify') ?>" method="post">
            <div class="input">
                <input type="text" class="input-field" name="token" inputmode="numeric" value="<?= old('email') ?>" required />
                <label class="input-label">Token</label>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <a class="logo-section" href="<?= base_url(); ?>">
        <img src="/assets/images/logo.webp" alt="Techporia 2023" />
        <h1>Technology Euphoria</h1>
    </a>
</div>

<?= $this->endSection(); ?>