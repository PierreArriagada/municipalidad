<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para la cabecera (Top bar con SVGs simplificados y alta claridad)
 *
 * @package Muni_Santa_Juana
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/favicon.png' ); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/favicon.png' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <!-- ============================================
         TOP BAR (Redes Sociales y Leyes de Transparencia)
         ============================================ -->
    <div class="top-bar">
        <div class="top-bar-container">
            <div class="top-bar-links">
                <!-- 1. Transparencia Activa -->
                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_transparencia', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306#' ) ); ?>" class="top-link" target="_blank" rel="noopener noreferrer">
                    <span class="top-link-icon"><?php echo muni_render_svg( 'topbar-transparencia' ); ?></span>
                    <div style="display: flex; flex-direction: column; line-height: 1.2;">
                        <span>Transparencia Activa</span>
                        <span class="ley-text">Ley 20.285</span>
                    </div>
                </a>

                <!-- 2. Solicitud de Información -->
                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_solicitud', 'https://www.portaltransparencia.cl/PortalPdT/ingreso-sai-v2?idOrgTa=MU306' ) ); ?>" class="top-link" target="_blank" rel="noopener noreferrer">
                    <span class="top-link-icon"><?php echo muni_render_svg( 'topbar-solicitud' ); ?></span>
                    <div style="display: flex; flex-direction: column; line-height: 1.2;">
                        <span>Solicitud de Información</span>
                        <span class="ley-text">Ley 20.285</span>
                    </div>
                </a>
            </div>
            
            <div class="top-bar-social">
                <a href="<?php echo esc_url( get_theme_mod( 'muni_facebook_url', 'https://web.facebook.com/munisantajuana/?locale=es_LA' ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="<?php echo esc_url( get_theme_mod( 'muni_instagram_url', 'https://www.instagram.com/munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="<?php echo esc_url( get_theme_mod( 'muni_tiktok_url', 'https://www.tiktok.com/@munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="TikTok">
                    <svg viewBox="-10 -10 120 120" fill="currentColor"><path d="m74.66 20.573c-4.218-4.904-6.428-11.241-6.253-17.693l-15.764-.38v1.579 65.887c-4.244 18.913-31.616 13.978-28.876-5.265 1.529-8.79 10.972-14.198 19.365-11.141v-16.084c-18.271-3.181-35.586 11.361-35.404 29.888 1.597 40.179 59.226 40.185 60.825 0-.403-1.438-.178-28.214-.235-30.472 7.168 4.46 15.508 6.689 23.954 6.405v-16.612c-7.808 0-13.767-2.076-17.612-6.112z"/></svg>
                </a>
                <a href="<?php echo esc_url( get_theme_mod( 'muni_youtube_url', 'https://www.youtube.com/@munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="YouTube">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- ============================================
         HEADER
         ============================================ -->
    <header class="header">
        <div class="header-container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/LOGO-MUNICIPALIDAD-SANTA-JUANA-1024x350 (1).webp" alt="<?php bloginfo('name'); ?>" class="main-logo-img">
            </a>

            <nav class="nav">
                <button class="nav-toggle" aria-label="Menú" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
                
                <?php
                if ( has_nav_menu( 'menu-1' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'container'      => false,
                        'menu_class'     => 'nav-list',
                        'walker'         => new Muni_Nav_Walker(),
                        'items_wrap'     => '<ul class="%2$s">%3$s' .
                            '<li class="mobile-socials">' .
                                '<span class="socials-title">SÍGUENOS</span>' .
                                '<div class="socials-icons">' .
                                    '<a href="' . esc_url( get_theme_mod( 'muni_facebook_url', 'https://web.facebook.com/munisantajuana/?locale=es_LA' ) ) . '" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>' .
                                    '<a href="' . esc_url( get_theme_mod( 'muni_instagram_url', 'https://www.instagram.com/munisantajuana' ) ) . '" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>' .
                                    '<a href="' . esc_url( get_theme_mod( 'muni_tiktok_url', 'https://www.tiktok.com/@munisantajuana' ) ) . '" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><svg viewBox="-10 -10 120 120" fill="currentColor"><path d="m74.66 20.573c-4.218-4.904-6.428-11.241-6.253-17.693l-15.764-.38v1.579 65.887c-4.244 18.913-31.616 13.978-28.876-5.265 1.529-8.79 10.972-14.198 19.365-11.141v-16.084c-18.271-3.181-35.586 11.361-35.404 29.888 1.597 40.179 59.226 40.185 60.825 0-.403-1.438-.178-28.214-.235-30.472 7.168 4.46 15.508 6.689 23.954 6.405v-16.612c-7.808 0-13.767-2.076-17.612-6.112z"/></svg></a>' .
                                    '<a href="' . esc_url( get_theme_mod( 'muni_youtube_url', 'https://www.youtube.com/@munisantajuana' ) ) . '" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>' .
                                '</div>' .
                            '</li>' .
                        '</ul>',
                    ) );
                } else {
                ?>
                <ul class="nav-list">
                    <li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link active">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false">
                            MUNICIPALIDAD
                            <svg class="dropdown-icon" viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 4px; vertical-align: -3px;">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo esc_url( home_url( '/direcciones-municipales/' ) ); ?>" class="dropdown-link">Direcciones Municipales</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/mision/' ) ); ?>" class="dropdown-link">Misión</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/vision/' ) ); ?>" class="dropdown-link">Visión</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/historia/' ) ); ?>" class="dropdown-link">Historia</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/intranet/' ) ); ?>" class="dropdown-link">Intranet Municipal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="<?php echo esc_url( get_theme_mod( 'muni_link_transparencia', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306' ) ); ?>" class="nav-link" target="_blank" rel="noopener">Transparencia</a></li>
                    <li class="nav-item dropdown">
                        <a href="https://portalpagos.smc.cl/SANTA_JUANA/PV/Login" class="nav-link" aria-haspopup="true" aria-expanded="false" target="_blank" rel="noopener">
                            Pagos Online
                            <svg class="dropdown-icon" viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 4px; vertical-align: -3px;">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="https://portalpagos.smc.cl/SANTA_JUANA/PV/Login" class="dropdown-link" target="_blank" rel="noopener">Pago de Permiso de Circulación</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="nav-link">Contacto</a></li>
                    
                    <!-- Redes sociales solo para móvil -->
                    <li class="mobile-socials">
                        <span class="socials-title">SÍGUENOS</span>
                        <div class="socials-icons">
                            <a href="<?php echo esc_url( get_theme_mod( 'muni_facebook_url', 'https://web.facebook.com/munisantajuana/?locale=es_LA' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="<?php echo esc_url( get_theme_mod( 'muni_instagram_url', 'https://www.instagram.com/munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <a href="<?php echo esc_url( get_theme_mod( 'muni_tiktok_url', 'https://www.tiktok.com/@munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                                <svg viewBox="-10 -10 120 120" fill="currentColor"><path d="m74.66 20.573c-4.218-4.904-6.428-11.241-6.253-17.693l-15.764-.38v1.579 65.887c-4.244 18.913-31.616 13.978-28.876-5.265 1.529-8.79 10.972-14.198 19.365-11.141v-16.084c-18.271-3.181-35.586 11.361-35.404 29.888 1.597 40.179 59.226 40.185 60.825 0-.403-1.438-.178-28.214-.235-30.472 7.168 4.46 15.508 6.689 23.954 6.405v-16.612c-7.808 0-13.767-2.076-17.612-6.112z"/></svg>
                            </a>
                            <a href="<?php echo esc_url( get_theme_mod( 'muni_youtube_url', 'https://www.youtube.com/@munisantajuana' ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </li>
                </ul>
                <?php } ?>
            </nav>
        </div>
    </header>
