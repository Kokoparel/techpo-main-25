(function ($) {
  "use strict";

  // ✅ Toggle sidebar hanya dari tombol hamburger
  $("#hamburger").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    console.log("Klik hamburger"); // debug cek

    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");

    if ($(".sidebar").hasClass("toggled")) {
      $(".sidebar .collapse").collapse("hide");
    }
  });

  // ✅ Close menu saat window resize
  $(window).on("resize", function () {
    if ($(window).width() < 768) {
      $(".sidebar .collapse").collapse("hide");
    }

    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $(".sidebar .collapse").collapse("hide");
    }
  });

  // ✅ Prevent scroll hijack di sidebar saat fixed-nav
  $("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel", function (e) {
    if ($(window).width() > 768) {
      let e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // ✅ Scroll to top button appear
  $(document).on("scroll", function () {
    let scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $(".scroll-to-top").fadeIn();
    } else {
      $(".scroll-to-top").fadeOut();
    }
  });

  // ✅ Smooth scroll to top
  $(document).on("click", "a.scroll-to-top", function (e) {
    e.preventDefault();
    let $anchor = $(this);
    $("html, body")
      .stop()
      .animate(
        { scrollTop: $($anchor.attr("href")).offset().top },
        1000,
        "easeInOutExpo"
      );
  });

})(jQuery);
