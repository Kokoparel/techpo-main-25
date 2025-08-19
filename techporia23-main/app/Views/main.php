<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="section" id="home">
        <div class="hero-bg">
        </div>
        <div class="hero onscroll">
            <h3>FASILKOM </h3>
            <h1>SINERGI FEST 2025</h1>
            <div id="theme-text"></div>
            <div class="container-5" style="margin-top: 3rem;">
                <a href="<?= base_url('#about'); ?>" class="btn btn-fancy">START</a>
                <!-- <a href="<?= base_url('register'); ?>" class="btn btn-outline-fancy">JOIN US</a> -->
            </div>
        </div>
    </div>

    <div class="section light" id="about">
        <div class="about-container">
            <div class="speech-bubble onscroll-r" style="--delay: 0;">
                <h1 class="about-title">ABOUT<br>SINERGI FEST</h1><br>
                <p class="about-text">
                    Sinergi Fest merupakan serangkaian acara IT tahunan dengan fokus utama kompetisi yang diperuntukan
                    bagi Universitas/Politeknik se-Indonesia untuk meningkatkan kesadaran tentang peranan IT serta 
                    meningkatkan nilai keilmuan dan komprehensif di bidang ilmu teknologi informasi komputer. 
                    Ajang ini sendiri diprakarsai oleh Mahasiswa Fakultas Ilmu Komputer Universitas Sriwijaya.
                </p>
            </div>
            <div class="mascot-container onscroll-r" style="--delay: 1;">
                <img src="<?php echo base_url('assets/images/Mascot Head.svg') ?>" 
                    alt="Sinergi Fest Mascot" 
                    class="mascot" />
            </div>
        </div>
    </div>

    <!-- COMPE Start -->
    <div class="section light" id="competition">
        <h1>COMPETITION</h1>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide compe-card">
                    <img src="/assets/images/competition-logo/compe-2025/Bisnis.svg" />
                    <h3>Business<br>Plan</h3>
                    <a href="/kompetisi/business-plan"><button>More</button></a>
                </div>
                <div class="swiper-slide compe-card">
                    <img src="/assets/images/competition-logo/compe-2025/Compe.svg" />
                    <h3>Competitive <br>Programming</h3>
                    <a href="/kompetisi/competitive-programming"><button>More</button></a>
                </div>
                <div class="swiper-slide compe-card">
                    <img src="/assets/images/competition-logo/compe-2025/UI-UX.svg" />
                    <h3>UI/UX <br>Design</h3>
                    <a href="/kompetisi/ui-ux"><button>More</button></a>
                </div>
                <div class="swiper-slide compe-card">
                    <img src="/assets/images/competition-logo/compe-2025/Web-Dev.svg" />
                    <h3>Web <br>Development</h3>
                    <a href="/kompetisi/web-development"><button>More</button></a>
                </div>
                <div class="swiper-slide compe-card">
                    <img src="/assets/images/competition-logo/compe-2025/ML.svg" />
                    <h3>Mobile<br> Legends</h3>
                    <a href="/kompetisi/mobile-legend"><button>More</button></a>
                </div>
            </div>
            <!-- Panah Navigasi -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
        </div>  
    </div>
    <!-- COMPE END -->

    <div class="section light" id="seminar">
        <div class="section-seminar">
            <div class="item center onscroll-r">
                <h1>TALSKHOW NASIONAL</h1>
                <h1>SINERGI FEST 2025</h1>
                <div class="item-detail">
                    <p>Sinergi Fest 2025 mengadakan Talkshow nasional dengan tema
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
                <a href="<?= base_url('talkshow'); ?>" class="btn btn-fancy">Selengkapnya</a>
            </div>
            <div class="item onscroll-r" style="--delay: 1;">
                <img src="/assets/images/seminar.webp" alt="Seminar Nasional" class="seminar-img" />
            </div>
        </div>
    </div>

    <div class="section light" id="workshop">
        <div class="section-workshop">
            <!-- Gambar ke kiri -->
            <div class="item onscroll-r" style="--delay: 1;">
                <img src="/assets/images/seminar.webp" alt="Seminar Nasional" class="seminar-img" />
            </div>

            <!-- Teks ke kanan -->
            <div class="item center onscroll-r">
                <h1>WORKSHOP NASIONAL</h1>
                <h1>SINERGI FEST 2025</h1>
                <div class="item-detail">
                    <p>Sinergi Fest 2025 juga mengadakan Workshop nasional dengan tema
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
                <a href="<?= base_url('workshop'); ?>" class="btn btn-fancy">Selengkapnya</a>
            </div>
        </div>
    </div>

    <!--
    <div class="section onscroll" id="kilas-balik">
        <h1>KILAS TECHPORIA 2024 </h1>
        <p>Dalam Sinergi Fest ini, terdapat beberapa lomba yang diadakan seperti dibawah ini</p>
        <a href="<?= base_url('sejarah'); ?>" class="btn btn-fancy">Selengkapnya</a>
        <div class="kilas-balik-grid">
            <div class="grid-child onscroll">
                <img src="<?= base_url('assets-old/sejarah-image/techpho24-1.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2024</a>
                </div>
            </div>
            <div class="grid-child onscroll" style="--delay: 1;">
                <img src="<?= base_url('assets-old/sejarah-image/techpho24-2.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2024</a>
                </div>
            </div>
            <div class="grid-child onscroll">
                <img src="<?= base_url('assets-old/sejarah-image/techpho24-3.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2024</a>
                </div>
            </div>
            <div class="grid-child onscroll" style="--delay: 1;">
                <img src="<?= base_url('assets-old/sejarah-image/techpho23-7.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2024</a>
                </div>
            </div>
            <div class="grid-child onscroll">
                <img src="<?= base_url('assets-old/sejarah-image/techpho24-5.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2024</a>
                </div>
            </div>
            <div class="grid-child onscroll" style="--delay: 1;">
                <img src="<?= base_url('assets-old/sejarah-image/techpho24-6.jpg'); ?>" alt="kilas balik" />
                <div class="overlay">
                    <a href="<?= base_url('sejarah'); ?>">Kilas Balik Technology Euphoria 2024</a>
                </div>
            </div>
        </div>
    </div>
    -->

    <div class="section light" id="sponsors">
        <div class="section-ms">
            <h1 class="onscroll-r">SPONSORS</h1>
            <div class="ms sponsors-list">
                <?php
                $path = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'sponsor' . DIRECTORY_SEPARATOR;
                foreach (glob($path . "*.*") as $file) {
                    echo '<img class="ms-images sponsor-img onscroll-r" src="/assets/sponsor/' . basename($file) . '" alt="' . basename($file) . '" />';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="section" id="media-partners">
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
    </div>
</div>

<?= $this->endSection(); ?>