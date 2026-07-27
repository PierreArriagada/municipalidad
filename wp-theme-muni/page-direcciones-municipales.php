<?php
/**
 * Template Name: Direcciones Municipales
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main page-direcciones">
    <div class="page-hero hero-direcciones">
        <div class="container">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <p class="direcciones-subtitle"><?php esc_html_e( 'Conoce los distintos departamentos y direcciones que componen nuestro municipio.', 'muni-santa-juana' ); ?></p>
        </div>
        <svg class="hero-wave" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="var(--fondo-secundario, #f8fafc)"/>
        </svg>
    </div>

    <div class="container container-direcciones">
        <!-- Navegación Breadcrumb -->
        <nav class="direcciones-breadcrumbs" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a>
            <span class="separator">/</span>
            <span class="parent">Municipalidad</span>
            <span class="separator">/</span>
            <span class="current">Direcciones Municipales</span>
        </nav>

        <!-- El contenido manual del editor WP ha sido ocultado para respetar estrictamente el diseño de la grilla -->

        <div class="direcciones-grid">
            <?php
            $args = array(
                'post_type'      => 'direcciones',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order title',
                'order'          => 'ASC',
            );
            $direcciones_query = new WP_Query( $args );

            if ( $direcciones_query->have_posts() ) :
                while ( $direcciones_query->have_posts() ) : $direcciones_query->the_post();
                    $icono = get_post_meta( get_the_ID(), '_direccion_icono', true );
                    if ( empty( $icono ) ) $icono = 'default';
                    $url = get_post_meta( get_the_ID(), '_direccion_url', true );
                    if ( empty( $url ) ) $url = '#';
                    ?>
                    <a href="<?php echo esc_url( $url ); ?>" class="direccion-card">
                        <div class="direccion-card-content">
                            <h3 class="direccion-title"><?php the_title(); ?></h3>
                        </div>
                        <div class="direccion-card-icon">
                            <?php echo muni_render_svg( $icono, '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="4" y="2" width="16" height="20" rx="2"></rect></svg>' ); ?>
                        </div>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback por defecto si no existen publicaciones en BD
                $default_direcciones = array(
                    array(
                        'title' => 'DIRECCIÓN DE OBRAS MUNICIPALES',
                        'icono' => 'obras',
                        'url'   => '#',
                    ),
                    array(
                        'title' => 'DIRECCIÓN DE TRÁNSITO',
                        'icono' => 'transito',
                        'url'   => '#',
                    ),
                    array(
                        'title' => 'DIRECCIÓN DE DESARROLLO COMUNITARIO',
                        'icono' => 'dideco',
                        'url'   => '#',
                    ),
                    array(
                        'title' => 'DIRECCIÓN DE MEDIO AMBIENTE ASEO Y ORNATO',
                        'icono' => 'medioambiente',
                        'url'   => '#',
                    ),
                    array(
                        'title' => 'DIRECCIÓN DE SEGURIDAD PÚBLICA',
                        'icono' => 'seguridad',
                        'url'   => '#',
                    ),
                    array(
                        'title' => 'JUZGADO DE POLICÍA LOCAL',
                        'icono' => 'juzgado',
                        'url'   => '#',
                    ),
                );

                foreach ( $default_direcciones as $dir ) :
                    ?>
                    <a href="<?php echo esc_url( $dir['url'] ); ?>" class="direccion-card">
                        <div class="direccion-card-content">
                            <h3 class="direccion-title"><?php echo esc_html( $dir['title'] ); ?></h3>
                        </div>
                        <div class="direccion-card-icon">
                            <?php echo muni_render_svg( $dir['icono'] ); ?>
                        </div>
                    </a>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
