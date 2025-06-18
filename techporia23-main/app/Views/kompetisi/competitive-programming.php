<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> Competitive Programming | Technology Euhporia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="section" style="padding-top: 3rem">
        <div class="comingsoon">
            <img src="<?php echo base_url('assets/images/MASKOT 4.png') ?>" alt="maskot" class="onscroll-r" style="--delay: 0;" />
            <h1>Day - 1</h1>
        </div>
        <!-- <div class="detail-horizontal">
            <div class="image onscroll-r">
                <img src="/assets/images/competition-logo/competitive.webp" alt="Competitive Programming" />
            </div>
            <div class="keterangan onscroll-r" style="--delay: 1;">
                <h1>Competitive Programming</h1>
                <div class="paragraphs">
                    <p>
                        Kompetisi Competitive Programming dengan tema "Code Optimization and Performance Tuning"
                        merupakan salah satu cabang kompetisi yang sangat dinantikan dalam event Technology Euphoria,
                        sebuah acara bertaraf nasional yang diadakan untuk mahasiswa aktif di perguruan tinggi dan siswa
                        SMA/SMK sederajat di Indonesia. Competitive Programming ini terdiri dari dua babak, yaitu babak
                        penyisihan yang dilakukan secara online melalui platform zoom meeting dan babak final yang
                        dilakukan secara hybrid di Fakultas Ilmu Komputer Universitas Sriwijaya dan Zoom Meeting.
                    </p>
                    <p>
                        Tujuan utama dari kompetisi ini adalah menguji kemampuan peserta dalam berpikir logis dan
                        sistematis dalam memecahkan persoalan dengan menggunakan bahasa pemrograman C++/Java. Fokus
                        utama perlombaan ini adalah mengoptimalkan kode dan meningkatkan kinerja program yang ditulis
                        oleh peserta.
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
        <div class="countdown">
            <h1 class="onscroll">Penutupan Pendaftaran</h1>
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
            <h1 class="onscroll-r">Informasi Lomba</h1>
            <ul>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Seluruh peserta diwajibkan membaca guidebook
                    sebelum melakukan pendaftaran</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Peserta mendaftarkan timnya pada laman
                    pendaftaran Competitive Programming</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Seluruh rangkaian kompetisi akan
                    diselenggarakan secara hybrid di Fakultas Ilmu Kompueter Universitas Sriwijaya dan Zoom Meeting.</li>
                <li class="onscroll-r"><i class='bx bxs-chevron-right'></i> Silahkan download guidebook untuk pedoman
                    mengikuti lomba</li>
            </ul>
            <div class="links onscroll-r">
                <a href="<?= base_url('download/' . urlencode('GB CP.pdf')); ?>" class="btn btn-secondary">Download Guidebook</a>
            </div>
        </div>
        <div class="faq onscroll">
            <h1>Frequently Asked Question (FAQ)</h1>
            <ol>
                <li>
                    Bagaimana cara mendaftarkan diri dalam kompetisi Competitive Programming Sinergi Fest 2025?
                    <span class="answer">
                        Peserta telah mengikuti prosedur pendaftaran pada website resmi Techphoria 2024 yakni
                        http://technologyeuphoriaunsri.web.id dan mengisi data
                        kelompok dengan lengkap. Peserta yang tidak memenuhi persyaratan pendaftaran sampai waktu yang
                        ditentukan akan dinyatakan gugur.
                    </span>
                </li>
                <li>
                    Apakah setiap peserta harus melengkapi data pribadi secara terpisah?
                    <span class="answer">
                        Pengunggahan data dilakukan dengan mengunggah foto/scan bukti pembayaran dan Foto/scan Kartu
                        Tanda Pelajar.
                    </span>
                </li>
                <li>
                    Bolehkah saya menjadi anggota di tim competitive programming yang lain?
                    <span class="answer">
                        Tidak, satu anggota tidak bisa berada di tim lain dalam kompetisi ini.
                    </span>
                </li>
                <li>
                    Berapa jumlah maksimal anggota dalam satu tim?
                    <span class="answer">
                        Setiap peserta dapat mengikuti lomba secara individu (1 orang) maupun tim yang beranggotakan
                        maksimal 3 orang mahasiswa. Masing-masing anggota boleh berasal dari universitas yang berbeda.
                    </span>
                </li>
                <li>
                    Bagaimana sistem kompetisi Competitive Programming?
                    <span class="answer">
                        Pada kompetisi ini, perlombaan dilakukan di platform hackerrank. Terdapat dua babak, yaitu babak
                        penyisihan yang dilaksanakan secara daring melalui zoom meeting dan babak final yang
                        diselenggarakan secara hybrid di Fakultas Ilmu Komputer Universitas Sriwijaya dan Zoom Meeting.
                    </span>
                </li>
                <li>
                    Bagaimana mekanisme perlombaan?
                    <span class="answer">
                        Peserta wajib memiliki akun aktif Hackerrank dengan nama akun yang sama dengan nama tim saat
                        didaftarkan dan terdapat soal yang harus diselesaikan dalam waktu 120 menit. Peserta harus
                        menjawab soal dengan bahasa pemrograman C++ atau Java. Penilaian akan diambil dari scoreboard
                        yang tertera pada Hackerrank.
                    </span>
                </li>
                <li>
                    Bolehkah peserta Competitive Programming juga mendaftarkan diri pada cabang kompetisi lain di
                    Techphoria 2024?
                    <span class="answer">
                        Boleh, tetapi hanya sebagai anggota.
                    </span>
                </li>
            </ol>
        </div> -->
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/competition.js'); ?>"></script>
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