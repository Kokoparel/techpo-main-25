const dropdownNav = document.querySelectorAll(".nav-dropdown");
const dropdownNavContent = document.querySelectorAll(".nav-box");
const navLinks = document.querySelectorAll(".header-wrapper a");
const navMenu = document.querySelector(".menu");
const hamburgerBtn = document.getElementById("hamburger");

dropdownNav.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        const dropdownIndex = e.currentTarget.dataset.dropdown;
        const dropdownElement = document.getElementById(dropdownIndex);

        dropdownElement.classList.toggle("active");
        dropdownNavContent.forEach((dropdown) => {
            if (dropdown.id !== btn.dataset["dropdown"]) {
                dropdown.classList.remove("active");
            }
        });
        e.stopPropagation();
        btn.setAttribute(
            "aria-expanded",
            btn.getAttribute("aria-expanded") === "false" ? "true" : "false"
        );
    });
});

function setAriaExpandedFalse() {
    dropdownNav.forEach((btn) => btn.setAttribute("aria-expanded", "false"));
}

function closeDropdownNavContent() {
    dropdownNavContent.forEach((dropdown) => {
        dropdown.classList.remove("active");
        dropdown.addEventListener("click", (e) => e.stopPropagation());
    });
}

function toggleHamburger() {
    navMenu.classList.toggle("show");
}

// close dropdown when the dropdown links are clicked
navLinks.forEach((link) => {
    link.addEventListener("click", () => {
        closeDropdownNavContent();
        setAriaExpandedFalse();
        toggleHamburger();
    });
});

// close dropdown when the user clicks outside of the dropdown
document.documentElement.addEventListener("click", () => {
    closeDropdownNavContent();
    setAriaExpandedFalse();
});

// close dropdown when the user hit escape key
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        closeDropdownNavContent();
        setAriaExpandedFalse();
    }
});

// toggle hamburger menu
hamburgerBtn.addEventListener("click", toggleHamburger);

// sticky on scroll
const header = document.querySelector("header");

window.addEventListener("scroll", () => {
    const currentScroll = window.scrollY;
    if (currentScroll > 70) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
});

// active nav link
document.querySelectorAll(".nav-link").forEach((link) => {
    if (link.href === window.location.href) {
        link.classList.add("active");
        link.setAttribute("aria-current", "page");
    } else {
        link.classList.remove("active");
        link.removeAttribute("aria-current");
    }
});

// animate on scroll
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("animate");
        }
    });
});

const animateOnScroll = document.querySelectorAll(".onscroll");
animateOnScroll.forEach((el) => observer.observe(el));
const animateOnScrollRight = document.querySelectorAll(".onscroll-r");
animateOnScrollRight.forEach((el) => observer.observe(el));

// typing animation on theme
const themeText = '"BOOST (Building Outstanding Opportunities through Smart Technology)"';
const themeContainer = document.getElementById("theme-text");

let indexChar = 0;
function typingTheme() {
    themeContainer.innerHTML = themeText.substring(0, indexChar++) + "_";
    setTimeout("typingTheme()", 30);
}

typingTheme();
