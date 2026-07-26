<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para publicaciones individuales de Reciclaje
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding: 3rem 1.5rem;">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'reciclaje-single' ); ?>>
                <header class="entry-header" style="margin-bottom: 2rem; text-align: center;">
                    <?php
                    the_title( '<h1 class="entry-title" style="font-size: 2.5rem; color: var(--color-primary, #003399); margin-bottom: 1.5rem;">', '</h1>' );
                    ?>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="border-radius: 12px; overflow: hidden; margin-bottom: 2rem; max-width: 900px; margin-left: auto; margin-right: auto;">
                            <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content" style="line-height: 1.8; font-size: 1.1rem; color: var(--color-text, #333);">
                    <?php
                    the_content();
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'muni-santa-juana' ),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
