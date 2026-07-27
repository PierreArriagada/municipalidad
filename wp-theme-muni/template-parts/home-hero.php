<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ==============================================================================
// LECTURA SILENCIOSA DE FACEBOOK VIA SMASH BALLOON (Solo lectura de token)
// ==============================================================================
$fb_posts = array();
$cff_accounts = get_option( 'cff_connected_accounts', array() );

if ( ! empty( $cff_accounts ) && is_array( $cff_accounts ) ) {
    $first_account = reset( $cff_accounts );
    if ( ! empty( $first_account['access_token'] ) && ! empty( $first_account['page_id'] ) ) {
        $access_token = $first_account['access_token'];
        $page_id = $first_account['page_id'];
        
        // Cache de 1 hora para no saturar la API ni ralentizar la web
        $fb_posts = get_transient( 'muni_fb_hero_posts' );
        
        if ( false === $fb_posts ) {
            // Pedir a Facebook: mensaje, fecha, foto tamaño completo y link original
            $api_url = "https://graph.facebook.com/v19.0/{$page_id}/posts?fields=message,created_time,full_picture,permalink_url&limit=3&access_token={$access_token}";
            $response = wp_remote_get( $api_url, array('timeout' => 10) );
            
            if ( ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
                $body = wp_remote_retrieve_body( $response );
                $data = json_decode( $body, true );
                if ( ! empty( $data['data'] ) && count( $data['data'] ) >= 3 ) {
                    $fb_posts = $data['data'];
                    set_transient( 'muni_fb_hero_posts', $fb_posts, HOUR_IN_SECONDS );
                }
            }
        }
    }
}

// Si no logramos leer 3 posts de Facebook, volvemos a mostrar los posts nativos de WP (Fallback Seguro)
$use_wp_fallback = empty( $fb_posts ) || count( $fb_posts ) < 3;

if ( $use_wp_fallback ) {
    $hero_args = array(
        'post_type'           => 'post',
        'posts_per_page'      => 3,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
    );
    $hero_query = new WP_Query( $hero_args );
}
?>
<!-- ============================================
     NOTICIAS DESTACADAS (Sección Hero)
     ============================================ -->
