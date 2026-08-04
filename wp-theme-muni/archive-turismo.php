<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para el listado de Turismo Local (Archivo)
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main" style="padding: 4rem 0; background-color: var(--color-background, #f8fafc);">
    <div class="container">
        <header class="page-header" style="margin-bottom: 3rem; text-align: center;">
            <h1 class="page-title" style="font-size: 2.8rem; color: var(--color-text, #1e293b); font-weight: 800; margin-bottom: 1rem;">
                Turismo Local
            </h1>
            <div class="archive-description" style="color: var(--color-text-light, #64748b); font-size: 1.1rem;">
                Explora los atractivos y noticias de turismo de nuestra comuna.
            </div>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="tripticos-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'turismo-card' ); ?> style="background: var(--color-surface, #fff); border-radius: var(--radius-lg, 12px); overflow: hidden; box-shadow: var(--shadow-md, 0 4px 6px rgba(0,0,0,0.1)); transition: transform 0.3s ease;">
                        <?php 
                        $thumb_url = muni_get_post_image( get_the_ID(), 'Turismo.webp' );
                        ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; width: 100%; height: 200px; overflow: hidden;">
                            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="turismo-img" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" loading="lazy" decoding="async">
                        </a>
                        
                        <div class="turismo-info" style="padding: 1.5rem; text-align: center;">
                            <h3 class="turismo-title" style="margin: 0 0 1rem 0; font-size: 1.25rem;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--color-text, #1e293b); text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                            <a href="<?php the_permalink(); ?>" class="turismo-link" style="display: inline-block; padding: 0.5rem 1.2rem; background: var(--color-primary, #003399); color: #fff; border-radius: 50px; text-decoration: none; font-size: 0.9rem; font-weight: 500;">
                                Ver información ➔
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="muni-pagination" style="margin-top: 4rem; display: flex; justify-content: center;">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '← Anterior', 'muni-santa-juana' ),
                    'next_text' => __( 'Siguiente →', 'muni-santa-juana' ),
                    'class'     => 'pagination-links'
                ) );
                ?>
            </div>
            
        <?php else : ?>
            <div class="no-results" style="text-align: center; padding: 4rem 0;">
                <p style="font-size: 1.2rem; color: var(--color-text-light, #64748b);"><?php esc_html_e( 'Pronto subiremos nueva información de turismo.', 'muni-santa-juana' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
