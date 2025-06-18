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

// when user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(e) {
    if(e.target == modal) {
        modal.style.display = "none";
    }
})

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
