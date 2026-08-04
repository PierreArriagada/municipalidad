<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para listados de Concursos Públicos
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main" style="padding: 4rem 0; background-color: #eef2f6;">
    <div class="container">
        <header class="page-header" style="margin-bottom: 3rem; text-align: center;">
            <h1 class="page-title" style="font-size: 2.8rem; color: #1e293b; font-weight: 800; margin-bottom: 1rem;"><?php esc_html_e( 'Concursos Públicos', 'muni-santa-juana' ); ?></h1>
            <div class="archive-description" style="color: #64748b; font-size: 1.1rem;">
                <?php esc_html_e( 'Oportunidades laborales y llamados a concurso de la Municipalidad de Santa Juana.', 'muni-santa-juana' ); ?>
            </div>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="noticias-premium-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'noticia-card-premium' ); ?>>
                        <?php 
                        $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : false;
                        ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; background: #f1f5f9; height: 220px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; border-radius: 16px;">
                            <!-- Placeholder Background Layers -->
                            <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.webp' ); ?>" alt="" style="position: absolute; width: 70%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                            
                            <!-- Actual Image -->
                            <?php if ( $thumb_url ) : ?>
                                <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-premium-img" style="position: relative; z-index: 3; transform: scale(1.05); width: 100%; height: 100%; object-fit: cover; border-radius: 16px;" onerror="this.style.display='none';">
                            <?php endif; ?>
                        </a>
                        
                        <div class="noticia-premium-content">
                            <div class="noticia-premium-meta">
                                <span class="noticia-fecha">
                                    <span class="meta-icon"><?php echo muni_render_svg( 'fecha-card' ); ?></span>
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                            
                            <h3 class="noticia-premium-title">
                                <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                            
                            <p class="noticia-premium-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
                            </p>
                            
                            <div class="noticia-premium-footer">
                                <div class="noticia-premium-actions">
                                    <a href="<?php the_permalink(); ?>" class="noticia-premium-link"><?php esc_html_e( 'Ver bases', 'muni-santa-juana' ); ?></a>
                                    <a href="<?php the_permalink(); ?>" class="noticia-premium-btn">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>
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
                <p style="font-size: 1.2rem; color: #64748b;"><?php esc_html_e( 'Actualmente no hay concursos públicos vigentes.', 'muni-santa-juana' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
