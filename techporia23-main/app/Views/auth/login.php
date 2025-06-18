<?= $this->extend('auth/layout'); ?>

<?= $this->section('title'); ?>Login | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main-section">
    <div class="auth-section">
        <h1>Login</h1>
        <h2>Continue with your account</h2>

        <?php if (session('error') !== null) : ?>
            <div class="alert"><?= session('error') ?></div>
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

        <form action="<?= url_to('login') ?>" method="post">
            <div class="input">
                <input type="text" class="input-field" name="email" value="<?= old('email') ?>" required />
                <label class="input-label">Email</label>
            </div>
            <div class="input">
                <input type="password" class="input-field" id="password" name="password" required />
                <label class="input-label">Password</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="<?= url_to('register') ?>">Register</a></p>
    </div>
    <a class="logo-section" href="<?= base_url(); ?>">
        <img src="/assets/images/logo24.webp" alt="Techporia 2024" />
        <h1>Sinergi Fest</h1>
    </a>
</div>

<?= $this->endSection(); ?>