<?= $this->extend('layout/master_layout_sejarah'); ?>

<?= $this->section('title'); ?>Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="section light" id="about">
  <div class="about">
    <img src="<?php echo base_url('assets/images/MASKOT 2.png') ?>" alt="maskot" class="onscroll-r" style="--delay: 0;" />
    <div class="about-detail onscroll-r" style="--delay: 1;">
      <h1>Sejarah <br>Technology Euphoria</h1>
      <p>
        Techphoria merupakan serangkaian acara IT tahunan dengan fokus utama kompetisi yang diperuntukan
        bagi Universitas/Politeknik
        se-Indonesia untuk meningkatkan kesadaran tentang peranan IT serta meningkatkan nilai keilmuan dan
        komprehensif di bidang
        ilmu teknologi informasi komputer. Ajang ini sendiri diprakarsai oleh Mahasiswa Fakultas Ilmu
        Komputer Universitas Sriwijaya.
      </p>
    </div>
  </div>
</div>

<section id="resume-section">
  <div class="container-sejarah">
    <div class="col-md-12">
      <div class="row-sejarah">
        <?php for ($i = 14; $i < date('y'); $i++) { ?>
          <div class="col-md-4 text-center d-flex">
            <a href="<?php echo base_url('sejarah/20' . $i) ?>" class="services-1">
              <span class="icon">
                <img class="mt-2 ml-1" src="<?php echo base_url('assets-old/images/logos/' . $i . '.png') ?>" alt="">
              </span>
              <div class="desc">
                <h3 class="mb-5">Technology Euphoria 20<?php echo $i ?></h3>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>