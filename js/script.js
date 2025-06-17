const carrusel = document.querySelector('.carousel-container');

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    // Cuanto más scroll, más transparente
    let opacity = 1 - scrollY / 500;
    opacity = Math.max(opacity, 0); // No menos de 0

    carrusel.style.opacity = opacity;
});


const container = document.querySelectorAll('.container');

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (!entry.isIntersecting) {
            entry.target.classList.add('fade');
        } else {
            entry.target.classList.remove('fade');
        }
    });
}, {
    threshold: 0.6
});

container.forEach(container => observer.observe(container));



