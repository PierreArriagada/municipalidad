<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$beneficios_args = array(
    'post_type'      => 'beneficios',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
);
$beneficios_query = new WP_Query( $beneficios_args );
?>
<!-- ============================================
         BENEFICIOS VECINOS
         ============================================ -->
    <section class="vecinos-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e( 'Beneficios exclusivos para vecinos', 'muni-santa-juana' ); ?></h2>
            <div class="vecinos-grid">
                <!-- Tarjeta Destacada -->
                <?php
                $beneficio_img = get_theme_mod( 'muni_beneficio_img', get_template_directory_uri() . '/assets/img/beneficios-comunidad.png' );
                $beneficio_titulo = get_theme_mod( 'muni_beneficio_titulo', 'Beneficios para la comunidad' );
                $beneficio_subtitulo = get_theme_mod( 'muni_beneficio_subtitulo', 'Descubre todas las alianzas y convenios exclusivos para los vecinos de Santa Juana.' );
                $beneficio_texto = get_theme_mod( 'muni_beneficio_texto', 'Nuestra municipalidad trabaja día a día para acercar mejores oportunidades a todos los habitantes. Explora los distintos beneficios disponibles y accede a descuentos en servicios esenciales.' );
                ?>
                <div class="vecino-featured-card">
                    <img src="<?php echo esc_url( $beneficio_img ); ?>" alt="<?php echo esc_attr( strip_tags( $beneficio_titulo ) ); ?>" class="vecino-featured-img">
                    <div class="vecino-featured-content">
                        <h3><?php echo wp_kses_post( $beneficio_titulo ); ?></h3>
                        <?php if ( ! empty( $beneficio_subtitulo ) ) : ?>
                            <p class="vecino-highlight"><?php echo wp_kses_post( $beneficio_subtitulo ); ?></p>
                        <?php endif; ?>
                        <p><?php echo wp_kses_post( $beneficio_texto ); ?></p>
                    </div>
                </div>

                <?php if ( $beneficios_query->have_posts() ) : ?>
                    <?php while ( $beneficios_query->have_posts() ) : $beneficios_query->the_post(); ?>
                        <div class="vecino-card">
                            <div class="vecino-img-wrapper">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'vecino-img-circle', 'alt' => esc_attr( get_the_title() ) ) ); ?>
                                <?php else : ?>
                                    <?php 
                                        // Asignar imagen por defecto basada en el título si no hay miniatura
                                        $fallback_img = 'vecino-mayor.png'; // Por defecto adulto mayor
                                        $title_lower = mb_strtolower( get_the_title(), 'UTF-8' );
                                        if ( str_contains( $title_lower, 'aramco' ) || str_contains( $title_lower, 'combustible' ) ) {
                                            $fallback_img = 'vecino_aramco_1783210102383.png';
                                        } elseif ( str_contains( $title_lower, 'kupos' ) || str_contains( $title_lower, 'pasaje' ) ) {
                                            $fallback_img = 'vecino_kupos_1783210111064.png';
                                        } elseif ( str_contains( $title_lower, 'salud' ) || str_contains( $title_lower, 'copago' ) ) {
                                            $fallback_img = 'vecino_copago_1783210119573.png';
                                        }
                                    ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $fallback_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="vecino-img-circle">
                                <?php endif; ?>
                            </div>
                            <div class="vecino-card-content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn-pill-blue"><?php esc_html_e( 'QUIERO SABER MÁS', 'muni-santa-juana' ); ?> <span class="arrow">▶</span></a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <div class="vecino-empty-state">
                        <div class="vecino-empty-icon">
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <h4 class="vecino-empty-title"><?php esc_html_e( 'No hay beneficios actualmente', 'muni-santa-juana' ); ?></h4>
                        <p class="vecino-empty-subtitle"><?php esc_html_e( 'Estamos trabajando en nuevas alianzas y convenios para nuestra comunidad. ¡Vuelve a consultar pronto!', 'muni-santa-juana' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
