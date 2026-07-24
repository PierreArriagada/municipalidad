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
                $beneficio_img = get_theme_mod( 'muni_beneficio_img', get_template_directory_uri() . '/assets/img/vecino_featured_1783210094330.png' );
                $beneficio_titulo = get_theme_mod( 'muni_beneficio_titulo', 'Obtén tu Tarjeta Vecino' );
                $beneficio_subtitulo = get_theme_mod( 'muni_beneficio_subtitulo', '¡Buenas noticias! La Tarjeta Vecino de Santa Juana ahora es 100% digital.' );
                $beneficio_texto = get_theme_mod( 'muni_beneficio_texto', 'Solo necesitas descargar la app <em>Tarjeta Santa Juana</em> para acceder a múltiples convenios y beneficios en transporte, salud, combustible, educación y más.' );
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
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/vecino_aramco_1783210102383.png" alt="<?php echo esc_attr( get_the_title() ); ?>" class="vecino-img-circle">
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
                    <!-- Tarjeta 1: Fallback -->
                    <div class="vecino-card">
                        <div class="vecino-img-wrapper">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/vecino_aramco_1783210102383.png" alt="Descuento Bencina Aramco" class="vecino-img-circle">
                        </div>
                        <div class="vecino-card-content">
                            <h3>Descuento Aramco</h3>
                            <p>Accede a rebajas especiales de hasta $15 y $25 por litro de combustible con tu Tarjeta Vecino. Conoce los días de promoción y estaciones adheridas para obtener la tuya.</p>
                            <a href="#" class="btn-pill-blue">QUIERO SABER MÁS <span class="arrow">▶</span></a>
                        </div>
                    </div>
                    <!-- Tarjeta 2: Fallback -->
                    <div class="vecino-card">
                        <div class="vecino-img-wrapper">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/vecino_kupos_1783210111064.png" alt="Descuento Kupos Adulto Mayor" class="vecino-img-circle">
                        </div>
                        <div class="vecino-card-content">
                            <h3>Tarjeta Vecino Mayor</h3>
                            <p>Tu bienestar es nuestra prioridad. Conoce la alianza exclusiva para acceder a descuentos en pasajes de buses interurbanos para el Adulto Mayor. Descubre cómo obtenerla.</p>
                            <a href="#" class="btn-pill-blue">QUIERO SABER MÁS <span class="arrow">▶</span></a>
                        </div>
                    </div>
                    <!-- Tarjeta 3: Fallback -->
                    <div class="vecino-card">
                        <div class="vecino-img-wrapper">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/vecino_copago_1783210119573.png" alt="Copago Cero" class="vecino-img-circle">
                        </div>
                        <div class="vecino-card-content">
                            <h3>Copago Cero Fonasa</h3>
                            <p>Como política global de Estado, los afiliados a Fonasa tienen gratuidad total en la red pública. Infórmate sobre cómo validar este beneficio en nuestros centros de salud comunales.</p>
                            <a href="#" class="btn-pill-blue">QUIERO SABER MÁS <span class="arrow">▶</span></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
