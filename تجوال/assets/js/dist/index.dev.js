"use strict";

/****************** navbar button *******************/
var mobile_nav = document.querySelector(".mobile-navbar-btn");
var nav_header = document.querySelector(".header");

var toggleNavbar = function toggleNavbar() {
  mobile_nav.classList.toggle("active");
  nav_header.classList.toggle("active");
};

mobile_nav.addEventListener("click", function () {
  return toggleNavbar();
});
/******************* Pupoler Events  ********************/

var sliderSelector = '.mySwiper-events',
    options = {
  loop: true,
  speed: 800,
  spaceBetween: 65,
  centeredSlides: true,
  slidesPerView: 1.5,
  effect: 'coverflow',
  coverflowEffect: {
    rotate: 0,
    slideShadows: true
  },
  grabCursor: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  navigation: {
    nextEl: '.swiper-button-prev',
    prevEl: '.swiper-button-next'
  },
  breakpoints: {
    200: {
      spaceBetween: 20
    },
    400: {
      spaceBetween: 30
    },
    600: {
      spaceBetween: 40
    },
    800: {
      spaceBetween: 50
    },
    1100: {
      spaceBetween: 65
    },
    1300: {
      spaceBetween: 65
    }
  }
};
var EventsSwiper = new Swiper(sliderSelector, options);
EventsSwiper.init();
/******************* Experiments  ********************/

var sliderSelector = '.mySwiper-experiments',
    options = {
  speed: 900,
  loop: true,
  spaceBetween: 15,
  grabCursor: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },
  navigation: {
    nextEl: '.arrow_swipe_left',
    prevEl: '.arrow_swipe_right'
  },
  breakpoints: {
    200: {},
    400: {},
    600: {},
    800: {},
    1000: {},
    1300: {}
  }
};
var ExperimentsSwiper = new Swiper(sliderSelector, options);
ExperimentsSwiper.init();
/******************* Popular landmarks ********************/

var swiper = new Swiper(".mySwiper-landmarks", {
  loopFillGroupWithBlank: true,
  allowTouchMoveallowTouchMove: true,
  navigation: {
    nextEl: ".arrow_swipe_left",
    prevEl: ".arrow_swipe_right"
  },
  breakpoints: {
    600: {
      slidesPerView: 1,
      spaceBetween: 0
    },
    800: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    1100: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    1300: {
      slidesPerView: 4,
      spaceBetween: 40,
      heights: 2
    }
  }
});
/******************* Slider ********************/

var btn = document.querySelector('.container1');
btn.addEventListener('mousemove', function (e) {
  var rect = e.target.getBoundingClientRect();
  var x = e.clientX - rect.left;
  var y = e.clientY - rect.top;
  btn.style.setProperty('--x', x + 'px');
  btn.style.setProperty('--y', y + 'px');
});

function slidesPlugin() {
  var activeSlide = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 2;
  var slides = document.querySelectorAll(".slide");
  slides[activeSlide].classList.add("active");
  var _iteratorNormalCompletion = true;
  var _didIteratorError = false;
  var _iteratorError = undefined;

  try {
    var _loop = function _loop() {
      var slide = _step.value;
      slide.addEventListener("click", function () {
        clearActiveClasses();
        slide.classList.add("active");
      });
    };

    for (var _iterator = slides[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
      _loop();
    }
  } catch (err) {
    _didIteratorError = true;
    _iteratorError = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion && _iterator["return"] != null) {
        _iterator["return"]();
      }
    } finally {
      if (_didIteratorError) {
        throw _iteratorError;
      }
    }
  }

  function clearActiveClasses() {
    slides.forEach(function (slide) {
      slide.classList.remove("active");
    });
  }
}

slidesPlugin();
title = document.getElementById("title").innerHTML = "Html";

function title() {
  title.itnnerHTML = "Html";
}