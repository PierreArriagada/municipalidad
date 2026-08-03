<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para Proyectos Individuales
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main" style="background-color: #f8fafc; padding-bottom: 4rem;">
    <?php
    while ( have_posts() ) :
        the_post();
        
        $post_id   = get_the_ID();
        $estado    = get_post_meta( $post_id, '_estado_proyecto', true );
        $categoria = get_post_meta( $post_id, '_categoria_proyecto', true );
        $avance    = get_post_meta( $post_id, '_avance_proyecto', true );
        $inversion = get_post_meta( $post_id, '_inversion_proyecto', true );

        $has_estado    = ! empty( trim( $estado ) );
        $has_avance    = ! empty( trim( $avance ) );
        $has_inversion = ! empty( trim( $inversion ) );
        $has_sidebar   = $has_estado || $has_avance || $has_inversion;
        
        $clean_estado = strtolower( trim( $estado ) );
        $badge_color = '#cc5200'; // Naranja por defecto (En Desarrollo)
        if ( strpos( $clean_estado, 'aprobado' ) !== false || strpos( $clean_estado, 'finalizado' ) !== false ) {
            $badge_color = '#006633'; // Verde
        } elseif ( strpos( $clean_estado, 'licitaci' ) !== false || strpos( $clean_estado, 'postula' ) !== false ) {
            $badge_color = '#003399'; // Azul
        }
        ?>
        
        <!-- Header del Proyecto -->
        <div class="proyecto-hero" style="background-color: #006633; color: white; padding: 4rem 1.5rem; text-align: center; position: relative;">
            <div class="container" style="position: relative; z-index: 2;">
                <?php if ( ! empty( $categoria ) ) : ?>
                    <span style="display: inline-block; background: rgba(255,255,255,0.2); padding: 0.3rem 1rem; border-radius: 20px; font-weight: bold; font-size: 0.85rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: 1px;">
                        <?php echo esc_html( $categoria ); ?>
                    </span>
                <?php endif; ?>
                <?php the_title( '<h1 class="entry-title" style="font-size: 2.8rem; margin: 0 0 1rem 0; font-weight: 800;">', '</h1>' ); ?>
                <?php if ( has_excerpt() ) : ?>
                    <div style="font-size: 1.2rem; opacity: 0.9; max-width: 800px; margin: 0 auto;">
                        <?php echo wp_kses_post( wpautop( get_the_excerpt() ) ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Ondas decorativas -->
            <svg style="position: absolute; bottom: -1px; left: 0; width: 100%; height: auto; display: block;" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
        </div>

        <div class="container" style="padding-top: 3rem; max-width: 1100px;">
            <div class="proyecto-layout <?php echo $has_sidebar ? 'has-sidebar' : 'no-sidebar'; ?>" style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
                
                <div class="proyecto-main-content">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="proyecto-imagen-destacada" style="border-radius: 12px; overflow: hidden; margin-bottom: 2rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                            <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; display: block;' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content" style="background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); line-height: 1.8; font-size: 1.1rem; color: #444;">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php if ( $has_sidebar ) : ?>
                    <div class="proyecto-sidebar" style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <?php if ( $has_estado ) : ?>
                            <!-- Tarjeta de Estado -->
                            <div class="meta-card" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); border-top: 4px solid <?php echo esc_attr( $badge_color ); ?>;">
                                <h3 style="margin-top: 0; font-size: 1.1rem; color: #666; text-transform: uppercase; letter-spacing: 1px;">Estado Actual</h3>
                                <div style="font-size: 1.5rem; font-weight: 700; color: <?php echo esc_attr( $badge_color ); ?>;">
                                    <?php echo esc_html( $estado ); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $has_avance ) : ?>
                            <!-- Tarjeta de Avance -->
                            <div class="meta-card" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                                <h3 style="margin-top: 0; font-size: 1.1rem; color: #666; text-transform: uppercase; letter-spacing: 1px;">Avance</h3>
                                <div class="progress-bar-container" style="background: #e2e8f0; border-radius: 10px; height: 12px; margin: 1rem 0; overflow: hidden;">
                                    <div class="progress-bar-fill" style="background: #006633; width: <?php echo esc_attr( $avance ); ?>%; height: 100%; border-radius: 10px;"></div>
                                </div>
                                <div style="font-size: 1.8rem; font-weight: 800; color: #333; text-align: right;">
                                    <?php echo esc_html( $avance ); ?>%
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $has_inversion ) : ?>
                            <!-- Tarjeta de Inversión -->
                            <div class="meta-card" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                                <h3 style="margin-top: 0; font-size: 1.1rem; color: #666; text-transform: uppercase; letter-spacing: 1px;">Inversión</h3>
                                <div style="font-size: 1.8rem; font-weight: 700; color: #003399;">
                                    <?php echo esc_html( $inversion ); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
            
            <style>
                @media (min-width: 992px) {
                    .proyecto-layout.has-sidebar {
                        grid-template-columns: 2fr 1fr !important;
                    }
                }
            </style>
        </div>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
