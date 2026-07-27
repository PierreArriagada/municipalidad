/**
 * Script principal - Municipio de Santa Juana
 * Maneja la navegación móvil y otras interacciones
 */

document.addEventListener('DOMContentLoaded', function() {
    initNavToggle();
    initSmoothScroll();
    initNavActiveState();
    initAnuncioCarousel();
});

/**
 * Inicializa el botón de menú hamburguesa para móvil
 */
function initNavToggle() {
    const navToggle = document.querySelector('.nav-toggle');
    const navList = document.querySelector('.nav-list');
    
    const iconMenu = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>`;
    const iconClose = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>`;

    if (navToggle && navList) {
        navToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            const isExpanded = navToggle.getAttribute('aria-expanded') === 'true';

            if (isExpanded) {
                // Cerrar menú
                navToggle.setAttribute('aria-expanded', 'false');
                navList.classList.remove('nav-open');
                navToggle.innerHTML = iconMenu;
            } else {
                // Abrir menú
                navToggle.setAttribute('aria-expanded', 'true');
                navList.classList.add('nav-open');
                navToggle.innerHTML = iconClose;
            }
        });

        // Cerrar menú al hacer click fuera
        document.addEventListener('click', function(e) {
            if (!navToggle.contains(e.target) && !navList.contains(e.target)) {
                navToggle.setAttribute('aria-expanded', 'false');
                navList.classList.remove('nav-open');
                navToggle.innerHTML = iconMenu;
            }
        });
    }
}

/**
 * Inicializa scroll suave para enlaces internos respetando la altura del Navbar Sticky
 */
function initSmoothScroll() {
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (!link) return;

        const href = link.getAttribute('href');
        if (!href) return;

        let targetId = null;
        if (href.startsWith('#') && href !== '#') {
            targetId = href;
        } else if (href.includes('/#')) {
            const parts = href.split('/#');
            const path = parts[0];
            const hash = parts[1];
            const currentPath = window.location.pathname;
            if (path === '' || path === window.location.origin || currentPath === '/' || currentPath.endsWith(path)) {
                targetId = '#' + hash;
            }
        }

        if (targetId) {
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                scrollToElementWithOffset(targetElement);
            }
        }
    });

    // Manejo de carga inicial con Hash en la URL (ej: al venir desde otra página)
    if (window.location.hash) {
        const initialTarget = document.querySelector(window.location.hash);
        if (initialTarget) {
            setTimeout(function() {
                scrollToElementWithOffset(initialTarget);
            }, 200);
        }
    }
}

function scrollToElementWithOffset(element) {
    const header = document.querySelector('.header');
    const topBar = document.querySelector('.top-bar');
    let headerOffset = 120;

    if (header) {
        headerOffset = header.offsetHeight;
        if (topBar && window.getComputedStyle(topBar).display !== 'none') {
            headerOffset += topBar.offsetHeight;
        }
    }

    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - (headerOffset + 20);

    window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth'
    });
}

/**
 * Inicializa el estado activo de los enlaces del menú
 */
function initNavActiveState() {
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const parent = this.parentElement;
            const isDropdown = parent && (parent.classList.contains('dropdown') || parent.classList.contains('menu-item-has-children'));
            
            if (window.innerWidth <= 1024) {
                if (isDropdown) {
                    e.preventDefault();
                    const isOpen = parent.classList.contains('dropdown-open');
                    
                    document.querySelectorAll('.dropdown, .menu-item-has-children').forEach(d => {
                        d.classList.remove('dropdown-open');
                    });
                    
                    if (!isOpen) {
                        parent.classList.add('dropdown-open');
                    }
                } else {
                    document.querySelectorAll('.dropdown, .menu-item-has-children').forEach(d => {
                        d.classList.remove('dropdown-open');
                    });
                }
            }
            
            // Clase removida según petición
        });
    });
}

/**
 * Inicializa el carrusel de anuncios hero
 */
function initAnuncioCarousel() {
    const slider = document.getElementById('anuncioHeroSlider');
    if (!slider) return;

    const slides = slider.querySelectorAll('.anuncio-hero-slide');
    if (slides.length <= 1) return;

    const nextBtn = slider.querySelector('.anuncio-hero-control.next');
    const prevBtn = slider.querySelector('.anuncio-hero-control.prev');
    const dots = slider.querySelectorAll('.anuncio-hero-dot');
    
    let currentIndex = 0;
    let autoPlayInterval;
    const intervalTime = 5000; // 5 segundos

    function goToSlide(index) {
        slides[currentIndex].classList.remove('active');
        if (dots.length) dots[currentIndex].classList.remove('active');

        currentIndex = index;
        if (currentIndex < 0) {
            currentIndex = slides.length - 1;
        } else if (currentIndex >= slides.length) {
            currentIndex = 0;
        }

        slides[currentIndex].classList.add('active');
        if (dots.length) dots[currentIndex].classList.add('active');
    }

    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        goToSlide(currentIndex - 1);
    }

    function resetInterval() {
        clearInterval(autoPlayInterval);
        autoPlayInterval = setInterval(nextSlide, intervalTime);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetInterval();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetInterval();
        });
    }

    if (dots.length) {
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                resetInterval();
            });
        });
    }

    // Iniciar autoplay
    resetInterval();

    // Pausar en hover
    slider.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
    slider.addEventListener('mouseleave', resetInterval);
}