<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Submission | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="main">
  <div class="container top">
    <div class="submission-flex">
      <img src="<?= base_url('assets/images/competition-logo/ui-ux.webp'); ?>" alt="UI/UX Design" class="logo-kompetisi-lg" />
      <div class="submission-detail">
        <h1 class="submission-title">Submission UI/UX Design</h1>

        <?= validation_list_errors(); ?>
        <?= form_open_multipart('profile/submission/proposal'); ?>
        <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">
        <div class="input-wrapper">
          <label for="universitas">Nama Tim</label>
          <input type="text" name="universitas" id="universitas" value="<?= $data['nama_tim'] ?>" disabled>
        </div>
        <div class="input-wrapper">
          <label for="proposal">Upload Proposal (PDF)</label>
          <input type="file" name="proposal" id="proposal" required />
          <?php if ($dataProposal): ?>
            <label>Last submitted at <?= $dataProposal['created_at']; ?></label>
          <?php endif; ?>
        </div>
        <input type="submit" value="Submit" class="btn btn-submit" />
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>