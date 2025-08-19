// Wait for DOM to be fully loaded
$(document).ready(function() {
    console.log('Global.js loaded with jQuery');
    
    const dropdownNav = document.querySelectorAll(".nav-dropdown");
    const dropdownNavContent = document.querySelectorAll(".nav-box");
    const navLinks = document.querySelectorAll(".nav-data-link, .nav-link:not(.nav-dropdown)");
    const navMenu = document.querySelector(".menu");
    const hamburgerBtn = document.getElementById("hamburger");
    const headerLogo = document.querySelector(".header-logo");

    // IMPORTANT: Skip logo handler karena sudah di-handle di master_layout
    console.log('Logo element found:', headerLogo ? 'Yes' : 'No');

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

    // Handle navigation links (EXCLUDE logo, sudah di-handle di master_layout)
    navLinks.forEach((link) => {
        link.addEventListener("click", () => {
            console.log('Nav link clicked:', link.textContent);
            closeDropdownNavContent();
            setAriaExpandedFalse();
            
            // Only toggle hamburger for mobile nav links
            if (link.classList.contains("nav-link") && window.innerWidth <= 1300) {
                toggleHamburger();
            }
        });
    });

    // close dropdown when user clicks outside (EXCLUDE logo)
    document.documentElement.addEventListener("click", (e) => {
        if (!e.target.closest(".header-logo") && 
            !e.target.closest(".nav-dropdown") && 
            !e.target.closest(".nav-box")) {
            closeDropdownNavContent();
            setAriaExpandedFalse();
        }
    });

    // close dropdown when user hits escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeDropdownNavContent();
            setAriaExpandedFalse();
            navMenu.classList.remove("show");
        }
    });

    // toggle hamburger menu
    if (hamburgerBtn) {
        hamburgerBtn.addEventListener("click", function(e) {
            e.stopPropagation();
            console.log('Hamburger clicked');
            toggleHamburger();
        });
    }

    // sticky on scroll
    const header = document.querySelector("header");
    if (header) {
        $(window).scroll(function() {
            const currentScroll = $(window).scrollTop();
            if (currentScroll > 70) {
                $(header).addClass("sticky");
            } else {
                $(header).removeClass("sticky");
            }
        });
    }

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

    if (themeContainer) {
        let indexChar = 0;
        function typingTheme() {
            if (indexChar <= themeText.length) {
                themeContainer.innerHTML = themeText.substring(0, indexChar++) + "_";
                setTimeout(typingTheme, 30);
            }
        }
        typingTheme();
    }
});