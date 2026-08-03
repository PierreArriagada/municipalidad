<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Obtener banners desde la caché de objetos o consultar la BD una vez.
$cache_key     = 'muni_home_banners';
$banners_posts = wp_cache_get( $cache_key, 'muni_theme' );

if ( false === $banners_posts ) {
    $banners_args = array(
        'post_type'              => 'banners',
        'posts_per_page'         => 3,
        'post_status'            => 'publish',
        'no_found_rows'          => true,  // Desactiva SQL_CALC_FOUND_ROWS, mejora rendimiento.
        'update_post_term_cache' => false, // No hay taxonomías en banners, evita consultas inecesarias.
        'update_post_meta_cache' => true,  // Sí necesitamos post_meta (_banner_link).
    );
    $banners_query = new WP_Query( $banners_args );
    $banners_posts = $banners_query->posts;

    // Forzar el orden específico: Turismo, Reciclaje, Tríptico
    usort( $banners_posts, function($a, $b) {
        $order = ['turismo' => 1, 'reciclaje' => 2, 'limpio' => 2, 'triptico' => 3, 'tríptico' => 3];
        
        $a_title = mb_strtolower( $a->post_title, 'UTF-8' );
        $b_title = mb_strtolower( $b->post_title, 'UTF-8' );
        
        $a_weight = 99;
        $b_weight = 99;
        
        foreach ($order as $key => $weight) {
            if (str_contains($a_title, $key)) $a_weight = min($a_weight, $weight);
            if (str_contains($b_title, $key)) $b_weight = min($b_weight, $weight);
        }
        
        return $a_weight <=> $b_weight;
    });

    wp_cache_set( $cache_key, $banners_posts, 'muni_theme', HOUR_IN_SECONDS );
}
?>
<!-- ============================================
         BANNERS DE INTERÉS
         ============================================ -->
    <section class="banners-interes" aria-label="<?php esc_attr_e( 'Banners de Interés', 'muni-santa-juana' ); ?>">
        <div class="container">
            <div class="banners-grid">
                <?php if ( ! empty( $banners_posts ) ) : ?>
                    <?php foreach ( $banners_posts as $post ) : setup_postdata( $post );
                        $banner_link = get_post_meta( get_the_ID(), '_banner_link', true );
                        if ( empty( $banner_link ) || '#' === $banner_link ) {
                            $title_lower = mb_strtolower( get_the_title(), 'UTF-8' );
                            if ( str_contains( $title_lower, 'triptico' ) || str_contains( $title_lower, 'tríptico' ) ) {
                                $banner_link = get_post_type_archive_link( 'tripticos' );
                            } elseif ( str_contains( $title_lower, 'turismo' ) ) {
                                $banner_link = get_post_type_archive_link( 'turismo' );
                            } elseif ( str_contains( $title_lower, 'reciclaje' ) || str_contains( $title_lower, 'limpio' ) ) {
                                $banner_link = get_post_type_archive_link( 'reciclaje' );
                            } else {
                                $banner_link = '#';
                            }
                        }
                    ?>
                        <a href="<?php echo esc_url( $banner_link ); ?>" class="banner-card" aria-label="<?php echo esc_attr( sprintf( __( 'Ir a %s', 'muni-santa-juana' ), get_the_title() ) ); ?>">
                            <?php 
                                $fallback_img = 'Turismo.jpg';
                                $title_lower  = mb_strtolower( get_the_title(), 'UTF-8' );
                                if ( str_contains( $title_lower, 'triptico' ) || str_contains( $title_lower, 'tríptico' ) ) {
                                    $fallback_img = 'triptico.jpg';
                                } elseif ( str_contains( $title_lower, 'reciclaje' ) || str_contains( $title_lower, 'limpio' ) ) {
                                    $fallback_img = 'reciclaje.jpg';
                                }
                                $final_img_url = muni_get_post_image( get_the_ID(), $fallback_img );
                            ?>
                            <img src="<?php echo esc_url( $final_img_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="banner-img" loading="lazy" decoding="async">
                            <div class="banner-pill-title">
                                <?php echo esc_html( get_the_title() ); ?>
                            </div>
                            <div class="banner-pill-btn">
                                <?php esc_html_e( 'Ver más', 'muni-santa-juana' ); ?> ➔
                            </div>
                        </a>
                    <?php endforeach; wp_reset_postdata(); ?>
                <?php else : ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: var(--color-surface); border-radius: var(--radius-lg); border: 1px dashed var(--color-border); width: 100%;">
                        <p style="color: var(--color-text-light); margin: 0; font-size: 1.1rem;"><?php esc_html_e( 'No hay anuncios actualmente.', 'muni-santa-juana' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
