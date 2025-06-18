<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Tiket Seminar | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $client_key; ?>"></script>
    
    <div class="section">
        <button id="pay-button" class="btn btn-fancy">Bayar</button>
        <p><?= $exception; ?></p>
        <pre style="color: white;"><?php print_r($transactions); ?></pre>
        <div id="snap-container"></div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.embed('<?= $snap_token; ?>', {
                embedId: 'snap-container'
            });
        });
    </script>
</div>

<?= $this->endSection(); ?>