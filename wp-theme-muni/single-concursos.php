<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para concurso individual
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
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'concurso-single' ); ?>>
                <header class="entry-header" style="margin-bottom: 2rem;">
                    <?php
                    the_title( '<h1 class="entry-title" style="font-size: 2.5rem; color: #003399; margin-bottom: 1rem;">', '</h1>' );
                    ?>
                    <div class="entry-meta" style="color: #666; font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span class="posted-on">📅 Publicado el: <?php echo get_the_date(); ?></span>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="border-radius: 12px; overflow: hidden; margin-bottom: 2rem;">
                            <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; max-width: 800px; height: auto; display: block; margin: 0 auto;' ) ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content" style="line-height: 1.8; font-size: 1.1rem; color: #333; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">
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
                <div style="margin-top: 2rem;">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'concursos' ) ); ?>" class="btn-volver" style="display: inline-block; padding: 10px 20px; background-color: #003399; color: #fff; text-decoration: none; border-radius: 6px; font-weight: bold;">
                        &larr; Volver a Concursos Públicos
                    </a>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
