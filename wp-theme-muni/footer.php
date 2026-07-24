<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para el pie de página (Footer Institucional con Enlaces Limpios)
 *
 * @package Muni_Santa_Juana
 */
?>
    <footer class="footer">
        <!-- Divider Ola Superior del Footer -->
        <div class="footer-wave-top">
            <svg viewBox="0 0 1440 36" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,36 C320,6 680,30 1040,10 C1240,0 1360,16 1440,24 L1440,36 L0,36 Z" fill="var(--fondo-footer)"/>
            </svg>
        </div>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section alcalde-section">
                    <div class="alcalde-foto-container">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/alcalde.jpg" alt="Ángel Castro Medina - Alcalde de Santa Juana" class="alcalde-img" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 100 100\' fill=\'%23003399\'><rect width=\'100\' height=\'100\' fill=\'%23e0e0e0\'/><circle cx=\'50\' cy=\'40\' r=\'20\'/><path d=\'M20 100 Q 50 60 80 100 Z\'/></svg>'">
                    </div>
                    <div class="alcalde-info">
                        <h4>Ángel Castro Medina</h4>
                        <p class="alcalde-cargo">Alcalde de Santa Juana 2026</p>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Municipalidad de Santa Juana</h4>
                    <nav class="footer-links">
                        <a href="#" class="footer-link">Historia</a>
                        <a href="#" class="footer-link">Misión y Visión</a>
                        <a href="#" class="footer-link">Organigrama</a>
                        <a href="#" class="footer-link">Noticias Municipales</a>
                    </nav>
                </div>
                
                <div class="footer-section">
                    <h4>Servicios</h4>
                    <nav class="footer-links">
                        <a href="#" class="footer-link">Trámites en Línea</a>
                        <a href="#" class="footer-link">Pagos Online</a>
                        <a href="#" class="footer-link">Concursos Públicos</a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_link_transparencia', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306#' ) ); ?>" class="footer-link" target="_blank" rel="noopener noreferrer">Transparencia Activa</a>
                    </nav>
                </div>
                
                <div class="footer-section">
                    <h4>Información</h4>
                    <nav class="footer-links">
                        <a href="#" class="footer-link">Números de Emergencia</a>
                        <a href="#" class="footer-link">Tu Municipio</a>
                        <a href="#" class="footer-link">Ley de Lobby</a>
                        <a href="#" class="footer-link">Normativa Comunal</a>
                        <a href="#" class="footer-link">Intranet Municipal</a>
                    </nav>
                </div>
                
                <div class="footer-section">
                    <h4>Síguenos</h4>
                    <nav class="footer-links">
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_facebook_url', 'https://facebook.com' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="social-icon-svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            <span>Facebook</span>
                        </a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_instagram_url', 'https://instagram.com' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="social-icon-svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>Instagram</span>
                        </a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_twitter_url', 'https://x.com' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="social-icon-svg"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            <span>X (Twitter)</span>
                        </a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_youtube_url', 'https://youtube.com' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="social-icon-svg"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            <span>YouTube</span>
                        </a>
                    </nav>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© <?php echo date('Y'); ?> Departamento de Informática, Ilustre Municipio de Santa Juana. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
