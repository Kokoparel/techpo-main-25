<?= $this->extend('user/layout'); ?>

<?= $this->section('title'); ?>Daftar Lomba | Technology Euphoria
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container-form" style="display:flex; flex-direction:column; gap:1rem;">
        <h1>Daftar Kompetisi Technology Euphoria</h1>

        <?= validation_list_errors(); ?>

        <div class="btn-group">
            <button class="tab-link active btn btn-info btn-lg" onclick="openform(event, 'daftar')">Daftar Tim</button>
            <button class="tab-link btn btn-info btn-lg" onclick="openform(event, 'gabung')">Gabung Tim</button>
        </div>
        <div id="daftar" class="tab-content" style="display: block;">
            <?= form_open('profile/daftar-lomba'); ?>
            <div class="input-wrapper">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim" required>
            </div>
            <div class="input-wrapper">
                <label for="universitas">Universitas/Sekolah (isi"-" jika bukan keduanya)</label>
                <input type="text" name="universitas" id="universitas" value="<?= $userData['universitas'] ?>" disabled>
            </div>
            <div class="input-wrapper">
                <label for="kompetisi">Cabang Kompetisi</label>
                <div class="select-dropdown">
                    <select name="kompetisi" id="kompetisi" onchange="toggleMLFields()">
                            <option value="1">Competitive Programming</option>
                            <option value="2">Web Development</option>
                            <option value="3">UI/UX Design</option>
                            <option value="5">Business Plan</option>
                            <option value="9">Mobile Legends</option>
                    </select>
                </div>
            </div>
           <div id="ml-fields" style="display:none;">
                <div class="input-wrapper">
                    <label>Ketua Tim - Nickname</label>
                    <input type="text" name="ml_member[1][nickname]" placeholder="Nickname Ketua Tim" required>
                </div>
                <div class="input-wrapper">
                    <label>Ketua Tim - ID</label>
                    <input type="text" name="ml_member[1][id]" placeholder="ID Ketua Tim" required>
                </div>
                <?php for ($i = 2; $i <= 5; $i++): ?>
                    <div class="input-wrapper">
                    <label>Anggota <?= $i ?> - Nama</label>
                    <input type="text" name="ml_member[<?= $i ?>][nama]" placeholder="Nama Anggota <?= $i ?>" required>
                </div>
                <div class="input-wrapper">
                    <label>Anggota <?= $i ?> - Nickname</label>
                    <input type="text" name="ml_member[<?= $i ?>][nickname]" placeholder="Nickname Anggota <?= $i ?>" required>
                </div>
                <div class="input-wrapper">
                    <label>Anggota <?= $i ?> - ID</label>
                    <input type="text" name="ml_member[<?= $i ?>][id]" placeholder="ID Anggota <?= $i ?>" required>
                </div>
                <?php endfor; ?>
                <!-- Cadangan -->
                <div class="input-wrapper">
                    <label>Cadangan - Nama</label>
                    <input type="text" name="ml_cadangan[nama]" placeholder="Nama Cadangan">
                </div>
                <div class="input-wrapper">
                    <label>Cadangan - Nickname</label>
                    <input type="text" name="ml_cadangan[nickname]" placeholder="Nickname Cadangan">
                </div>
                <div class="input-wrapper">
                    <label>Cadangan - ID</label>
                    <input type="text" name="ml_cadangan[id]" placeholder="ID Cadangan">
                </div>
            </div>
            <input type="submit" value="Daftar" class="btn btn-submit" />
            <p>*NB: Pembuat tim otomatis menjadi ketua tim</p>
            <?= form_close(); ?>
        </div>

        <div id="gabung" class="tab-content">
            <p>Gabung dengan tim yang sudah dibuat ketua kamu dengan memasukkan ID tim</p>
            <?= form_open('profile/join-tim'); ?>
            <div class="input-wrapper">
                <label for="kompetisi_gabung">Cabang Kompetisi</label>
                <div class="select-dropdown">
                    <select name="kompetisi_gabung" id="kompetisi_gabung" onchange="toggleMLJoinFields()">
                        <option value="1">Competitive Programming</option>
                        <option value="2">Web Development</option>
                        <option value="3">UI/UX Design</option>
                        <option value="5">Business Plan</option>
                        <option value="9">Mobile Legends</option>
                    </select>
                </div>
            </div>
            <div class="input-wrapper">
                <label for="kode_tim">Kode unik tim</label>
                <input type="text" name="kode_tim" id="kode_tim" placeholder="Kode unik tim" required>
            </div>
            <div id="ml-join-fields" style="display:none;">
                <div class="input-wrapper">
                    <label for="ml_nickname_join">Nickname Mobile Legends</label>
                    <input type="text" name="ml_nickname_join" id="ml_nickname_join" placeholder="Nickname Mobile Legends">
                </div>
                <div class="input-wrapper">
                    <label for="ml_id_join">ID Mobile Legends</label>
                    <input type="text" name="ml_id_join" id="ml_id_join" placeholder="ID Mobile Legends">
                </div>
            </div>
            <input type="submit" value="Daftar" class="btn btn-submit" />
            <?= form_close(); ?>
        </div>

<script>
function setRequired(el, yes) {
  if (yes) {
    el.setAttribute('required', 'required');
    el.removeAttribute('disabled');
  } else {
    el.removeAttribute('required');
    el.setAttribute('disabled', 'disabled');
  }
}

function toggleMLFields() {
  const kompetisi = document.getElementById('kompetisi').value;
  const mlFields = document.getElementById('ml-fields');
  const inputs = mlFields.querySelectorAll('input');

  if (kompetisi === '9') { // Mobile Legends
    mlFields.style.display = 'block';
    inputs.forEach((inp) => {
      // cadangan boleh kosong: cek name mengandung 'ml_cadangan'
      if (inp.name.startsWith('ml_cadangan')) {
        inp.removeAttribute('required');
        inp.removeAttribute('disabled');
      } else {
        setRequired(inp, true);
      }
    });
  } else {
    mlFields.style.display = 'none';
    inputs.forEach((inp) => setRequired(inp, false));
  }
}

function toggleMLJoinFields() {
  const kompetisiGabung = document.getElementById('kompetisi_gabung').value;
  const mlJoinFields = document.getElementById('ml-join-fields');
  const nick = document.getElementById('ml_nickname_join');
  const mlid = document.getElementById('ml_id_join');

  if (kompetisiGabung === '9') {
    mlJoinFields.style.display = 'block';
    setRequired(nick, true);
    setRequired(mlid, true);
  } else {
    mlJoinFields.style.display = 'none';
    setRequired(nick, false);
    setRequired(mlid, false);
  }
}

document.addEventListener('DOMContentLoaded', function() {
  toggleMLFields();
  toggleMLJoinFields();
  document.getElementById('kompetisi').addEventListener('change', toggleMLFields);
  document.getElementById('kompetisi_gabung').addEventListener('change', toggleMLJoinFields);
});
</script>

<?= $this->endSection(); ?>