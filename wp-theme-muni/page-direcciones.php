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
            <path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="var(--color-bg)"/>
        </svg>
    </div>

    <div class="container container-direcciones">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php if ( get_the_content() ) : ?>
                <div class="page-content-wrapper">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        <?php endwhile; endif; ?>

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
                            <?php 
                            // Renderizamos el SVG según la opción elegida
                            switch ( $icono ) {
                                case 'obras':
                                    echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 22h20"></path><path d="M12 2v6"></path><path d="M8 8v14"></path><path d="M16 8v14"></path><path d="M12 8l-4 4"></path><path d="M12 8l4 4"></path><rect x="4" y="2" width="16" height="4" rx="1"></rect></svg>';
                                    break;
                                case 'transito':
                                    echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg>';
                                    break;
                                case 'dideco':
                                    echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5c-2.2 0-4 1.8-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>';
                                    break;
                                case 'medioambiente':
                                    echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path></svg>';
                                    break;
                                case 'seguridad':
                                    echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>';
                                    break;
                                case 'juzgado':
                                    echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m14 13.5-9.5 9.5-3-3L11 10.5"></path><path d="M14 13.5 17 12l2.5 2.5-3.5 3.5L14 13.5Z"></path><path d="m21.5 9.5-3-3"></path><path d="m17 5 3-3"></path></svg>';
                                    break;
                                default:
                                    echo '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path><path d="M8 6h.01"></path><path d="M16 6h.01"></path><path d="M12 6h.01"></path><path d="M12 10h.01"></path><path d="M12 14h.01"></path><path d="M16 10h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M8 14h.01"></path></svg>';
                                    break;
                            }
                            ?>
                        </div>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="no-direcciones">' . esc_html__( 'No hay direcciones municipales publicadas actualmente.', 'muni-santa-juana' ) . '</p>';
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
