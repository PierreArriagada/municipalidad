<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para entradas individuales (Noticias)
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
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'noticia-single' ); ?>>
                <header class="entry-header" style="margin-bottom: 2rem;">
                    <?php
                    the_title( '<h1 class="entry-title" style="font-size: 2.5rem; color: #003399; margin-bottom: 1rem;">', '</h1>' );
                    ?>
                    <div class="entry-meta" style="color: #666; font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span class="posted-on">📅 <?php echo get_the_date(); ?></span>
                        <span class="byline" style="margin-left: 1rem;">👤 <?php the_author(); ?></span>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="border-radius: 12px; overflow: hidden; margin-bottom: 2rem;">
                            <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content" style="line-height: 1.8; font-size: 1.1rem; color: #333;">
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
