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
            <?= form_open_multipart('profile/daftar-lomba'); ?>
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
            
            <!-- Mobile Legends Fields -->
           <div id="ml-fields" style="display:none;">
                <!-- Upload Bukti Follow Instagram -->
                <!-- Pastikan file input ada dan benar -->
<div class="input-wrapper">
    <label for="ml_follow_proof">Bukti Follow Instagram</label>
    <input type="file" name="ml_follow_proof" id="ml_follow_proof" accept="image/*">
    <small>Format: JPG, PNG. Max: 2MB</small>
</div>

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
                    <input type="text" name="ml_nickname_join" id="ml_nickname_join" placeholder="Nickname Mobile Legends" required>
                </div>
                <div class="input-wrapper">
                    <label for="ml_id_join">ID Mobile Legends</label>
                    <input type="text" name="ml_id_join" id="ml_id_join" placeholder="ID Mobile Legends" required>
                </div>
            </div>
            <input type="submit" value="Daftar" class="btn btn-submit" />
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
// Fungsi helper untuk set/remove required attribute
function setRequired(el, yes) {
    if (!el) return; // Safety check
    
    if (yes) {
        el.setAttribute('required', 'required');
        el.removeAttribute('disabled');
    } else {
        el.removeAttribute('required');
        el.setAttribute('disabled', 'disabled');
    }
}

function toggleMLFields() {
    console.log('toggleMLFields called'); // Debug
    const kompetisiSelect = document.getElementById('kompetisi');
    if (!kompetisiSelect) {
        console.error('Kompetisi select not found!');
        return;
    }
    
    const kompetisi = kompetisiSelect.value;
    const mlFields = document.getElementById('ml-fields');
    if (!mlFields) {
        console.error('ML fields container not found!');
        return;
    }
    
    const inputs = mlFields.querySelectorAll('input');
    const followProof = document.getElementById('ml_follow_proof');
    
    console.log('Kompetisi value:', kompetisi); // Debug

    if (kompetisi === '9') { // Mobile Legends
        console.log('Showing ML fields'); // Debug
        mlFields.style.display = 'block';
        
        // Set required untuk bukti follow Instagram
        if (followProof) {
            followProof.setAttribute('required', 'required');
            followProof.removeAttribute('disabled');
            console.log('File input found and set to required'); // Debug
        } else {
            console.error('File input not found!'); // Debug
        }
        
        inputs.forEach((inp) => {
            // Skip file input karena sudah dihandle di atas
            if (inp.type === 'file') return;
            
            // cadangan boleh kosong: cek name mengandung 'ml_cadangan'
            if (inp.name && inp.name.includes('ml_cadangan')) {
                inp.removeAttribute('required');
                inp.removeAttribute('disabled');
            } else {
                setRequired(inp, true);
            }
        });
    } else {
        console.log('Hiding ML fields'); // Debug
        mlFields.style.display = 'none';
        
        // Remove required untuk file upload
        if (followProof) {
            followProof.removeAttribute('required');
            followProof.setAttribute('disabled', 'disabled');
        }
        
        inputs.forEach((inp) => setRequired(inp, false));
    }
}

function toggleMLJoinFields() {
    const kompetisiGabungSelect = document.getElementById('kompetisi_gabung');
    if (!kompetisiGabungSelect) {
        console.error('Kompetisi gabung select not found!');
        return;
    }
    
    const kompetisiGabung = kompetisiGabungSelect.value;
    const mlJoinFields = document.getElementById('ml-join-fields');
    if (!mlJoinFields) {
        console.error('ML join fields container not found!');
        return;
    }
    
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

// Validasi file upload
function setupFileValidation() {
    const fileInput = document.getElementById('ml_follow_proof');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Cek ukuran file (2MB = 2097152 bytes)
                if (file.size > 2097152) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    this.value = '';
                    return;
                }
                
                // Cek tipe file
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.');
                    this.value = '';
                    return;
                }
            }
        });
    }
}

// Setup event listeners
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded'); // Debug
    
    // Setup initial state
    toggleMLFields();
    toggleMLJoinFields();
    setupFileValidation();
    
    // Add event listeners
    const kompetisiSelect = document.getElementById('kompetisi');
    const kompetisiGabungSelect = document.getElementById('kompetisi_gabung');
    
    if (kompetisiSelect) {
        // Remove any existing event listeners
        kompetisiSelect.removeEventListener('change', toggleMLFields);
        // Add new event listener
        kompetisiSelect.addEventListener('change', toggleMLFields);
        console.log('Event listener added to kompetisi select');
    } else {
        console.error('Kompetisi select not found during setup!');
    }
    
    if (kompetisiGabungSelect) {
        // Remove any existing event listeners
        kompetisiGabungSelect.removeEventListener('change', toggleMLJoinFields);
        // Add new event listener
        kompetisiGabungSelect.addEventListener('change', toggleMLJoinFields);
        console.log('Event listener added to kompetisi gabung select');
    } else {
        console.error('Kompetisi gabung select not found during setup!');
    }
});

// Tab functionality (existing code - cleaned up)
function openform(event, formName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-content");
    for(i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName('tab-link');
    for(i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(' active', '');
    }
    
    const targetTab = document.getElementById(formName);
    if (targetTab) {
        targetTab.style.display = "block";
    }
    
    if (event && event.currentTarget) {
        event.currentTarget.className += " active";
    }
    
    // Re-trigger ML fields toggle after tab change
    setTimeout(() => {
        if (formName === 'daftar') {
            toggleMLFields();
        } else if (formName === 'gabung') {
            toggleMLJoinFields();
        }
    }, 100);
}
</script>

<?= $this->endSection(); ?>