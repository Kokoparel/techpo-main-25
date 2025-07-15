<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Workshop | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="section light" style="padding: 3rem 0;">
        <div class="detail-horizontal">
            <div class="image">
                <img src="/assets/images/workshop.webp" alt="Workshop Technology Euphoria" />
            </div>
            <div class="keterangan">
                <h1>WORKSHOP</h1>
                <h1>SINERGI FEST 2025</h1>
                <div class="paragraphs">
                    <p>Workshop eksklusif Technology Euphoria adalah ruang edukatif untuk mengasah keterampilan praktikal dalam dunia digital & teknologi. Diperuntukkan bagi mahasiswa, pelajar, dan masyarakat umum yang ingin menambah wawasan secara langsung dari para praktisi.</p>
                    <p>Acara ini diselenggarakan oleh Fakultas Ilmu Komputer Universitas Sriwijaya sebagai bagian dari rangkaian Technology Euphoria 2023 yang bertujuan untuk membentuk SDM unggul melalui pemahaman dan praktek teknologi terkini.</p>
                </div>
                <table class="details-table">
                    <tbody>
                        <tr>
                            <td><i class='bx bx-calendar-alt'></i> Tanggal Pelaksanaan</td>
                            <td>Minggu, 22 Oktober 2023</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-stopwatch'></i> Jam Pelaksanaan</td>
                            <td>09.00 WIB - Selesai</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-map'></i> Tempat Pelaksanaan</td>
                            <td>Lab Komputer Fakultas Ilmu Komputer Universitas Sriwijaya</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-user-voice'></i> Pemateri</td>
                            <td>Dewangga Praditya (Software Engineer, Traveloka)</td>
                        </tr>
                        <tr>
                            <td><i class='bx bxs-microphone'></i> Hosted by</td>
                            <td>Putri Yuliana</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-purchase-tag-alt'></i> Biaya Pendaftaran</td>
                            <td>Reguler - Rp. 75.000<br />VIP - Rp. 115.000</td>
                        </tr>
                    </tbody>
                </table>
                <div class="paragraphs">
                    <p><i class='bx bx-phone'></i> Contact Person</p>
                    <ol>
                        <li>0896-0000-1234 (Rizky Maulana)</li>
                    </ol>
                </div>
                <?php if ($isOrdered) : ?>
                    <a href="<?= base_url('workshop/tiket'); ?>" class="btn btn-secondary">Lihat Invoice</a>
                    <a href="https://chat.whatsapp.com/ABC123WorkshopGroup" target="_blank"
                        class="btn btn-secondary" style="margin-left: 2rem;">Join Grup WhatsApp</a>
                <?php else : ?>
                    <a href="<?= base_url('payment/workshop'); ?>" class="btn btn-secondary">Daftar Workshop</a>
                <?php endif; ?>
            </div>
        </div> 
    </div>
</div>

<?= $this->endSection(); ?>
