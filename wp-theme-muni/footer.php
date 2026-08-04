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
                <div class="footer-section brand-section">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: block; margin-bottom: 1.25rem;">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/LOGO-MUNICIPALIDAD-SANTA-JUANA-1024x350 (1).webp" alt="<?php bloginfo('name'); ?>" style="max-width: 220px; height: auto;" class="footer-logo">
                    </a>
                    <p style="color: rgba(255, 255, 255, 0.8); font-size: 0.9rem; line-height: 1.6; margin: 0;">
                        Sitio web oficial de la Ilustre Municipalidad de Santa Juana. Trabajamos diariamente por el desarrollo integral de nuestra comuna, fomentando el turismo sustentable, la transparencia activa, protegiendo nuestro medio ambiente y mejorando la calidad de vida de todos nuestros vecinos y vecinas.
                    </p>
                </div>
                
                <div class="footer-section">
                    <h4>Municipalidad de Santa Juana</h4>
                    <nav class="footer-links">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'historia' ) ) ); ?>" class="footer-link">Historia</a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'mision' ) ) ); ?>" class="footer-link">Misión</a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'vision' ) ) ); ?>" class="footer-link">Visión</a>
                        <a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="footer-link">Noticias Municipales</a>
                    </nav>
                </div>
                
                <div class="footer-section">
                    <h4>Servicios</h4>
                    <nav class="footer-links">
                        <a href="https://portalpagos.smc.cl/SANTA_JUANA/PV/Login" class="footer-link" target="_blank" rel="noopener noreferrer">Pagos Online</a>
                        <a href="<?php echo esc_url( get_post_type_archive_link( 'concursos' ) ); ?>" class="footer-link">Concursos Públicos</a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_link_transparencia', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306#' ) ); ?>" class="footer-link" target="_blank" rel="noopener noreferrer">Transparencia Activa</a>
                    </nav>
                </div>
                
                <div class="footer-section">
                    <h4>Información</h4>
                    <nav class="footer-links">
                        <a href="<?php echo esc_url( home_url( '/#emergencias' ) ); ?>" class="footer-link">Números de Emergencia</a>
                        <a href="https://www.leylobby.gob.cl/instituciones/MU306" class="footer-link" target="_blank" rel="noopener noreferrer">Ley de Lobby</a>
                        <a href="<?php echo esc_url( home_url( '/normativa-comunal/' ) ); ?>" class="footer-link">Normativa Comunal</a>
                        <a href="<?php echo esc_url( home_url( '/politicas/' ) ); ?>" class="footer-link">Políticas de Privacidad</a>
                        <a href="<?php echo esc_url( home_url( '/intranet/' ) ); ?>" class="footer-link">Intranet Municipal</a>
                    </nav>
                </div>
                
                <div class="footer-section">
                    <h4>Síguenos</h4>
                    <nav class="footer-links">
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_facebook_url', 'https://facebook.com/MuniSantaJuana' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="social-icon-svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            <span>Facebook</span>
                        </a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_instagram_url', 'https://instagram.com/munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="social-icon-svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>Instagram</span>
                        </a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_tiktok_url', 'https://www.tiktok.com/@munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
                            <svg viewBox="-10 -10 120 120" fill="currentColor" class="social-icon-svg"><path d="m74.66 20.573c-4.218-4.904-6.428-11.241-6.253-17.693l-15.764-.38v1.579 65.887c-4.244 18.913-31.616 13.978-28.876-5.265 1.529-8.79 10.972-14.198 19.365-11.141v-16.084c-18.271-3.181-35.586 11.361-35.404 29.888 1.597 40.179 59.226 40.185 60.825 0-.403-1.438-.178-28.214-.235-30.472 7.168 4.46 15.508 6.689 23.954 6.405v-16.612c-7.808 0-13.767-2.076-17.612-6.112z"/></svg>
                            <span>TikTok</span>
                        </a>
                        <a href="<?php echo esc_url( get_theme_mod( 'muni_youtube_url', 'https://www.youtube.com/@munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" class="footer-link footer-social-link">
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

    <?php
    // Logic for Popup Anuncio
    $popup_args = array(
        'post_type'      => 'anuncios',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'meta_query'     => array(
            'relation' => 'AND',
            array(
                'key'     => '_anuncio_tipo',
                'value'   => 'popup',
                'compare' => '='
            ),
            array(
                'key'     => '_anuncio_activo',
                'value'   => '1',
                'compare' => '='
            ),
            array(
                'relation' => 'OR',
                array(
                    'key'     => '_anuncio_fecha_fin',
                    'compare' => 'NOT EXISTS'
                ),
                array(
                    'key'     => '_anuncio_fecha_fin',
                    'value'   => '',
                    'compare' => '='
                ),
                array(
                    'key'     => '_anuncio_fecha_fin',
                    'value'   => current_time( 'Y-m-d' ),
                    'type'    => 'DATE',
                    'compare' => '>='
                )
            )
        )
    );

    $popup_query = new WP_Query( $popup_args );

    if ( $popup_query->have_posts() ) :
        while ( $popup_query->have_posts() ) : $popup_query->the_post();
            $link = get_post_meta( get_the_ID(), '_anuncio_link', true );
            $link = ! empty( $link ) ? $link : '#';
            $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    ?>
    <div id="muni-popup-anuncio" class="muni-popup-overlay" style="display: none;">
        <div class="muni-popup-content">
            <button id="muni-popup-close" class="muni-popup-close-btn" aria-label="Cerrar Anuncio">&times;</button>
            <a href="<?php echo esc_url( $link ); ?>">
                <?php if ( $thumb_url ) : ?>
                    <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="muni-popup-img">
                <?php else : ?>
                    <div class="muni-popup-no-img">
                        <h2><?php the_title(); ?></h2>
                        <p>Haz clic para más información</p>
                    </div>
                <?php endif; ?>
            </a>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var popup = document.getElementById("muni-popup-anuncio");
        var closeBtn = document.getElementById("muni-popup-close");
        
        var popupId = "muni_popup_seen_<?php echo get_the_ID(); ?>";
        
        // Check session storage
        if (!sessionStorage.getItem(popupId)) {
            // Show popup
            popup.style.display = "flex";
            
            // Close event
            closeBtn.addEventListener("click", function() {
                popup.style.display = "none";
                sessionStorage.setItem(popupId, "true");
            });

            // Close when clicking outside content
            popup.addEventListener("click", function(e) {
                if(e.target === popup) {
                    popup.style.display = "none";
                    sessionStorage.setItem(popupId, "true");
                }
            });
        }
    });
    </script>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <?php wp_footer(); ?>
</body>
</html>
