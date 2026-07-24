<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$banners_args = array(
    'post_type'      => 'banners',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
);
$banners_query = new WP_Query( $banners_args );
?>
<!-- ============================================
         BANNERS DE INTERÉS
         ============================================ -->
    <section class="banners-interes">
        <div class="container">
            <div class="banners-grid">
                <?php if ( $banners_query->have_posts() ) : ?>
                    <?php while ( $banners_query->have_posts() ) : $banners_query->the_post(); 
                        $banner_link = get_post_meta( get_the_ID(), '_banner_link', true );
                        if ( empty( $banner_link ) ) {
                            $banner_link = '#';
                        }
                    ?>
                        <a href="<?php echo esc_url( $banner_link ); ?>" class="banner-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'banner-img', 'alt' => esc_attr( get_the_title() ) ) ); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Turismo.png" alt="<?php echo esc_attr( get_the_title() ); ?>" class="banner-img">
                            <?php endif; ?>
                            <div class="banner-glass-top">
                                <h3 class="banner-title"><?php the_title(); ?></h3>
                            </div>
                            <div class="banner-glass-bottom">
                                <span class="banner-link"><?php esc_html_e( 'Ir a la información ➔', 'muni-santa-juana' ); ?></span>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Fallback -->
                    <a href="#" class="banner-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/Turismo.png" alt="Turismo" class="banner-img">
                        <div class="banner-glass-top">
                            <h3 class="banner-title">Turismo Local</h3>
                        </div>
                        <div class="banner-glass-bottom">
                            <span class="banner-link">Ir a la información ➔</span>
                        </div>
                    </a>
                    <a href="#" class="banner-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/triptico.png" alt="Tríptico" class="banner-img">
                        <div class="banner-glass-top">
                            <h3 class="banner-title">Tríptico Informativo</h3>
                        </div>
                        <div class="banner-glass-bottom">
                            <span class="banner-link">Ir a la información ➔</span>
                        </div>
                    </a>
                    <a href="#" class="banner-card">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/reciclaje.png" alt="Reciclaje" class="banner-img">
                        <div class="banner-glass-top">
                            <h3 class="banner-title">Punto Limpio y Reciclaje</h3>
                        </div>
                        <div class="banner-glass-bottom">
                            <span class="banner-link">Ir a la información ➔</span>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
