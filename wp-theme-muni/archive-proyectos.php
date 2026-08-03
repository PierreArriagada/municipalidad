<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Plantilla de Archivo para Proyectos
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Header del Archivo -->
    <div class="page-header" style="background-color: #006633; color: white; padding: 4rem 1.5rem; text-align: center; position: relative;">
        <div class="container" style="position: relative; z-index: 2;">
            <h1 class="page-title" style="font-size: 3rem; margin: 0 0 1rem 0; font-weight: 800;">Proyectos Municipales</h1>
            <p style="font-size: 1.2rem; opacity: 0.9; max-width: 800px; margin: 0 auto;">Conoce las obras y avances que estamos construyendo juntos para mejorar la calidad de vida en Santa Juana.</p>
        </div>
        <svg style="position: absolute; bottom: -1px; left: 0; width: 100%; height: auto; display: block;" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#ffffff"/></svg>
    </div>

    <div class="container" style="padding: 4rem 1.5rem;">
        <?php if ( have_posts() ) : ?>
            
            <div class="proyectos-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
                <?php while ( have_posts() ) : the_post(); 
                    $post_id   = get_the_ID();
                    $estado    = get_post_meta( $post_id, '_estado_proyecto', true );
                    $categoria = get_post_meta( $post_id, '_categoria_proyecto', true );

                    if ( empty( $estado ) ) $estado = 'En Desarrollo';
                    if ( empty( $categoria ) ) $categoria = 'Infraestructura';

                    $clean_estado = strtolower( trim( $estado ) );
                    $clase_badge = 'badge-desarrollo';
                    $bg_color = '#cc5200';
                    if ( strpos( $clean_estado, 'aprobado' ) !== false || strpos( $clean_estado, 'finalizado' ) !== false ) {
                        $clase_badge = 'badge-aprobado';
                        $bg_color = '#006633';
                    } elseif ( strpos( $clean_estado, 'licitaci' ) !== false || strpos( $clean_estado, 'postula' ) !== false ) {
                        $clase_badge = 'badge-licitacion';
                        $bg_color = '#003399';
                    }
                ?>
                    <article class="proyecto-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.06); transition: transform 0.3s ease; display: flex; flex-direction: column;">
                        <div class="proyecto-thumb-wrap" style="position: relative; padding-top: 60%;">
                            <?php 
                            $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) : false;
                            ?>
                            <a href="<?php the_permalink(); ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 12px;">
                                <!-- Placeholder Background Layers -->
                                <div style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: linear-gradient(135deg, rgba(0,51,153,0.1) 0%, rgba(0,51,153,0.02) 100%); z-index: 1;"></div>
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/fallback-logo.png' ); ?>" alt="" style="position: absolute; width: 70%; height: auto; object-fit: contain; filter: grayscale(100%) opacity(0.2); z-index: 2; margin: auto; left: 0; right: 0; top: 0; bottom: 0;">
                                
                                <!-- Actual Image -->
                                <?php if ( $thumb_url ) : ?>
                                    <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" style="position: relative; z-index: 3; transform: scale(1.05); width: 100%; height: 100%; object-fit: cover; border-radius: 12px;" onerror="this.style.display='none';">
                                <?php endif; ?>
                            </a>
                            <span style="position: absolute; top: 1rem; right: 1rem; background: <?php echo esc_attr( $bg_color ); ?>; color: white; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.75rem; font-weight: bold; text-transform: uppercase;">
                                <?php echo esc_html( $estado ); ?>
                            </span>
                        </div>

                        <div class="proyecto-content" style="padding: 2rem; display: flex; flex-direction: column; flex: 1;">
                            <span style="color: #666; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; margin-bottom: 0.5rem;"><?php echo esc_html( $categoria ); ?></span>
                            <h3 class="proyecto-title" style="margin: 0 0 1rem 0; font-size: 1.3rem;">
                                <a href="<?php the_permalink(); ?>" style="color: #333; text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                            
                            <p class="proyecto-excerpt" style="color: #555; font-size: 0.95rem; line-height: 1.6; margin-bottom: 2rem;">
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
                <?php endwhile; ?>
            </div>
            
            <div style="margin-top: 4rem; text-align: center;">
                <?php
                the_posts_navigation( array(
                    'prev_text' => '← Proyectos Anteriores',
                    'next_text' => 'Más Proyectos →'
                ) );
                ?>
            </div>
            
        <?php else : ?>
            <div class="proyecto-empty-state">
                <div class="proyecto-empty-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <h4 class="proyecto-empty-title"><?php esc_html_e( 'No hay proyectos publicados', 'muni-santa-juana' ); ?></h4>
                <p class="proyecto-empty-subtitle"><?php esc_html_e( 'Actualmente no existen proyectos registrados en esta sección. Vuelve a revisar periódicamente.', 'muni-santa-juana' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
