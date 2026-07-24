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

    // CPT Emergencias
    $args_emergencias = array(
        'label'                 => __( 'Emergencias', 'muni-santa-juana' ),
        'labels'                => array(
            'name'          => _x( 'Emergencias', 'Post Type General Name', 'muni-santa-juana' ),
            'singular_name' => _x( 'Emergencia', 'Post Type Singular Name', 'muni-santa-juana' ),
            'add_new_item'  => __( 'Añadir Nuevo Contacto', 'muni-santa-juana' ),
        ),
        'supports'              => array( 'title', 'excerpt', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-sos',
        'has_archive'           => false,
    );
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
}
add_action( 'init', 'muni_santa_juana_register_cpts', 0 );

/**
 * Registro de Meta Boxes
 */
function muni_santa_juana_add_meta_boxes() {
    add_meta_box( 'muni_proyectos_meta', 'Detalles del Proyecto', 'muni_proyectos_meta_callback', 'proyectos', 'normal', 'high' );
    add_meta_box( 'muni_banners_meta', 'Enlace del Banner', 'muni_banners_meta_callback', 'banners', 'normal', 'high' );
    add_meta_box( 'muni_sesiones_meta', 'Detalles de la Sesión', 'muni_sesiones_meta_callback', 'sesiones_concejo', 'normal', 'high' );
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

function muni_santa_juana_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['muni_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['muni_meta_box_nonce'], 'muni_save_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['muni_estado_proyecto'] ) ) {
        update_post_meta( $post_id, '_estado_proyecto', sanitize_text_field( $_POST['muni_estado_proyecto'] ) );
    }
    if ( isset( $_POST['muni_categoria_proyecto'] ) ) {
        update_post_meta( $post_id, '_categoria_proyecto', sanitize_text_field( $_POST['muni_categoria_proyecto'] ) );
    }
    if ( isset( $_POST['muni_avance_proyecto'] ) ) {
        update_post_meta( $post_id, '_avance_proyecto', sanitize_text_field( $_POST['muni_avance_proyecto'] ) );
    }
    if ( isset( $_POST['muni_inversion_proyecto'] ) ) {
        update_post_meta( $post_id, '_inversion_proyecto', sanitize_text_field( $_POST['muni_inversion_proyecto'] ) );
    }
    
    if ( isset( $_POST['muni_banner_link'] ) ) {
        update_post_meta( $post_id, '_banner_link', esc_url_raw( $_POST['muni_banner_link'] ) );
    }

    if ( isset( $_POST['muni_video_url'] ) ) {
        update_post_meta( $post_id, '_video_url', esc_url_raw( $_POST['muni_video_url'] ) );
    }
    if ( isset( $_POST['muni_fecha_sesion'] ) ) {
        update_post_meta( $post_id, '_fecha_sesion', sanitize_text_field( $_POST['muni_fecha_sesion'] ) );
    }
}
add_action( 'save_post', 'muni_santa_juana_save_meta_box_data' );

/**
 * Auto-poblar proyectos de muestra en la Base de Datos si la tabla está vacía
 */
function muni_seed_initial_proyectos() {
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
    }
}
add_action( 'init', 'muni_seed_initial_proyectos', 20 );

/**
 * Auto-poblar beneficios de muestra en la Base de Datos si la tabla está vacía
 */
function muni_seed_initial_beneficios() {
    $existing = get_posts( array(
        'post_type'   => 'beneficios',
        'numberposts' => 1,
        'post_status' => 'any',
    ) );

    if ( empty( $existing ) ) {
        $sample_beneficios = array(
            array(
                'title'   => 'Descuento Aramco',
                'excerpt' => 'Accede a rebajas especiales de hasta $15 y $25 por litro de combustible con tu Tarjeta Vecino. Conoce los días de promoción y estaciones adheridas para obtener la tuya.',
            ),
            array(
                'title'   => 'Tarjeta Vecino Mayor',
                'excerpt' => 'Tu bienestar es nuestra prioridad. Conoce la alianza exclusiva para acceder a descuentos en pasajes de buses interurbanos para el Adulto Mayor. Descubre cómo obtenerla.',
            ),
            array(
                'title'   => 'Copago Cero Fonasa',
                'excerpt' => 'Como política global de Estado, los afiliados a Fonasa tienen gratuidad total en la red pública. Infórmate sobre cómo validar este beneficio en nuestros centros de salud comunales.',
            ),
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
    }
}
add_action( 'init', 'muni_seed_initial_beneficios', 20 );
