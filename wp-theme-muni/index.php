<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Archivo principal del tema (Fallback)
 * 
 * @package Muni_Santa_Juana
 */

get_header(); ?>

<main id="main" class="site-main" style="padding: 4rem 0; background-color: #f8fafc;">
    <div class="container">
        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header class="page-header" style="margin-bottom: 3rem; text-align: center;">
                <h1 class="page-title" style="font-size: 2.8rem; color: #1e293b; font-weight: 800;"><?php single_post_title(); ?></h1>
                <p style="color: #64748b; font-size: 1.1rem; margin-top: 0.5rem;">Mantente informado de todo lo que ocurre en nuestra comuna</p>
            </header>
        <?php elseif ( is_search() ) : ?>
            <header class="page-header" style="margin-bottom: 3rem; text-align: center;">
                <h1 class="page-title" style="font-size: 2.8rem; color: #1e293b; font-weight: 800;">
                    <?php printf( esc_html__( 'Resultados para: %s', 'muni-santa-juana' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
            </header>
        <?php else : ?>
            <header class="page-header" style="margin-bottom: 3rem; text-align: center;">
                <h1 class="page-title" style="font-size: 2.8rem; color: #1e293b; font-weight: 800;">Últimas Noticias</h1>
            </header>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <div class="noticias-premium-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'noticia-card-premium' ); ?>>
                        <?php 
                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                        if ( ! $thumb_url ) {
                            $thumb_url = get_template_directory_uri() . '/assets/img/noticia_fondos_1783211931893.png';
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-premium-img" onerror="this.src='<?php echo esc_url( get_template_directory_uri() . '/assets/img/noticia_fondos_1783211931893.png' ); ?>';">
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
                                    <a href="<?php the_permalink(); ?>" class="noticia-premium-link"><?php esc_html_e( 'Ver más', 'muni-santa-juana' ); ?></a>
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
                <p style="font-size: 1.2rem; color: #64748b;"><?php esc_html_e( 'No se encontró contenido.', 'muni-santa-juana' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
