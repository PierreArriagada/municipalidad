<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Funciones del tema Muni Santa Juana
 *
 * @package Muni_Santa_Juana
 */

if ( ! function_exists( 'muni_santa_juana_setup' ) ) :
    /**
     * Configuración inicial del tema.
     */
    function muni_santa_juana_setup() {
        // Añadir soporte para etiquetas de título automáticas.
        add_theme_support( 'title-tag' );

        // Añadir soporte para imágenes destacadas.
        add_theme_support( 'post-thumbnails' );

        // Registrar menús de navegación.
        register_nav_menus(
            array(
                'menu-1'          => esc_html__( 'Primary', 'muni-santa-juana' ),
                'footer'          => esc_html__( 'Footer Menu', 'muni-santa-juana' ),
                'enlaces-rapidos' => esc_html__( 'Enlaces Rápidos (Inicio)', 'muni-santa-juana' ),
            )
        );

        // Añadir soporte para HTML5.
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Soporte para bloques y estilos del editor (WP 6.x y 7.x)
        add_theme_support( 'align-wide' );
        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'muni_santa_juana_setup' );

/**
 * Encolar scripts y estilos.
 */
function muni_santa_juana_scripts() {
    // Fonts de Google
    wp_enqueue_style( 'muni-fonts', 'https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@400;600;700&display=swap', array(), null );
    
    // Estilo principal del tema (con busteo de caché por timestamp de archivo)
    $tpl_dir = get_template_directory();
    $tpl_uri = get_template_directory_uri();

    $css_ver = file_exists( $tpl_dir . '/assets/css/main.css' ) ? (string) filemtime( $tpl_dir . '/assets/css/main.css' ) : '1.0.1';
    wp_enqueue_style( 'muni-santa-juana-style', $tpl_uri . '/assets/css/main.css', array(), $css_ver );

    // Estilos de componentes (versión estática; incrementar manualmente al publicar cambios)
    $theme_version = '1.0.0';
    wp_enqueue_style( 'muni-header',       $tpl_uri . '/assets/css/components/header.css',       array(), $theme_version );
    wp_enqueue_style( 'muni-hero',         $tpl_uri . '/assets/css/components/hero.css',         array(), $theme_version );
    wp_enqueue_style( 'muni-emergencias',  $tpl_uri . '/assets/css/components/emergencias.css',  array(), $theme_version );
    wp_enqueue_style( 'muni-enlaces',      $tpl_uri . '/assets/css/components/enlaces.css',      array(), $theme_version );
    wp_enqueue_style( 'muni-vecinos',      $tpl_uri . '/assets/css/components/vecinos.css',      array(), $theme_version );
    wp_enqueue_style( 'muni-proyectos',    $tpl_uri . '/assets/css/components/proyectos.css',    array(), $theme_version );
    wp_enqueue_style( 'muni-noticias',     $tpl_uri . '/assets/css/components/noticias.css',     array(), $theme_version );
    wp_enqueue_style( 'muni-banners',      $tpl_uri . '/assets/css/components/banners.css',      array(), $theme_version );
    wp_enqueue_style( 'muni-concejo',      $tpl_uri . '/assets/css/components/concejo.css',      array(), $theme_version );
    wp_enqueue_style( 'muni-info',         $tpl_uri . '/assets/css/components/info.css',         array(), $theme_version );
    wp_enqueue_style( 'muni-transparencia',$tpl_uri . '/assets/css/components/transparencia.css',$theme_version );
    wp_enqueue_style( 'muni-contacto',     $tpl_uri . '/assets/css/components/contacto.css',     array(), $theme_version );
    wp_enqueue_style( 'muni-footer',       $tpl_uri . '/assets/css/components/footer.css',       array(), $theme_version );
    wp_enqueue_style( 'muni-anuncios',     $tpl_uri . '/assets/css/components/anuncios.css',     array(), $theme_version );
    
    // Plantillas especiales: solo cargar el CSS si la página actual lo necesita.
    if ( is_page_template( 'page-intranet.php' ) ) {
        wp_enqueue_style( 'muni-intranet',   $tpl_uri . '/assets/css/components/intranet.css',   array(), $theme_version );
    }
    if ( is_page_template( 'page-direcciones.php' ) ) {
        wp_enqueue_style( 'muni-direcciones',$tpl_uri . '/assets/css/components/direcciones.css',array(), $theme_version );
    }

    // Script principal con estrategia `defer` para no bloquear el renderizado (WP 6.3+).
    wp_enqueue_script(
        'muni-santa-juana-script',
        $tpl_uri . '/assets/js/main.js',
        array(),
        '1.0.0',
        array(
            'strategy'  => 'defer',
            'in_footer' => true,
        )
    );
}
add_action( 'wp_enqueue_scripts', 'muni_santa_juana_scripts' );

