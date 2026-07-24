<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla de la página principal (Front Page)
 *
 * Orden estricto de secciones actualizado:
 * 1. Navbar (Header / Top Bar)
 * 2. Noticias Destacadas Hero (home-hero)
 * 3. Cards de Información Municipal (home-info)
 * 4. Banners de Interés (home-banners)
 * 5. Centro de Beneficios para Vecinos (home-vecinos)
 * 6. Contactos de Emergencia 24/7 (home-emergencias) [NUEVA UBICACIÓN: Debajo de Beneficios Vecinos]
 * 7. Noticias Recientes Grid (home-noticias) [NUEVA UBICACIÓN: Debajo de Contactos de Emergencia]
 * 8. Transparencia Activa (home-transparencia)
 * 9. Concejo Municipal (home-concejo)
 * 10. Proyectos Municipales (home-proyectos)
 * 11. Enlaces Útiles / Servicios (home-enlaces)
 * 12. Información de Contacto (home-contacto)
 * 13. Footer
 *
 * @package Muni_Santa_Juana
 */
get_header(); ?>

<main id="primary" class="site-main">

    <?php /* 2. Noticias Destacadas Hero (Al inicio, debajo del Navbar) */ ?>
    <?php get_template_part( 'template-parts/home', 'hero' ); ?>

    <?php /* 3. Cards de Cuenta Pública, PLADETUR, Ley 20.285, Ley 21.146 */ ?>
    <?php get_template_part( 'template-parts/home', 'info' ); ?>

    <?php /* 4. Banners de Turismo, Tríptico, Reciclaje */ ?>
    <?php get_template_part( 'template-parts/home', 'banners' ); ?>

    <?php /* 5. Centro de Beneficios Exclusivos para Vecinos */ ?>
    <?php get_template_part( 'template-parts/home', 'vecinos' ); ?>

    <?php /* 6. Contactos de Emergencia 24/7 (Ubicación: Debajo de Beneficios Vecinos) */ ?>
    <?php get_template_part( 'template-parts/home', 'emergencias' ); ?>

    <?php /* 7. Noticias Recientes Grid (Ubicación: Debajo de Contactos de Emergencia) */ ?>
    <?php get_template_part( 'template-parts/home', 'noticias' ); ?>

    <?php /* 8. Transparencia Activa */ ?>
    <?php get_template_part( 'template-parts/home', 'transparencia' ); ?>

    <?php /* 9. Concejo Municipal y Transmisiones */ ?>
    <?php get_template_part( 'template-parts/home', 'concejo' ); ?>

    <?php /* 10. Proyectos Municipales */ ?>
    <?php get_template_part( 'template-parts/home', 'proyectos' ); ?>

    <?php /* 11. Enlaces Útiles y Servicios */ ?>
    <?php get_template_part( 'template-parts/home', 'enlaces' ); ?>

    <?php /* 12. Información de Contacto */ ?>
    <?php get_template_part( 'template-parts/home', 'contacto' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>
