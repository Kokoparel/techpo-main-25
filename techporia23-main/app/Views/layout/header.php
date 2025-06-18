<header>
    <div class="header-wrapper">
        <a class="header-logo" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>/assets/images/logo24.webp" alt="Technology Euphoria">
            <span>Sinergi Fest </span>
        </a>
        <nav>
            <ul class="menu">
                <li><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>
                <li><a class="nav-link" href="<?php echo base_url('#about'); ?>">About</a></li>
                <li><a class="nav-link" href="<?php echo base_url('seminar'); ?>">Seminar</a></li>
                <li>
                    <button class="nav-link nav-dropdown" data-dropdown="competition-nav" aria-haspopup="true"
                        aria-expanded="false" aria-label="competition">
                        Competition
                        <i class="bx bx-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div id="competition-nav" class="nav-box" style="padding-right: 2rem;">
                        <ul>
                            <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/business-plan'); ?>">Business Plan</a>
                            </li>
                            <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/competitive-programming'); ?>">Competitive Programming</a>
                            </li>
                            <!-- <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/Essay'); ?>">Essay</a>
                            </li> -->
                            <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/ui-ux'); ?>">UI/UX Design</a>
                            </li>
                            <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/web-development'); ?>">Web Development</a>
                            </li>
                            <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/mobile-legend'); ?>">Mobile Legend</a>
                            </li>
                            <!-- <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/Musik'); ?>">Band / Acoustic</a>
                            </li>
                            <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/Lukis'); ?>">Painting</a>
                            </li>
                            <li>
                                <a class="nav-data-link"
                                href="<?= base_url('kompetisi/Tari'); ?>">Dance Creation</a>
                            </li> -->
                        </ul>
        
                </li>
                <li><a class="nav-link" href="<?php echo base_url('sejarah'); ?>">Kilas Balik</a></li>
                <li><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <div class="right-corner">
                <?php if (auth()->loggedIn()): ?>
                    <button class="nav-link nav-dropdown" data-dropdown="profile-nav" aria-haspopup="true"
                        aria-expanded="false" aria-label="profile">
                        <i class='bx bx-user'></i>
                        <?= auth()->user()->username; ?>
                        <i class="bx bx-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div id="profile-nav" class="nav-box">
                        <ul>
                            <li><a class="nav-data-link" href="<?= base_url('profile'); ?>">
                                    <i class='bx bx-cog'></i>
                                    Profile
                                </a></li>
                            <li><a class="nav-data-link" href="<?= base_url('logout'); ?>">
                                    <i class='bx bx-log-out'></i>
                                    Logout
                                </a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="btn btn-outline-primary" href="<?= base_url('login'); ?>">Login</a>
                <?php endif; ?>
                <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-menu" aria-hidden="true"></i>
                </button>
            </div>
        </nav>
    </div>
</header>