/**
 * Incluir archivos de funcionalidades extra
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * Personalizador de Temas (Customizer)
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Función helper para renderizar SVGs físicos desde assets/svg/ de manera segura.
 * Preserva currentColor y estilos inline al inyectar el código directo.
 */
function muni_render_svg( $icon_name, $default_icon = '' ) {
    if ( empty( $icon_name ) ) {
        return $default_icon;
    }
    
    $clean_name = strtolower( trim( $icon_name ) );
    
    // Quitar sufijos numéricos o caracteres especiales
    $base_name = preg_replace( '/-[0-9]+$/', '', $clean_name );
    $base_name = preg_replace( '/[_\s]?[0-9]+$/', '', $base_name );
    
    $alias_map = array(
        'carabineros'             => 'policia',
        'policia'                 => 'policia',
        'bomberos'                => 'bombero',
        'bombero'                 => 'bombero',
        'ambulancia'              => 'ambulancia',
        'samu'                    => 'ambulancia',
        'seguridad'               => 'seguridad-ciudadana',
        'seguridad_ciudadana'     => 'seguridad-ciudadana',
        'denuncia-seguro'         => 'seguridad-ciudadana',
        'emergencias'             => 'seguridad-ciudadana',
        'emergencia'              => 'seguridad-ciudadana',
        'pagos'                   => 'pagos-online',
        'pagos-online'            => 'pagos-online',
        'pagos_online'            => 'pagos-online',
        'pagos-en-linea'          => 'pagos-online',
        'pago-online'             => 'pagos-online',
        'lobby'                   => 'lobby',
        'ley-de-lobby'            => 'lobby',
        'ley-21146'               => 'ley21146',
        'ley-21.146'              => 'ley21146',
        'cuenta'                  => 'info-cuenta',
        'cuenta-publica'          => 'info-cuenta',
        'cuenta_publuca'          => 'info-cuenta',
        'cuenta-publuca'          => 'info-cuenta',
        'junta_vecino'            => 'info-ley21146-juntas',
        'junta-vecino'            => 'info-ley21146-juntas',
        'juntas'                  => 'info-ley21146-juntas',
        'transparencia_activa'    => 'info-ley20285-transparencia',
        'transparencia-activa'    => 'info-ley20285-transparencia',
        'solicitud_informacion'   => 'info-ley20285-solicitud',
        'solicitud-informacion'   => 'info-ley20285-solicitud',
        'informacion_card'        => 'info-ley20285-solicitud',
        'informacion-card'        => 'info-ley20285-solicitud',
        'pladetur'                => 'info-pladetur',
        'concejo_municipal'       => 'info-concejo',
        'concejo-municipal'       => 'info-concejo',
        'topbar-transparencia'    => 'topbar-transparencia',
        'topbar-solicitud'        => 'topbar-solicitud',
    );

    if ( isset( $alias_map[ $base_name ] ) ) {
        $base_name = $alias_map[ $base_name ];
    } elseif ( isset( $alias_map[ $clean_name ] ) ) {
        $base_name = $alias_map[ $clean_name ];
    }

    $candidates = array(
        $base_name,
        $clean_name,
        sanitize_file_name( $icon_name ),
        str_replace( '_', '-', sanitize_file_name( $icon_name ) ),
        str_replace( '-', '_', sanitize_file_name( $icon_name ) ),
    );

    foreach ( array_unique( $candidates ) as $name ) {
        $svg_path = get_template_directory() . '/assets/svg/' . $name . '.svg';
        if ( file_exists( $svg_path ) ) {
            return file_get_contents( $svg_path );
        }
    }
    
    return $default_icon;
}

/**
 * Añadir íconos SVG a los elementos del menú "Enlaces Rápidos".
 * Detecta la clase "svg-nombreicono" o deduce el SVG según el título del elemento del menú.
 */
