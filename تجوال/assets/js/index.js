/****************** navbar button *******************/
const mobile_nav = document.querySelector(".mobile-navbar-btn");
const nav_header = document.querySelector(".header");
const shadow_color = document.querySelector(".shadow_color");

const toggleNavbar = () => {
    mobile_nav.classList.toggle("active");
    nav_header.classList.toggle("active");
    shadow_color.classList.toggle("active");
};
mobile_nav.addEventListener("click", () => toggleNavbar());
shadow_color.addEventListener("click", () => toggleNavbar());

/****************** Pupoler Events *******************/
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
            slideShadows: true,
        },
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-prev',
            prevEl: '.swiper-button-next',
        },
        breakpoints: {
            200: { spaceBetween: 20 },
            400: { spaceBetween: 30 },
            600: {
                spaceBetween: 40,
            },
            800: { spaceBetween: 50 },

            1100: {
                spaceBetween: 65,
            },
            1300: {
                spaceBetween: 65,

            },
        },
    };

var EventsSwiper = new Swiper(sliderSelector, options);
EventsSwiper.init();

/******************* Experiments ********************/
var sliderSelector = '.mySwiper-experiments',
    options = {
        loop: true,
        speed: 300,
        spaceBetween: 15,
        grabCursor: true,
        navigation: {
            nextEl: '.arrow_swipe_left',
            prevEl: '.arrow_swipe_right',
        },
    };
var ExperimentsSwiper = new Swiper(sliderSelector, options);

ExperimentsSwiper.init();
title = document.getElementById('title');
paragraph = document.getElementById('paragraph');

i = 1;
const slider_title = ["التسوق في مولات دبي", "استكشف قطر بالطريقه التي تريد", "شاطئ المالديف"];
const slider_paragraph = [
    "يقع أرخبيل جزر فرسان على ساحل جازان ويتميز بشواطئه البيضاء وطبيعته التي لم يغيرها الزمن. غدت الجزر ملاذا لمحبي الاستجمام والغوص على حد سواء.",
    "يقع أرخبيل جزر فرسان على ساحل جازان ويتميز بشواطئه البيضاء الاستجمام والغوص على حد سواء.",
    "يقع  جازان ويتميز بشواطئه البيضاء وطبيعته التي لم يغيرها الزمن. غدت الجزر ملاذا لمحبي الاستجمام والغوص على حد سواء."
];

function right() {
    title.style.transform = "translateY(5px)";
    title.style.transition = "0.5s all ease";
    title.innerHTML = slider_title[i];
    paragraph.innerHTML = slider_paragraph[i];

    i++;
    if (i >= 3) {
        i = 0;
    }
}
j = 0;

function Left() {
    j--;
    title.innerHTML = slider_title[j];
    paragraph.innerHTML = slider_paragraph[j];
    if (j < 0) {
        j = 2;
        title.innerHTML = slider_title[j];
        paragraph.innerHTML = slider_paragraph[j];
    }
}



/******************* Popular landmarks ********************/
var swiper = new Swiper(".mySwiper-landmarks", {
    loopFillGroupWithBlank: true,
    allowTouchMoveallowTouchMove: true,
    navigation: {
        nextEl: ".arrow_swipe_left",
        prevEl: ".arrow_swipe_right",
    },
    breakpoints: {
        600: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        800: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        1100: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1300: {
            slidesPerView: 4,
            spaceBetween: 40,
            heights: 2,
        },
    }
});
/******************* Explore ********************/
var swiper = new Swiper(".Explore", {
    loopFillGroupWithBlank: true,
    allowTouchMoveallowTouchMove: true,
    navigation: {
        nextEl: ".arrow_swipe_left",
        prevEl: ".arrow_swipe_right",
    },
    breakpoints: {
        600: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        800: {
            spaceBetween: 20,
        },
        1100: {
            slidesPerView: 2,
            spaceBetween: 25,
        },
        1300: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    }
});
/******************* Slider ********************/
let btn = document.querySelector('.container1');
btn.addEventListener('mousemove', e => {
    let rect = e.target.getBoundingClientRect();
    let x = e.clientX - rect.left;
    let y = e.clientY - rect.top;
    btn.style.setProperty('--x', x + 'px');
    btn.style.setProperty('--y', y + 'px');
});

function slidesPlugin(activeSlide = 2) {
    const slides = document.querySelectorAll(".slide");

    slides[activeSlide].classList.add("active");

    for (const slide of slides) {
        slide.addEventListener("click", () => {
            clearActiveClasses();

            slide.classList.add("active");
        });
    }

    function clearActiveClasses() {
        slides.forEach((slide) => {
            slide.classList.remove("active");
        });
    }
}
slidesPlugin();
/******************* Map ********************/

// Initialize and add the map
function initMap() {
    // The location of qater
    const qater = {
        lat: 25.286106,
        lng: 51.534817
    };
    // The map, centered at qater
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: qater,
    });
    // The marker, positioned at qater
    const marker = new google.maps.Marker({
        position: qater,
        map: map,
    });
}

window.initMap = initMap;
$('#myCarousel1').bind('slide.bs.carousel', function(e) {
    alert('slide event!');
});