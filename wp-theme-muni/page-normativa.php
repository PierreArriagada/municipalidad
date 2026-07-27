<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Template Name: Normativa Comunal
 * Plantilla para la página de Normativa Comunal
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main" style="background-color: #f8fafc; padding-bottom: 4rem;">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Banner Superior -->
            <div class="page-hero" style="background-color: #003399; color: white; padding: 4rem 1.5rem; text-align: center; position: relative;">
                <div class="container" style="position: relative; z-index: 2;">
                    <?php the_title( '<h1 class="entry-title" style="font-size: 3rem; margin: 0; font-weight: 800;">', '</h1>' ); ?>
                    <p style="margin-top: 1rem; font-size: 1.2rem; opacity: 0.9;">Leyes, ordenanzas y decretos vigentes en nuestra comuna.</p>
                </div>
                <!-- Ondas decorativas -->
                <svg style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto;" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal -->
            <div class="container" style="padding-top: 3rem; max-width: 900px;">
                <div class="entry-content" style="background: white; padding: 3rem; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.04); line-height: 1.8; font-size: 1.1rem; color: #444;">
                    <?php
                    $content = get_the_content();
                    if ( empty( $content ) ) {
                        // Default content if page is empty
                        echo '<h2>Ordenanzas Municipales</h2>';
                        echo '<p>En esta sección encontrará las normativas locales que rigen el funcionamiento y orden de la Municipalidad de Santa Juana.</p>';
                        echo '<ul style="list-style: none; padding: 0;">';
                        echo '<li style="margin-bottom: 1rem; padding: 1rem; background: #f1f5f9; border-left: 4px solid #003399; border-radius: 4px;"><strong>Ordenanza de Aseo y Ornato:</strong> Regula el mantenimiento y limpieza de espacios públicos.</li>';
                        echo '<li style="margin-bottom: 1rem; padding: 1rem; background: #f1f5f9; border-left: 4px solid #003399; border-radius: 4px;"><strong>Ordenanza de Tránsito:</strong> Establece las normativas para el tráfico vehicular comunal.</li>';
                        echo '<li style="margin-bottom: 1rem; padding: 1rem; background: #f1f5f9; border-left: 4px solid #003399; border-radius: 4px;"><strong>Decretos Alcaldicios:</strong> Resoluciones y decretos vigentes.</li>';
                        echo '</ul>';
                        echo '<p style="margin-top:2rem;"><em>* Para consultar una normativa específica, por favor comuníquese con Secretaría Municipal.</em></p>';
                    } else {
                        the_content();
                    }
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'muni-santa-juana' ),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
            </div>
            
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
