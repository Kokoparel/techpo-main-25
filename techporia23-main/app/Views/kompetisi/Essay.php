<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> Essay | Technology Euhporia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="section" style="padding-top: 3rem;">
        <div class="comingsoon">
            <img src="<?php echo base_url('assets/images/MASKOT 4.png') ?>" alt="maskot" class="onscroll-r" style="--delay: 0;" />
            <h1>Day - 1</h1>
        </div>
        <!-- <div class="detail-horizontal">
            <div class="image onscroll-r">
                <img src="/assets/images/competition-logo/essay.webp" alt="Essay" />
            </div>
            <div class="keterangan onscroll-r" style="--delay: 1;">
                <h1>Essay</h1>
                <div class="paragraphs">
                    <p>
                        Lomba Essay adalah sebuah kompetisi karya tulis yang di mana peserta diminta untuk membahas mengenai topik tertentu sesuai dengan tema yang ditentukan oleh penyelenggara, peserta diminta mengungkapkan pendapat pribadinya dengan menuangkannya kedalam bentuk paragraf. Secara umum, essay berfungsi untuk menyampaikan ide, argumentasi, atau analisis mendalam mengenai subjek yang dibahas. Kompetisi ini diadakan dengan tujuan untuk mendorong peserta untuk mengembangkan keterampilan menulis, berpikir kritis, dan mengungkapkan ide dengan jelas dan persuasif.
                    </p>
                </div>
                <table class="details-table">
                    <tr>
                        <td><i class='bx bx-group'></i> Pendaftaran Peserta</td>
                        <td>01 Agustus - 31 Agustus 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Babak Penyisihan</td>
                        <td>08 September 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-notepad'></i> Pengumuman Finalis</td>
                        <td>09 September 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Registrasi Ulang Finalis</td>
                        <td>10 September - 10 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-wrench'></i> Technical Meeting Finalis</td>
                        <td>12 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Opening Ceremony</td>
                        <td>24 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calender-event'></i> Babak Final</td>
                        <td>24 - 25 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-notepad'></i> Pengumuman Pemenang</td>
                        <td>27 Oktober 2024</td>
                    </tr>
                </table>
                <?php if ($data) : ?>
                    <div class="badge badge-success" style="margin-top: 2rem; display: block;">Sudah Daftar</div>
                    <a href="<?= base_url('profile'); ?>" class="btn btn-info-solid" style="display: block; margin-top: 1rem;">Lihat Detail</a>
                <?php else : ?>
                    <a href="<?= base_url('profile/daftar-lomba'); ?>" class="btn btn-secondary" style="margin-top: 2rem;">Daftar Sekarang</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="countdown onscroll">
            <h1 class="onscroll">Penutupan Pendaftaran</h1>
            <ul>
                <li><span id="days">12</span>Hari</li>
                <li>:</li>
                <li><span id="hours">12</span>Jam</li>
                <li>:</li>
                <li><span id="minutes">12</span>Menit</li>
                <li>:</li>
                <li><span id="seconds">12</span>Detik</li>
            </ul>
        </div>
        <div class="informasi-lomba">
            <h1 class="onscroll-r">Informasi Lomba</h1>
            <ul>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Seluruh peserta diwajibkan membaca guidebook
                    sebelum melakukan pendaftaran</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Peserta mendaftarkan timnya pada laman
                    pendaftaran Essay</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Bila tim sudah menyelesaikan proses
                    pembayaran dan pendaftaran setiap tim harus mengirimkan proposal pada laman perlombaan Essay,
                    bisa diakses melalui laman user</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Tim yang lolos penyeleksian tahap awal akan
                    dikonfirmasi pada laman email dan diharapkan mengikuti arahan dari Tim Essay</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Rangkaian acara akan dilakukan secara hybrid
                    di Fakultas Ilmu Komputer Universitas Sriwijaya dan Zoom Meeting
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Silahkan download guidebook untuk pedoman
                    mengikuti lomba dan template proposal untuk pendaftaran</li>
            </ul>
            <div class="links onscroll-r">
                <a href="<?= base_url('download/' . urlencode('Logo Technology Euphoria.png')); ?>" class="btn btn-secondary">Download Logo Techpo</a>
                <a href="<?= base_url('download/' . urlencode('GB UIUX.pdf')); ?>" class="btn btn-secondary">Download
                    Guidebook</a>
                <a href="<?= base_url('download/' . urlencode('Template Kompetisi Essay TECHPO 2024.docx')); ?>" class="btn btn-secondary">Template Proposal</a>
            </div>
        </div>
        <div class="faq onscroll">
            <h1>Frequently Asked Question (FAQ)</h1>
            <ol>
                <li>
                    Bagaimana cara mendaftarkan diri dalam kompetisi Essay Techphoria 2024?
                    <span class="answer">
                        Peserta telah mengikuti prosedur pendaftaran pada website resmi Techphoria 2024
                        (https://technologyeuphoriaunsri.web.id/) dan melengkapi data pendaftaran dengan benar. Peserta yang
                        tidak memenuhi persyaratan pendaftaran sampai waktu yang ditentukan akan dinyatakan gugur.
                    </span>
                </li>
                <li>
                    Apakah setiap peserta harus melengkapi data pribadi secara terpisah?
                    <span class="answer">
                        Pengunggahan data diwakilkan oleh ketua tim dengan melampirkan foto/scan bukti pembayaran dan
                        foto/scan kartu tanda mahasiswa atau kartu pelajar.
                    </span>
                </li>
                <li>
                    Apakah karya yang pernah diikutsertakan dalam kompetisi lain dapat diikutsertakan kembali?
                    <span class="answer">
                        Bisa, jika belum mendapatkan gelar juara.
                    </span>
                </li>
                <li>
                    Bolehkah mendaftar jika kelompok saya hanya terdiri dari dua orang?
                    <span class="answer">
                        Peserta dapat mendaftar selama tidak melebihi 3 orang dalam satu kelompok.
                    </span>
                </li>
                <li>
                    Bolehkah seorang peserta menjadi anggota dari beberapa tim di kompetisi Essay?
                    <span class="answer">
                        Boleh, tetapi hanya boleh menjadi ketua pada salah satu tim atau menjadi anggota pada maksimal 3
                        cabang kompetisi.
                    </span>
                </li>
                <li>
                    Bagaimana sistem kompetisi Essay?
                    <span class="answer">
                        Pada kompetisi ini terdapat dua babak, yakni babak penyisihan berupa pengumpulan proposal dan
                        final yang dilaksanakan secara hybrid di Universitas Sriwijaya dan Zoom Meeting.
                    </span>
                </li>
                <li>
                    Bagaimana saya bisa mendapatkan template untuk proposal?
                    <span class="answer">
                        Template proposal dapat diunduh pada website Tehcphoria 2024 di
                        https://technologyeuphoriaunsri.web.id/
                    </span>
                </li>
                <li>
                    Bolehkah tim saya mendaftar jika berasal dari jenjang pendidikan berbeda (seperti D3 dan S1 dalam
                    satu tim) maupun dari jurusan yang berbeda?
                    <span class="answer">
                        Diperbolehkan, asal tidak beda universitas.
                    </span>
                </li>
                <li>
                    Jika tim saya lolos babak penyisihan apakah karya saya boleh diubah?
                    <span class="answer">
                        Perubahan yang boleh dilakukan hanya sebatas perubahan minor seperti desain produk dan bukan
                        mengubah produk inti atau melakukan pivot.
                    </span>
                </li>
            </ol>
        </div> -->
    </div>
</div>

<script type="text/javascript">
    let countdownDate = new Date('Sep 1, 2024').getTime();
    let x = setInterval(function() {
        let now = new Date().getTime();
        let distance = countdownDate - now;

        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').innerHTML = days;
        document.getElementById('hours').innerHTML = hours;
        document.getElementById('minutes').innerHTML = minutes;
        document.getElementById('seconds').innerHTML = seconds;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById('days').innerHTML = 0;
            document.getElementById('hours').innerHTML = 0;
            document.getElementById('minutes').innerHTML = 0;
            document.getElementById('seconds').innerHTML = 0;
        }
    }, 1000);
</script>

<?= $this->endSection(); ?>