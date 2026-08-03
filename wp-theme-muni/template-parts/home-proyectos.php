<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$args = array(
    'post_type'      => 'proyectos',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
);
$proyectos_query = new WP_Query( $args );
?>
<!-- ============================================
     PROYECTOS MUNICIPALES (Sección Verde Institucional)
     ============================================ -->
<section class="proyectos-verde">
    <!-- Divider Olas Superior (Ultra Sutil) -->
    <div class="proyectos-wave-top">
        <svg viewBox="0 0 1440 24" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,24 C360,10 720,20 1080,8 C1260,2 1380,12 1440,16 L1440,24 L0,24 Z" fill="#006633"/>
        </svg>
    </div>
    <div class="container">
        <div class="proyectos-header">
            <h2 class="section-title text-white"><?php esc_html_e( 'Proyectos Municipales', 'muni-santa-juana' ); ?></h2>
        </div>
        
        <div class="proyectos-grid">
            <?php if ( $proyectos_query->have_posts() ) : ?>
                <?php while ( $proyectos_query->have_posts() ) : $proyectos_query->the_post(); 
                    $post_id   = get_the_ID();
                    $estado    = get_post_meta( $post_id, '_estado_proyecto', true );
                    $categoria = get_post_meta( $post_id, '_categoria_proyecto', true );

                    if ( empty( $estado ) ) {
                        $estado = 'En Desarrollo';
                    }
                    if ( empty( $categoria ) ) {
                        $categoria = 'Infraestructura';
                    }

                    $clean_estado = strtolower( trim( $estado ) );
                    $clase_badge = 'badge-desarrollo';
                    if ( strpos( $clean_estado, 'aprobado' ) !== false || strpos( $clean_estado, 'finalizado' ) !== false ) {
                        $clase_badge = 'badge-aprobado';
                    } elseif ( strpos( $clean_estado, 'licitaci' ) !== false || strpos( $clean_estado, 'postula' ) !== false ) {
                        $clase_badge = 'badge-licitacion';
                    }
                ?>
                    <article class="proyecto-card">
                        <div class="proyecto-thumb-wrap">
                            <?php 
                            $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : false;
                            ?>
                            <a href="<?php the_permalink(); ?>" style="display: block; background: #f1f5f9; height: 220px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; border-radius: 16px;">
                                <!-- Placeholder Background Layers -->
                                <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 70%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                                
                                <!-- Actual Image -->
                                <?php if ( $thumb_url ) : ?>
                                    <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="proyecto-img" style="position: relative; z-index: 3; transform: scale(1.05); width: 100%; height: 100%; object-fit: cover; border-radius: 16px;" onerror="this.style.display='none';">
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="proyecto-content">
                            <h3 class="proyecto-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <p class="proyecto-excerpt">
                                <?php echo wp_trim_words( wp_strip_all_tags( get_the_content() ), 15, '...' ); ?>
                            </p>

                            <div class="proyecto-footer">
                                <div class="proyecto-actions">
                                    <a href="<?php the_permalink(); ?>" class="proyecto-link"><?php esc_html_e( 'Ver proyecto', 'muni-santa-juana' ); ?></a>
                                    <a href="<?php the_permalink(); ?>" class="proyecto-btn">
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
                <div class="proyecto-empty-state">
                    <div class="proyecto-empty-icon">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="proyecto-empty-title"><?php esc_html_e( 'No hay proyectos disponibles actualmente', 'muni-santa-juana' ); ?></h4>
                    <p class="proyecto-empty-subtitle"><?php esc_html_e( 'Estamos trabajando en nuevas obras e iniciativas para nuestra comuna. ¡Vuelve a consultar pronto!', 'muni-santa-juana' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="proyectos-actions" style="text-align: right; margin-top: 3rem;">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'proyectos' ) ); ?>" class="ver-todo-white"><?php esc_html_e( 'Ver todos los proyectos →', 'muni-santa-juana' ); ?></a>
        </div>
    </div>
    <!-- Divider Olas Inferior (Ultra Sutil) -->
    <div class="proyectos-wave-bottom">
        <svg viewBox="0 0 1440 24" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,0 C360,14 720,4 1080,14 C1260,20 1380,10 1440,8 L1440,24 L0,24 Z" fill="#ffffff"/>
        </svg>
    </div>
</section>
