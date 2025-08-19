<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Submission Competitive Programming | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="main">
  <div class="container top">
    <div class="submission-flex">
      <img src="<?= base_url('assets/images/competition-logo/compe-2025/Compe.svg'); ?>" alt="Competitive Programming" class="logo-kompetisi-lg" />
      <div class="submission-detail">
        <h1 class="submission-title">Submission Competitive Programming</h1>

        <?= validation_list_errors(); ?>
        <?= form_open_multipart('profile/submission/source-code'); ?>
        <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">

        <div class="input-wrapper">
          <label for="universitas">Nama Tim</label>
          <input type="text" name="universitas" id="universitas" value="<?= $data['nama_tim']; ?>" disabled>
        </div>

        <div class="input-wrapper">
          <label for="source_code">Upload Source Code (zip / rar, max 5 MB)</label>
          <input type="file" name="source_code" id="source_code" required />
          <?php if ($dataSourceCode): ?>
            <label for="source_code">Last submitted at <?= $dataSourceCode['created_at']; ?></label>
          <?php endif; ?>
        </div>

        <input type="submit" value="Submit" name="confirm" class="btn btn-submit" />
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>