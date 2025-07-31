<?= $this->extend('auth/layout'); ?>

<?= $this->section('title'); ?>Verifikasi Email | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main-section">
    <div class="auth-section">
        <div class="form-card">
        <h1>VERIFY</h1>
        <h2>Enter the verification code that we sent to your email</h2>

        <?php if (session('error')) : ?>
            <div class="alert"><?= session('error') ?></div>
        <?php endif ?>

        <form action="<?= site_url('auth/a/verify') ?>" method="post">
            <div class="input">
                <label class="input-label">CODE</label>
                <input type="text" class="input-field" name="token" inputmode="numeric" value="<?= old('email') ?>" placeholder="CODE" required />
            </div>
            <button type="submit">SUBMIT</button>
        </form>
        </div>
    </div>
    <a class="logo-section" href="<?= base_url(); ?>">
        <img src="/assets/images/sinergifest.png" alt="Sinergi Fest 2025" />
        <h1>SINERGI FEST</h1>
    </a>
</div>

<?= $this->endSection(); ?>