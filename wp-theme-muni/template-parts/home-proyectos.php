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
                            <a href="<?php the_permalink(); ?>">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'medium_large', array( 'class' => 'proyecto-img', 'alt' => esc_attr( get_the_title() ) ) ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/noticia_fondos_1783211931893.png" alt="<?php the_title_attribute(); ?>" class="proyecto-img" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 220\' fill=\'%23006633\'><rect width=\'400\' height=\'220\' fill=\'%23006633\'/><text x=\'50%\' y=\'50%\' fill=\'%23ffffff\' font-family=\'sans-serif\' font-size=\'20\' font-weight=\'bold\' text-anchor=\'middle\'>Proyecto Municipal</text></svg>'">
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
                                <a href="<?php the_permalink(); ?>" class="proyecto-link"><?php esc_html_e( 'Ver proyecto', 'muni-santa-juana' ); ?></a>
                                <a href="<?php the_permalink(); ?>" class="proyecto-btn" aria-label="Ver proyecto">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; background: var(--color-surface); border-radius: var(--radius-lg); border: 1px dashed var(--color-border); width: 100%;">
                    <p style="color: var(--color-text-light); margin: 0; font-size: 1.1rem;"><?php esc_html_e( 'No hay proyectos actualmente.', 'muni-santa-juana' ); ?></p>
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
