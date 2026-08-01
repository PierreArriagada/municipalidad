<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$playlist_id = 'PLQtndAv9EMKA';
// Fetch videos from YouTube RSS
$yt_videos = function_exists('muni_get_youtube_playlist_videos') ? muni_get_youtube_playlist_videos( $playlist_id, 6 ) : array();

?>
<!-- ============================================
         CONCEJO MUNICIPAL Y MULTIMEDIA
         ============================================ -->
    <section id="concejo" class="concejo-redes">
        <div class="container">
            <div class="concejo-header">
                <h2 class="section-title">Concejo Municipal</h2>
                <a href="https://youtube.com/playlist?list=PLQtndAv9EMKA" target="_blank" rel="noopener" class="btn-outline-primary">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" style="margin-right: 6px; vertical-align: middle;">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.55 9.376.55 9.376.55s7.505 0 9.377-.55a3.016 3.016 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    Ver Lista en YouTube
                </a>
            </div>

            <div class="concejo-multimedia">
                <?php if ( ! empty( $yt_videos ) ) : ?>
                    <?php 
                    // El primer video es el principal
                    $main_video = array_shift( $yt_videos );
                    ?>
                    <!-- Video Principal -->
                    <div class="video-principal">
                        <div class="iframe-container">
                            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $main_video['id'] ); ?>" title="<?php echo esc_attr( $main_video['title'] ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-principal-info">
                            <span class="badge-live">Última Sesión</span>
                            <h3><?php echo esc_html( $main_video['title'] ); ?></h3>
                            <p class="fecha-video">Transmitido el <?php echo esc_html( $main_video['date'] ); ?></p>
                        </div>
                    </div>

                    <!-- Lista de Reproducción (Playlist) -->
                    <?php if ( count( $yt_videos ) > 0 ) : ?>
                        <div class="video-playlist">
                            <h3 class="playlist-title">Sesiones Anteriores</h3>
                            <div class="playlist-items">
                                <?php foreach ( $yt_videos as $pl_video ) : ?>
                                    <a href="https://www.youtube.com/watch?v=<?php echo esc_attr( $pl_video['id'] ); ?>&list=<?php echo esc_attr( $playlist_id ); ?>" target="_blank" rel="noopener" class="playlist-item">
                                        <div class="pl-thumb" style="background: url('https://img.youtube.com/vi/<?php echo esc_attr( $pl_video['id'] ); ?>/mqdefault.jpg') center/cover no-repeat; box-shadow: inset 0 0 20px rgba(0,0,0,0.5);">
                                            <div class="pl-play-icon">▶</div>
                                        </div>
                                        <div class="pl-info">
                                            <h4><?php echo esc_html( wp_trim_words( $pl_video['title'], 8, '...' ) ); ?></h4>
                                            <span><?php echo esc_html( $pl_video['date'] ); ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: var(--color-surface); border-radius: var(--radius-lg); border: 1px dashed var(--color-border); width: 100%;">
                        <p style="color: var(--color-text-light); margin: 0; font-size: 1.1rem;"><?php esc_html_e( 'Cargando sesiones o lista vacía...', 'muni-santa-juana' ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
