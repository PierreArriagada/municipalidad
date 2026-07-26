<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$tripticos_args = array(
    'post_type'      => 'tripticos',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);
$tripticos_query = new WP_Query( $tripticos_args );
?>
<!-- ============================================
     TRÍPTICOS
     ============================================ -->
<section class="tripticos-section" style="padding: 4rem 0; background: var(--color-background);">
    <div class="container">
        <h2 class="section-title text-center" style="margin-bottom: 2rem; color: var(--color-primary);"><?php esc_html_e( 'Trípticos Informativos', 'muni-santa-juana' ); ?></h2>
        
        <div class="tripticos-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <?php if ( $tripticos_query->have_posts() ) : ?>
                <?php while ( $tripticos_query->have_posts() ) : $tripticos_query->the_post(); 
                    $triptico_link = get_post_meta( get_the_ID(), '_triptico_link', true );
                ?>
                    <div class="triptico-card" style="background: var(--color-surface); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); transition: transform 0.3s ease;">
                        <?php if ( ! empty( $triptico_link ) ) : ?>
                            <a href="<?php echo esc_url( $triptico_link ); ?>" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                        <?php endif; ?>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large', array( 'class' => 'triptico-img', 'alt' => esc_attr( get_the_title() ), 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/triptico-default.jpg" alt="<?php echo esc_attr( get_the_title() ); ?>" class="triptico-img" style="width: 100%; height: auto; display: block;">
                        <?php endif; ?>
                        
                        <div class="triptico-info" style="padding: 1.5rem; text-align: center;">
                            <h3 class="triptico-title" style="margin: 0; color: var(--color-text); font-size: 1.25rem;"><?php the_title(); ?></h3>
                        </div>

                        <?php if ( ! empty( $triptico_link ) ) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Fallback if no Tripticos exist yet -->
                <div class="triptico-card" style="background: var(--color-surface); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); transition: transform 0.3s ease; max-width: 800px; margin: 0 auto;">
                    <a href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/triptico-default.jpg" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/triptico-default.jpg" alt="Tríptico" class="triptico-img" style="width: 100%; height: auto; display: block;">
                        <div class="triptico-info" style="padding: 1.5rem; text-align: center;">
                            <h3 class="triptico-title" style="margin: 0; color: var(--color-text); font-size: 1.25rem;">Tríptico Informativo</h3>
                            <p style="margin-top: 0.5rem; color: var(--color-text-light);">Haz clic para ampliar</p>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