function muni_add_svg_to_menu( $title, $item, $args, $depth ) {
    if ( isset( $args->theme_location ) && $args->theme_location == 'enlaces-rapidos' ) {
        $icon_name = '';

        // 1. Buscar clase explícita `svg-nombre`
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        foreach ( $classes as $class ) {
            if ( strpos( $class, 'svg-' ) === 0 ) {
                $icon_name = str_replace( 'svg-', '', $class );
                break;
            }
        }

        // 2. Si no hay clase explícita, deducir SVG por el título del elemento en la BD
        if ( empty( $icon_name ) ) {
            $clean_title = strtolower( sanitize_title( $title ) );
            if ( strpos( $clean_title, 'pago' ) !== false ) {
                $icon_name = 'pagos-online';
            } elseif ( strpos( $clean_title, 'turismo' ) !== false ) {
                $icon_name = 'turismo';
            } elseif ( strpos( $clean_title, 'boletin' ) !== false ) {
                $icon_name = 'boletines';
            } elseif ( strpos( $clean_title, 'triptico' ) !== false ) {
                $icon_name = 'tripticos';
            } elseif ( strpos( $clean_title, 'proyecto' ) !== false ) {
                $icon_name = 'proyectos';
            } elseif ( strpos( $clean_title, 'lobby' ) !== false ) {
                $icon_name = 'lobby';
            } elseif ( strpos( $clean_title, '21146' ) !== false || strpos( $clean_title, '21-146' ) !== false ) {
                $icon_name = 'ley21146';
            } elseif ( strpos( $clean_title, 'emergencia' ) !== false ) {
                $icon_name = 'seguridad-ciudadana';
            }
        }

        $arrow_svg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>';

        if ( ! empty( $icon_name ) ) {
            $svg = muni_render_svg( $icon_name );
            if ( ! empty( $svg ) ) {
                return '<div class="enlace-icon-box">' . $svg . '</div><div class="enlace-info"><span class="enlace-titulo">' . $title . '</span></div><div class="enlace-arrow">' . $arrow_svg . '</div>';
            }
        }

        // Default icon if none found
        $default_svg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>';
        return '<div class="enlace-icon-box">' . $default_svg . '</div><div class="enlace-info"><span class="enlace-titulo">' . $title . '</span></div><div class="enlace-arrow">' . $arrow_svg . '</div>';
    }
    return $title;
}
add_filter( 'nav_menu_item_title', 'muni_add_svg_to_menu', 10, 4 );

/**
 * Auto-poblar los 8 enlaces rápidos iniciales si el menú está vacío.
 */
function muni_auto_seed_enlaces_menu() {
    if ( get_option( 'muni_enlaces_seeded_v2' ) ) {
        return;
    }

    $menu_name = 'Enlaces Rápidos';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );
    } else {
        $menu_id = $menu_exists->term_id;
    }

    // Asignar el menú a la ubicación si no está asignado
    $locations = get_theme_mod( 'nav_menu_locations' );
    if ( empty( $locations['enlaces-rapidos'] ) ) {
        $locations['enlaces-rapidos'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // Comprobar si está vacío antes de sembrar
    $items = wp_get_nav_menu_items( $menu_id );
    if ( empty( $items ) || count( $items ) === 0 ) {
        $enlaces = array(
            array( 'title' => 'Pagos Online', 'class' => 'svg-pagos-online', 'url' => 'https://portalpagos.smc.cl/SANTA_JUANA/PV/Login' ),
            array( 'title' => 'Turismo Comunal', 'class' => 'svg-turismo', 'url' => '#' ),
            array( 'title' => 'Boletines Mensuales', 'class' => 'svg-boletines', 'url' => '#' ),
            array( 'title' => 'Trípticos e Informes', 'class' => 'svg-tripticos', 'url' => '#' ),
            array( 'title' => 'Proyectos y Obras', 'class' => 'svg-proyectos', 'url' => '#' ),
            array( 'title' => 'Ley de Lobby', 'class' => 'svg-lobby', 'url' => '#' ),
            array( 'title' => 'Ley 21.146', 'class' => 'svg-ley21146', 'url' => '#' ),
            array( 'title' => 'Permiso Circulación', 'class' => '', 'url' => 'https://portalpagos.smc.cl/SANTA_JUANA/PV/Login' ),
        );

        foreach ( $enlaces as $enlace ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'   => $enlace['title'],
                'menu-item-url'     => $enlace['url'],
                'menu-item-status'  => 'publish',
                'menu-item-classes' => $enlace['class'],
            ) );
        }
        update_option( 'muni_enlaces_seeded_v2', true );
    }
}
// OPTIMIZACIÓN: Ejecutar solo una vez al activar el tema.
add_action( 'after_switch_theme', 'muni_auto_seed_enlaces_menu' );

/**
 * Enforce strict chronological order and ignore sticky posts on blog index and archives.
 */
function muni_strict_chronological_news( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( $query->is_home() || $query->is_archive() ) ) {
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'DESC' );
        $query->set( 'ignore_sticky_posts', 1 );
    }
}
add_action( 'pre_get_posts', 'muni_strict_chronological_news' );
