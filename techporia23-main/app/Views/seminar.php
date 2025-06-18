<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Seminar | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="section light" style="padding: 3rem 0;">
        <div class="comingsoon">
            <img src="<?php echo base_url('assets/images/MASKOT 4.png') ?>" alt="maskot" class="onscroll-r" style="--delay: 0;" />
            <h1>Coming Soon</h1>
        </div>
        <!-- <div class="detail-horizontal">
            <div class="image">
                <img src="/assets/images/seminar.webp" alt="Seminar Nasional" />
            </div>
            <div class="keterangan">
                <h1>SEMINAR NASIONAL</h1>
                <h1>TECHNOLOGY EUPHORIA 2023</h1>
                <div class="paragraphs">
                    <p>Dengan tema: “Expressing, Educating, and Inspiring change through Digital Creative in the Era of
                        5.0”, yang akan membahas tentang pentingnya teknologi pada perkembangan dunia untuk meraih
                        prestasi.</p>
                    <p>Technology Euphoria diselenggarakan oleh seluruh Keluarga Mahasiswa Fakultas Ilmu Komputer
                        Universitas Sriwijaya. Technology Euphoria (Techphoria) merupakan acara tahunan dengan kompetisi
                        sebagai ajang edukatif bagi perguruan tinggi se-Indonesia yang mefasilitasi kebutuhan dalam
                        meningkatkan kesadaran masyarakat tentang pentingnya peran teknologi informasi.</p>
                </div>
                <table class="details-table">
                    <tbody>
                        <tr>
                            <td><i class='bx bx-calendar-alt'></i> Tanggal Pelaksanaan</td>
                            <td>Sabtu, 21 Oktober 2023</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-stopwatch'></i> Jam Pelaksanaan</td>
                            <td>09.00 WIB - Selesai</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-map'></i> Tempat Pelaksanaan</td>
                            <td>Gedung Diklat Fakultas Ilmu Komputer Universitas Sriwijaya</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-user-voice'></i> Pembicara</td>
                            <td>Leonardo Edwin (Content Creator)</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-user-voice'></i> Pembicara</td>
                            <td>Angga Fauzan (CEO MySkill)</td>
                        </tr>
                        <tr>
                            <td><i class='bx bxs-microphone'></i> Hosted by</td>
                            <td>Amelia Tirta Putri</td>
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
                        <li>0877-9400-9390 (Nur Annisa Basulina)</li>
                    </ol>
                </div>
                <?php if ($isOrdered) : ?>
                    <a href="<?= base_url('seminar/tiket'); ?>" class="btn btn-secondary">Lihat Invoice</a>
                    <a href="https://chat.whatsapp.com/FrwMn2xKnQsFqb6GYk9c89" target="_blank"
                        class="btn btn-secondary" style="margin-left: 2rem;">Join Grup WhatsApp</a>
                <?php else : ?>
                    <a href="<?= base_url('seminar/daftar'); ?>" class="btn btn-secondary">Daftar Seminar</a>
                <?php endif; ?>
            </div>
        </div> -->
    </div>
</div>

<?= $this->endSection(); ?>