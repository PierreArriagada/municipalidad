<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para Beneficios (Tarjeta Vecino)
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Encabezado sutil -->
    <div class="page-header" style="background-color: #f5f8ff; padding: 3rem 1.5rem; text-align: center; border-bottom: 1px solid #e2e8f0;">
        <div class="container">
            <h1 class="page-title" style="font-size: 2.5rem; color: #003399; margin: 0;">Beneficio Exclusivo</h1>
            <p style="color: #666; margin-top: 0.5rem;">Programa Tarjeta Vecino Santa Juana</p>
        </div>
    </div>

    <div class="container" style="padding: 4rem 1.5rem; max-width: 900px;">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'beneficio-single' ); ?> style="background: #ffffff; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 3rem; overflow: hidden; display: flex; flex-direction: column; gap: 2rem;">
                
                <header class="entry-header" style="display: flex; align-items: center; gap: 2rem; flex-wrap: wrap;">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="beneficio-logo" style="width: 150px; height: 150px; flex-shrink: 0; border-radius: 50%; overflow: hidden; border: 4px solid #f5f8ff; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <?php the_post_thumbnail( 'medium', array( 'style' => 'width: 100%; height: 100%; object-fit: cover;' ) ); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="beneficio-title-wrap" style="flex: 1; min-width: 250px;">
                        <?php the_title( '<h2 class="entry-title" style="font-size: 2.2rem; color: #333; margin-bottom: 1rem;">', '</h2>' ); ?>
                        <span style="display: inline-block; background: #cc5200; color: white; padding: 0.3rem 1rem; border-radius: 20px; font-weight: bold; font-size: 0.85rem; text-transform: uppercase;">Activo</span>
                    </div>
                </header>

                <div class="entry-content" style="line-height: 1.8; font-size: 1.1rem; color: #444; border-top: 1px solid #eee; padding-top: 2rem;">
                    <?php
                    the_content();
                    ?>
                </div>
                
                <div class="beneficio-footer" style="margin-top: 2rem; text-align: center;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary" style="display: inline-block; padding: 0.8rem 2rem; background: #003399; color: white; border-radius: 30px; text-decoration: none; font-weight: bold; transition: all 0.3s ease;">← Volver al Inicio</a>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
