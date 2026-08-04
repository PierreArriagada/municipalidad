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

<main id="main" class="site-main" style="padding: 4rem 0; background-color: #eef2f6;">
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
                            $thumb_url = get_template_directory_uri() . '/assets/img/noticia_fondos_1783211931893.webp';
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-premium-img" onerror="this.src='<?php echo esc_url( get_template_directory_uri() . '/assets/img/noticia_fondos_1783211931893.webp' ); ?>';">
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
            <div class="muni-no-results-card" style="background: #ffffff; border-radius: 20px; box-shadow: 0 12px 35px rgba(0,0,0,0.06); border: 1.5px dashed rgba(5,73,189,0.2); padding: 4rem 2rem; text-align: center; max-width: 650px; margin: 2rem auto;">
                <div style="width: 60px; height: 60px; background: rgba(5,73,189,0.08); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; color: #0549BD;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <h3 style="font-size: 1.4rem; font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;"><?php esc_html_e( 'No se encontraron resultados', 'muni-santa-juana' ); ?></h3>
                <p style="font-size: 0.98rem; color: #64748b; margin-bottom: 2rem;"><?php esc_html_e( 'Intenta realizar una nueva búsqueda o explora nuestras secciones principales.', 'muni-santa-juana' ); ?></p>
                
                <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; gap: 0.5rem; max-width: 480px; margin: 0 auto 1.5rem auto;">
                    <input type="search" placeholder="<?php esc_attr_e( 'Buscar en el sitio...', 'muni-santa-juana' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required style="flex: 1; padding: 0.75rem 1.25rem; border-radius: 30px; border: 1px solid #cbd5e1; outline: none; font-size: 0.9rem;" />
                    <button type="submit" style="background: #0549BD; color: #ffffff; border: none; padding: 0.75rem 1.5rem; border-radius: 30px; font-weight: 700; font-size: 0.9rem; cursor: pointer;"><?php esc_html_e( 'Buscar', 'muni-santa-juana' ); ?></button>
                </form>
                
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; color: #0549BD; font-weight: 700; font-size: 0.9rem; text-decoration: none;"><?php esc_html_e( '← Volver a la página principal', 'muni-santa-juana' ); ?></a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
