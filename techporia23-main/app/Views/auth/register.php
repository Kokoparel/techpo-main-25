<?= $this->extend('auth/layout'); ?>

<?= $this->section('title'); ?>Register | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main-section">
    <div class="auth-section">
        <h1>Register Account</h1>
        <h2>Create your account</h2>

        <?php if (session('error') !== null) : ?>
            <div class="alert"></div><?= session('error') ?></div>
        <?php elseif (session('errors') !== null) : ?>
            <div class="alert">
                <?php if (is_array(session('errors'))) : ?>
                    <?php foreach (session('errors') as $error) : ?>
                        <?= $error ?>
                        <br>
                    <?php endforeach ?>
                <?php else : ?>
                    <?= session('errors') ?>
                <?php endif ?>
            </div>
        <?php endif ?>

        <form action="<?= url_to('register') ?>" method="post">
            <div class="input">
                <input type="text" class="input-field" name="email" value="<?= old('email') ?>" required />
                <label class="input-label">Email</label>
            </div>
            <div class="input">
                <input type="text" class="input-field" name="username" value="<?= old('username') ?>" required />
                <label class="input-label">Username</label>
            </div>
            <div class="input">
                <input type="password" class="input-field" name="password" required />
                <label class="input-label">Password</label>
            </div>
            <div class="input">
                <input type="password" class="input-field" name="password_confirm" required />
                <label class="input-label">Confirm password</label>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="<?= url_to('login') ?>">Login</a></p>
    </div>
    <a class="logo-section" href="<?= base_url(); ?>">
        <img src="/assets/images/logo24.webp" alt="Techporia 2024" />
        <h1>Sinergi Fest</h1>
    </a>
</div>

<?= $this->endSection(); ?>