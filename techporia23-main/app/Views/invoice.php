<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Transaksi Berhasil | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div id="invoice">
        <h1
            style="background-color: #68a504; font-family: 'Mechsuit'; margin: 0; padding: 2rem; font-size: 1.5rem; font-weight: 700; text-align: center;">
            TECHNOLOGY EUPHORIA</h1>
        <table style="width: 100%; margin: 1rem 0;">
            <tr>
                <td style="text-align: center;">
                    <?= date('F j, Y, g:i a', strtotime($transaction['transaction_time'])); ?>
                </td>
            </tr>
            <tr style=" font-size: 2.5rem; font-weight: 500;">
                <th>
                    <?= $harga; ?>
                </th>
            </tr>
        </table>
        <div style="display: flex; flex-direction: column; gap: 1rem; padding: 2rem;">
            <div style="display: flex; justify-content: space-between;">
                <span style="color: #838383;">Status transaksi</span>
                <span
                    style="outline: 1px solid #06d000; padding: 0.2rem 1.2rem; color: #06d000; border-radius: 2px; display: inline;">
                    Berhasil
                </span>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <span style="color: #838383;">Order ID</span>
                <span style="font-weight: 500; text-align: right;">
                    <?= $data['order_id']; ?>
                </span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 0.2rem">
                <span style="color: #838383;">Metode Bayar</span>
                <span style="font-weight: 500; text-align: right;">
                    <?= strtoupper($transaction['payment_type']); ?>
                </span>
            </div>
        </div>

        <hr style="margin: 1rem 0;" />

        <div style="padding: 0 2rem; margin-top: 2rem;">
            <p style="text-align: justify; font-size: 1rem; margin-bottom: 1.5rem;">Terimakasih telah bertransaksi!
                Pembayaran anda telah
                diterima dengan rincian sebagai berikut :</p>
            <h3>Rincian Pembayaran</h2>
                <table style="width: 100%; border-spacing: 1rem;">
                    <tr>
                        <th style="text-align: left;">Total Pembayaran</th>
                        <td>
                            <?= $harga; ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Waktu Pembayaran</th>
                        <td>
                            <?= date('F j, Y, g:i a', strtotime($transaction['transaction_time'])); ?>
                        </td>
                    </tr>
                </table>
                <h3>Rincian Pesanan</h3>
                <table style="width: 100%; border-spacing: 1rem;">
                    <tr>
                        <th style="text-align: left;">Tiket Seminar Technology Euphoria 2023
                            <?= $data['kategori']; ?>
                        </th>
                        <td>
                            <?= $harga; ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">Total Belanja</th>
                        <td>
                            <?= $harga; ?>
                        </td>
                    </tr>
                </table>
        </div>

        <hr style="margin: 2rem 0;" />

        <p style="font-size: 0.9rem; padding: 0 1rem; text-align: justify; margin-bottom: 2rem;">Tiket anda telah kami
            kirimkan ke email anda, jika anda belum menerimanya anda bisa mendownload tiketnya <a
                href="<?= base_url('seminar/tiket/download'); ?>" style="color: #97fb57">disini</a>.</p>
    </div>
</div>

<?= $this->endSection(); ?>