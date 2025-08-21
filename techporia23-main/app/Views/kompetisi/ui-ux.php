<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> UI/UX | Technology Euhporia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main competition-list" id="ui-ux">
    <div class="section" style="padding-top: 3rem;">
        <!--
        <div class="comingsoon">
            <img src="<?php echo base_url('assets/images/MASKOT 4.png') ?>" alt="maskot" class="onscroll-r" style="--delay: 0;" />
            <h1>Day - 1</h1>
        </div>
        -->
        
        <div class="detail-horizontal">
            <div class="image onscroll-r">
                <img src="/assets/images/competition-logo/compe-2025/UI-UX.svg" alt="UI/UX Design" />
            </div>
            <div class="keterangan onscroll-r" style="--delay: 1;">
                <h1>UI/UX DESIGN</h1>
                <div class="paragraphs">
                    <p>
    Kompetisi UI/UX merupakan salah satu cabang kompetisi dalam Sinergi Fest 2025 yang bertujuan untuk menciptakan antarmuka produk yang memberikan kenyamanan, kemudahan, serta mewujudkan pengalaman terbaik bagi pengguna. 
    Acara ini berskala nasional dan diselenggarakan oleh BEM KM Fakultas Ilmu Komputer Universitas Sriwijaya.
</p>

<p>
    Pada tahun ini, Lomba UI/UX Sinergi Fest mengusung tema <strong>“Design for Everyone”</strong>. 
    Melalui tema ini, peserta diajak untuk merancang pengalaman digital yang inklusif—dapat dinikmati oleh semua orang tanpa terkecuali. 
    Fokus utamanya adalah menciptakan desain yang ramah, mudah digunakan, dan dapat diakses oleh siapa saja, termasuk anak-anak, lansia, maupun penyandang disabilitas. 
    Peserta juga dapat memilih dari subtema berikut:
</p>

<ol>
    <li>Bidang Pendidikan</li>
    <li>Bidang Kesehatan</li>
    <li>Bidang Ekonomi</li>
    <li>Bidang Layanan Publik</li>
</ol>

<p>
    Lomba ini terbagi menjadi dua babak, yaitu babak penyisihan dan babak final, yang akan dilaksanakan secara online.
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
                    <?php if ($isVerified) : ?>
                        <a href="<?= base_url('profile/submission?id=' . $data['tim_id']); ?>" class="btn btn-info-solid" style="display: block; margin-top: 1rem;">Submission</a>
                    <?php endif; ?>
                <?php else : ?>
                    <a href="<?= base_url('profile/daftar-lomba'); ?>" class="btn btn-secondary" style="margin-top: 2rem;">Daftar Sekarang</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="countdown">
            <h1 class="onscroll">PENUTUPAN PENDAFTARAN</h1>
            <ul class="onscroll">
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
            <h1 class="onscroll-r">INFORMASI LOMBA</h1>
            <ul>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Seluruh peserta diwajibkan membaca guidebook
                    sebelum melakukan pendaftaran</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Peserta mendaftarkan timnya pada laman
                    pendaftaran UI/UX Design</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Bila tim sudah menyelesaikan proses
                    pembayaran dan pendaftaran setiap tim harus mengirimkan proposal pada laman perlombaan UI/UX Design,
                    bisa diakses melalui laman user</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Tim yang lolos penyeleksian tahap awal akan
                    dikonfirmasi pada laman email dan diharapkan mengikuti arahan dari Tim penyeleksi UI/UX Design</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Seluruh rangkaian kompetisi akan
                    diselenggarakan secara hybrid di Fakultas Ilmu Komputer Universitas Sriwijaya dan Zoom Meeting</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Silahkan download guidebook untuk pedoman
                    mengikuti lomba dan template proposal untuk pendaftaran</li>
            </ul>
            <div class="links onscroll-r">
                <a href="<?= base_url('download/' . urlencode('Logo Technology Euphoria.png')); ?>" class="btn btn-secondary">Download Logo Techpo</a>
                <a href="<?= base_url('download/' . urlencode('GB UIUX.pdf')); ?>" class="btn btn-secondary">Download
                    Guidebook</a>
                <a href="<?= base_url('download/' . urlencode('Template Proposal UIUX TECHPO 2024.docx')); ?>" class="btn btn-secondary">Template Proposal</a>
            </div>
        </div>
        <div class="faq onscroll">
            <h1>FREQUENTLY ASKED QUESTION (FAQ)</h1>
            <ol>
                <li>
                    Apakah setiap peserta harus melengkapi data pribadi secara terpisah?
                    <span class="answer">
                        Pengunggahan data diwakilkan oleh ketua tim dengan melampirkan foto/scan bukti pembayaran dan
                        Foto/scan Kartu Tanda Mahasiswa.
                    </span>
                </li>
                <li>
                    Apakah karya yang pernah diikutsertakan dalam kompetisi lain dapat diikutsertakan kembali?
                    <span class="answer">
                        Tidak, karya yang sudah digunakan untuk kompetisi lain tidak boleh di submit di kompetisi UI/UX
                        Sinergi Fest 2025.
                    </span>
                </li>
                <li>
                    Bolehkah mendaftar jika kelompok saya kurang dari 3 orang?
                    <span class="answer">
                        Peserta dapat mendaftar selama tidak melebihi 3 orang dalam satu kelompok.
                    </span>
                </li>
                <li>
                    Bolehkah seorang peserta menjadi anggota dari beberapa tim di kompetisi UI/UX?
                    <span class="answer">
                        Tidak boleh, setiap peserta hanya dapat tedaftar pada satu tim saja.
                    </span>
                </li>
                <li>
                    Bolehkah peserta mendaftarkan diri pada dua cabang kompetisi yang berbeda?
                    <span class="answer">
                        Boleh saja, tetapi hanya bisa mendaftar sebagai ketua di satu kompetisi, jika ingin mendaftar ke
                        cabang kompetisi lainnya hanya boleh mendaftar sebagai anggota.
                    </span>
                </li>
            </ol>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/competition.js'); ?>"></script>
<script type="text/javascript">
    let countdownDate = new Date('Sep 1, 2025').getTime();
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