<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$hero_args = array(
    'post_type'           => 'post',
    'posts_per_page'      => 3,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
);
$hero_query = new WP_Query( $hero_args );
?>
<!-- ============================================
     NOTICIAS DESTACADAS (Sección Hero)
     ============================================ -->
<section class="hero noticias-hero">
    <div class="container">
        <div class="hero-grid">
            <?php if ( $hero_query->have_posts() ) : ?>
                <?php 
                // Primer post (Destacado principal)
                $hero_query->the_post(); 
                ?>
                <!-- Noticia grande (izquierda) -->
                <article class="noticia-destacada">
                    <div class="noticia-destacada-thumb">
                        <?php 
                        $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : false;
                        ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; background: #f1f5f9; height: 100%; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <!-- Placeholder Background Layers -->
                            <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 50%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                            
                            <!-- Actual Image -->
                            <?php if ( $thumb_url ) : ?>
                                <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-destacada-img" style="position: relative; z-index: 3; width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none';">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="noticia-destacada-content">
                        <div class="noticia-premium-meta" style="margin-bottom: 0.5rem;">
                            <span class="noticia-fecha">
                                <span class="meta-icon"><?php echo muni_render_svg( 'fecha-card' ); ?></span>
                                <?php echo get_the_date(); ?>
                            </span>
                        </div>
                        <h2 class="noticia-destacada-titulo"><a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a></h2>
                        <p class="noticia-destacada-resumen"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                        
                        <div class="noticia-premium-footer" style="margin-top: auto; padding-top: 0.5rem;">
                            <div class="noticia-premium-actions">
                                <a href="<?php the_permalink(); ?>" class="noticia-premium-link"><?php esc_html_e( 'Ver más', 'muni-santa-juana' ); ?></a>
                                <a href="<?php the_permalink(); ?>" class="noticia-premium-btn" aria-label="<?php esc_attr_e( 'Ver más', 'muni-santa-juana' ); ?>">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Columna derecha (noticias secundarias) -->
                <div class="noticias-secundarias">
                    <?php while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                        <article class="noticia-secundaria">
                            <div class="noticia-secundaria-thumb">
                                <?php 
                                $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : false;
                                ?>
                                <a href="<?php the_permalink(); ?>" style="display: block; background: #f1f5f9; height: 100%; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                                    <!-- Placeholder Background Layers -->
                                    <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 60%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                                    
                                    <!-- Actual Image -->
                                    <?php if ( $thumb_url ) : ?>
                                        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-secundaria-img" style="position: relative; z-index: 3; width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none';">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="noticia-secundaria-content">
                                <div class="noticia-premium-meta" style="margin-bottom: 0.4rem;">
                                    <span class="noticia-fecha">
                                        <span class="meta-icon"><?php echo muni_render_svg( 'fecha-card' ); ?></span>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </div>
                                <h3 class="noticia-secundaria-titulo"><a href="<?php the_permalink(); ?>" style="color:inherit; text-decoration:none;"><?php the_title(); ?></a></h3>
                                <p class="noticia-secundaria-resumen"><?php echo wp_trim_words( get_the_excerpt(), 10, '...' ); ?></p>
                                
                                <div class="noticia-premium-footer" style="margin-top: auto; padding-top: 0.25rem;">
                                    <div class="noticia-premium-actions">
                                        <a href="<?php the_permalink(); ?>" class="noticia-premium-link"><?php esc_html_e( 'Ver más', 'muni-santa-juana' ); ?></a>
                                        <a href="<?php the_permalink(); ?>" class="noticia-premium-btn" aria-label="<?php esc_attr_e( 'Ver más', 'muni-santa-juana' ); ?>">
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
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p style="text-align:center; padding: 2rem; color: #64748b;">No hay noticias destacadas publicadas aún.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
