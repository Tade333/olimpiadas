// Inicializa los carruseles
document.querySelectorAll('.carousel-container').forEach((container, index) => {
    let currentPosition = 0;
    const itemsPerView = 5;
    const carousel = container.querySelector('.carousel');
    const totalItems = carousel.querySelectorAll('.carousel-item').length;
    const leftArrow = container.querySelector('.left-arrow');
    const rightArrow = container.querySelector('.right-arrow');

    // Función para mover el carrusel
    function moveCarousel(direction) {
        const maxPosition = Math.ceil(totalItems / itemsPerView) - 1;
        
        // Actualiza la posición
        currentPosition += direction;

        // Verifica los límites del carrusel
        if (currentPosition < 0) {
            currentPosition = 0;
        } else if (currentPosition > maxPosition) {
            currentPosition = maxPosition;
        }

        // Desplaza el carrusel
        carousel.style.transform = `translateX(-${currentPosition * 100}%)`;

        // Controla la visibilidad de las flechas
        updateArrowVisibility();
    }

    // Función para mostrar/ocultar flechas
    function updateArrowVisibility() {
        if (currentPosition === 0) {
            leftArrow.style.display = 'none'; // Oculta la flecha izquierda si estamos al principio
        } else {
            leftArrow.style.display = 'block'; // Muestra la flecha izquierda si no estamos al principio
        }

        if (currentPosition === Math.ceil(totalItems / itemsPerView) - 1) {
            rightArrow.style.display = 'none'; // Oculta la flecha derecha si estamos al final
        } else {
            rightArrow.style.display = 'block'; // Muestra la flecha derecha si no estamos al final
        }
    }

    // Inicializa la visibilidad de las flechas al cargar la página
    updateArrowVisibility();

    // Asocia los eventos de las flechas a la función de mover el carrusel
    leftArrow.addEventListener('click', () => moveCarousel(-1));
    rightArrow.addEventListener('click', () => moveCarousel(1));
});
