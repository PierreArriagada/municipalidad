<?php
/**
 * Template Name: Portal Intranet
 *
 * @package Muni_Santa_Juana
 */

get_header();

// Obtener los enlaces desde el Customizer (con fallbacks)
$webmail_url = get_theme_mod( 'muni_intranet_webmail_url', 'https://webmail.santajuana.cl/' );
$sistema_url = get_theme_mod( 'muni_intranet_sistema_url', 'https://santajuana-intranet.tumunicipio.cl/auth/login' );
?>

<main id="primary" class="site-main intranet-main">
    <div class="page-hero intranet-hero">
        <div class="container">
            <?php the_title( '<h1 class="entry-title intranet-title">', '</h1>' ); ?>
            <p class="intranet-subtitle"><?php esc_html_e( 'Seleccione el servicio al cual desea acceder', 'muni-santa-juana' ); ?></p>
        </div>
        <!-- Ondas decorativas -->
        <svg class="hero-wave" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="var(--color-bg)"/>
        </svg>
    </div>

    <div class="container intranet-container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php if ( get_the_content() ) : ?>
                <div class="intranet-content">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        <?php endwhile; endif; ?>

        <div class="intranet-services-grid">
            <!-- Tarjeta Webmail -->
            <a href="<?php echo esc_url( $webmail_url ); ?>" class="intranet-card webmail-card" target="_blank" rel="noopener">
                <div class="intranet-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <div class="intranet-card-content">
                    <h3><?php echo esc_html( get_theme_mod( 'muni_intranet_webmail_title', 'Correo Institucional (Webmail)' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'muni_intranet_webmail_desc', 'Accede a tu bandeja de entrada y calendario institucional.' ) ); ?></p>
                </div>
                <div class="intranet-card-action">
                    <span>Ir a Correo Webmail</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </a>

            <!-- Tarjeta Sistema Intranet -->
            <a href="<?php echo esc_url( $sistema_url ); ?>" class="intranet-card sistema-card" target="_blank" rel="noopener">
                <div class="intranet-card-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5c-2.2 0-4 1.8-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <polyline points="17 11 19 13 23 9"></polyline>
                    </svg>
                </div>
                <div class="intranet-card-content">
                    <h3><?php echo esc_html( get_theme_mod( 'muni_intranet_sistema_title', 'Plataforma Intranet Municipal' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'muni_intranet_sistema_desc', 'Acceso al sistema interno de gestión y servicios para funcionarios.' ) ); ?></p>
                </div>
                <div class="intranet-card-action">
                    <span>Ir a Sistema Interno</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
