
/*eslint-env es6*/

const carouselSlide = document.querySelector('.carousel-image');
const carouselImages = document.querySelectorAll('.carousel-image img');

const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');

let counter=1;
const size = carouselImages[0].clientWidth;

carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';