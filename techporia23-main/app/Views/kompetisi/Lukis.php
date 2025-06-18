<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> Painting | Technology Euhporia
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
                <img src="/assets/images/competition-logo/painting.webp" alt="Lukis" />
            </div>
            <div class="keterangan onscroll-r" style="--delay: 1;">
                <h1>Painting</h1>
                <div class="paragraphs">
                    <p>
                        Kompetisi Painting adalah acara atau kontes di mana seniman, baik amatir maupun profesional, bersaing untuk menunjukkan bakat dan keterampilan mereka dalam seni lukis. Dalam kompetisi ini, peserta biasanya diminta untuk membuat karya seni berdasarkan tema tertentu atau dalam kategori bebas. Karya-karya tersebut kemudian dinilai oleh panel juri yang berpengalaman dalam seni rupa.
                    </p>
                    <p>
                        Kriteria penilaian dapat mencakup aspek-aspek seperti teknik, kreativitas, interpretasi tema, komposisi, dan penggunaan warna. Kompetisi Painting sering kali diselenggarakan oleh institusi seni, sekolah, komunitas seni, atau sebagai bagian dari festival budaya. Pemenang kompetisi biasanya mendapatkan penghargaan berupa hadiah uang, sertifikat, pameran karya, atau kesempatan untuk berpartisipasi dalam acara seni yang lebih besar.
                    </p>
                </div>
                <table class="details-table">
                <tr>
                        <td><i class='bx bx-group'></i> Pendaftaran Peserta</td>
                        <td>01 Agustus - 30 Agustus 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Lomba Berlangsung</td>
                        <td>09 Oktober - 23 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Pengumpulan</td>
                        <td>24 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Pengumpulan (Untuk yang Terpilih)</td>
                        <td>25 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Babak Final</td>
                        <td>26 Oktober 2024</td>
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
        <div class="faq onscroll">
            <h1>Frequently Asked Question (FAQ)</h1>
            <ol>
                <li>
                    Apakah peserta lomba Painting menghadiri pembukaan pameran atau acara lomba?
                    <span class="answer">
                    Peserta memiliki kebebasan dalam menghadiri acara, namun diharapkan peserta dapat ikut serta dan menikmati Techphoria Art & Bazar 2024.
                    </span>
                </li>
                <li>
                    Apakah karya yang pernah diikutsertakan dalam kompetisi lain dapat diikutsertakan kembali?
                    <span class="answer">
                    Karya yang dikirimkan harus berupa karya yang belum pernah didaftarkan pada lomba lainnya.
                    </span>
                </li>
                <li>
                    Apakah karya seni yang diajukan harus karya baru atau bisa karya lama?
                    <span class="answer">
                    Karya yang dikumpulkan harus berupa karya yang baru, teknis perlombaan akan meminta peserta untuk menyertakan sebuah video proses pembuatan karya.
                    </span>
                </li>
                <li>
                    Jika peserta lomba Painting berhalangan hadir untuk penyerahan karya secara offline, apakah peserta boleh mengirimkan karyanya melalui ekspedisi?
                    <span class="answer">
                    Apabila peserta berhalangan untuk hadir untuk penyerahan, peserta diperbolehkan untuk menggunakan jasa ekspedisi seperti GoSend, GrabExpress, etc.
                    </span>
                </li>
                <li>
                    Apakah karya seni yang dikirimkan akan dikembalikan kepada peserta?
                    <span class="answer">
                        Setelah rangkaian acara telah selesai karya seni akan dikembalikan kepada peserta.
                    </span>
                </li>
                <li>
                    Apakah karya seni yang diikutsertakan harus merupakan karya asli (original)?
                    <span class="answer">
                    Iya, karya seni yang diikutsertakan dalam suatu kompetisi atau pameran harus merupakan karya asli. Karya tersebut harus dibuat oleh peserta itu sendiri tanpa menyalin atau menjiplak karya orang lain.
                    </span>
                </li>
            </ol>
        </div> -->
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/competition.js'); ?>"></script>
<script type="text/javascript">
    let countdownDate = new Date('Aug 31, 2024').getTime();
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