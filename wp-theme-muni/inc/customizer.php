<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Customizer de Muni Santa Juana
 */
function muni_santa_juana_customizer( $wp_customize ) {

    // ==========================================
    // SECCIÓN CONTACTO Y HORARIOS
    // ==========================================
    $wp_customize->add_section( 'muni_contacto_section', array(
        'title'    => __( 'Contacto Municipal', 'muni-santa-juana' ),
        'priority' => 30,
    ) );

    // Teléfono
    $wp_customize->add_setting( 'muni_telefono', array(
        'default'           => '+56 41 2779753',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_telefono', array(
        'label'    => __( 'Teléfono Principal', 'muni-santa-juana' ),
        'section'  => 'muni_contacto_section',
        'type'     => 'text',
    ) );

    // Email
    $wp_customize->add_setting( 'muni_email', array(
        'default'           => 'oficinadepartes@santajuana.cl',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'muni_email', array(
        'label'    => __( 'Email Oficina de Partes', 'muni-santa-juana' ),
        'section'  => 'muni_contacto_section',
        'type'     => 'email',
    ) );

    // Dirección
    $wp_customize->add_setting( 'muni_direccion', array(
        'default'           => 'Santa Juana, Región del Biobío',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_direccion', array(
        'label'    => __( 'Dirección Física', 'muni-santa-juana' ),
        'section'  => 'muni_contacto_section',
        'type'     => 'textarea',
    ) );

    // Horario
    $wp_customize->add_setting( 'muni_horario', array(
        'default'           => 'Lunes a viernes: 8:00 - 14:00 hrs',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_horario', array(
        'label'    => __( 'Horario de Atención', 'muni-santa-juana' ),
        'section'  => 'muni_contacto_section',
        'type'     => 'text',
    ) );

    // ==========================================
    // SECCIÓN INFORMACIÓN MUNICIPAL (ENLACES)
    // ==========================================
    $wp_customize->add_section( 'muni_info_section', array(
        'title'    => __( 'Enlaces Información Municipal', 'muni-santa-juana' ),
        'priority' => 31,
    ) );

    // Solicitud de Información
    $wp_customize->add_setting( 'muni_link_solicitud', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_solicitud', array(
        'label'    => __( 'Enlace Solicitud de Información (Ley 20.285)', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // Transparencia Activa
    $wp_customize->add_setting( 'muni_link_transparencia', array(
        'default'           => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_transparencia', array(
        'label'    => __( 'Enlace Transparencia Activa (Ley 20.285)', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // Juntas de Vecinos
    $wp_customize->add_setting( 'muni_link_juntas', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_juntas', array(
        'label'    => __( 'Enlace Juntas de Vecinos (Ley 21.146)', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // Concejo Municipal
    $wp_customize->add_setting( 'muni_link_concejo', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_concejo', array(
        'label'    => __( 'Enlace Concejo Municipal', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // Cuenta Pública
    $wp_customize->add_setting( 'muni_link_cuenta', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_cuenta', array(
        'label'    => __( 'Enlace Cuenta Pública', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // PLADETUR
    $wp_customize->add_setting( 'muni_link_pladetur', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_pladetur', array(
        'label'    => __( 'Enlace PLADETUR', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // ==========================================
    // SECCIÓN REDES SOCIALES OFICIALES
    // ==========================================
    $wp_customize->add_section( 'muni_redes_section', array(
        'title'    => __( 'Redes Sociales Oficiales', 'muni-santa-juana' ),
        'priority' => 32,
    ) );

    // Facebook URL
    $wp_customize->add_setting( 'muni_facebook_url', array(
        'default'           => 'https://facebook.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_facebook_url', array(
        'label'    => __( 'Página Oficial de Facebook', 'muni-santa-juana' ),
        'section'  => 'muni_redes_section',
        'type'     => 'url',
    ) );

    // Instagram URL
    $wp_customize->add_setting( 'muni_instagram_url', array(
        'default'           => 'https://instagram.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_instagram_url', array(
        'label'    => __( 'Cuenta Oficial de Instagram', 'muni-santa-juana' ),
        'section'  => 'muni_redes_section',
        'type'     => 'url',
    ) );

    // X (Twitter) URL
    $wp_customize->add_setting( 'muni_twitter_url', array(
        'default'           => 'https://x.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_twitter_url', array(
        'label'    => __( 'Cuenta Oficial de X (Twitter)', 'muni-santa-juana' ),
        'section'  => 'muni_redes_section',
        'type'     => 'url',
    ) );

    // YouTube URL
    $wp_customize->add_setting( 'muni_youtube_url', array(
        'default'           => 'https://youtube.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_youtube_url', array(
        'label'    => __( 'Canal Oficial de YouTube', 'muni-santa-juana' ),
        'section'  => 'muni_redes_section',
        'type'     => 'url',
    ) );

    // ==========================================
    // SECCIÓN BENEFICIO DESTACADO
    // ==========================================
    $wp_customize->add_section( 'muni_beneficio_destacado_section', array(
        'title'    => __( 'Beneficio Destacado (Vecinos)', 'muni-santa-juana' ),
        'priority' => 33,
    ) );

    // Imagen
    $wp_customize->add_setting( 'muni_beneficio_img', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'muni_beneficio_img', array(
        'label'    => __( 'Imagen de Beneficio Destacado', 'muni-santa-juana' ),
        'section  ' => 'muni_beneficio_destacado_section',
        'settings' => 'muni_beneficio_img',
    ) ) );

    // Título
    $wp_customize->add_setting( 'muni_beneficio_titulo', array(
        'default'           => 'Obtén tu Tarjeta Vecino',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_beneficio_titulo', array(
        'label'    => __( 'Título', 'muni-santa-juana' ),
        'section'  => 'muni_beneficio_destacado_section',
        'type'     => 'text',
    ) );

    // Subtítulo
    $wp_customize->add_setting( 'muni_beneficio_subtitulo', array(
        'default'           => '¡Buenas noticias! La Tarjeta Vecino de Santa Juana ahora es 100% digital.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_beneficio_subtitulo', array(
        'label'    => __( 'Subtítulo', 'muni-santa-juana' ),
        'section'  => 'muni_beneficio_destacado_section',
        'type'     => 'textarea',
    ) );

    // Texto
    $wp_customize->add_setting( 'muni_beneficio_texto', array(
        'default'           => 'Solo necesitas descargar la app <em>Tarjeta Santa Juana</em> para acceder a múltiples convenios y beneficios en transporte, salud, combustible, educación y más.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_beneficio_texto', array(
        'label'    => __( 'Texto / Descripción', 'muni-santa-juana' ),
        'section'  => 'muni_beneficio_destacado_section',
        'type'     => 'textarea',
    ) );

    // ==========================================
    // TÍTULOS INFORMACIÓN MUNICIPAL
    // ==========================================
    // (Añadiremos los settings de títulos a la sección existente muni_info_section)

    $wp_customize->add_setting( 'muni_titulo_solicitud', array(
        'default'           => 'Ley 20.285<br>Solicitud de Información',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_titulo_solicitud', array(
        'label'    => __( 'Título Solicitud', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'muni_titulo_transparencia', array(
        'default'           => 'Ley 20.285<br>Transparencia Activa',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_titulo_transparencia', array(
        'label'    => __( 'Título Transparencia', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'muni_titulo_juntas', array(
        'default'           => 'Ley 21.146<br>Juntas de Vecinos',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_titulo_juntas', array(
        'label'    => __( 'Título Juntas', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'muni_titulo_concejo', array(
        'default'           => 'Concejo<br>Municipal',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_titulo_concejo', array(
        'label'    => __( 'Título Concejo', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'muni_titulo_cuenta', array(
        'default'           => 'Cuenta<br>Pública',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_titulo_cuenta', array(
        'label'    => __( 'Título Cuenta Pública', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'muni_titulo_pladetur', array(
        'default'           => 'PLADETUR',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'muni_titulo_pladetur', array(
        'label'    => __( 'Título PLADETUR', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'muni_santa_juana_customizer' );
