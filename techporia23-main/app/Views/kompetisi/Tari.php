<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> Dance Creation | Technology Euhporia
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
                <img src="/assets/images/competition-logo/dance.webp" alt="Tari" />
            </div>
            <div class="keterangan onscroll-r" style="--delay: 1;">
                <h1>Dance Creation</h1>
                <div class="paragraphs">
                    <p>
                        Kompetisi Dance Creation adalah sebuah acara atau kontes di mana para penari atau kelompok tari menampilkan tarian yang mereka ciptakan sendiri. Tarian kreasi ini sering kali menggabungkan elemen-elemen dari berbagai gaya tari tradisional dan modern, menciptakan bentuk seni yang unik dan inovatif.
                    </p>
                    <p>
                        Dalam kompetisi Dance Creation, peserta biasanya dinilai berdasarkan beberapa kriteria seperti kreativitas, teknik tari, keselarasan gerakan, penampilan panggung, dan interpretasi musik. Juri yang berpengalaman dalam seni tari memberikan penilaian dan memilih pemenang berdasarkan keseluruhan penampilan.
                    </p>
                    <p>
                        Kompetisi Dance Creation dapat diadakan di berbagai tingkatan, mulai dari sekolah dan komunitas lokal hingga acara nasional atau internasional. Pemenang kompetisi ini sering kali mendapatkan penghargaan berupa trofi, sertifikat, hadiah uang, atau kesempatan untuk tampil di acara-acara besar dan festival tari.
                    </p>
                </div>
                <table class="details-table">
                    <tr>
                        <td><i class='bx bx-group'></i> Pendaftaran Peserta</td>
                        <td>01 Agustus - 30 Agustus 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-wrench'></i> Technical Meeting</td>
                        <td>23 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Lomba Berlangsung</td>
                        <td>25 Oktober - 26 Oktober 2024</td>
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
                    Bagaimana peserta harus mempersiapkan dan menyerahkan musik atau materi lain sebelum lomba?
                    <span class="answer">
                    Peserta mempersiapkan dan menyerahkan instrumen atau music dan alat - alat lain nya pada saat technical meeting di tanggal yang telah ditentukan panitia.
                    </span>
                </li>
                <li>
                    Apakah peserta mempersiapkan kostum dan properti sendiri?
                    <span class="answer">
                    Peserta dipersilahkan mempersiapkan sendiri kostum dan properti yang sekiranya akan diperlukan untuk penampilan masing-masing.
                    </span>
                </li>
                <li>
                    Jika salah satu anggota tim berhalangan hadir, apakah tetap boleh mengikuti lomba?
                    <span class="answer">
                    Asalkan masih terdiri dari 3 orang atau 4 orang itu masih bisa ikut lomba tapi jika kurang dari 2 orang maka tim akan diskualifikasi dan HTM tidak dikembalikan.
                    </span>
                </li>
                <li>
                    Bolehkah seorang peserta menjadi anggota dari beberapa tim di kompetisi Art and Bazaar?
                    <span class="answer">
                    Peserta hanya boleh tergabung dalam satu tim pada suatu kategori lomba.
                    </span>
                </li>
                <li>
                    Bagaimana jika tim saya tidak dapat hadir pada acara secara langsung?
                    <span class="answer">
                    Jika tim anda tidak dapat hadir pada acara secara langsung, biaya pendaftaran atau HTM tidak akan dikembalikan dan tim anda akan dianggap mengundurkan diri.
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