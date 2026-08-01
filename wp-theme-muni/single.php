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

<style>
    .single-main-container { background-color: #f8fafc; padding: 1.5rem 0.5rem; }
    .noticia-single-article { background: #ffffff; padding: 1.2rem; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01); max-width: 900px; margin: 0 auto; }
    .single-entry-title { font-size: 1.8rem; color: #1e293b; font-weight: 800; line-height: 1.2; margin-bottom: 1rem; text-align: center; }
    .single-entry-meta { color: #64748b; font-size: 0.9rem; margin-bottom: 1.5rem; display: flex; justify-content: center; gap: 1rem; align-items: center; flex-wrap: wrap; }
    .single-post-thumbnail { border-radius: 12px; overflow: hidden; margin: 0 auto 2rem auto; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .single-post-thumbnail img { width: 100%; height: auto; display: block; object-fit: cover; }
    .single-entry-content { line-height: 1.7; font-size: 1.05rem; color: #334155; }
    .single-entry-content img { max-width: 100%; height: auto; border-radius: 8px; }
    
    @media (min-width: 768px) {
        .single-main-container { padding: 4rem 0; }
        .noticia-single-article { padding: 3rem; border-radius: 20px; }
        .single-entry-title { font-size: 2.5rem; margin-bottom: 1.5rem; }
        .single-entry-meta { font-size: 1rem; gap: 1.5rem; margin-bottom: 2rem; }
        .single-post-thumbnail { border-radius: 16px; margin-bottom: 2.5rem; }
        .single-entry-content { line-height: 1.8; font-size: 1.15rem; }
    }
</style>

<main id="primary" class="site-main single-main-container">
    <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0;">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'noticia-single-article' ); ?>>
                <header class="entry-header">
                    <?php
                    the_title( '<h1 class="single-entry-title">', '</h1>' );
                    ?>
                    <div class="single-entry-meta">
                        <span class="posted-on" style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline" style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <?php the_author(); ?>
                        </span>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="single-post-thumbnail">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="single-entry-content">
                    <?php
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
