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
                        <?php if ( has_post_thumbnail() ) : 
                            $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                            if ( ! $thumb_url ) {
                                $thumb_url = get_template_directory_uri() . '/assets/img/noticia_fondos_1783211931893.png';
                            }
                        ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-destacada-img" onerror="this.src='<?php echo esc_url( get_template_directory_uri() . '/assets/img/noticia_fondos_1783211931893.png' ); ?>';">
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/noticia_fondos_1783211931893.png" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-destacada-img">
                            </a>
                        <?php endif; ?>
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
                                <?php if ( has_post_thumbnail() ) : 
                                    $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
                                    if ( ! $thumb_url ) {
                                        $thumb_url = get_template_directory_uri() . '/assets/img/noticia_salud_1783211940813.png';
                                    }
                                ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-secundaria-img" onerror="this.src='<?php echo esc_url( get_template_directory_uri() . '/assets/img/noticia_salud_1783211940813.png' ); ?>';">
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/noticia_salud_1783211940813.png" alt="<?php echo esc_attr( get_the_title() ); ?>" class="noticia-secundaria-img">
                                    </a>
                                <?php endif; ?>
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
                <!-- Fallback estático (se muestra cuando no hay posts en BD) -->
                <article class="noticia-destacada">
                    <div class="noticia-destacada-thumb">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/noticia_fondos_1783211931893.png" alt="Bases Fondos Concursables 2026" class="noticia-destacada-img">
                    </div>
                    <div class="noticia-destacada-content">
                        <div class="noticia-premium-meta" style="margin-bottom: 0.5rem;">
                            <span class="noticia-fecha">
                                <span class="meta-icon"><?php echo muni_render_svg( 'fecha-card' ); ?></span>
                                20 de mayo de 2026
                            </span>
                        </div>
                        <h2 class="noticia-destacada-titulo">Bases Fondos Concursables 2026 - Llamado a Concurso</h2>
                        <p class="noticia-destacada-resumen">Se abren las postulaciones para los fondos concursables 2026. Fecha límite: 30 de junio de 2026.</p>
                        
                        <div class="noticia-premium-footer" style="margin-top: auto; padding-top: 0.5rem;">
                            <div class="noticia-premium-actions">
                                <a href="#" class="noticia-premium-link">Ver más</a>
                                <a href="#" class="noticia-premium-btn" aria-label="Ver más">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Columna derecha (2 noticias secundarias) -->
                <div class="noticias-secundarias">
                    <article class="noticia-secundaria">
                        <div class="noticia-secundaria-thumb">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/noticia_salud_1783211940813.png" alt="Bases FONDESAL 2026" class="noticia-secundaria-img">
                        </div>
                        <div class="noticia-secundaria-content">
                            <div class="noticia-premium-meta" style="margin-bottom: 0.4rem;">
                                <span class="noticia-fecha">
                                    <span class="meta-icon"><?php echo muni_render_svg( 'fecha-card' ); ?></span>
                                    20/05/2026
                                </span>
                            </div>
                            <h3 class="noticia-secundaria-titulo">Bases FONDESAL 2026</h3>
                            <p class="noticia-secundaria-resumen">Revisa las bases para el fondo concursable FONDESAL.</p>
                            
                            <div class="noticia-premium-footer" style="margin-top: auto; padding-top: 0.25rem;">
                                <div class="noticia-premium-actions">
                                    <a href="#" class="noticia-premium-link">Ver más</a>
                                    <a href="#" class="noticia-premium-btn" aria-label="Ver más">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="noticia-secundaria">
                        <div class="noticia-secundaria-thumb">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/noticia_mujeres_1783211949705.png" alt="Concurso 2 Cargos Programa 4 a 7" class="noticia-secundaria-img">
                        </div>
                        <div class="noticia-secundaria-content">
                            <div class="noticia-premium-meta" style="margin-bottom: 0.4rem;">
                                <span class="noticia-fecha">
                                    <span class="meta-icon"><?php echo muni_render_svg( 'fecha-card' ); ?></span>
                                    23/03/2026
                                </span>
                            </div>
                            <h3 class="noticia-secundaria-titulo">Concurso 2 Cargos Programa 4 a 7</h3>
                            <p class="noticia-secundaria-resumen">Postulaciones abiertas para mujeres trabajadoras en el programa 4 a 7.</p>
                            
                            <div class="noticia-premium-footer" style="margin-top: auto; padding-top: 0.25rem;">
                                <div class="noticia-premium-actions">
                                    <a href="#" class="noticia-premium-link">Ver más</a>
                                    <a href="#" class="noticia-premium-btn" aria-label="Ver más">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
