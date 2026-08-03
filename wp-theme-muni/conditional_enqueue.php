<?php
// Function snippet to replace the global enqueue
/*
    // ESTILOS GLOBALES ESTRUCTURALES
    wp_enqueue_style( 'muni-header',       $tpl_uri . '/assets/css/components/header.css',       array('muni-santa-juana-style'), $theme_version );
    wp_enqueue_style( 'muni-footer',       $tpl_uri . '/assets/css/components/footer.css',       array('muni-santa-juana-style'), $theme_version );
    wp_enqueue_style( 'muni-banners',      $tpl_uri . '/assets/css/components/banners.css',      array('muni-santa-juana-style'), $theme_version );
    wp_enqueue_style( 'muni-info',         $tpl_uri . '/assets/css/components/info.css',         array('muni-santa-juana-style'), $theme_version );
    wp_enqueue_style( 'muni-enlaces',      $tpl_uri . '/assets/css/components/enlaces.css',      array('muni-santa-juana-style'), $theme_version );

    // HOME PAGE
    if ( is_front_page() || is_home() ) {
        wp_enqueue_style( 'muni-hero',         $tpl_uri . '/assets/css/components/hero.css',         array('muni-santa-juana-style'), $theme_version );
        wp_enqueue_style( 'muni-emergencias',  $tpl_uri . '/assets/css/components/emergencias.css',  array('muni-santa-juana-style'), $theme_version );
        wp_enqueue_style( 'muni-vecinos',      $tpl_uri . '/assets/css/components/vecinos.css',      array('muni-santa-juana-style'), $theme_version );
        wp_enqueue_style( 'muni-proyectos',    $tpl_uri . '/assets/css/components/proyectos.css',    array('muni-santa-juana-style'), $theme_version );
        wp_enqueue_style( 'muni-noticias',     $tpl_uri . '/assets/css/components/noticias.css',     array('muni-santa-juana-style'), $theme_version );
        wp_enqueue_style( 'muni-concejo',      $tpl_uri . '/assets/css/components/concejo.css',      array('muni-santa-juana-style'), $theme_version );
    }

    // ARCHIVOS Y SINGLES DE CUSTOM POST TYPES
    if ( is_post_type_archive('proyectos') || is_singular('proyectos') ) {
        wp_enqueue_style( 'muni-proyectos',    $tpl_uri . '/assets/css/components/proyectos.css',    array('muni-santa-juana-style'), $theme_version );
    }
    
    if ( is_category() || is_singular('post') || is_archive() || is_search() ) {
        wp_enqueue_style( 'muni-noticias',     $tpl_uri . '/assets/css/components/noticias.css',     array('muni-santa-juana-style'), $theme_version );
    }

    if ( is_post_type_archive('anuncios') || is_singular('anuncios') ) {
        wp_enqueue_style( 'muni-anuncios',     $tpl_uri . '/assets/css/components/anuncios.css',     array('muni-santa-juana-style'), $theme_version );
    }
    
    if ( is_post_type_archive('direcciones') || is_singular('direcciones') ) {
        wp_enqueue_style( 'muni-direcciones',  $tpl_uri . '/assets/css/components/direcciones.css',  array('muni-santa-juana-style'), $theme_version );
    }

    // PLANTILLAS DE PÁGINA ESPECÍFICAS
    if ( is_page_template( 'page-contacto.php' ) ) {
        wp_enqueue_style( 'muni-contacto',     $tpl_uri . '/assets/css/components/contacto.css',     array('muni-santa-juana-style'), $theme_version );
    }

    if ( is_page_template( 'page-transparencia.php' ) ) {
        wp_enqueue_style( 'muni-transparencia',$tpl_uri . '/assets/css/components/transparencia.css',array('muni-santa-juana-style'), $theme_version );
    }

    if ( is_page_template( 'page-intranet.php' ) ) {
        wp_enqueue_style( 'muni-intranet',     $tpl_uri . '/assets/css/components/intranet.css',     array('muni-santa-juana-style'), $theme_version );
    }
    
    if ( is_page_template( 'page-direcciones-municipales.php' ) ) {
        wp_enqueue_style( 'muni-direcciones',  $tpl_uri . '/assets/css/components/direcciones.css',  array('muni-santa-juana-style'), $theme_version );
    }

    // Plantillas Institucionales
    if ( is_page_template( 'page-mision.php' ) || is_page_template( 'page-vision.php' ) || is_page_template( 'page-historia.php' ) || is_page_template( 'page-normativa.php' ) || is_page_template( 'page-politicas.php' ) ) {
        wp_enqueue_style( 'muni-institucional',$tpl_uri . '/assets/css/components/institucional.css',array('muni-santa-juana-style'), $theme_version );
    }
*/
