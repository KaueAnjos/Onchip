//MOBILE NAV BTN - Show or hide main-nav on mobile
var navBtn = document.getElementById("main-nav-toggle");
var navMenu = document.getElementById("main-nav");

navBtn.onclick = function () {
    navMenu.classList.toggle("show");
    navBtn.classList.toggle("flip");
};


//NAVBAR - Show/hide navbar based on mq-lg and vertical scroll
var navBar = document.getElementById("navbar");
var mq = window.matchMedia("(min-width: 992px)");
var scrollTrigger = 400;

function showNavbar() {
  var scrollPos = window.pageYOffset;
  if (mq.matches && scrollPos > scrollTrigger) {
    navBar.classList.add("show");
  } else if (mq.matches && scrollPos < scrollTrigger) {
    navBar.classList.remove("show");
  }
}

window.onresize = window.onscroll = showNavbar;


//START EXPAND GRID - PRODUCTS
(function (global, $) {
    $('.gallery-items').imagelistexpander({
      prefix: "gallery-"
    });
  })(this, jQuery)



