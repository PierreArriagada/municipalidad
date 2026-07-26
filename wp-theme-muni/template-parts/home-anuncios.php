<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$anuncios_args = array(
    'post_type'      => 'anuncios',
    'posts_per_page' => 1,
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
        )
    )
);

$anuncios_query = new WP_Query( $anuncios_args );

if ( $anuncios_query->have_posts() ) :
    while ( $anuncios_query->have_posts() ) : $anuncios_query->the_post();
        $link = get_post_meta( get_the_ID(), '_anuncio_link', true );
        $link = ! empty( $link ) ? $link : '#';
        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<!-- ============================================
     ANUNCIO HERO DESTACADO
     ============================================ -->
<section class="anuncio-hero-section">
    <a href="<?php echo esc_url( $link ); ?>" class="anuncio-hero-link" title="<?php echo esc_attr( get_the_title() ); ?>">
        <?php if ( $thumb_url ) : ?>
            <div class="anuncio-hero-bg" style="background-image: url('<?php echo esc_url( $thumb_url ); ?>');"></div>
        <?php else : ?>
            <div class="anuncio-hero-bg no-bg">
                <h2 class="anuncio-hero-fallback-title"><?php the_title(); ?></h2>
                <p>Haz clic para más información</p>
            </div>
        <?php endif; ?>
    </a>
</section>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
