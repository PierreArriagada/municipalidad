<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$anuncios_args = array(
    'post_type'      => 'anuncios',
    'posts_per_page' => 5, // Límite de 5 para no afectar rendimiento
    'post_status'    => 'publish',
    'meta_query'     => array(
        'relation' => 'AND',
        array(
            'key'     => '_anuncio_tipo',
            'value'   => 'hero',
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

$anuncios_query = new WP_Query( $anuncios_args );
$post_count = $anuncios_query->post_count;

if ( $anuncios_query->have_posts() ) :
?>
<!-- ============================================
     ANUNCIOS HERO DESTACADOS (CARRUSEL)
     ============================================ -->
<section class="anuncio-hero-section <?php echo $post_count > 1 ? 'has-carousel' : ''; ?>">
    <div class="container">
        <div class="anuncio-hero-slider" id="anuncioHeroSlider">
            <div class="anuncio-hero-track">
                <?php 
                $index = 0;
                while ( $anuncios_query->have_posts() ) : $anuncios_query->the_post();
                    $link = get_post_meta( get_the_ID(), '_anuncio_link', true );
                    $link = ! empty( $link ) ? $link : '#';
                    $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    
                    // Evaluar si es link externo para añadir target="_blank"
                    $target = '';
                    $rel = '';
                    if ( strpos( $link, 'http' ) === 0 && strpos( $link, home_url() ) === false ) {
                        $target = 'target="_blank"';
                        $rel = 'rel="noopener noreferrer"';
                    }
                    
                    $active_class = $index === 0 ? 'active' : '';
                ?>
                <div class="anuncio-hero-slide <?php echo $active_class; ?>" data-index="<?php echo $index; ?>">
                    <a href="<?php echo esc_url( $link ); ?>" class="anuncio-hero-link" title="<?php echo esc_attr( get_the_title() ); ?>" <?php echo $target; ?> <?php echo $rel; ?>>
                        <?php if ( $thumb_url ) : ?>
                            <div class="anuncio-hero-bg" style="background-image: url('<?php echo esc_url( $thumb_url ); ?>');" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                                <div class="anuncio-hero-image-contain" style="background-image: url('<?php echo esc_url( $thumb_url ); ?>');"></div>
                                <div class="anuncio-hero-content">
                                    <h2 class="anuncio-hero-title"><?php the_title(); ?></h2>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="anuncio-hero-bg no-bg">
                                <div class="anuncio-hero-content">
                                    <h2 class="anuncio-hero-fallback-title"><?php the_title(); ?></h2>
                                    <p>Haz clic para más información</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
                <?php 
                    $index++;
                endwhile; 
                ?>
            </div>

            <?php if ( $post_count > 1 ) : ?>
                <!-- Controles del Carrusel -->
                <button class="anuncio-hero-control prev" aria-label="Anuncio anterior">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button class="anuncio-hero-control next" aria-label="Anuncio siguiente">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
                <div class="anuncio-hero-dots">
                    <?php for ( $i = 0; $i < $post_count; $i++ ) : ?>
                        <button class="anuncio-hero-dot <?php echo $i === 0 ? 'active' : ''; ?>" aria-label="Ir al anuncio <?php echo $i + 1; ?>" data-index="<?php echo $i; ?>"></button>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
    wp_reset_postdata();
endif;
?>
