
let slideIndex = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function showSlides() {
    slideIndex++;
    if (slideIndex >= totalSlides) {
        slideIndex = 0;
    }
    const offset = -slideIndex * 100;
    document.querySelector('.carousel-slide').style.transform = `translateX(${offset}%)`;
}

setInterval(showSlides, 3000);