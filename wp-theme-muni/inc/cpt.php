<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Registro de Custom Post Types y Taxonomías con Auto-Seeding en BD
 *
 * @package Muni_Santa_Juana
 */

function muni_santa_juana_register_cpts() {
    
    // CPT Direcciones Municipales
    $args_direcciones = array(
        'label'                 => __( 'Direcciones Municipales', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Direcciones', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Dirección', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nueva Dirección', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-networking',
        'show_in_rest'          => true,
        'has_archive'           => false,
    );
    register_post_type( 'direcciones', $args_direcciones );

    // CPT Proyectos
    $labels_proyectos = array(
        'name'                  => _x( 'Proyectos', 'Post Type General Name', 'muni-santa-juana' ),
        'singular_name'         => _x( 'Proyecto', 'Post Type Singular Name', 'muni-santa-juana' ),
        'menu_name'             => __( 'Proyectos', 'muni-santa-juana' ),
        'all_items'             => __( 'Todos los Proyectos', 'muni-santa-juana' ),
        'add_new_item'          => __( 'Añadir Nuevo Proyecto', 'muni-santa-juana' ),
        'add_new'               => __( 'Añadir Nuevo', 'muni-santa-juana' ),
        'new_item'              => __( 'Nuevo Proyecto', 'muni-santa-juana' ),
        'edit_item'             => __( 'Editar Proyecto', 'muni-santa-juana' ),
        'update_item'           => __( 'Actualizar Proyecto', 'muni-santa-juana' ),
        'view_item'             => __( 'Ver Proyecto', 'muni-santa-juana' ),
    );
    $args_proyectos = array(
        'label'                 => __( 'Proyecto', 'muni-santa-juana' ),
        'labels'                => $labels_proyectos,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-building',
        'show_in_rest'          => true, // Habilita Gutenberg
        'has_archive'           => true,
    );
    register_post_type( 'proyectos', $args_proyectos );

    // CPT Beneficios (Tarjeta Vecino)
    $labels_beneficios = array(
        'name'                  => _x( 'Beneficios', 'Post Type General Name', 'muni-santa-juana' ),
        'singular_name'         => _x( 'Beneficio', 'Post Type Singular Name', 'muni-santa-juana' ),
        'menu_name'             => __( 'Beneficios Vecino', 'muni-santa-juana' ),
        'all_items'             => __( 'Todos los Beneficios', 'muni-santa-juana' ),
        'add_new_item'          => __( 'Añadir Nuevo Beneficio', 'muni-santa-juana' ),
        'add_new'               => __( 'Añadir Nuevo', 'muni-santa-juana' ),
        'new_item'              => __( 'Nuevo Beneficio', 'muni-santa-juana' ),
        'edit_item'             => __( 'Editar Beneficio', 'muni-santa-juana' ),
        'update_item'           => __( 'Actualizar Beneficio', 'muni-santa-juana' ),
        'view_item'             => __( 'Ver Beneficio', 'muni-santa-juana' ),
    );
    $args_beneficios = array(
        'label'                 => __( 'Beneficio', 'muni-santa-juana' ),
        'labels'                => $labels_beneficios,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-tickets-alt',
        'show_in_rest'          => true,
        'has_archive'           => false,
    );
    register_post_type( 'beneficios', $args_beneficios );

    // CPT Banners
    $args_banners = array(
        'label'                 => __( 'Banners', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Banners', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Banner', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nuevo Banner', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-images-alt2',
        'has_archive'           => false,
    );
    register_post_type( 'banners', $args_banners );

    // CPT Tripticos
    $args_tripticos = array(
        'label'                 => __( 'Trípticos', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Trípticos', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Tríptico', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nuevo Tríptico', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'thumbnail', 'editor' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-book',
        'show_in_rest'          => true,
        'has_archive'           => true,
    );
    register_post_type( 'tripticos', $args_tripticos );

    // CPT Turismo
    $args_turismo = array(
        'label'                 => __( 'Turismo Local', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Turismo', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Turismo', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nueva Publicación', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'thumbnail', 'editor' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-location',
        'show_in_rest'          => true,
        'has_archive'           => true,
    );
    register_post_type( 'turismo', $args_turismo );

    // CPT Reciclaje
    $args_reciclaje = array(
        'label'                 => __( 'Punto Limpio y Reciclaje', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Reciclaje', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Reciclaje', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nueva Campaña/Info', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'thumbnail', 'editor' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-leaf',
        'show_in_rest'          => true,
        'has_archive'           => true,
    );
    register_post_type( 'reciclaje', $args_reciclaje );
    // CPT Concursos Públicos
    $args_concursos = array(
        'label'                 => __( 'Concursos Públicos', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Concursos Públicos', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Concurso', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nuevo Concurso', 'muni-santa-juana' ),
            'edit_item'     => __( 'Editar Concurso', 'muni-santa-juana' ),
            'new_item'      => __( 'Nuevo Concurso', 'muni-santa-juana' ),
            'view_item'     => __( 'Ver Concurso', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_rest'          => true,
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'concursos' ),
    );
    register_post_type( 'concursos', $args_concursos );

    // CPT Sesiones Concejo
    $args_sesiones = array(
        'label'                 => __( 'Sesiones Concejo', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Sesiones Concejo', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Sesión Concejo', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nueva Sesión', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 9,
        'menu_icon'             => 'dashicons-video-alt3',
        'has_archive'           => false,
    );
    register_post_type( 'sesiones_concejo', $args_sesiones );

    // CPT Anuncios
    $args_anuncios = array(
        'label'                 => __( 'Anuncios', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Anuncios', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Anuncio', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nuevo Anuncio', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 4,
        'menu_icon'             => 'dashicons-megaphone',
        'has_archive'           => false,
    );
    register_post_type( 'anuncios', $args_anuncios );
    // CPT Contactos (Footer)
    $args_contactos = array(
        'label'                 => __( 'Contactos Footer', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Contactos', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Contacto', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nuevo Contacto', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 10,
        'menu_icon'             => 'dashicons-phone',
        'has_archive'           => false,
    );
    register_post_type( 'contactos', $args_contactos );
}
add_action( 'init', 'muni_santa_juana_register_cpts', 0 );

/**
 * Registro de Meta Boxes
 */
function muni_santa_juana_add_meta_boxes() {
    add_meta_box( 'muni_proyectos_meta', 'Detalles del Proyecto', 'muni_proyectos_meta_callback', 'proyectos', 'normal', 'high' );
    add_meta_box( 'muni_banners_meta', 'Enlace del Banner', 'muni_banners_meta_callback', 'banners', 'normal', 'high' );
    add_meta_box( 'muni_tripticos_meta', 'Enlace del Tríptico', 'muni_tripticos_meta_callback', 'tripticos', 'normal', 'high' );
    add_meta_box( 'muni_sesiones_meta', 'Detalles de la Sesión', 'muni_sesiones_meta_callback', 'sesiones_concejo', 'normal', 'high' );
    add_meta_box( 'muni_anuncios_meta', 'Configuración del Anuncio', 'muni_anuncios_meta_callback', 'anuncios', 'normal', 'high' );
    add_meta_box( 'muni_contactos_meta', 'Información de Contacto', 'muni_contactos_meta_callback', 'contactos', 'normal', 'high' );
    add_meta_box( 'muni_direcciones_meta', 'Configuración de Dirección', 'muni_direcciones_meta_callback', 'direcciones', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'muni_santa_juana_add_meta_boxes' );

function muni_proyectos_meta_callback( $post ) {
    wp_nonce_field( 'muni_save_meta_box_data', 'muni_meta_box_nonce' );
    $estado = get_post_meta( $post->ID, '_estado_proyecto', true );
    $categoria = get_post_meta( $post->ID, '_categoria_proyecto', true );
    $avance = get_post_meta( $post->ID, '_avance_proyecto', true );
    $inversion = get_post_meta( $post->ID, '_inversion_proyecto', true );
    ?>
    <p>
        <label for="muni_estado_proyecto"><strong>Estado (ej: En Desarrollo, Aprobado, Licitación):</strong></label><br>
        <input type="text" id="muni_estado_proyecto" name="muni_estado_proyecto" value="<?php echo esc_attr( $estado ); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="muni_categoria_proyecto"><strong>Categoría (ej: Infraestructura, Educación):</strong></label><br>
        <input type="text" id="muni_categoria_proyecto" name="muni_categoria_proyecto" value="<?php echo esc_attr( $categoria ); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="muni_avance_proyecto"><strong>Porcentaje de Avance (ej: 75):</strong></label><br>
        <input type="number" id="muni_avance_proyecto" name="muni_avance_proyecto" value="<?php echo esc_attr( $avance ); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="muni_inversion_proyecto"><strong>Inversión (ej: $450 Millones):</strong></label><br>
        <input type="text" id="muni_inversion_proyecto" name="muni_inversion_proyecto" value="<?php echo esc_attr( $inversion ); ?>" style="width:100%;" />
    </p>
    <?php
}

function muni_banners_meta_callback( $post ) {
    wp_nonce_field( 'muni_save_meta_box_data', 'muni_meta_box_nonce' );
    $enlace = get_post_meta( $post->ID, '_banner_link', true );
    ?>
    <p>
        <label for="muni_banner_link"><strong>Enlace de Destino (URL):</strong></label><br>
        <input type="url" id="muni_banner_link" name="muni_banner_link" value="<?php echo esc_attr( $enlace ); ?>" style="width:100%;" placeholder="https://" />
    </p>
    <?php
}

function muni_tripticos_meta_callback( $post ) {
    wp_nonce_field( 'muni_save_meta_box_data', 'muni_meta_box_nonce' );
    $enlace = get_post_meta( $post->ID, '_triptico_link', true );
    ?>
    <p>
        <label for="muni_triptico_link"><strong>Enlace (Opcional): Si deseas que el tríptico lleve a una página o archivo PDF.</strong></label><br>
        <input type="url" id="muni_triptico_link" name="muni_triptico_link" value="<?php echo esc_attr( $enlace ); ?>" style="width:100%;" placeholder="https://" />
    </p>
    <?php
}

function muni_sesiones_meta_callback( $post ) {
    wp_nonce_field( 'muni_save_meta_box_data', 'muni_meta_box_nonce' );
    $video_url = get_post_meta( $post->ID, '_video_url', true );
    $fecha_sesion = get_post_meta( $post->ID, '_fecha_sesion', true );
    ?>
    <p>
        <label for="muni_video_url"><strong>URL del Video de YouTube (ej: https://www.youtube.com/watch?v=dQw4w9WgXcQ):</strong></label><br>
        <input type="url" id="muni_video_url" name="muni_video_url" value="<?php echo esc_attr( $video_url ); ?>" style="width:100%;" placeholder="https://" />
    </p>
    <p>
        <label for="muni_fecha_sesion"><strong>Fecha de Transmisión (ej: 20 May 2026):</strong></label><br>
        <input type="text" id="muni_fecha_sesion" name="muni_fecha_sesion" value="<?php echo esc_attr( $fecha_sesion ); ?>" style="width:100%;" />
    </p>
    <?php
}

function muni_anuncios_meta_callback( $post ) {
    wp_nonce_field( 'muni_save_meta_box_data', 'muni_meta_box_nonce' );
    $enlace = get_post_meta( $post->ID, '_anuncio_link', true );
    $tipo = get_post_meta( $post->ID, '_anuncio_tipo', true );
    $activo = get_post_meta( $post->ID, '_anuncio_activo', true );
    ?>
    <p>
        <label for="muni_anuncio_link"><strong>Enlace de Destino (URL):</strong></label><br>
        <input type="url" id="muni_anuncio_link" name="muni_anuncio_link" value="<?php echo esc_attr( $enlace ); ?>" style="width:100%;" placeholder="https://" />
    </p>
    <p>
        <label for="muni_anuncio_tipo"><strong>Tipo de Anuncio:</strong></label><br>
        <select id="muni_anuncio_tipo" name="muni_anuncio_tipo" style="width:100%;">
            <option value="popup" <?php selected( $tipo, 'popup' ); ?>>Popup al iniciar</option>
            <option value="hero" <?php selected( $tipo, 'hero' ); ?>>Banner destacado tipo Hero</option>
        </select>
    </p>
    <p>
        <label>
            <input type="checkbox" name="muni_anuncio_activo" value="1" <?php checked( $activo, '1' ); ?> />
            <strong>Anuncio Activo (Mostrar en la web)</strong>
        </label>
    </p>
    <?php
}

function muni_contactos_meta_callback( $post ) {
    wp_nonce_field( 'muni_save_meta_box_data', 'muni_meta_box_nonce' );
    $valor = get_post_meta( $post->ID, '_contacto_valor', true );
    $enlace = get_post_meta( $post->ID, '_contacto_enlace', true );
    $icono = get_post_meta( $post->ID, '_contacto_icono', true );
    ?>
    <p>
        <label for="muni_contacto_valor"><strong>Valor a mostrar (ej: +56 41 2779753, Lunes a viernes...):</strong></label><br>
        <input type="text" id="muni_contacto_valor" name="muni_contacto_valor" value="<?php echo esc_attr( $valor ); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="muni_contacto_enlace"><strong>Enlace (ej: tel:+56412779753 o mailto:correo@muni.cl). Opcional:</strong></label><br>
        <input type="text" id="muni_contacto_enlace" name="muni_contacto_enlace" value="<?php echo esc_attr( $enlace ); ?>" style="width:100%;" />
    </p>
    <p>
        <label for="muni_contacto_icono"><strong>Tipo de Ícono:</strong></label><br>
        <select id="muni_contacto_icono" name="muni_contacto_icono" style="width:100%;">
            <option value="mail" <?php selected( $icono, 'mail' ); ?>>Correo (Sobre)</option>
            <option value="phone" <?php selected( $icono, 'phone' ); ?>>Teléfono</option>
            <option value="map" <?php selected( $icono, 'map' ); ?>>Dirección (Mapa)</option>
            <option value="clock" <?php selected( $icono, 'clock' ); ?>>Horario (Reloj)</option>
            <option value="info" <?php selected( $icono, 'info' ); ?>>Información (General)</option>
        </select>
    </p>
    <?php
}

function muni_santa_juana_save_meta_box_data( $post_id, $post ) {
    // Verificar nonce con wp_unslash() para entornos con magic_quotes legacy.
    if ( ! isset( $_POST['muni_meta_box_nonce'] ) || ! wp_verify_nonce( wp_unslash( $_POST['muni_meta_box_nonce'] ), 'muni_save_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Aislar el guardado por post_type para evitar contaminación cruzada de metadatos.
    switch ( $post->post_type ) {

        case 'proyectos':
            if ( isset( $_POST['muni_estado_proyecto'] ) ) {
                update_post_meta( $post_id, '_estado_proyecto', sanitize_text_field( wp_unslash( $_POST['muni_estado_proyecto'] ) ) );
            }
            if ( isset( $_POST['muni_categoria_proyecto'] ) ) {
                update_post_meta( $post_id, '_categoria_proyecto', sanitize_text_field( wp_unslash( $_POST['muni_categoria_proyecto'] ) ) );
            }
            if ( isset( $_POST['muni_avance_proyecto'] ) ) {
                update_post_meta( $post_id, '_avance_proyecto', absint( $_POST['muni_avance_proyecto'] ) );
            }
            if ( isset( $_POST['muni_inversion_proyecto'] ) ) {
                update_post_meta( $post_id, '_inversion_proyecto', sanitize_text_field( wp_unslash( $_POST['muni_inversion_proyecto'] ) ) );
            }
            break;

        case 'banners':
            if ( isset( $_POST['muni_banner_link'] ) ) {
                update_post_meta( $post_id, '_banner_link', esc_url_raw( wp_unslash( $_POST['muni_banner_link'] ) ) );
            }
            break;

        case 'tripticos':
            if ( isset( $_POST['muni_triptico_link'] ) ) {
                update_post_meta( $post_id, '_triptico_link', esc_url_raw( wp_unslash( $_POST['muni_triptico_link'] ) ) );
            }
            break;

        case 'sesiones_concejo':
            if ( isset( $_POST['muni_video_url'] ) ) {
                update_post_meta( $post_id, '_video_url', esc_url_raw( wp_unslash( $_POST['muni_video_url'] ) ) );
            }
            if ( isset( $_POST['muni_fecha_sesion'] ) ) {
                update_post_meta( $post_id, '_fecha_sesion', sanitize_text_field( wp_unslash( $_POST['muni_fecha_sesion'] ) ) );
            }
            break;

        case 'anuncios':
            if ( isset( $_POST['muni_anuncio_link'] ) ) {
                update_post_meta( $post_id, '_anuncio_link', esc_url_raw( wp_unslash( $_POST['muni_anuncio_link'] ) ) );
            }
            if ( isset( $_POST['muni_anuncio_tipo'] ) ) {
                // Validar contra lista blanca para prevenir valores inválidos.
                $tipos_validos = array( 'popup', 'hero' );
                $tipo_sanitized = sanitize_key( wp_unslash( $_POST['muni_anuncio_tipo'] ) );
                if ( in_array( $tipo_sanitized, $tipos_validos, true ) ) {
                    update_post_meta( $post_id, '_anuncio_tipo', $tipo_sanitized );
                }
            }
            // Checkbox: si no está en $_POST fue desmarcado. Usamos get_post_type() en vez de confiar en $_POST['post_type'].
            $anuncio_activo = isset( $_POST['muni_anuncio_activo'] ) ? '1' : '0';
            update_post_meta( $post_id, '_anuncio_activo', $anuncio_activo );
            break;

        case 'contactos':
            if ( isset( $_POST['muni_contacto_valor'] ) ) {
                update_post_meta( $post_id, '_contacto_valor', sanitize_text_field( wp_unslash( $_POST['muni_contacto_valor'] ) ) );
            }
            if ( isset( $_POST['muni_contacto_enlace'] ) ) {
                update_post_meta( $post_id, '_contacto_enlace', sanitize_text_field( wp_unslash( $_POST['muni_contacto_enlace'] ) ) );
            }
            if ( isset( $_POST['muni_contacto_icono'] ) ) {
                // Validar contra lista blanca.
                $iconos_validos = array( 'mail', 'phone', 'map', 'clock', 'info' );
                $icono = sanitize_key( wp_unslash( $_POST['muni_contacto_icono'] ) );
                if ( in_array( $icono, $iconos_validos, true ) ) {
                    update_post_meta( $post_id, '_contacto_icono', $icono );
                }
            }
            break;

        case 'direcciones':
            if ( isset( $_POST['muni_direccion_icono'] ) ) {
                $iconos_dir_validos = array( 'default', 'obras', 'transito', 'dideco', 'medioambiente', 'seguridad', 'juzgado' );
                $icono_dir = sanitize_key( wp_unslash( $_POST['muni_direccion_icono'] ) );
                if ( in_array( $icono_dir, $iconos_dir_validos, true ) ) {
                    update_post_meta( $post_id, '_direccion_icono', $icono_dir );
                }
            }
            if ( isset( $_POST['muni_direccion_url'] ) ) {
                update_post_meta( $post_id, '_direccion_url', esc_url_raw( wp_unslash( $_POST['muni_direccion_url'] ) ) );
            }
            break;

        default:
            // No hacer nada para post_types no reconocidos, previniendo contaminación.
            break;
    }
}
// El hook recibe $post como segundo parámetro para poder leer post_type de forma segura.
add_action( 'save_post', 'muni_santa_juana_save_meta_box_data', 10, 2 );

/**
 * Auto-poblar proyectos de muestra en la Base de Datos si la tabla está vacía
 */
function muni_seed_initial_proyectos() {
    if ( get_option( 'muni_proyectos_seeded_v2' ) ) {
        return;
    }

    $existing = get_posts( array(
        'post_type'   => 'proyectos',
        'numberposts' => 1,
        'post_status' => 'any',
    ) );

    if ( empty( $existing ) ) {
        $sample_projects = array(
            array(
                'title'     => 'Pavimentación Participativa y Mejoramiento Sector Sur',
                'excerpt'   => 'Obra de pavimentación asfáltica y aceras inclusivas para mejorar la conectividad peatonal y vehicular de los vecinos.',
                'estado'    => 'En Desarrollo',
                'avance'    => '90',
                'categoria' => 'Vialidad & Urbanismo',
                'inversion' => '$450 Millones',
            ),
            array(
                'title'     => 'Construcción y Modernización Escuela Básica Nueva',
                'excerpt'   => 'Infraestructura educativa de alto nivel con aulas climatizadas, laboratorio digital y multicancha techada.',
                'estado'    => 'En Desarrollo',
                'avance'    => '45',
                'categoria' => 'Educación & Infancia',
                'inversion' => '$820 Millones',
            ),
            array(
                'title'     => 'Regeneración Urbana Parque Bicentenario Santa Juana',
                'excerpt'   => 'Creación de áreas verdes sustentables, zonas de juegos infantiles, iluminación LED y mobiliario urbano.',
                'estado'    => 'Aprobado',
                'avance'    => '75',
                'categoria' => 'Espacios Públicos',
                'inversion' => '$310 Millones',
            ),
        );

        foreach ( $sample_projects as $proj ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $proj['title'],
                'post_excerpt' => $proj['excerpt'],
                'post_status'  => 'publish',
                'post_type'    => 'proyectos',
            ) );

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_estado_proyecto', $proj['estado'] );
                update_post_meta( $post_id, '_avance_proyecto', $proj['avance'] );
                update_post_meta( $post_id, '_categoria_proyecto', $proj['categoria'] );
                update_post_meta( $post_id, '_inversion_proyecto', $proj['inversion'] );
            }
        }
        update_option( 'muni_proyectos_seeded_v2', true );
    }
}
// OPTIMIZACIÓN: Ejecutar solo una vez al activar el tema, evitando consumo de BD en uso regular.
add_action( 'after_switch_theme', 'muni_seed_initial_proyectos' );

/**
 * Auto-poblar beneficios de muestra en la Base de Datos si la tabla está vacía
 */
function muni_seed_initial_beneficios() {
    if ( get_option( 'muni_beneficios_seeded_v2' ) ) {
        return;
    }

    $existing = get_posts( array(
        'post_type'   => 'beneficios',
        'numberposts' => 1,
        'post_status' => 'any',
    ) );

    if ( empty( $existing ) ) {
        $sample_beneficios = array(
            array(
                'title'   => 'Tarjeta Vecino Mayor',
                'excerpt' => 'Tu bienestar es nuestra prioridad. Conoce la alianza exclusiva para acceder a descuentos en pasajes de buses interurbanos para el Adulto Mayor. Descubre cómo obtenerla.',
            )
        );

        foreach ( $sample_beneficios as $ben ) {
            wp_insert_post( array(
                'post_title'   => $ben['title'],
                'post_excerpt' => $ben['excerpt'],
                'post_content' => 'Contenido detallado del beneficio. Aquí puedes agregar toda la información, requisitos y pasos a seguir para que el vecino pueda acceder a este beneficio. Todo esto es editable desde el panel de WordPress.',
                'post_status'  => 'publish',
                'post_type'    => 'beneficios',
            ) );
        }
        update_option( 'muni_beneficios_seeded_v2', true );
    }
}
// OPTIMIZACIÓN: Ejecutar solo una vez al activar el tema.
add_action( 'after_switch_theme', 'muni_seed_initial_beneficios' );

/**
 * Auto-poblar banners de muestra en la Base de Datos si la tabla está vacía
 */
function muni_seed_initial_banners() {
    if ( get_option( 'muni_banners_seeded_v2' ) ) {
        return;
    }

    $existing = get_posts( array(
        'post_type'   => 'banners',
        'numberposts' => 1,
        'post_status' => 'any',
    ) );

    // Si está vacío O no se ha sembrado antes, sembramos.
    if ( empty( $existing ) ) {
        $sample_banners = array(
            array(
                'title' => 'Turismo Local',
                'link'  => '#',
            ),
            array(
                'title' => 'Tríptico Informativo',
                'link'  => '#',
            ),
            array(
                'title' => 'Punto Limpio y Reciclaje',
                'link'  => '#',
            ),
        );

        foreach ( $sample_banners as $banner ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $banner['title'],
                'post_status'  => 'publish',
                'post_type'    => 'banners',
            ) );

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_banner_link', $banner['link'] );
            }
        }
        update_option( 'muni_banners_seeded_v2', true );
    }
}
// OPTIMIZACIÓN: Ejecutar solo una vez al activar el tema.
add_action( 'after_switch_theme', 'muni_seed_initial_banners' );

/**
 * Auto-poblar contactos del footer en la Base de Datos si la tabla está vacía
 */
function muni_seed_initial_contactos() {
    if ( get_option( 'muni_contactos_seeded_v2' ) ) {
        return;
    }

    $existing = get_posts( array(
        'post_type'   => 'contactos',
        'numberposts' => 1,
        'post_status' => 'any',
    ) );

    if ( empty( $existing ) ) {
        $sample_con = array(
            array( 'title' => 'Oficina de Partes', 'valor' => 'oficinadepartes@santajuana.cl', 'enlace' => 'mailto:oficinadepartes@santajuana.cl', 'icono' => 'mail' ),
            array( 'title' => 'Teléfono', 'valor' => '+56 41 2779753', 'enlace' => 'tel:+56412779753', 'icono' => 'phone' ),
            array( 'title' => 'Dirección', 'valor' => 'Yungay 125, Santa Juana', 'enlace' => '', 'icono' => 'map' ),
            array( 'title' => 'Horario', 'valor' => 'Lunes a viernes: 8:00 - 14:00 hrs', 'enlace' => '', 'icono' => 'clock' ),
        );
        foreach ( $sample_con as $con ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $con['title'],
                'post_status'  => 'publish',
                'post_type'    => 'contactos',
            ) );
            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_contacto_valor', $con['valor'] );
                update_post_meta( $post_id, '_contacto_enlace', $con['enlace'] );
                update_post_meta( $post_id, '_contacto_icono', $con['icono'] );
            }
        }
        update_option( 'muni_contactos_seeded_v2', true );
    }
}
// OPTIMIZACIÓN: Ejecutar solo una vez al activar el tema.
add_action( 'after_switch_theme', 'muni_seed_initial_contactos' );


function muni_direcciones_meta_callback( $post ) {
    wp_nonce_field( 'muni_save_meta_box_data', 'muni_meta_box_nonce' );
    $icono = get_post_meta( $post->ID, '_direccion_icono', true );
    $url = get_post_meta( $post->ID, '_direccion_url', true );
    ?>
    <p>
        <label for="muni_direccion_icono"><strong>Ícono de la Dirección:</strong></label><br>
        <select id="muni_direccion_icono" name="muni_direccion_icono" style="width:100%;">
            <option value="default" <?php selected( $icono, 'default' ); ?>>Edificio Municipal (Por defecto)</option>
            <option value="obras" <?php selected( $icono, 'obras' ); ?>>Obras Municipales (Casco y regla)</option>
            <option value="transito" <?php selected( $icono, 'transito' ); ?>>Tránsito (Auto)</option>
            <option value="dideco" <?php selected( $icono, 'dideco' ); ?>>DIDECO (Familia)</option>
            <option value="medioambiente" <?php selected( $icono, 'medioambiente' ); ?>>Medio Ambiente (Hojas reciclaje)</option>
            <option value="seguridad" <?php selected( $icono, 'seguridad' ); ?>>Seguridad Pública (Escudo)</option>
            <option value="juzgado" <?php selected( $icono, 'juzgado' ); ?>>Juzgado (Balanza y mazo)</option>
        </select>
    </p>
    <p>
        <label for="muni_direccion_url"><strong>Enlace (URL) a la página de esta dirección:</strong></label><br>
        <input type="text" id="muni_direccion_url" name="muni_direccion_url" value="<?php echo esc_attr( $url ); ?>" style="width:100%;" />
    </p>
    <?php
}

/**
 * Auto-poblar Trípticos, Turismo y Reciclaje (con informes 2026)
 */
function muni_seed_informes_2026() {
    // SEGURIDAD: Solo ejecutar en panel de administración por usuario autorizado.
    if ( ! is_admin() || ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Guard de idempotencia: salir si ya se ejecutó anteriormente.
    if ( get_option( 'muni_informes_2026_seeded' ) ) {
        return;
    }

    // Lock atómico para prevenir Race Conditions bajo concurrencia.
    if ( ! add_option( 'muni_seeding_informes_lock', '1', '', 'no' ) ) {
        return;
    }

    // 1. Sembrar Tríptico de Ejemplo (con la imagen 2-1-scaled.jpg)
    $triptico_exist = get_posts( array( 'post_type' => 'tripticos', 'numberposts' => 1, 'post_status' => 'any' ) );
    if ( empty( $triptico_exist ) ) {
        $post_id = wp_insert_post( array(
            'post_title'   => 'Tríptico Informativo 2026',
            'post_content' => '<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>Bienvenido a la edición digital de nuestro Tríptico Informativo.</strong></p><!-- /wp:paragraph --><!-- wp:image {"align":"center","sizeSlug":"large"} --><figure class="wp-block-image aligncenter size-large"><img src="' . esc_url( get_template_directory_uri() . '/assets/img/triptico-ejemplo.jpg' ) . '" alt="Tríptico 2026"/></figure><!-- /wp:image --><!-- wp:paragraph --><p>Aquí podrás encontrar toda la información detallada que hemos preparado para ti. A partir de ahora, la municipalidad puede subir nuevas ediciones y páginas usando el editor de bloques.</p><!-- /wp:paragraph -->',
            'post_status'  => 'publish',
            'post_type'    => 'tripticos',
        ) );
    }

    // 2. Sembrar Turismo Local (Informe 2026)
    $turismo_exist = get_posts( array( 'post_type' => 'turismo', 'numberposts' => 1, 'post_status' => 'any' ) );
    if ( empty( $turismo_exist ) ) {
        wp_insert_post( array(
            'post_title'   => 'Informe de Turismo Local 2026: Descubre la Riqueza de Santa Juana',
            'post_content' => '<!-- wp:heading {"level":2} --><h2>Santa Juana: Destino Patrimonial y Natural en 2026</h2><!-- /wp:heading --><!-- wp:paragraph --><p>En el corazón del Biobío, Santa Juana se ha consolidado este año 2026 como uno de los destinos turísticos más ricos y diversos del sur de Chile.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Atractivos Imperdibles</h3><!-- /wp:heading --><!-- wp:list --><ul><li><strong>El Fuerte Histórico:</strong> Renovado y con recorridos guiados que te transportan a los orígenes del Biobío.</li><li><strong>Rutas del Valle de Catirai:</strong> Senderismo de clase mundial rodeado de flora nativa y vistas imponentes.</li><li><strong>Gastronomía Patrimonial:</strong> Fiestas costumbristas que durante todo el 2026 han celebrado nuestra miel, vinos y productos agrícolas de primera calidad.</li></ul><!-- /wp:list --><!-- wp:paragraph --><p>Nuestra comuna invita a todos los visitantes a enamorarse de su historia, su cultura y la inigualable calidez de su gente. ¡Santa Juana te espera!</p><!-- /wp:paragraph -->',
            'post_status'  => 'publish',
            'post_type'    => 'turismo',
        ) );
    }

    // 3. Sembrar Punto Limpio y Reciclaje (Informe 2026)
    $reciclaje_exist = get_posts( array( 'post_type' => 'reciclaje', 'numberposts' => 1, 'post_status' => 'any' ) );
    if ( empty( $reciclaje_exist ) ) {
        wp_insert_post( array(
            'post_title'   => 'Informe de Sustentabilidad 2026: Avances en Punto Limpio y Reciclaje',
            'post_content' => '<!-- wp:heading {"level":2} --><h2>Compromiso Ecológico Santa Juana 2026</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Durante el año 2026, la comuna de Santa Juana ha marcado un hito en su compromiso con el medio ambiente, transformándose en un referente regional de sustentabilidad.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Nuestros Logros</h3><!-- /wp:heading --><!-- wp:list --><ul><li><strong>Ampliación de Puntos Limpios:</strong> Hemos triplicado nuestra capacidad de recolección de plásticos, vidrios, y cartones en el centro y sectores rurales.</li><li><strong>Compostaje Comunitario:</strong> Más de 500 familias se han unido al programa de compostaje este 2026, reduciendo significativamente los residuos orgánicos.</li><li><strong>Educación Ambiental:</strong> Talleres mensuales en todas nuestras escuelas públicas, formando a las nuevas generaciones de santajuaninos en el cuidado del planeta.</li></ul><!-- /wp:list --><!-- wp:paragraph --><p>El reciclaje es tarea de todos. Revisa nuestras campañas mensuales y sumate a hacer de Santa Juana una comuna más verde y limpia.</p><!-- /wp:paragraph -->',
            'post_status'  => 'publish',
            'post_type'    => 'reciclaje',
        ) );
    }

    update_option( 'muni_informes_2026_seeded', true );
}
// OPTIMIZACIÓN: Ejecutar solo una vez al activar el tema, garantizando rendimiento nulo tras la instalación.
add_action( 'after_switch_theme', 'muni_seed_informes_2026' );
