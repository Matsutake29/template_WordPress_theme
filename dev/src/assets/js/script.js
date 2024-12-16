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

// header-nav カレント表示
jQuery(($) => {
  $(".l-header__nav-link").on("click", function () {
    $(".l-header__nav-item").removeClass("current");
    $(this).parent().addClass("current");
  });
});

// timerHidden 規定の時間に表示、非表示切り替え
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".timerHidden");
  const now = new Date();

  elements.forEach((el) => {
    const appearTime = new Date(el.getAttribute("data-appear_time"));
    const disappearTime = new Date(el.getAttribute("data-disappear_time"));

    if (now > appearTime && now < disappearTime) {
      el.classList.add("timerVisible");
    } else {
      el.classList.remove("timerVisible");
    }
  });
});
