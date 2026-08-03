<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para páginas estáticas
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main" style="background-color: #eef2f6; padding-bottom: 4rem;">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Banner Superior -->
            <div class="page-hero" style="background-color: #003399; color: white; padding: 4rem 1.5rem; text-align: center; position: relative;">
                <div class="container" style="position: relative; z-index: 2;">
                    <?php the_title( '<h1 class="entry-title" style="font-size: 3rem; margin: 0; font-weight: 800;">', '</h1>' ); ?>
                </div>
                <!-- Ondas decorativas -->
                <svg style="position: absolute; bottom: -1px; left: 0; width: 100%; height: auto; display: block;" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal -->
            <div class="container" style="padding-top: 3rem; max-width: 900px;">
                <div class="entry-content" style="background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.04); line-height: 1.8; font-size: 1.1rem; color: #444;">
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
            </div>
            
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
