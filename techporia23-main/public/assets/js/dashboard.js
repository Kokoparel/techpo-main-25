// Notifikasi
$('.table-toggle td button').click(function() {
if ($(this).closest('tr').next().css('display') == 'none') {
    $(this).closest('tr').next().css('display', 'table-row')
    $(this).text('Tutup');
} else {
    $(this).closest('tr').next().css('display', 'none');
    $(this).text('Detail');
}
})

$('.table-toggle .tim-info').click(function() {
    if ($(this).closest('tr').next().css('display') == 'none') {
        $(this).closest('tr').next().css('display', 'table-row')
    } else {
        $(this).closest('tr').next().css('display', 'none');
    }
})

// Lomba Modal
let modal = document.getElementById("daftar-lomba-modal");
let btn = document.querySelectorAll("#daftar-lomba-btn");
let span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.forEach((btn) => {
    btn.onclick = function() {
        modal.style.display = "block";
    }
})

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// Berkas Modal
let modalBerkas = document.getElementById("berkas-modal");
let btnBerkas = document.querySelectorAll("#berkas-btn");
let spanBerkas = document.getElementsByClassName("close")[1];

btnBerkas.forEach((btnBerkas) => {
    btnBerkas.onclick = function() {
        modalBerkas.style.display = "block";
    }
})

spanBerkas.onclick = function() {
    modalBerkas.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    } else if(event.target == modalBerkas) {
        modalBerkas.style.display = "none";
    }
}


// Tab
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
    document.getElementById(formName).style.display = "block";
    event.currentTarget.className += " active";
}



// select
const select = document.querySelector('.select');
const optionBox = document.querySelector('.options');
const options = [...document.querySelectorAll('.options .item')];

let activeOption = 0; // default should be 0

select.onclick = (e) => {
    if(!e.target.className.includes('select')){
        select.classList.remove('active');
        optionBox.classList.remove('active');
    } else{
        select.classList.toggle('active');
        optionBox.classList.toggle('active');
    }
}

options.forEach((item, i) => {
    item.onmousemove = () => {
        hoverOptions(i);
    }
})

const hoverOptions = (i) => {
    options[activeOption].classList.remove('active');
    options[i].classList.add('active');
    activeOption = i;
    setValue();
}

window.onkeydown = (e) => {
    if(select.className.includes('active')){
        e.preventDefault();
        if(e.key === 'ArrowDown' && activeOption < options.length - 1){
            hoverOptions(activeOption + 1);
        } else if(e.key === 'ArrowUp' && activeOption > 0){
            hoverOptions(activeOption - 1);
        } else if(e.key === 'Enter'){
            select.classList.remove('active');
            optionBox.classList.remove('active');
        }
    }
}

const setValue = () => {
    select.innerHTML = select.value = options[activeOption].innerHTML;
}

setValue();
