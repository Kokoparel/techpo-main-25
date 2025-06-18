<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="section" id="home">
        <div class="hero-bg">
        </div>
        <div class="hero onscroll">
            <h3>FASILKOM UNSRI</h3>
            <h1>Sinergi Fest 2025</h1>
            <div id="theme-text"></div>
            <div class="container-5" style="margin-top: 3rem;">
                <a href="<?= base_url('#about'); ?>" class="btn btn-fancy">EXPLORE</a>
                <!-- <a href="<?= base_url('register'); ?>" class="btn btn-outline-fancy">JOIN US</a> -->
            </div>
        </div>
    </div>

    <div class="section light" id="about">
        <div class="about">
            <img src="<?php echo base_url('assets/images/MASKOT 2.png') ?>" alt="maskot" class="onscroll-r" style="--delay: 0;" />
            <div class="about-detail onscroll-r" style="--delay: 1;">
                <h1>About <br> Sinergi Fest </h1>
                <p>
                    Sinergi Fest merupakan serangkaian acara IT tahunan dengan fokus utama kompetisi yang diperuntukan
                    bagi Universitas/Politeknik
                    se-Indonesia untuk meningkatkan kesadaran tentang peranan IT serta meningkatkan nilai keilmuan dan
                    komprehensif di bidang
                    ilmu teknologi informasi komputer. Ajang ini sendiri diprakarsai oleh Mahasiswa Fakultas Ilmu
                    Komputer Universitas Sriwijaya.
                </p>
            </div>
        </div>
    </div>

    <div class="section" id="competition">
        <h1 class="onscroll-r">COMPETITION</h1>
        <p class="onscroll-r">Dalam Sinergi Fest ini, terdapat beberapa lomba yang diadakan seperti dibawah ini
        </p>
        <div class="competition-grid">
            <div class="first-grid">
                <div class="grid-child onscroll-r" style="--delay: 0;">
                    <img src="<?= base_url('assets/images/competition-logo/business.webp'); ?>" alt="Business Plan" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>Business Plan<br>Competition</p>
                        <a href="<?= base_url('kompetisi/business-plan'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
                <div class="grid-child onscroll-r" style="--delay: 1;">
                    <img src="<?= base_url('assets/images/competition-logo/essay.webp'); ?>" alt="Network Competition" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>Essay</p>
                        <a href="<?= base_url('kompetisi/networking-competition'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
                <div class="grid-child onscroll-r" style="--delay: 2;">
                    <img src="<?= base_url('assets/images/competition-logo/ui-ux.webp'); ?>" alt="UI/UX Design" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>UI/UX Design<br>Competition</p>
                        <a href="<?= base_url('kompetisi/ui-ux'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="second-grid">
                <div class="grid-child onscroll-r" style="--delay: 1;">
                    <img src="<?= base_url('assets/images/competition-logo/competitive.webp'); ?>" alt="Competitive Programming" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>Competitive<br>Programming</p>
                        <a href="<?= base_url('kompetisi/competitive-programming'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
                <div class="grid-child onscroll-r" style="--delay: 2;">
                    <img src="<?= base_url('assets/images/competition-logo/web.webp'); ?>" alt="Website Development" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>Web Development<br>Competition</p>
                        <a href="<?= base_url('kompetisi/web-development'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
                <div class="grid-child onscroll-r" style="--delay: 2;">
                    <img src="<?= base_url('assets/images/competition-logo/painting.webp'); ?>" alt="Website Development" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>Painting</p>
                        <a href="<?= base_url('kompetisi/web-development'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="second-grid">
                <div class="grid-child onscroll-r" style="--delay: 1;">
                    <img src="<?= base_url('assets/images/competition-logo/band.webp'); ?>" alt="Competitive Programming" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>Band / Acoustic</p>
                        <a href="<?= base_url('kompetisi/competitive-programming'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
                <div class="grid-child onscroll-r" style="--delay: 2;">
                    <img src="<?= base_url('assets/images/competition-logo/dance.webp'); ?>" alt="Website Development" class="logo-kompetisi-lg" />
                    <div class="competition-detail">
                        <p>Dance Creation</p>
                        <a href="<?= base_url('kompetisi/web-development'); ?>" class="btn btn-secondary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="section light" id="seminar">
        <div class="section-seminar">
            <div class="item center onscroll-r">
                <h1>SEMINAR NASIONAL</h1>
                <h1>TECHNOLOGY EUPHORIA 2023</h1>
                <div class="item-detail">
                    <p>Technology Euphoria 2023 kembali mengadakan Seminar dan Talkshow nasional dengan tema
                        “Expressing, Educating, and Inspiring change through Digital Creative in the Era of 5.0” yang
                        akan dilaksanakan pada:</p>
                    <table class="details-table">
                        <tr>
                            <td><i class='bx bx-calendar-alt'></i> Tanggal Pelaksanaan</td>
                            <td>Sabtu, 21 Oktober 2023</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-map'></i> Tempat Pelaksanaan</td>
                            <td>FASILKOM Universitas Sriwijaya</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-user-voice'></i> Pembicara</td>
                            <td>Leonardo Edwin (Content Creator)</td>
                        </tr>
                        <tr>
                            <td><i class='bx bx-user-voice'></i> Pembicara</td>
                            <td>Angga Fauzan (CEO MySkill)</td>
                        </tr>
                    </table>
                </div>
                <a href="<?= base_url('seminar'); ?>" class="btn btn-fancy">Selengkapnya</a>
            </div>
            <div class="item onscroll-r" style="--delay: 1;">
                <img src="/assets/images/seminar.webp" alt="Seminar Nasional" class="seminar-img" />
            </div>
        </div>
    </div> -->

    <div class="section onscroll" id="kilas-balik">
        <h1>KILAS BALIK TECHNOLOGY EUPHORIA 2023</h1>
        <p>Dalam Technology Euphoria ini, terdapat beberapa lomba yang diadakan seperti dibawah ini</p>
        <a href="<?= base_url('sejarah'); ?>" class="btn btn-fancy">Selengkapnya</a>
        <div class="kilas-balik-grid">
            <div class="grid-child onscroll">
                <img src="<?= base_url('assets-old/sejarah-image/techpho23-1.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2023</a>
                </div>
            </div>
            <div class="grid-child onscroll" style="--delay: 1;">
                <img src="<?= base_url('assets-old/sejarah-image/techpho23-2.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2023</a>
                </div>
            </div>
            <div class="grid-child onscroll">
                <img src="<?= base_url('assets-old/sejarah-image/techpho23-3.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2023</a>
                </div>
            </div>
            <div class="grid-child onscroll" style="--delay: 1;">
                <img src="<?= base_url('assets-old/sejarah-image/techpho23-7.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2023</a>
                </div>
            </div>
            <div class="grid-child onscroll">
                <img src="<?= base_url('assets-old/sejarah-image/techpho23-5.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2023</a>
                </div>
            </div>
            <div class="grid-child onscroll" style="--delay: 1;">
                <img src="<?= base_url('assets-old/sejarah-image/techpho23-6.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2023</a>
                </div>
            </div>
        </div>
    </div>

    <!--\ <div class="section light" id="sponsors">
        <div class="section-ms">
            <h1 class="onscroll-r">SPONSORS</h1>
            <div class="ms">
                <?php
                $path = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'sponsor' . DIRECTORY_SEPARATOR;
                foreach (glob($path . "*.*") as $file) {
                    echo '<img class="ms-images onscroll-r" src="/assets/sponsor/' . basename($file) . '" alt="' . basename($file) . '" />';
                }
                ?>
            </div>
        </div>
    </div> -->

    <!-- <div class="section" id="media-partners">
        <div class="section-ms">
            <h1 class="onscroll-r">MEDIA PARTNERS</h1>
            <div class="ms">
                <?php
                $path = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'medpar' . DIRECTORY_SEPARATOR;
                foreach (glob($path . "*.*") as $file) {
                    echo '<img class="ms-images onscroll-r" src="/assets/medpar/' . basename($file) . '" alt="' . basename($file) . '" />';
                }
                ?>
            </div>
        </div>
    </div> -->
</div>

<?= $this->endSection(); ?>