<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$premium_args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 6,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
    'orderby'             => 'date',
    'order'               => 'DESC',
);
$premium_query = new WP_Query( $premium_args );
?>
<!-- ============================================
     NOTICIAS RECIENTES (Grid de noticias)
     ============================================ -->
<section class="noticias-premium">
    <!-- Divider Olas Superior -->
    <div class="noticias-wave-top">
        <svg viewBox="0 0 1440 36" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,36 C360,6 720,30 1080,10 C1260,0 1380,16 1440,24 L1440,36 L0,36 Z" fill="#2756d8"/>
        </svg>
    </div>
    <div class="container">
        <div class="noticias-premium-header">
            <h2 class="section-title text-white"><?php esc_html_e( 'Noticias Recientes', 'muni-santa-juana' ); ?></h2>
        </div>
        
        <div class="noticias-premium-grid">
            <?php if ( $premium_query->have_posts() ) : ?>
                <?php while ( $premium_query->have_posts() ) : $premium_query->the_post(); ?>
                    <article class="noticia-card-premium">
                        <?php 
                        $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : false;
                        ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; background: #f1f5f9; height: 220px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; border-radius: 16px;">
                            <!-- Placeholder Background Layers -->
                            <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 70%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                            
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
                            <h3 class="noticia-premium-title"><a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a></h3>
                            
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
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: var(--color-surface); border-radius: var(--radius-lg); border: 1px dashed var(--color-border); width: 100%;">
                    <p style="color: var(--color-text-light); margin: 0; font-size: 1.1rem;"><?php esc_html_e( 'No hay noticias actualmente.', 'muni-santa-juana' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="noticias-premium-actions" style="text-align: right; margin-top: 3rem;">
            <?php
            $posts_page_id = get_option( 'page_for_posts' );
            if ( $posts_page_id ) {
                $news_archive_url = get_permalink( $posts_page_id );
            } else {
                // Si no hay página configurada, enviamos a la categoría principal de noticias
                $news_archive_url = home_url( '/category/noticias/' );
            }
            ?>
            <a href="<?php echo esc_url( $news_archive_url ); ?>" class="ver-todo-white" style="display: inline-block; padding: 0.75rem 2rem; border: 1px solid rgba(255,255,255,0.4); border-radius: 30px; transition: all 0.3s ease; color: white; text-decoration: none;"><?php esc_html_e( 'Ver todas las noticias →', 'muni-santa-juana' ); ?></a>
        </div>
    </div>
    <!-- Divider Olas Inferior -->
    <div class="noticias-wave-bottom">
        <svg viewBox="0 0 1440 36" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 C360,30 720,6 1080,26 C1260,36 1380,20 1440,12 L1440,36 L0,36 Z" fill="#ffffff"/>
        </svg>
    </div>
</section>
