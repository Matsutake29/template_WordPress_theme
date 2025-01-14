// drawer.js
jQuery(($) => $(".drawer").drawer());

// to-top
jQuery(($) => {
  const toTop = $("#toTop");
  toTop.hide();
  $(window).on("scroll", () => {
    $(this).scrollTop() > 100 ? toTop.fadeIn() : toTop.fadeOut();
  });
});

// ページ内スムーススクロール
jQuery(($) => {
  $('a[href*="#"]').on("click", function (e) {
    const target = $(this.hash === "" ? "html" : this.hash);
    if (target.length) {
      e.preventDefault();
      $("html, body").animate({ scrollTop: target.offset().top - $("header").outerHeight() - 20 }, 500, "swing");
      history.pushState(null, "", this.hash);
    }
  });
});