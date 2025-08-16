<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> Competitive Programming | Technology Euhporia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <!-- <div class="section" style="padding-top: 3rem">
        <div class="comingsoon">
            <img src="<?php echo base_url('assets/images/MASKOT 4.png') ?>" alt="maskot" class="onscroll-r" style="--delay: 0;" />
            <h1>Day - 1</h1>
        </div> -->
    <div class="detail-horizontal">
        <div class="image onscroll-r">
            <img src="/assets/images/competition-logo/compe-2025/ML.svg" alt="Competitive Programming" />
        </div>
        <div class="keterangan onscroll-r" style="--delay: 1;">
            <h1>Mobile Legends</h1>
            <div class="paragraphs">
                <p>
                    Mobile Legend Sinergi Fest adalah sebuah festival kompetitif yang mengedepankan nilai sinergi — kerja sama yang harmonis antar pemain untuk meraih kemenangan. Kata Sinergi mencerminkan bagaimana strategi, peran, dan komunikasi antar anggota tim saling menyatu membentuk kekuatan. Sementara Fest melambangkan semangat kebersamaan dalam suasana yang meriah, santai, namun tetap kompetitif. Ajang ini bukan hanya soal mekanik atau kill terbanyak, tapi tentang bagaimana tim bisa saling melengkapi, berpikir bersama, dan melangkah menuju kemenangan dengan kekompakan.
                </p>
                <p>
                    Turnamen ini terdiri dari empat babak utama, yaitu: babak penyisihan, babak seperempat final, semifinal, dan final. Babak penyisihan mencakup pertandingan 16 besar yang dilaksanakan oleh 32 tim secara bersamaan dengan sistem best of one (BO1). Memasuki babak seperempat final, pertandingan akan dimulai secara bersamaan lagi dengan sistem yang sama dengan babak penyisihan yaitu best of one (BO1). Pada babak semifinal, pertandingan menggunakan format best of three (BO3), mulai dari babak ini hingga final, seluruh tim tidak lagi bertanding secara serentak dengan tim lain, melainkan akan tampil di panggung secara bergiliran sesuai dengan urutan bracket dan jadwal yang telah ditetapkan. Pada babak final pertandingan menggunakan format best of five (BO5) untuk menentukan tim pemenang. Event akan dilaksanakan secara offline di lokasi yang telah ditentukan.
                </p>
            </div>
            <table class="details-table">
                <tr>
                    <td><i class='bx bx-group'></i> Pendaftaran Peserta</td>
                    <td>01 Agustus - 31 Agustus 2025</td>
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
                Bagaimana cara mendaftarkan tim untuk kompetisi Sinergi Fest 2025?
                <span class="answer">
                    Ketua tim harus mendaftar melalui website resmi Sinergi Fest 2025. Pendaftaran anggota tim dilakukan oleh ketua tim. Proses ini mencakup pengisian nama tim, asal universitas atau instansi peserta, serta pilihan cabang lomba. Setelah itu, ketua tim diminta untuk mengisi data pribadi anggota, termasuk nama lengkap, nickname, dan ID akun Mobile Legends. Berikutnya adalah melakukan pembayaran biaya lomba. Setelah pembayaran berhasil dikonfirmasi, peserta diwajibkan mengunggah KPM atau Kartu Pelajar melalui form Submit KPM.
                </span>
            </li>
            <li>
                Apakah anggota tim boleh berasal dari universitas/fakultas/jurusan/ Sekolah yang berbeda?
                <span class="answer">
                    Diperbolehkan bagi tim berisi anggota yang berasal dari universitas/fakultas/jurusan/sekolah yang berbeda untuk bergabung selagi memenuhi syarat dan ketentuan.
                </span>
            </li>
            <li>
                Apa yang harus dilakukan jika anggota tim kami ingin mengganti akun atau nickname yang terdaftar?
                <span class="answer">
                    Pergantian akun atau nickname yang terdaftar tidak diperbolehkan. Jika terdapat perbedaan antara akun atau nickname yang digunakan saat permainan dengan yang terdaftar, tim tersebut akan didiskualifikasi.
                </span>
            </li>
            <li>
                Apa yang harus diisi pada formulir pendaftaran bila anggota tim bukan mahasiswa?
                <span class="answer">
                    Pada kolom NIM dapat diisi angka 000000, pada kolom KPM dapat di input menggunakan kartu pelajar/KPM milik ketua, pada kolom Universitas dapat diisi asal instansi terkait atau umum.
                </span>
            </li>
            <li>
                Apakah bisa mengajukan perubahan apabila terjadi kesalahan pada saat pendaftaran?
                <span class="answer">
                    Untuk mengajukan perubahan dapat menghubungi narahubung dan akan ditinjau oleh panitia terkait perubahan tersebut.
                </span>
            </li>
            <li>
                Apakah ada batasan waktu untuk keterlambatan ke pertandingan?
                <span class="answer">
                    Tim harus siap 15 menit sebelum jadwal pertandingan dengan batas keterlambatan maksimal 15 menit. Tim dapat didiskualifikasi.
                </span>
            </li>
            <li>
                Apa yang harus dilakukan jika kami menemukan tim lawan melakukan kecurangan?
                <span class="answer">
                    Jika merasa tim lawan melakukan kecurangan, perwakilan tim pelapor harus memberikan screenshot atau rekaman permainan sebagai bukti dan melaporkannya kepada panitia setelah permainan selesai. Panitia akan melakukan investigasi dan
                    menindaklanjuti laporan tersebut.
                </span>
            </li>
            <li>
                Bagaimana jika ada masalah teknis atau kendala mendesak saat pertandingan?
                <span class="answer">
                    Terdapat prosedur formal untuk penjadwalan ulang jika ada masalah teknis atau kendala mendesak, terutama dari semifinal hingga final. Panitia akan mengatur jadwal ulang sesuai kebutuhan dan kondisi yang ada.
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