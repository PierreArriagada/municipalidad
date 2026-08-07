<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Polyfill para str_contains() para garantizar compatibilidad con PHP 7.x
 */
if ( ! function_exists( 'str_contains' ) ) {
    function str_contains( $haystack, $needle ) {
        return '' === $needle || false !== strpos( $haystack, $needle );
    }
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
 * Regenerar reglas de reescritura de URLs al activar el tema.
 * Esto soluciona el error 404 en /category/noticias/ en servidores nuevos.
 */
function muni_flush_rewrite_rules_on_activation() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'muni_flush_rewrite_rules_on_activation' );

/**
 * Configurar enlaces permanentes bonitos y regenerar reglas de reescritura.
 * En instalaciones nuevas, WordPress usa /?p=ID por defecto.
 * Este tema requiere /%postname%/ para que las URLs funcionen correctamente.
 */
function muni_setup_permalinks_and_flush() {
    if ( ! get_option( 'muni_permalinks_configured' ) ) {
        global $wp_rewrite;
        
        // Si la estructura de permalinks está vacía (modo "Simple"), configurarla
        $current = get_option( 'permalink_structure' );
        if ( empty( $current ) ) {
            $wp_rewrite->set_permalink_structure( '/%postname%/' );
            update_option( 'permalink_structure', '/%postname%/' );
        }
        
        flush_rewrite_rules();
        update_option( 'muni_permalinks_configured', true );
    }
}
add_action( 'admin_init', 'muni_setup_permalinks_and_flush', 1 );

/**
 * Preconnect to Google Fonts
 */
function muni_preconnect_google_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'muni_preconnect_google_fonts', 0 );

/**
 * Encolar scripts y estilos.
 */
