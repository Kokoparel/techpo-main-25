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
            <a class="btn btn-info" href="<?= base_url('profile'); ?>" style="margin-right: 1rem; float: left;">
                Kembali
            </a>
        </div>
        <div class="checkout" id="manual-payment" style="padding: 1.5rem; background: var(--bg-white); border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
            <h2 style="margin-bottom: .5rem;">Informasi Pembayaran WORKSHOP</h2>
            <p style="color: var(--text-dark); margin-bottom: .75rem;">Silakan lakukan pembayaran sesuai total tagihan ke salah satu channel berikut:</p>
            <ul style="margin-left: 1rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                <li><b>Transfer Bank (BCA)</b>: 1234567890 a.n. Technology Euphoria</li>
                <li><b>Transfer Bank (BRI)</b>: 9876543210 a.n. Technology Euphoria</li>
                <li><b>E-Wallet (Dana/OVO/Gopay)</b>: 0812-0000-0000 a.n. Technology Euphoria</li>
            </ul>
            <p style="color: var(--text-dark); margin-bottom: 1.25rem;">Setelah melakukan pembayaran, upload bukti pembayaran pada form di bawah untuk diverifikasi panitia. Proses verifikasi maksimal 1x24 jam.</p>

            <h3 style="margin-bottom: .75rem;">Upload Bukti Pembayaran</h3>
            <form id="proof-form" action="<?= base_url('payment/upload-proof'); ?>" method="post" enctype="multipart/form-data" style="display: block;">
                <input type="hidden" name="order_id" value="<?= $data['order_id']; ?>" />
                <input type="hidden" name="type" value="<?= $type; ?>" />
                <div style="margin-bottom: .75rem;">
                    <input id="payment-proof-input" type="file" name="payment_proof" accept="image/png,image/jpeg,application/pdf" required />
                    <div style="font-size: .85rem; color: #666; margin-top: .25rem;">Format: JPG/PNG/PDF, maks 5MB.</div>
                </div>
                <div id="proof-preview" style="display:none; align-items: center; gap: .75rem; margin-bottom: 1rem;">
                    <div id="proof-thumb" style="width: 64px; height: 64px; border: 1px dashed #ddd; border-radius: 8px; background-size: cover; background-position: center; display:flex; align-items:center; justify-content:center; color:#666; font-size:12px;">Preview</div>
                    <div style="color: var(--text-dark);">
                        <div id="proof-name" style="font-weight:600;"></div>
                        <div id="proof-size" style="font-size:.85rem; color:#666;"></div>
                        <div style="font-size:.85rem; color:#2e7d32; margin-top:.25rem;">Berkas siap dikirim ✔</div>
                    </div>
                </div>
                <button id="proof-submit" class="btn btn-info" type="submit" disabled>Kirim Bukti Pembayaran</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function(){
        var input = document.getElementById('payment-proof-input');
        var preview = document.getElementById('proof-preview');
        var thumb = document.getElementById('proof-thumb');
        var nameEl = document.getElementById('proof-name');
        var sizeEl = document.getElementById('proof-size');
        var submitBtn = document.getElementById('proof-submit');
        var form = document.getElementById('proof-form');

        function formatBytes(bytes){
            if (bytes === 0) return '0 B';
            var k = 1024, sizes = ['B','KB','MB','GB'], i = Math.floor(Math.log(bytes)/Math.log(k));
            return parseFloat((bytes/Math.pow(k,i)).toFixed(2)) + ' ' + sizes[i];
        }

        input.addEventListener('change', function(){
            var file = input.files && input.files[0];
            if(!file){
                preview.style.display = 'none';
                submitBtn.disabled = true;
                return;
            }
            nameEl.textContent = file.name;
            sizeEl.textContent = formatBytes(file.size);
            var isImage = /^image\//.test(file.type);
            if(isImage){
                var reader = new FileReader();
                reader.onload = function(e){
                    thumb.style.backgroundImage = 'url(' + e.target.result + ')';
                    thumb.textContent = '';
                };
                reader.readAsDataURL(file);
            } else {
                thumb.style.backgroundImage = 'none';
                thumb.textContent = 'PDF';
            }
            preview.style.display = 'flex';
            submitBtn.disabled = false;
        });

        form.addEventListener('submit', function(){
            submitBtn.disabled = true;
            var original = submitBtn.textContent;
            submitBtn.textContent = 'Mengirim...';
            setTimeout(function(){ submitBtn.textContent = original; }, 5000);
        });
    })();
</script>


<?= $this->endSection(); ?>