<section class="hero noticias-hero">
    <div class="container">
        <div class="hero-grid">
            
            <?php if ( ! $use_wp_fallback ) : ?>
                <!-- RENDERING FACEBOOK CON DISEÑO PREMIUM MANTENIDO -->
                <?php 
                $main_post = $fb_posts[0];
                $sec_post_1 = $fb_posts[1];
                $sec_post_2 = $fb_posts[2];
                ?>
                
                <!-- Noticia grande (izquierda) -->
                <article class="noticia-destacada">
                    <div class="noticia-destacada-thumb">
                        <a href="<?php echo esc_url( $main_post['permalink_url'] ); ?>" target="_blank" rel="noopener" style="display: block; background: #f1f5f9; height: 100%; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 50%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                            <?php if ( ! empty( $main_post['full_picture'] ) ) : ?>
                                <img src="<?php echo esc_url( $main_post['full_picture'] ); ?>" alt="Noticia Facebook" class="noticia-destacada-img" style="position: relative; z-index: 3; width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none';">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="noticia-destacada-content">
                        <div class="noticia-premium-meta" style="margin-bottom: 0.5rem;">
                            <span class="noticia-fecha" style="color:#0866FF; font-weight: 600;">
                                <!-- Logo FB nativo de Hero -->
                                <svg style="margin-right:4px; vertical-align:-3px;" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                <?php echo date_i18n( get_option('date_format'), strtotime($main_post['created_time']) ); ?>
                            </span>
                        </div>
                        <h2 class="noticia-destacada-titulo"><a href="<?php echo esc_url( $main_post['permalink_url'] ); ?>" target="_blank" rel="noopener" style="color:inherit; text-decoration:none;"><?php echo wp_trim_words( !empty($main_post['message']) ? $main_post['message'] : 'Novedades Municipales', 12, '...' ); ?></a></h2>
                        <p class="noticia-destacada-resumen"><?php echo wp_trim_words( !empty($main_post['message']) ? $main_post['message'] : '', 20, '...' ); ?></p>
                        
                        <div class="noticia-premium-footer" style="margin-top: auto; padding-top: 0.5rem;">
                            <div class="noticia-premium-actions">
                                <a href="<?php echo esc_url( $main_post['permalink_url'] ); ?>" target="_blank" rel="noopener" class="noticia-premium-link">Ver en Facebook</a>
                                <a href="<?php echo esc_url( $main_post['permalink_url'] ); ?>" target="_blank" rel="noopener" class="noticia-premium-btn" aria-label="Ver en Facebook">
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
                    <?php 
                    $secundarias = array($sec_post_1, $sec_post_2);
                    foreach( $secundarias as $sec_post ) : 
                    ?>
                        <article class="noticia-secundaria">
                            <div class="noticia-secundaria-thumb">
                                <a href="<?php echo esc_url( $sec_post['permalink_url'] ); ?>" target="_blank" rel="noopener" style="display: block; background: #f1f5f9; height: 100%; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                                    <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 60%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                                    <?php if ( ! empty( $sec_post['full_picture'] ) ) : ?>
                                        <img src="<?php echo esc_url( $sec_post['full_picture'] ); ?>" alt="Noticia Facebook" class="noticia-secundaria-img" style="position: relative; z-index: 3; width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none';">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="noticia-secundaria-content">
                                <div class="noticia-premium-meta" style="margin-bottom: 0.4rem;">
                                    <span class="noticia-fecha" style="color:#0866FF; font-weight: 600;">
                                        <svg style="margin-right:4px; vertical-align:-3px;" width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                        <?php echo date_i18n( get_option('date_format'), strtotime($sec_post['created_time']) ); ?>
                                    </span>
                                </div>
                                <h3 class="noticia-secundaria-titulo"><a href="<?php echo esc_url( $sec_post['permalink_url'] ); ?>" target="_blank" rel="noopener" style="color:inherit; text-decoration:none;"><?php echo wp_trim_words( !empty($sec_post['message']) ? $sec_post['message'] : 'Novedades Municipales', 8, '...' ); ?></a></h3>
                                <p class="noticia-secundaria-resumen"><?php echo wp_trim_words( !empty($sec_post['message']) ? $sec_post['message'] : '', 10, '...' ); ?></p>
                                
                                <div class="noticia-premium-footer" style="margin-top: auto; padding-top: 0.25rem;">
                                    <div class="noticia-premium-actions">
                                        <a href="<?php echo esc_url( $sec_post['permalink_url'] ); ?>" target="_blank" rel="noopener" class="noticia-premium-link">Ver en Facebook</a>
                                        <a href="<?php echo esc_url( $sec_post['permalink_url'] ); ?>" target="_blank" rel="noopener" class="noticia-premium-btn" aria-label="Ver en Facebook">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

            <?php elseif ( $hero_query->have_posts() ) : ?>
                <!-- RENDERING NORMAL DE WORDPRESS (FALLBACK POR SI FACEBOOK FALLA) -->
                <?php 
                $hero_query->the_post(); 
                ?>
                <article class="noticia-destacada">
                    <div class="noticia-destacada-thumb">
                        <?php $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : false; ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; background: #f1f5f9; height: 100%; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                            <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 50%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
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

                <div class="noticias-secundarias">
                    <?php while ( $hero_query->have_posts() ) : $hero_query->the_post(); ?>
                        <article class="noticia-secundaria">
                            <div class="noticia-secundaria-thumb">
                                <?php $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : false; ?>
                                <a href="<?php the_permalink(); ?>" style="display: block; background: #f1f5f9; height: 100%; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                                    <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 60%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
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
