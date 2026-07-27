<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sesiones_args = array(
    'post_type'      => 'sesiones_concejo',
    'posts_per_page' => 5,
    'post_status'    => 'publish',
);
$sesiones_query = new WP_Query( $sesiones_args );
?>
<!-- ============================================
         CONCEJO MUNICIPAL Y MULTIMEDIA
         ============================================ -->
    <section id="concejo" class="concejo-redes">
        <div class="container">
            <div class="concejo-header">
                <h2 class="section-title">Concejo Municipal</h2>
                <a href="<?php echo esc_url( get_theme_mod( 'muni_youtube_url', 'https://www.youtube.com/@munisantajuana' ) ); ?>" target="_blank" rel="noopener" class="btn-outline-primary">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" style="margin-right: 6px; vertical-align: middle;">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.55 9.376.55 9.376.55s7.505 0 9.377-.55a3.016 3.016 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    Visitar Canal Oficial
                </a>
            </div>

            <div class="concejo-multimedia">
                <?php if ( $sesiones_query->have_posts() ) : ?>
                    <?php 
                    // El primer post es el video principal
                    $sesiones_query->the_post(); 
                    $main_video_url = get_post_meta( get_the_ID(), '_video_url', true );
                    $main_fecha = get_post_meta( get_the_ID(), '_fecha_sesion', true );
                    
                    // Convertir URL normal de YouTube a formato Embed
                    if ( strpos( $main_video_url, 'watch?v=' ) !== false ) {
                        $main_video_url = str_replace( 'watch?v=', 'embed/', $main_video_url );
                    } elseif ( strpos( $main_video_url, 'youtu.be/' ) !== false ) {
                        $main_video_url = str_replace( 'youtu.be/', 'www.youtube.com/embed/', $main_video_url );
                    }
                    ?>
                    <!-- Video Principal -->
                    <div class="video-principal">
                        <div class="iframe-container">
                            <iframe src="<?php echo esc_url( $main_video_url ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-principal-info">
                            <span class="badge-live">Última Sesión</span>
                            <h3><?php the_title(); ?></h3>
                            <p class="fecha-video">Transmitido el <?php echo esc_html( $main_fecha ); ?></p>
                        </div>
                    </div>

                    <!-- Lista de Reproducción (Playlist) -->
                    <?php if ( $sesiones_query->have_posts() ) : ?>
                        <div class="video-playlist">
                            <h3 class="playlist-title">Sesiones Anteriores</h3>
                            <div class="playlist-items">
                                <?php while ( $sesiones_query->have_posts() ) : $sesiones_query->the_post(); 
                                    $pl_video_url = get_post_meta( get_the_ID(), '_video_url', true );
                                    $pl_fecha = get_post_meta( get_the_ID(), '_fecha_sesion', true );
                                ?>
                                    <a href="<?php echo esc_url( $pl_video_url ); ?>" target="_blank" rel="noopener" class="playlist-item">
                                        <div class="pl-thumb">
                                            <div class="pl-play-icon">▶</div>
                                        </div>
                                        <div class="pl-info">
                                            <h4><?php the_title(); ?></h4>
                                            <span><?php echo esc_html( $pl_fecha ); ?></span>
                                        </div>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: var(--color-surface); border-radius: var(--radius-lg); border: 1px dashed var(--color-border); width: 100%;">
                        <p style="color: var(--color-text-light); margin: 0; font-size: 1.1rem;"><?php esc_html_e( 'No hay sesiones actualmente.', 'muni-santa-juana' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
