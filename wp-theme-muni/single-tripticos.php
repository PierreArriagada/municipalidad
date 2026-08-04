<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para ediciones individuales de Trípticos
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
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'triptico-single' ); ?> style="background: #ffffff; padding: 3rem; border-radius: 20px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);">
                <header class="entry-header" style="margin-bottom: 2.5rem; text-align: center;">
                    <?php
                    the_title( '<h1 class="entry-title" style="font-size: 2.5rem; color: #1e293b; font-weight: 800; line-height: 1.2; margin-bottom: 1.5rem;">', '</h1>' );
                    ?>
                    <div class="post-thumbnail" style="border-radius: 16px; overflow: hidden; margin: 0 auto 2.5rem auto; box-shadow: 0 4px 6px rgba(0,0,0,0.05); max-width: 900px;">
                        <?php 
                        // Obtener la imagen del post (Destacada, o la primera del contenido, o el fallback predeterminado)
                        $article_img_url = muni_get_post_image( get_the_ID(), 'triptico.webp' );
                        ?>
                        <img src="<?php echo esc_url( $article_img_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" style="width: 100%; height: auto; display: block; object-fit: cover;">
                    </div>
                </header>

                <div class="entry-content" style="line-height: 1.8; font-size: 1.15rem; color: #334155;">
                    <?php
                    // El contenido creado con Gutenberg se mostrará aquí
                    the_content();
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links" style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0;">' . esc_html__( 'Páginas:', 'muni-santa-juana' ),
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
