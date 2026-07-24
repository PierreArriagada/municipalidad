<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$em_args = array(
    'post_type'      => 'emergencias',
    'posts_per_page' => 4,
    'post_status'    => 'publish',
);
$em_query = new WP_Query( $em_args );
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
            <?php if ( $em_query->have_posts() ) : ?>
                <?php while ( $em_query->have_posts() ) : $em_query->the_post(); 
                    $raw_title = get_the_title();
                    $numero = get_the_excerpt();
                    
                    if ( empty( $numero ) || $numero === '#' || trim( $numero ) === '' ) {
                        if ( preg_match( '/^(.*?)\s*([\*\+]?[0-9]+)$/', $raw_title, $matches ) ) {
                            $display_title = trim( $matches[1] );
                            $numero = $matches[2];
                        } else {
                            $display_title = $raw_title;
                            $numero = '#';
                        }
                    } else {
                        $display_title = preg_replace( '/\s*[\*\+]?[0-9]+$/', '', $raw_title );
                    }

                    $slug = get_post_field( 'post_name', get_post() );
                    $clean_slug = strtolower( trim( $slug ) . ' ' . trim( $raw_title ) );
                    
                    // Clase de servicio según el slug o título
                    $modifier_class = 'em-item--seguridad';
                    if ( strpos( $clean_slug, 'carabinero' ) !== false || strpos( $clean_slug, 'policia' ) !== false ) {
                        $modifier_class = 'em-item--policia';
                    } elseif ( strpos( $clean_slug, 'ambulancia' ) !== false || strpos( $clean_slug, 'samu' ) !== false ) {
                        $modifier_class = 'em-item--ambulancia';
                    } elseif ( strpos( $clean_slug, 'bombero' ) !== false ) {
                        $modifier_class = 'em-item--bomberos';
                    } elseif ( strpos( $clean_slug, 'seguridad' ) !== false ) {
                        $modifier_class = 'em-item--seguridad';
                    }
                ?>
                    <a href="tel:<?php echo esc_attr( wp_strip_all_tags( $numero ) ); ?>" class="em-item <?php echo esc_attr( $modifier_class ); ?>">
                        <div class="em-icon-wrapper">
                            <?php 
                            $svg_icon = muni_render_svg( $slug );
                            if ( ! empty( $svg_icon ) ) : 
                                echo $svg_icon;
                            elseif ( has_post_thumbnail() ) : 
                                the_post_thumbnail( 'thumbnail', array('style' => 'width: 32px; height: 32px; object-fit: contain;') );
                            else : 
                            ?>
                                <span style="font-size: 1.5rem; line-height: 1;">🚨</span>
                            <?php endif; ?>
                        </div>
                        <div class="em-details">
                            <span class="em-title"><?php echo esc_html( $display_title ); ?></span>
                            <strong class="em-phone-num"><?php echo esc_html( $numero ); ?></strong>
                        </div>
                        <div class="em-call-action" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                            <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Carabineros / Policía (133) -->
                <a href="tel:133" class="em-item em-item--policia">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('policia'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Carabineros', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num">133</strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Carabineros">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>

                <!-- Ambulancia SAMU (131) -->
                <a href="tel:131" class="em-item em-item--ambulancia">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('ambulancia'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Ambulancia SAMU', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num">131</strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Ambulancia">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>

                <!-- Bomberos (132) -->
                <a href="tel:132" class="em-item em-item--bomberos">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('bombero'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Bomberos', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num">132</strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Bomberos">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>

                <!-- Seguridad Ciudadana (*4242) -->
                <a href="tel:*4242" class="em-item em-item--seguridad">
                    <div class="em-icon-wrapper">
                        <?php echo muni_render_svg('seguridad-ciudadana'); ?>
                    </div>
                    <div class="em-details">
                        <span class="em-title"><?php esc_html_e( 'Seguridad Ciudadana', 'muni-santa-juana' ); ?></span>
                        <strong class="em-phone-num">*4242</strong>
                    </div>
                    <div class="em-call-action" aria-label="Llamar a Seguridad Ciudadana">
                        <svg class="em-phone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php esc_html_e( 'Llamar', 'muni-santa-juana' ); ?></span>
                    </div>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
