<?= $this->extend('auth/layout'); ?>

<?= $this->section('title'); ?>Login | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main-section">
    <div class="auth-section">
        <div class="form-card">
        <h1>LOGIN</h1>
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
                <label class="input-label">EMAIL</label>
                <input type="text" class="input-field" name="email" value="<?= old('email') ?>" placeholder="EMAIL" required />
            </div>
            <div class="input">
                <label class="input-label">PASSWORD</label>
                <input type="password" class="input-field" id="password" name="password" placeholder="PASSWORD" required />
                <button type="button" class="password-toggle" onclick="togglePassword('password', this)">    
                    <i class="fa-solid fa-eye"></i>
                </button>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="<?= url_to('register') ?>">Register</a></p>
        </div>
    </div>
    <a class="logo-section" href="<?= base_url(); ?>">
        <img src="/assets/images/sinergifest.png" alt="Sinergi Fest 2025" />
        <h1>SINERGI FEST</h1>
    </a>    
</div>

<script>
function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

<?= $this->endSection(); ?>