<?= $this->extend('layout/master_layout'); ?>

<?= $this->section('title'); ?> Submission | Technology Euhporia
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container top">
        <div class="submission-flex">
            <?php if ($data['id_kompetisi'] == 5): ?>

                <img src="<?= base_url('assets/images/competition-logo/business.webp'); ?>" alt="Business Plan"
                    class="logo-kompetisi-lg" />
                <div class="submission-detail">
                    <h1 class="submission-title">Submission Business Plan</h1>

                    <?= validation_list_errors(); ?>

                    <?= form_open_multipart('profile/submission/proposal'); ?>
                    <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">
                    <div class="input-wrapper">
                        <label for="universitas">Nama Tim</label>
                        <input type="text" name="universitas" id="universitas" value="<?= $data['nama_tim'] ?>" disabled>
                    </div>
                    <div class="input-wrapper">
                        <label for="proposal">Upload Proposal (pdf)</label>
                        <input type="file" name="proposal" id="proposal" required />
                        <?php if ($dataProposal): ?>
                            <label for="proposal">Last submitted at
                                <?= $dataProposal['created_at']; ?>
                            </label>
                        <?php endif; ?>
                    </div>
                    <input type="submit" value="submit" name="confirm" class="btn btn-submit" />
                    <?= form_close(); ?>
                </div>

            <?php elseif ($data['id_kompetisi'] == 3): ?>

                <img src="<?= base_url('assets/images/competition-logo/ui-ux.webp'); ?>" alt="UI/UX Design"
                    class="logo-kompetisi-lg" />
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
                        <label for="proposal">Upload Proposal (pdf)</label>
                        <input type="file" name="proposal" id="proposal" required />
                        <?php if ($dataProposal): ?>
                            <label for="proposal">Last submitted at
                                <?= $dataProposal['created_at']; ?>
                            </label>
                        <?php endif; ?>
                    </div>
                    <input type="submit" value="submit" name="confirm" class="btn btn-submit" />
                    <?= form_close(); ?>
                </div>
            
            <?php elseif ($data['id_kompetisi'] == 2): ?>

                <img src="<?= base_url('assets/images/competition-logo/webdev.webp'); ?>" alt="Web Development"
                    class="logo-kompetisi-lg" />
                <div class="submission-detail">
                    <h1 class="submission-title">Submission Web Development</h1>

                    <?= validation_list_errors(); ?>

                    <div class="btn-group" style="margin-top: 2rem;">
                        <button class="tab-link active btn btn-info btn-lg"
                            onclick="openform(event, 'proposal')">Proposal</button>
                        <button class="tab-link btn btn-info btn-lg" onclick="openform(event, 'source-code')">Source
                            Code</button>
                    </div>
                    <div id="proposal" class="tab-content" style="display: block;">
                        <?= form_open_multipart('profile/submission/proposal'); ?>
                        <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">
                        <div class="input-wrapper">
                            <label for="universitas">Nama Tim</label>
                            <input type="text" name="universitas" id="universitas" value="<?= $data['nama_tim'] ?>"
                                disabled>
                        </div>
                        <div class="input-wrapper">
                            <label for="proposal">Upload Proposal (pdf: Max 5 mb)</label>
                            <input type="file" name="proposal" id="proposal" required />
                            <?php if ($dataProposal): ?>
                                <label for="proposal">Last submitted at
                                    <?= $dataProposal['created_at']; ?>
                                </label>
                            <?php endif; ?>
                        </div>
                        <input type="submit" value="submit" name="confirm" class="btn btn-submit" />
                        <?= form_close(); ?>
                    </div>
                    <?php elseif ($data['id_kompetisi'] == 4): ?> <!-- Check if it's the Essay competition -->

<img src="<?= base_url('assets/images/competition-logo/essay.webp'); ?>" alt="Essay Competition"
    class="logo-kompetisi-lg" />
<div class="submission-detail">
    <h1 class="submission-title">Submission Essay</h1>

    <?= validation_list_errors(); ?>

    <?= form_open_multipart('profile/submission/proposal'); ?>
    <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">
    <div class="input-wrapper">
        <label for="universitas">Nama Tim</label>
        <input type="text" name="universitas" id="universitas" value="<?= $data['nama_tim'] ?>" disabled>
    </div>
    <div class="input-wrapper">
        <label for="proposal">Upload Essay (pdf: Max 5 mb)</label>
        <input type="file" name="proposal" id="proposal" required />
        <?php if ($dataProposal): ?>
            <label for="proposal">Last submitted at
                <?= $dataProposal['created_at']; ?>
            </label>
        <?php endif; ?>
    </div>
    <input type="submit" value="submit" name="confirm" class="btn btn-submit" />
    <?= form_close(); ?>
</div>

<?php endif; ?>
                    <div id="source-code" class="tab-content">
                        <?= form_open_multipart('profile/submission/source-code'); ?>
                        <input type="hidden" name="tim_id" value="<?= $data['tim_id']; ?>">
                        <div class="input-wrapper">
                            <label for="universitas">Nama Tim</label>
                            <input type="text" name="universitas" id="universitas" value="<?= $data['nama_tim'] ?>"
                                disabled>
                        </div>
                        <div class="input-wrapper">
                            <label for="source_code">Upload Source Code (zip / rar)</label>
                            <input type="file" name="source_code" id="source_code" required />
                            <?php if ($dataSourceCode): ?>
                                <label for="source_code">Last submitted at
                                    <?= $dataSourceCode['created_at']; ?>
                                </label>
                            <?php endif; ?>
                        </div>
                        <input type="submit" value="submit" name="confirm" class="btn btn-submit" />
                        <?= form_close(); ?>
                    </div>
                </div>
                <script type="text/javascript">
                    function openform(event, formName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tab-content");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName('tab-link');
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(' active', '');
                        }
                        document.getElementById(formName).style.display = "block";
                        event.currentTarget.className += " active";
                    }
                </script>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var fileInput = document.querySelectorAll('input[type="file"]');
        fileInput.forEach(function(input) {
            input.addEventListener('change', function(e) {
                var fileSize = this.files[0].size / 1024 / 1024; // size in MB
                if (fileSize > 5) {
                    alert("File size exceeds 5 MB");
                    this.value = ''; // Clear the file input
                }
            });
        });
    });
</script>