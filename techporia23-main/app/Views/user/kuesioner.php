<?= $this->extend('user/layout'); ?>

<?= $this->section('title'); ?>kuesioner | Technology Euphoria<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="main">
    <div class="container top bottom">
        <h2>Darimanakah kamu mendapatkan informasi mengenai Techporia UNSRI 2023?</h2>

        <?= form_open('profile/kuesioner'); ?>
            <div class="input-wrapper-radio">
                <input type="radio" name="kuesioner" id="Teman" value="Teman" onclick="toggleTextarea()" checked>
                <label for="Teman">Teman</label>
            </div>
            <div class="input-wrapper-radio">
                <input type="radio" name="kuesioner" id="Instagram" onclick="toggleTextarea()" value="Instagram">
                <label for="Instagram">Instagram</label>
            </div>
            <div class="input-wrapper-radio">
                <input type="radio" name="kuesioner" id="Line" onclick="toggleTextarea()" value="Line">
                <label for="Line">Line</label>
            </div>
            <div class="input-wrapper-radio">
                <input type="radio" name="kuesioner" id="Whatsapp" onclick="toggleTextarea()" value="Whatsapp">
                <label for="Whatsapp">Whatsapp</label>
            </div>
            <div class="input-wrapper-radio">
                <input type="radio" name="kuesioner" id="LinkedIn" onclick="toggleTextarea()" value="LinkedIn">
                <label for="LinkedIn">LinkedIn</label>
            </div>
            <div class="input-wrapper-radio">
                <input type="radio" name="kuesioner" id="Organisasi" onclick="toggleTextarea()" value="Organisasi">
                <label for="Organisasi">Himbauan Organisasi / Pihak Kampus</label>
            </div>
            <div class="input-wrapper-radio">
                <input type="radio" name="kuesioner" id="lain-lain" onclick="toggleTextarea()" value="lain-lain">
                <label for="lain-lain">Lain-lain</label>
            </div>
            <textarea class="kuesioner-text" placeholder="Masukkan informasi..."
                name="kuesioner-text" id="kuesioner-text" rows="2" style="display: none;"></textarea>
            
            <script type="text/javascript">
                function toggleTextarea() {
                    let checkLain = document.getElementById("lain-lain");
                    let textarea = document.getElementById("kuesioner-text");
                    
                    if(checkLain.checked) {
                        textarea.style.display = "block";
                        textarea.required = true;
                        textarea.focus();
                    } else {
                        textarea.required = false;
                        textarea.style.display = "none";
                    }
                }
            </script>

            <input type="submit" class="btn btn-submit" name="confirm" value="Submit"/>
        <?= form_close(); ?>
    </div>
</div>

<?= $this->endSection(); ?>