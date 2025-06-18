<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> UI/UX | Technology Euhporia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="section" style="padding-top: 3rem;">
        <div class="detail-horizontal">
            <div class="image onscroll-r">
                <img src="/assets/images/competition-logo/ui-ux.webp" alt="UI/UX Design" />
            </div>
            <div class="keterangan onscroll-r" style="--delay: 1;">
                <h1>UI/UX Design</h1>
                <div class="paragraphs">
                    <p>
                        Kompetisi UI/UX merupakan cabang kompetisi dalam ajang Technology Euphoria 2023 untuk
                        menciptakan sebuah antarmuka produk yang dapat memberikan kenyamanan, kemudahan, dan mewujudkan
                        pengalaman terbaik bagi pengguna. Acara ini bertaraf nasional dan diselenggarakan oleh keluarga
                        mahasiswa Fakultas Ilmu Komputer Universitas Sriwijaya.
                    </p>
                    <p>
                        Pada tahun ini, lomba UI/UX Technology Euphoria mengusung tema “UI/UX Design to Increase
                        Creativity and Competitiveness on the Digital Era”, dan tujuan dari kompetisi ini adalah untuk
                        menguji peserta dalam menganalisa, menggali, berkreasi, dan mengembangkan kemampuan dan
                        kreatifitas mereka dalam bidang UI/UX designing. Fokus dari kompetisi ini adalah menciptakan
                        desain produk aplikasi yang efektif dan efisien serta dapat memberikan pengalaman terbaik bagi
                        pengguna saat menggunakan produk tersebut. Lomba ini akan terbagi menjadi dua babak, yaitu babak
                        penyisihan yang dilakukan secara online melalui zoom meeting dan babak final yang diadakan
                        secara hybrid di Fakultas Ilmu Komputer Universitas Sriwijaya dan Zoom Meeting.
                    </p>
                </div>
                <table class="details-table">
                    <tr>
                        <td><i class='bx bx-group'></i> Pendaftaran Peserta</td>
                        <td>21 Agustus - 25 September 2023</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-wrench'></i> Technical Meeting</td>
                        <td>26 September 2023</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Pengumpulan Design (online)</td>
                        <td>27 September - 30 September 2023</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Babak Penyisihan</td>
                        <td>1 - 10 Oktober 2023</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-notepad'></i> Pengumuman Finalis</td>
                        <td>12 Oktober 2023</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Opening Ceremony</td>
                        <td>16 Oktober 2023</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-calendar-event'></i> Babak Final</td>
                        <td>19 Oktober 2023</td>
                    </tr>
                    <tr>
                        <td><i class='bx bx-notepad'></i> Pengumuman Pemenang</td>
                        <td>21 Oktober 2023</td>
                    </tr>
                </table>
                <?php if ($data): ?>
                    <div class="badge badge-success" style="margin-top: 2rem; display: block;">Sudah Daftar</div>
                    <a href="<?= base_url('profile'); ?>" class="btn btn-info-solid"
                        style="display: block; margin-top: 1rem;">Lihat Detail</a>
                    <?php if ($isVerified): ?>
                        <a href="<?= base_url('profile/submission?id=' . $data['tim_id']); ?>" class="btn btn-info-solid"
                            style="display: block; margin-top: 1rem;">Submission</a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?= base_url('profile/daftar-lomba'); ?>" class="btn btn-secondary"
                        style="margin-top: 2rem;">Daftar Sekarang</a>
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
                <a href="<?= base_url('download/' . urlencode('Logo Technology Euphoria.png')); ?>"
                    class="btn btn-secondary">Download Logo Techpo</a>
                <a href="<?= base_url('download/' . urlencode('GB UIUX.pdf')); ?>" class="btn btn-secondary">Download
                    Guidebook</a>
                <a href="<?= base_url('download/' . urlencode('Template Proposal UI-UX.docx')); ?>"
                    class="btn btn-secondary">Template Proposal</a>
            </div>
        </div>
        <div class="faq onscroll">
            <h1>Frequently Asked Question (FAQ)</h1>
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
                        Technology Euphoria 2023.
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

<script type="text/javascript">
    let countdownDate = new Date('Sep 26, 2023').getTime();
    let x = setInterval(function () {
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