<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Konfirmasi Pembayaran | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="payment">
        <div class="info">
            <h1>Konfirmasi Pembayaran</h1>
            <h2>User Info</h2>
            <table class="details-table">
                <tr>
                    <td>Order ID</td>
                    <td>
                        <?= $data['order_id']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>
                        <?= $data['name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>
                        <?= $data['phone']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <?= $data['email']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>
                        <?= $data['instansi']; ?>
                    </td>
                </tr>
            </table>
            <table style="margin-top: 4rem;">
                <thead>
                    <tr>
                        <th style="width: 40%;">Nama Item</th>
                        <th style="width: 25%;">Harga</th>
                        <th style="width: 10%;">Jumlah</th>
                        <th style="width: 25%;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($item as $t): ?>
                        <tr style="color: var(--text-dark); text-align: center;">
                            <td style="text-align: left;">
                                <?= $t['nama']; ?>
                            </td>
                            <td>
                                <?= $t['harga']; ?>
                            </td>
                            <td>
                                <?= $t['jumlah']; ?>
                            </td>
                            <td style="text-align: right;">
                                <?= $t['total']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a class="btn btn-info" style="float: right;"
                onclick="return confirm('Apakah kamu yakin? Membatalkan pembayaran akan menghapus data pendaftaran')"
                href="<?= base_url('payment/cancel/' . $type . '/' . $data['order_id']); ?>">Cancel Payment</a>
        </div>
        <div class="checkout" id="snap-container"></div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= getenv('CLIENT_KEY') ?>"></script>
<script type="text/javascript">
    window.snap.embed('<?= $snap_token; ?>', {
        embedId: 'snap-container',
        onClose: function () {
            alert('Transaction Canceled');
        },
    });
</script>

<?= $this->endSection(); ?>