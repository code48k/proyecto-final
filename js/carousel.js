const track = document.querySelector('.carousel-track');
const slides = document.querySelectorAll('.slide');
let index = 0;

function goToSlide(i) {
    track.style.transition = 'transform 1s ease-in-out';
    track.style.transform = `translateX(-${i * 100}vw)`;
}

function resetToStart() {
    track.style.transition = 'none';
    track.style.transform = `translateX(0)`;
    index = 0;
}

setInterval(() => {
    index++;
    goToSlide(index);

    // Cuando llega al duplicado (la última slide)
    if (index === slides.length - 1) {
      setTimeout(resetToStart, 1000); // Esperamos 1s antes de resetear
    }
}, 10000); // 30 segundos por slide