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
            array( 'title' => 'Turismo Comunal', 'class' => 'svg-turismo', 'url' => home_url( '/turismo/' ) ),
            array( 'title' => 'Boletines Mensuales', 'class' => 'svg-boletines', 'url' => '#' ),
            array( 'title' => 'Trípticos e Informes', 'class' => 'svg-tripticos', 'url' => home_url( '/tripticos/' ) ),
            array( 'title' => 'Proyectos y Obras', 'class' => 'svg-proyectos', 'url' => home_url( '/proyectos/' ) ),
            array( 'title' => 'Ley de Lobby', 'class' => 'svg-lobby', 'url' => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023' ),
            array( 'title' => 'Ley 21.146', 'class' => 'svg-ley21146', 'url' => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023' ),
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
 * Limpieza automática de beneficios de prueba
 */
function muni_cleanup_dummy_beneficios() {
    if ( ! get_option( 'muni_dummy_beneficios_cleaned' ) ) {
        $posts_to_delete = array( 'Copago Cero Fonasa', 'Descuento Aramco' );
        foreach ( $posts_to_delete as $title ) {
            $post = get_page_by_title( $title, OBJECT, 'beneficios' );
            if ( $post ) {
                wp_delete_post( $post->ID, true );
            }
        }
        update_option( 'muni_dummy_beneficios_cleaned', true );
    }
}
add_action( 'init', 'muni_cleanup_dummy_beneficios' );

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
