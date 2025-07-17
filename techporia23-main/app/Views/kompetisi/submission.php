<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> Submission | Technology Euhporia <?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container top">
        <div class="submission-flex">
            <?php if ($data['id_kompetisi'] == 5): ?>
                <?= $this->include('submission/business_plan'); ?>
            <?php elseif ($data['id_kompetisi'] == 9): ?>
                <?= $this->include('submission/mobile_legends'); ?>
            <?php elseif ($data['id_kompetisi'] == 1): ?>
                <?= $this->include('submission/competitive_programming'); ?>
            <?php elseif ($data['id_kompetisi'] == 3): ?>
                <?= $this->include('submission/uiux'); ?>
            <?php elseif ($data['id_kompetisi'] == 2): ?>
                <?= $this->include('submission/webdev'); ?>
            <?php elseif ($data['id_kompetisi'] == 4): ?>
                <?= $this->include('submission/essay'); ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        var fileInput = document.querySelectorAll('input[type="file"]');
        fileInput.forEach(function (input) {
            input.addEventListener('change', function (e) {
                var fileSize = this.files[0].size / 1024 / 1024;
                if (fileSize > 5) {
                    alert("File size exceeds 5 MB");
                    this.value = '';
                }
            });
        });
    });

    function openform(event, formName) {
        var tabcontent = document.getElementsByClassName("tab-content");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        var tablinks = document.getElementsByClassName('tab-link');
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(' active', '');
        }

        document.getElementById(formName).style.display = "block";
        event.currentTarget.className += " active";
    }
</script>