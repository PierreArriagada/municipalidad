<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Customizer de Muni Santa Juana
 */
function muni_santa_juana_customizer( $wp_customize ) {

    // ==========================================
    // SECCIÓN EMERGENCIAS
    // ==========================================
    $wp_customize->add_section( 'muni_emergencias_section', array(
        'title'    => __( 'Contactos de Emergencia', 'muni-santa-juana' ),
        'priority' => 30,
    ) );

    // Carabineros
    $wp_customize->add_setting( 'muni_em_carabineros', array(
        'default'           => '133',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_em_carabineros', array(
        'label'    => __( 'Número Carabineros', 'muni-santa-juana' ),
        'section'  => 'muni_emergencias_section',
        'type'     => 'text',
    ) );

    // Ambulancia
    $wp_customize->add_setting( 'muni_em_ambulancia', array(
        'default'           => '131',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_em_ambulancia', array(
        'label'    => __( 'Número Ambulancia (SAMU)', 'muni-santa-juana' ),
        'section'  => 'muni_emergencias_section',
        'type'     => 'text',
    ) );

    // Bomberos
    $wp_customize->add_setting( 'muni_em_bomberos', array(
        'default'           => '132',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_em_bomberos', array(
        'label'    => __( 'Número Bomberos', 'muni-santa-juana' ),
        'section'  => 'muni_emergencias_section',
        'type'     => 'text',
    ) );

    // Seguridad Ciudadana
    $wp_customize->add_setting( 'muni_em_seguridad', array(
        'default'           => '956584049',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_em_seguridad', array(
        'label'    => __( 'Número Seguridad Ciudadana', 'muni-santa-juana' ),
        'section'  => 'muni_emergencias_section',
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
        'default'           => 'https://www.portaltransparencia.cl/PortalPdT/ingreso-sai-v2?idOrgTa=MU306',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_solicitud', array(
        'label'    => __( 'Enlace Solicitud de Información (Ley 20.285)', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // Transparencia Activa
    $wp_customize->add_setting( 'muni_link_transparencia', array(
        'default'           => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_transparencia', array(
        'label'    => __( 'Enlace Transparencia Activa (Ley 20.285)', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // Juntas de Vecinos
    $wp_customize->add_setting( 'muni_link_juntas', array(
        'default'           => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023',
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
        'default'           => 'https://transparenciasantajuana.cl/owncloud/index.php/s/1BE1rqMdG8U6dJq',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_link_cuenta', array(
        'label'    => __( 'Enlace Cuenta Pública', 'muni-santa-juana' ),
        'section'  => 'muni_info_section',
        'type'     => 'url',
    ) );

    // PLADETUR
    $wp_customize->add_setting( 'muni_link_pladetur', array(
        'default'           => 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306',
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
        'default'           => 'https://web.facebook.com/munisantajuana/?locale=es_LA',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_facebook_url', array(
        'label'    => __( 'Página Oficial de Facebook', 'muni-santa-juana' ),
        'section'  => 'muni_redes_section',
        'type'     => 'url',
    ) );

    // Instagram URL
    $wp_customize->add_setting( 'muni_instagram_url', array(
        'default'           => 'https://www.instagram.com/munisantajuana',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_instagram_url', array(
        'label'    => __( 'Cuenta Oficial de Instagram', 'muni-santa-juana' ),
        'section'  => 'muni_redes_section',
        'type'     => 'url',
    ) );



    // YouTube URL
    $wp_customize->add_setting( 'muni_youtube_url', array(
        'default'           => 'https://www.youtube.com/@munisantajuana',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_youtube_url', array(
        'label'    => __( 'Canal Oficial de YouTube', 'muni-santa-juana' ),
        'section'  => 'muni_redes_section',
        'type'     => 'url',
    ) );

    // TikTok URL
    $wp_customize->add_setting( 'muni_tiktok_url', array(
        'default'           => 'https://www.tiktok.com/@munisantajuana',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_tiktok_url', array(
        'label'    => __( 'Cuenta Oficial de TikTok', 'muni-santa-juana' ),
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

    // ==========================================
    // SECCIÓN PORTAL INTRANET
    // ==========================================
    $wp_customize->add_section( 'muni_intranet_section', array(
        'title'    => __( 'Portal Intranet', 'muni-santa-juana' ),
        'priority' => 35,
    ) );

    // Webmail Title
    $wp_customize->add_setting( 'muni_intranet_webmail_title', array(
        'default'           => 'Correo Institucional (Webmail)',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_intranet_webmail_title', array(
        'label'    => __( 'Título Webmail', 'muni-santa-juana' ),
        'section'  => 'muni_intranet_section',
        'type'     => 'text',
    ) );

    // Webmail Desc
    $wp_customize->add_setting( 'muni_intranet_webmail_desc', array(
        'default'           => 'Accede a tu bandeja de entrada y calendario institucional.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'muni_intranet_webmail_desc', array(
        'label'    => __( 'Descripción Webmail', 'muni-santa-juana' ),
        'section'  => 'muni_intranet_section',
        'type'     => 'textarea',
    ) );

    // Webmail URL
    $wp_customize->add_setting( 'muni_intranet_webmail_url', array(
        'default'           => 'https://webmail.santajuana.cl/',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_intranet_webmail_url', array(
        'label'    => __( 'Enlace Webmail', 'muni-santa-juana' ),
        'section'  => 'muni_intranet_section',
        'type'     => 'url',
    ) );

    // Sistema Intranet Title
    $wp_customize->add_setting( 'muni_intranet_sistema_title', array(
        'default'           => 'Plataforma Intranet Municipal',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_intranet_sistema_title', array(
        'label'    => __( 'Título Sistema Intranet', 'muni-santa-juana' ),
        'section'  => 'muni_intranet_section',
        'type'     => 'text',
    ) );

    // Sistema Intranet Desc
    $wp_customize->add_setting( 'muni_intranet_sistema_desc', array(
        'default'           => 'Acceso al sistema interno de gestión y servicios para funcionarios.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'muni_intranet_sistema_desc', array(
        'label'    => __( 'Descripción Sistema Intranet', 'muni-santa-juana' ),
        'section'  => 'muni_intranet_section',
        'type'     => 'textarea',
    ) );

    // Sistema Intranet URL
    $wp_customize->add_setting( 'muni_intranet_sistema_url', array(
        'default'           => 'https://santajuana-intranet.tumunicipio.cl/auth/login',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'muni_intranet_sistema_url', array(
        'label'    => __( 'Enlace Sistema Intranet', 'muni-santa-juana' ),
        'section'  => 'muni_intranet_section',
        'type'     => 'url',
    ) );



    // ==========================================
    // SECCIÓN CONTACTO (INFORMACIÓN MUNICIPAL)
    // ==========================================
    $wp_customize->add_section( 'muni_contacto_section', array(
        'title'    => __( 'Contacto Municipal', 'muni-santa-juana' ),
        'priority' => 37,
    ) );

    // Email
    $wp_customize->add_setting( 'muni_email', array(
        'default'           => 'oficinadepartes@santajuana.cl',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'muni_email', array(
        'label'    => __( 'Correo Electrónico', 'muni-santa-juana' ),
        'section'  => 'muni_contacto_section',
        'type'     => 'email',
    ) );

    // Teléfono
    $wp_customize->add_setting( 'muni_telefono', array(
        'default'           => '+56 41 2779753',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_telefono', array(
        'label'    => __( 'Teléfono', 'muni-santa-juana' ),
        'section'  => 'muni_contacto_section',
        'type'     => 'text',
    ) );

    // Dirección
    $wp_customize->add_setting( 'muni_direccion', array(
        'default'           => 'Yungay 125, Santa Juana',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'muni_direccion', array(
        'label'    => __( 'Dirección', 'muni-santa-juana' ),
        'section'  => 'muni_contacto_section',
        'type'     => 'text',
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

}
add_action( 'customize_register', 'muni_santa_juana_customizer' );
