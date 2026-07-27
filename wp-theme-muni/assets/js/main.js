/**
 * Script principal - Municipio de Santa Juana
 * Maneja la navegación móvil y otras interacciones
 */

document.addEventListener('DOMContentLoaded', function() {
    initNavToggle();
    initSmoothScroll();
    initNavActiveState();
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
 * Inicializa scroll suave para enlaces internos
 */
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);

                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
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