function muni_santa_juana_scripts() {
    // Fonts de Google
    wp_enqueue_style( 'muni-fonts', 'https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@400;600;700&display=swap', array(), null );
    
    // Estilo principal del tema (con busteo de caché por timestamp de archivo)
    $tpl_dir = get_template_directory();
    $tpl_uri = get_template_directory_uri();

    // Estilos Base (Variables y Globales, estrictamente en orden)
    $theme_version = '24.0.1';
    wp_enqueue_style( 'muni-variables',    $tpl_uri . '/assets/css/base/variables.css',          array(), $theme_version );
    wp_enqueue_style( 'muni-global',       $tpl_uri . '/assets/css/base/global.css',             array('muni-variables'), $theme_version );

    // Estilos globales de componentes transversales (header, footer, info, enlaces, banners)
    wp_enqueue_style( 'muni-header',       $tpl_uri . '/assets/css/components/header.css',       array('muni-global'), $theme_version );
    wp_enqueue_style( 'muni-footer',       $tpl_uri . '/assets/css/components/footer.css',       array('muni-global'), $theme_version );
    wp_enqueue_style( 'muni-banners',      $tpl_uri . '/assets/css/components/banners.css',      array('muni-global'), $theme_version );
    wp_enqueue_style( 'muni-info',         $tpl_uri . '/assets/css/components/info.css',         array('muni-global'), $theme_version );
    wp_enqueue_style( 'muni-enlaces',      $tpl_uri . '/assets/css/components/enlaces.css',      array('muni-global'), $theme_version );

    // HOME PAGE
    if ( is_front_page() || is_home() ) {
        wp_enqueue_style( 'muni-hero',         $tpl_uri . '/assets/css/components/hero.css',         array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-emergencias',  $tpl_uri . '/assets/css/components/emergencias.css',  array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-vecinos',      $tpl_uri . '/assets/css/components/vecinos.css',      array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-proyectos',    $tpl_uri . '/assets/css/components/proyectos.css',    array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-noticias',     $tpl_uri . '/assets/css/components/noticias.css',     array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-concejo',      $tpl_uri . '/assets/css/components/concejo.css',      array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-transparencia',$tpl_uri . '/assets/css/components/transparencia.css',array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-contacto',     $tpl_uri . '/assets/css/components/contacto.css',     array('muni-global'), $theme_version );
        wp_enqueue_style( 'muni-anuncios',     $tpl_uri . '/assets/css/components/anuncios.css',     array('muni-global'), $theme_version );
    }

    // ARCHIVOS Y SINGLES DE CUSTOM POST TYPES
    if ( is_post_type_archive('proyectos') || is_singular('proyectos') ) {
        wp_enqueue_style( 'muni-proyectos',    $tpl_uri . '/assets/css/components/proyectos.css',    array('muni-global'), $theme_version );
    }
    
    if ( is_category() || is_singular('post') || is_archive() || is_search() ) {
        wp_enqueue_style( 'muni-noticias',     $tpl_uri . '/assets/css/components/noticias.css',     array('muni-global'), $theme_version );
    }

    if ( is_post_type_archive('anuncios') || is_singular('anuncios') ) {
        wp_enqueue_style( 'muni-anuncios',     $tpl_uri . '/assets/css/components/anuncios.css',     array('muni-global'), $theme_version );
    }
    
    // Direcciones Municipales: is_page() cubre template hierarchy (page-direcciones-municipales.php),
    // is_page_template() cubre asignación manual desde el editor, y is_post_type_archive/is_singular
    // cubre el CPT 'direcciones' si existe.
    if ( is_page( array( 'direcciones-municipales', 'direcciones' ) )
        || is_page_template( 'page-direcciones-municipales.php' )
        || is_page_template( 'page-direcciones.php' )
        || is_post_type_archive('direcciones') || is_singular('direcciones') ) {
        wp_enqueue_style( 'muni-direcciones',  $tpl_uri . '/assets/css/components/direcciones.css',  array('muni-global'), $theme_version );
    }

    // PLANTILLAS DE PÁGINA ESPECÍFICAS
    // Usamos is_page('slug') como fallback robusto: cuando WordPress carga un template
    // por jerarquía de nombre de archivo (page-{slug}.php), is_page_template() devuelve
    // false si la página no tiene el meta _wp_page_template configurado en la BD.
    if ( is_page( 'contacto' ) || is_page_template( 'page-contacto.php' ) ) {
        wp_enqueue_style( 'muni-contacto',     $tpl_uri . '/assets/css/components/contacto.css',     array('muni-global'), $theme_version );
    }

    if ( is_page( 'transparencia' ) || is_page_template( 'page-transparencia.php' ) ) {
        wp_enqueue_style( 'muni-transparencia',$tpl_uri . '/assets/css/components/transparencia.css',array('muni-global'), $theme_version );
    }

    if ( is_page( 'intranet' ) || is_page_template( 'page-intranet.php' ) ) {
        wp_enqueue_style( 'muni-intranet',     $tpl_uri . '/assets/css/components/intranet.css',     array('muni-global'), $theme_version );
    }

    // Plantillas Institucionales (misión, visión, historia, normativa, políticas)
    if ( is_page( array( 'mision', 'vision', 'historia', 'normativa', 'normativa-comunal', 'politicas', 'politicas-de-privacidad' ) )
        || is_page_template( 'page-mision.php' ) || is_page_template( 'page-vision.php' )
        || is_page_template( 'page-historia.php' ) || is_page_template( 'page-normativa.php' )
        || is_page_template( 'page-politicas.php' ) ) {
        wp_enqueue_style( 'muni-institucional',$tpl_uri . '/assets/css/components/institucional.css',array('muni-global'), $theme_version );
    }

    $js_ver = file_exists( $tpl_dir . '/assets/js/main.js' ) ? (string) filemtime( $tpl_dir . '/assets/js/main.js' ) : '1.0.1';

    // Script principal con estrategia `defer` para no bloquear el renderizado (WP 6.3+).
    wp_enqueue_script(
        'muni-santa-juana-script',
        $tpl_uri . '/assets/js/main.js',
        array(),
        $js_ver,
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
 * Walker personalizado para el menú principal (Navbar)
 */
require get_template_directory() . '/inc/class-muni-nav-walker.php';

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
 * Obtener la imagen de un post (Destacada o primera del contenido)
 * Si no tiene, devuelve el fallback del tema.
 */
function muni_get_post_image( $post_id, $fallback_img_name ) {
    $thumb_url = get_the_post_thumbnail_url( $post_id, 'medium_large' );
    if ( $thumb_url ) return $thumb_url;

    $post = get_post( $post_id );
    
    // FIX ESPECÍFICO: Interceptar el post "Tríptico Informativo 2026" para evitar cargar su imagen rota
    if ( $post && ( str_contains( strtolower( $post->post_title ), 'tríptico informativo 2026' ) || str_contains( strtolower( $post->post_title ), 'triptico informativo 2026' ) ) ) {
        return get_template_directory_uri() . '/assets/img/triptico-2026.webp';
    }

    if ( $post && ! empty( $post->post_content ) ) {
        preg_match( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
        if ( ! empty( $matches[1] ) ) return $matches[1];
    }

    return get_template_directory_uri() . '/assets/img/' . $fallback_img_name;
}

/**
 * Forzar el uso de la plantilla personalizada para Direcciones Municipales
 * independientemente de si el usuario escogió "Plantilla por defecto" en el editor.
 */
add_filter( 'template_include', 'muni_force_direcciones_template', 99 );
function muni_force_direcciones_template( $template ) {
    if ( is_page( 'direcciones-municipales' ) || is_page( 'direcciones' ) ) {
        $custom = locate_template( array( 'page-direcciones-municipales.php', 'page-direcciones.php' ) );
        if ( $custom ) {
            return $custom;
        }
    }
    return $template;
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
            } elseif ( strpos( $clean_title, 'permiso' ) !== false || strpos( $clean_title, 'circulacion' ) !== false ) {
                $icon_name = 'permiso-circulacion';
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
 * Auto-poblar los menús principales del tema (Navbar, Footer, Enlaces Rápidos).
 * Garantiza que existan y estén asignados a la ubicación correcta automáticamente.
 */
function muni_auto_seed_all_menus() {
    if ( get_option( 'muni_all_menus_seeded_v5' ) ) {
        return;
    }

    $locations = get_theme_mod( 'nav_menu_locations', array() );
    $update_locations = false;

    // Obtener ID de Enlaces Rápidos primero para evitar colisiones
    $enlaces_name = 'Enlaces Rápidos';
    $enlaces_menu = wp_get_nav_menu_object( $enlaces_name );
    $enlaces_id = 0;
    if ( ! $enlaces_menu ) {
        $enlaces_id = wp_create_nav_menu( $enlaces_name );
        if ( ! is_wp_error( $enlaces_id ) ) {
            $enlaces = array(
                array( 'title' => 'Pagos Online', 'class' => 'svg-pagos-online', 'url' => 'https://portalpagos.smc.cl/SANTA_JUANA/PV/Login' ),
                array( 'title' => 'Turismo Comunal', 'class' => 'svg-turismo', 'url' => home_url( '/turismo/' ) ),
                array( 'title' => 'Boletines Mensuales', 'class' => 'svg-boletines', 'url' => '#' ),
                array( 'title' => 'Trípticos e Informes', 'class' => 'svg-tripticos', 'url' => home_url( '/tripticos/' ) ),
                array( 'title' => 'Proyectos y Obras', 'class' => 'svg-proyectos', 'url' => home_url( '/proyectos/' ) ),
                array( 'title' => 'Ley de Lobby', 'class' => 'svg-lobby', 'url' => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023' ),
                array( 'title' => 'Ley 21.146', 'class' => 'svg-ley21146', 'url' => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023' ),
                array( 'title' => 'Permiso Circulación', 'class' => '', 'url' => 'https://portalpagos.smc.cl/SANTA_JUANA/PV/Login' ),
            );
            foreach ( $enlaces as $enlace ) {
                wp_update_nav_menu_item( $enlaces_id, 0, array(
                    'menu-item-title'   => $enlace['title'],
                    'menu-item-url'     => $enlace['url'],
                    'menu-item-status'  => 'publish',
                    'menu-item-classes' => $enlace['class'],
                ) );
            }
        }
    } else {
        $enlaces_id = $enlaces_menu->term_id;
    }

    if ( empty( $locations['enlaces-rapidos'] ) || $locations['enlaces-rapidos'] != $enlaces_id ) {
        $locations['enlaces-rapidos'] = $enlaces_id;
        $update_locations = true;
    }

    // 1. Navbar Menu (menu-1)
    // Siempre borrar y recrear el "Menú Principal" generado por versiones anteriores del tema
    $primary_name = 'Menú Principal';
    $primary_menu = wp_get_nav_menu_object( $primary_name );
    if ( $primary_menu ) {
        wp_delete_nav_menu( $primary_name );
    }

    $primary_id = wp_create_nav_menu( $primary_name );
    if ( ! is_wp_error( $primary_id ) ) {
        // Inicio
        wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Inicio', 'menu-item-url' => home_url('/'), 'menu-item-status' => 'publish' ) );

        // Municipalidad (Dropdown)
        $muni_parent_id = wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Municipalidad', 'menu-item-url' => '#', 'menu-item-status' => 'publish' ) );
        if ( ! is_wp_error( $muni_parent_id ) ) {
            wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Direcciones Municipales', 'menu-item-url' => home_url('/direcciones-municipales/'), 'menu-item-parent-id' => $muni_parent_id, 'menu-item-status' => 'publish' ) );
            wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Misión', 'menu-item-url' => home_url('/mision/'), 'menu-item-parent-id' => $muni_parent_id, 'menu-item-status' => 'publish' ) );
            wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Visión', 'menu-item-url' => home_url('/vision/'), 'menu-item-parent-id' => $muni_parent_id, 'menu-item-status' => 'publish' ) );
            wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Historia', 'menu-item-url' => home_url('/historia/'), 'menu-item-parent-id' => $muni_parent_id, 'menu-item-status' => 'publish' ) );
            wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Intranet Municipal', 'menu-item-url' => home_url('/intranet/'), 'menu-item-parent-id' => $muni_parent_id, 'menu-item-status' => 'publish' ) );
        }

        // Transparencia
        wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Transparencia', 'menu-item-url' => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306', 'menu-item-status' => 'publish' ) );

        // Pagos Online (Dropdown)
        $pagos_parent_id = wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Pagos Online', 'menu-item-url' => 'https://portalpagos.smc.cl/SANTA_JUANA/PV/Login', 'menu-item-status' => 'publish' ) );
        if ( ! is_wp_error( $pagos_parent_id ) ) {
            wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Pago de Permiso de Circulación', 'menu-item-url' => 'https://portalpagos.smc.cl/SANTA_JUANA/PV/Login', 'menu-item-parent-id' => $pagos_parent_id, 'menu-item-status' => 'publish' ) );
        }

        // Contacto
        wp_update_nav_menu_item( $primary_id, 0, array( 'menu-item-title' => 'Contacto', 'menu-item-url' => home_url('/#contacto'), 'menu-item-status' => 'publish' ) );
    }
    $locations['menu-1'] = $primary_id;
    $update_locations = true;

    // 2. Footer Menu (footer)
    // SOLO crear y asignar si la ubicación 'footer' está vacía o mal asignada a Enlaces Rápidos
    if ( empty( $locations['footer'] ) || $locations['footer'] == $enlaces_id ) {
        $footer_name = 'Menú Pie de Página';
        $footer_menu = wp_get_nav_menu_object( $footer_name );
        if ( ! $footer_menu ) {
            $footer_id = wp_create_nav_menu( $footer_name );
            if ( ! is_wp_error( $footer_id ) ) {
                wp_update_nav_menu_item( $footer_id, 0, array( 'menu-item-title' => 'Políticas de Privacidad', 'menu-item-url' => home_url('/politicas-de-privacidad/'), 'menu-item-status' => 'publish' ) );
                wp_update_nav_menu_item( $footer_id, 0, array( 'menu-item-title' => 'Términos de Uso', 'menu-item-url' => '#', 'menu-item-status' => 'publish' ) );
            }
        } else {
            $footer_id = $footer_menu->term_id;
        }
        $locations['footer'] = $footer_id;
        $update_locations = true;
    }

    if ( $update_locations ) {
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    update_option( 'muni_all_menus_seeded_v5', true );
}
// Ejecutar en init para forzar la corrección en sitios donde ya está activo
add_action( 'init', 'muni_auto_seed_all_menus' );

/**
 * Update existing seeded links just in case they were already seeded with #
 */
function muni_update_existing_enlaces_menu() {
    if ( ! get_option( 'muni_enlaces_seeded_v4' ) ) {
        $menu = wp_get_nav_menu_object( 'enlaces-rapidos' );
        if ( $menu ) {
            $items = wp_get_nav_menu_items( $menu->term_id );
            foreach ( $items as $item ) {
                if ( $item->title === 'Turismo Comunal' && $item->url === '#' ) {
                    update_post_meta( $item->ID, '_menu_item_url', home_url( '/turismo/' ) );
                }
                if ( $item->title === 'Trípticos e Informes' && $item->url === '#' ) {
                    update_post_meta( $item->ID, '_menu_item_url', home_url( '/tripticos/' ) );
                }
                if ( $item->title === 'Proyectos y Obras' && $item->url === '#' ) {
                    update_post_meta( $item->ID, '_menu_item_url', home_url( '/proyectos/' ) );
                }
                if ( $item->title === 'Ley 21.146' && $item->url === '#' ) {
                    update_post_meta( $item->ID, '_menu_item_url', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023' );
                }
                if ( $item->title === 'Ley de Lobby' && $item->url === '#' ) {
                    update_post_meta( $item->ID, '_menu_item_url', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023' );
                }
            }
        }
        update_option( 'muni_enlaces_seeded_v4', true );
    }
}
add_action( 'init', 'muni_update_existing_enlaces_menu' );

/**
 * Auto-create Normativa Comunal page if it doesn't exist
 */
function muni_auto_create_institutional_pages() {
    // 1. Normativa Comunal
    if ( ! get_option( 'muni_normativa_page_created' ) ) {
        $page_check = get_page_by_title( 'Normativa Comunal' );
        if ( ! isset( $page_check->ID ) ) {
            $new_page_id = wp_insert_post( array(
                'post_title'     => 'Normativa Comunal',
                'post_type'      => 'page',
                'post_name'      => 'normativa-comunal',
                'post_status'    => 'publish',
                'post_author'    => 1,
            ) );
            if ( $new_page_id && ! is_wp_error( $new_page_id ) ) {
                update_post_meta( $new_page_id, '_wp_page_template', 'page-normativa.php' );
            }
        }
        update_option( 'muni_normativa_page_created', true );
    }

    // 2. Historia
    if ( ! get_option( 'muni_historia_page_created' ) ) {
        $page_check = get_page_by_title( 'Historia' );
        if ( ! isset( $page_check->ID ) ) {
            $new_page_id = wp_insert_post( array(
                'post_title'     => 'Historia',
                'post_type'      => 'page',
                'post_name'      => 'historia',
                'post_status'    => 'publish',
                'post_author'    => 1,
            ) );
            if ( $new_page_id && ! is_wp_error( $new_page_id ) ) {
                update_post_meta( $new_page_id, '_wp_page_template', 'page-historia.php' );
            }
        }
        update_option( 'muni_historia_page_created', true );
    }

    // 3. Misión
    if ( ! get_option( 'muni_mision_page_created' ) ) {
        $page_check = get_page_by_title( 'Misión' );
        if ( ! isset( $page_check->ID ) ) {
            $new_page_id = wp_insert_post( array(
                'post_title'     => 'Misión',
                'post_type'      => 'page',
                'post_name'      => 'mision',
                'post_status'    => 'publish',
                'post_author'    => 1,
            ) );
            if ( $new_page_id && ! is_wp_error( $new_page_id ) ) {
                update_post_meta( $new_page_id, '_wp_page_template', 'page-mision.php' );
            }
        }
        update_option( 'muni_mision_page_created', true );
    }

    // 4. Visión
    if ( ! get_option( 'muni_vision_page_created' ) ) {
        $page_check = get_page_by_title( 'Visión' );
        if ( ! isset( $page_check->ID ) ) {
            $new_page_id = wp_insert_post( array(
                'post_title'     => 'Visión',
                'post_type'      => 'page',
                'post_name'      => 'vision',
                'post_status'    => 'publish',
                'post_author'    => 1,
            ) );
            if ( $new_page_id && ! is_wp_error( $new_page_id ) ) {
                update_post_meta( $new_page_id, '_wp_page_template', 'page-vision.php' );
            }
        }
        update_option( 'muni_vision_page_created', true );
    }
    // 5. Políticas de Privacidad
    if ( ! get_option( 'muni_politicas_page_created' ) ) {
        $page_check = get_page_by_title( 'Políticas de Privacidad' );
        if ( ! isset( $page_check->ID ) ) {
            $new_page_id = wp_insert_post( array(
                'post_title'     => 'Políticas de Privacidad',
                'post_type'      => 'page',
                'post_name'      => 'politicas',
                'post_status'    => 'publish',
                'post_author'    => 1,
            ) );
            if ( $new_page_id && ! is_wp_error( $new_page_id ) ) {
                update_post_meta( $new_page_id, '_wp_page_template', 'page-politicas.php' );
            }
        }
        update_option( 'muni_politicas_page_created', true );
    }
}
add_action( 'init', 'muni_auto_create_institutional_pages' );

/**
 * Register Widget Areas (Sidebars)
 */
function muni_widgets_init() {
    register_sidebar( array(
        'name'          => 'Footer Widgets',
        'id'            => 'footer-1',
        'description'   => 'Agrega widgets aquí para que aparezcan en el pie de página.',
        'before_widget' => '<div id="%1$s" class="footer-section widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'muni_widgets_init' );

/**
 * Enforce strict chronological order and ignore sticky posts on blog index and archives.
 */
function muni_strict_chronological_news( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( $query->is_home() || $query->is_archive() ) ) {
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'DESC' );
        $query->set( 'ignore_sticky_posts', 1 );
        
        // FIX: Mostrar 12 noticias por página (múltiplo de 3) para llenar la grilla perfecta
        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'muni_strict_chronological_news' );

/**
 * Renombrar 'Entradas' a 'Noticias' en el panel de administración
 */
function muni_rename_post_to_noticias() {
    global $menu;
    global $submenu;
    
    // Cambiar menú principal
    foreach( $menu as $key => $val ) {
        if ( $val[0] == 'Entradas' || $val[0] == 'Posts' ) {
            $menu[$key][0] = 'Noticias';
            $menu[$key][6] = 'dashicons-megaphone'; // Opcional: Cambiar el ícono
            break;
        }
    }
    
    // Cambiar submenús
    if ( isset( $submenu['edit.php'] ) ) {
        foreach( $submenu['edit.php'] as $key => $val ) {
            if ( $val[0] == 'Todas las entradas' || $val[0] == 'All Posts' ) {
                $submenu['edit.php'][$key][0] = 'Todas las Noticias';
            }
            if ( $val[0] == 'Añadir nueva' || $val[0] == 'Add New' ) {
                $submenu['edit.php'][$key][0] = 'Añadir Noticia';
            }
        }
    }
}
add_action( 'admin_menu', 'muni_rename_post_to_noticias' );

/**
 * Renombrar las etiquetas del objeto 'post' globalmente
 */
function muni_rename_post_object_to_noticias() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Noticias';
    $labels->singular_name = 'Noticia';
    $labels->add_new = 'Añadir Noticia';
    $labels->add_new_item = 'Añadir nueva Noticia';
    $labels->edit_item = 'Editar Noticia';
    $labels->new_item = 'Nueva Noticia';
    $labels->view_item = 'Ver Noticia';
    $labels->search_items = 'Buscar Noticias';
    $labels->not_found = 'No se encontraron Noticias';
    $labels->not_found_in_trash = 'No se encontraron Noticias en la papelera';
    $labels->all_items = 'Todas las Noticias';
    $labels->menu_name = 'Noticias';
    $labels->name_admin_bar = 'Noticia';
}
add_action( 'init', 'muni_rename_post_object_to_noticias' );

/**
 * Reemplazar imágenes rotas dentro del contenido del Tríptico 2026
 */
add_filter( 'the_content', 'muni_fix_triptico_content_image' );
function muni_fix_triptico_content_image( $content ) {
    if ( is_singular( 'tripticos' ) ) {
        $post = get_post();
        if ( $post && ( str_contains( strtolower( $post->post_title ), 'tríptico informativo 2026' ) || str_contains( strtolower( $post->post_title ), 'triptico informativo 2026' ) ) ) {
            // Reemplazar cualquier <img src="..."> por la imagen correcta
            $content = preg_replace( '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', '<img src="' . get_template_directory_uri() . '/assets/img/triptico-2026.webp" alt="Tríptico 2026" style="width:100%; height:auto; border-radius:12px; margin-top:2rem;">', $content );
        }
    }
    return $content;
}

/**
 * Auto-create Demo Banners and Beneficios if they don't exist
 */
function muni_auto_create_demo_content() {
    if ( ! get_option( 'muni_demo_content_created_v2' ) ) {
        // Create Banners
        $banners = array(
            'Conoce nuestros Trípticos Informativos',
            'Descubre el Turismo en Santa Juana',
            'Puntos de reciclaje y medio ambiente'
        );
        foreach ( $banners as $banner_title ) {
            $check = get_page_by_title( $banner_title, OBJECT, 'banners' );
            if ( ! isset( $check->ID ) ) {
                wp_insert_post( array(
                    'post_title'  => $banner_title,
                    'post_type'   => 'banners',
                    'post_status' => 'publish',
                    'post_author' => 1,
                ) );
            }
        }

        // Create Beneficios
        $beneficios = array(
            'Tarjeta Vecino' => 'Accede a múltiples descuentos en salud, educación y comercio local.',
            'Beneficios Adulto Mayor' => 'Programas especiales, viajes y asistencia para nuestros adultos mayores.'
        );
        foreach ( $beneficios as $title => $content ) {
            $check = get_page_by_title( $title, OBJECT, 'beneficios' );
            if ( ! isset( $check->ID ) ) {
                wp_insert_post( array(
                    'post_title'   => $title,
                    'post_content' => $content,
                    'post_type'    => 'beneficios',
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                ) );
            }
        }

        // Create Triptico
        $triptico_title = 'Tríptico Informativo 2026';
        $check_triptico = get_page_by_title( $triptico_title, OBJECT, 'tripticos' );
        if ( ! isset( $check_triptico->ID ) ) {
            wp_insert_post( array(
                'post_title'   => $triptico_title,
                'post_content' => '<p>Descubre toda la información sobre el nuevo tríptico municipal.</p><img src="' . get_template_directory_uri() . '/assets/img/triptico-2026.webp" alt="Tríptico 2026" style="width:100%; height:auto; border-radius:12px; margin-top:2rem;">',
                'post_type'    => 'tripticos',
                'post_status'  => 'publish',
                'post_author'  => 1,
            ) );
        }
        
        update_option( 'muni_demo_content_created_v2', true );
    }
}
add_action( 'init', 'muni_auto_create_demo_content' );

/**
 * Fetch YouTube Playlist Videos via RSS and cache them
 */
function muni_get_youtube_playlist_videos( $playlist_id, $limit = 5 ) {
    // transient_key con sufijo v4 para invalidar instantáneamente cachés desactualizados guardados en la BD
    $transient_key = 'muni_yt_pl_v4_' . md5( $playlist_id );
    $option_backup_key = 'muni_yt_backup_v4_' . md5( $playlist_id );
    
    $videos = get_transient( $transient_key );
    
    // Lista de respaldo garantizada (fallback inicial de seguridad)
    $fallback_videos = array(
        array(
            'id'    => 'XV-7c-p-baA',
            'title' => 'SESION DE CONCEJO MUNICIPAL 04 DE AGOSTO 2026',
            'date'  => '04 Ago, 2026',
        ),
        array(
            'id'    => 'WJGUAUdgM6Q',
            'title' => 'SESION DE CONCEJO MUNICIPAL 28 DE JULIO 2026',
            'date'  => '28 Jul, 2026',
        ),
        array(
            'id'    => '6xO1JmMA-yg',
            'title' => 'SESION DE CONCEJO MUNICIPAL 07 DE JULIO 2026',
            'date'  => '07 Jul, 2026',
        ),
        array(
            'id'    => '4i62k2m1OGQ',
            'title' => 'SESION DE CONCEJO MUNICIPAL 23 DE JUNIO 2026',
            'date'  => '23 Jun, 2026',
        ),
        array(
            'id'    => 'WlkgEpTeVwE',
            'title' => 'SESION DE CONCEJO MUNICIPAL 09 DE JUNIO 2026',
            'date'  => '09 Jun, 2026',
        ),
    );

    if ( false === $videos || empty( $videos ) ) {
        $feed_url = 'https://www.youtube.com/feeds/videos.xml?playlist_id=' . sanitize_text_field( $playlist_id );
        $response = wp_remote_get( $feed_url, array(
            'timeout'   => 8,
            'sslverify' => false,
            'headers'   => array(
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            ),
        ) );
        
        $videos = array();
        
        if ( ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
            $body = wp_remote_retrieve_body( $response );
            $xml = @simplexml_load_string( $body );
            if ( $xml && isset( $xml->entry ) ) {
                $all_videos = array();
                $month_map = array(
                    'enero' => '01', 'febrero' => '02', 'marzo' => '03', 'abril' => '04',
                    'mayo' => '05', 'junio' => '06', 'julio' => '07', 'agosto' => '08',
                    'septiembre' => '09', 'setiembre' => '09', 'octubre' => '10', 'noviembre' => '11', 'diciembre' => '12',
                    'ene' => '01', 'feb' => '02', 'mar' => '03', 'abr' => '04', 'may' => '05', 'jun' => '06',
                    'jul' => '07', 'ago' => '08', 'sep' => '09', 'oct' => '10', 'nov' => '11', 'dic' => '12'
                );

                // Leer TODOS los videos del feed sin límite inicial
                foreach ( $xml->entry as $entry ) {
                    $yt = $entry->children( 'http://www.youtube.com/xml/schemas/2015' );
                    if ( isset( $yt->videoId ) ) {
                        $title = (string) $entry->title;
                        $published_raw = (string) $entry->published;
                        $session_timestamp = strtotime( $published_raw );

                        // Normalización sin acentos para coincidencia perfecta
                        $title_clean = str_replace(
                            array( 'á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú' ),
                            array( 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U' ),
                            $title
                        );

                        // Patrón 1: Formato numérico DD/MM/YYYY o DD-MM-YYYY
                        if ( preg_match( '/(\d{1,2})[\/\.-](\d{1,2})[\/\.-](\d{4})/', $title_clean, $matches ) ) {
                            $day = str_pad( $matches[1], 2, '0', STR_PAD_LEFT );
                            $month = str_pad( $matches[2], 2, '0', STR_PAD_LEFT );
                            $year = $matches[3];
                            $ts_parsed = strtotime( "{$year}-{$month}-{$day}" );
                            if ( $ts_parsed !== false ) {
                                $session_timestamp = $ts_parsed;
                            }
                        }
                        // Patrón 2: Formato texto "DD [DE] [MES] [DE] YYYY" (ej: "04 DE AGOSTO 2026", "15 SETIEMBRE 2026")
                        elseif ( preg_match( '/(\d{1,2})\s+(?:DE\s+)?([A-Z]+)\s+(?:DE\s+)?(\d{4})/i', $title_clean, $matches ) ) {
                            $day = str_pad( $matches[1], 2, '0', STR_PAD_LEFT );
                            $month_key = strtolower( $matches[2] );
                            $year = $matches[3];
                            if ( isset( $month_map[ $month_key ] ) ) {
                                $ts_parsed = strtotime( "{$year}-{$month_map[$month_key]}-{$day}" );
                                if ( $ts_parsed !== false ) {
                                    $session_timestamp = $ts_parsed;
                                }
                            }
                        }

                        $all_videos[] = array(
                            'id'         => (string) $yt->videoId,
                            'title'      => $title,
                            'date'       => date_i18n( get_option('date_format', 'd M, Y'), $session_timestamp ),
                            'session_ts' => $session_timestamp,
                        );
                    }
                }
                
                // Ordenamiento cronológico estricto por la fecha real calculada (más reciente primero)
                usort( $all_videos, function( $a, $b ) {
                    return $b['session_ts'] - $a['session_ts'];
                } );
                
                // Tomar los primeros $limit y limpiar el campo temporal de ordenamiento
                $videos = array_slice( $all_videos, 0, $limit );
                foreach ( $videos as &$v ) {
                    unset( $v['session_ts'] );
                }
                unset( $v );
            }
        }
        
        if ( ! empty( $videos ) ) {
            // Éxito: Guardar en caché temporal (1 hora) y en respaldo permanente
            set_transient( $transient_key, $videos, HOUR_IN_SECONDS );
            update_option( $option_backup_key, $videos, false );
        } else {
            // Fallo de red/API: Intentar recuperar el último respaldo permanente exitoso
            $backup_videos = get_option( $option_backup_key );
            if ( ! empty( $backup_videos ) && is_array( $backup_videos ) ) {
                $videos = $backup_videos;
            } else {
                $videos = array_slice( $fallback_videos, 0, $limit );
            }
            // Cooldown de 15 minutos en caso de fallo para no ralentizar las solicitudes de los usuarios
            set_transient( $transient_key, $videos, 15 * MINUTE_IN_SECONDS );
        }
    }
    
    return $videos;
}

/**
 * Replace youtube.com with youtube-nocookie.com in oEmbeds to prevent third-party tracking cookies.
 */
function muni_youtube_nocookie_oembed( $return, $data, $url ) {
    if ( strpos( $url, 'youtube.com' ) !== false || strpos( $url, 'youtu.be' ) !== false ) {
        $return = str_replace( 'youtube.com/embed/', 'youtube-nocookie.com/embed/', $return );
    }
    return $return;
}
add_filter( 'oembed_dataparse', 'muni_youtube_nocookie_oembed', 10, 3 );
