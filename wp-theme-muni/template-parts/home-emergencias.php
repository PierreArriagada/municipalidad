<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Obtener números de teléfono desde el Customizer
$em_carabineros = get_theme_mod( 'muni_em_carabineros', '133' );
$em_ambulancia = get_theme_mod( 'muni_em_ambulancia', '131' );
$em_bomberos = get_theme_mod( 'muni_em_bomberos', '132' );
$em_seguridad = get_theme_mod( 'muni_em_seguridad', '956584049' );

?>
<!-- ============================================
     EMERGENCIAS (Diseño Elegante con Líneas Azul)
     ============================================ -->
<section id="emergencias" class="emergencias-section">
    <div class="container">
        <div class="emergencias-header">
            <h2 class="section-title"><?php esc_html_e( 'Contactos de Emergencia', 'muni-santa-juana' ); ?></h2>
        </div>
        <div class="emergencias-grid">

                <!-- Carabineros / Policía -->
                <a href="tel:<?php echo esc_attr( $em_carabineros ); ?>" class="em-item em-item--policia">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('policia'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Carabineros', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num"><?php echo esc_html( $em_carabineros ); ?></strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Carabineros">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>

                <!-- Ambulancia SAMU -->
                <a href="tel:<?php echo esc_attr( $em_ambulancia ); ?>" class="em-item em-item--ambulancia">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('ambulancia'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Ambulancia SAMU', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num"><?php echo esc_html( $em_ambulancia ); ?></strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Ambulancia">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>

                <!-- Bomberos -->
                <a href="tel:<?php echo esc_attr( $em_bomberos ); ?>" class="em-item em-item--bomberos">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('bombero'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Bomberos', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num"><?php echo esc_html( $em_bomberos ); ?></strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Bomberos">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>

                <!-- Seguridad Ciudadana -->
                <a href="tel:<?php echo esc_attr( $em_seguridad ); ?>" class="em-item em-item--seguridad">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('seguridad-ciudadana'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Seguridad Ciudadana', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num"><?php echo esc_html( $em_seguridad ); ?></strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Seguridad Ciudadana">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>
        </div>
    </div>
</section>
