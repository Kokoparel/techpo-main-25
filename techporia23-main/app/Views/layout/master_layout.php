<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?= $this->renderSection('title'); ?>
    </title>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="/assets/css/global.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Swiper CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

     <?= $this->renderSection('styles'); ?>
</head>

<body>
    <?= $this->include('layout/header') ?>
    <?= $this->renderSection('content') ?>
    <?= $this->include('layout/footer') ?>

    <!-- Page Loader -->
    <div class="loader-wrapper">
        <span class="loader"></span>
    </div>

    <!-- JS Links -->
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.7.0.min.js'); ?>"></script>
    <script type="text/javascript" defer src="<?= base_url('assets/js/global.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

    <!-- Page load script -->
    <script type="text/javascript">
        $(window).on('load', function() {
            $('.loader-wrapper').fadeOut('slow');
            <?php if (session()->getFlashdata('alert')) : ?>
                Swal.fire({
                    toast: true,
                    icon: '<?= session()->getFlashdata('alertType'); ?>',
                    iconColor: 'white',
                    position: 'top-right',
                    title: '<?= session()->getFlashdata('alertTitle'); ?>',
                    text: '<?= session()->getFlashdata('alert'); ?>',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'colored-toast'
                    },
                    width: 'auto',
                });
            <?php endif; ?>
        });
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            centeredSlides: true,
            spaceBetween: 30,
            loop: false,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1.5,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

<script>
    
</script>


</body>

</html>