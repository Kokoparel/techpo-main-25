<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?>Submission | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="main">
  <div class="container top">
    <div class="submission-flex">
      <img src="<?= base_url('assets/images/competition-logo/web.webp'); ?>" alt="Web Dev" class="logo-kompetisi-lg" />
      <div class="submission-detail">
        <h1 class="submission-title">Submission Web Development</h1>

        <?= validation_list_errors(); ?>

        <div class="btn-group" style="margin-top: 2rem;">
          <button class="tab-link active btn btn-info btn-lg" onclick="openform(event, 'proposal')">Proposal</button>
          <button class="tab-link btn btn-info btn-lg" onclick="openform(event, 'source-code')">Source Code</button>
        </div>

        <div id="proposal" class="tab-content" style="display: block;">
          <?= form_open_multipart('profile/submission/proposal'); ?>
          <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">
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

        <div id="source-code" class="tab-content" style="display: none;">
          <?= form_open_multipart('profile/submission/source-code'); ?>
          <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">
          <div class="input-wrapper">
            <label for="source_code">Upload Source Code (zip/rar)</label>
            <input type="file" name="source_code" id="source_code" required />
            <?php if ($dataSourceCode): ?>
              <label>Last submitted at <?= $dataSourceCode['created_at']; ?></label>
            <?php endif; ?>
          </div>
          <input type="submit" value="Submit" class="btn btn-submit" />
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>