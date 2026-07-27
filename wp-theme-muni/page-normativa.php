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

<main id="primary" class="site-main inst-page-main">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Banner Superior Principal -->
            <div class="page-hero inst-hero">
                <div class="inst-hero-wrapper" style="min-height: 300px;">
                    <div class="inst-hero-overlay"></div>
                    <div class="inst-hero-content">
                        <span class="inst-hero-tag">Ilustre Municipalidad de Santa Juana</span>
                        <h1 class="entry-title inst-hero-title">Normativa Comunal</h1>
                        <p class="inst-hero-subtitle">Leyes, ordenanzas y decretos vigentes en nuestra comuna.</p>
                    </div>
                </div>
                <!-- Ondas decorativas -->
                <svg class="inst-hero-wave" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal -->
            <div class="container inst-container">
                <div class="entry-content inst-content-box">
                    <?php
                    $content = get_the_content();
                    if ( empty( $content ) ) {
                        // Default content if page is empty
                        echo '<h2 class="inst-h2" style="margin-top:0;">Ordenanzas Municipales</h2>';
                        echo '<p>En esta sección encontrará las normativas locales que rigen el funcionamiento y orden de la Municipalidad de Santa Juana.</p>';
                        echo '<ul class="inst-list-box" style="list-style: none; padding-left: 1.25rem;">';
                        echo '<li style="margin-bottom: 0.85rem; padding: 0.75rem 1rem; background: #ffffff; border-left: 4px solid var(--color-primary, #003399); border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);"><strong>Ordenanza de Aseo y Ornato:</strong> Regula el mantenimiento y limpieza de espacios públicos.</li>';
                        echo '<li style="margin-bottom: 0.85rem; padding: 0.75rem 1rem; background: #ffffff; border-left: 4px solid var(--color-primary, #003399); border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);"><strong>Ordenanza de Tránsito:</strong> Establece las normativas para el tráfico vehicular comunal.</li>';
                        echo '<li style="padding: 0.75rem 1rem; background: #ffffff; border-left: 4px solid var(--color-primary, #003399); border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);"><strong>Decretos Alcaldicios:</strong> Resoluciones y decretos vigentes.</li>';
                        echo '</ul>';
                        echo '<p style="margin-top:2rem; font-style: italic; color: #64748b;">* Para consultar una normativa específica, por favor comuníquese con Secretaría Municipal.</p>';
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
