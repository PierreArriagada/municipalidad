<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Template Name: Historia de Santa Juana
 * Plantilla para la página de Historia
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<main id="primary" class="site-main inst-page-main">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Banner Superior Principal -->
            <div class="page-hero inst-hero">
                <div class="inst-hero-wrapper">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Marca-Color-Horizontal-3.webp' ); ?>" alt="Municipalidad de Santa Juana" class="inst-hero-bg">
                    <div class="inst-hero-overlay"></div>
                    <div class="inst-hero-content">
                        <span class="inst-hero-tag">Ilustre Municipalidad de Santa Juana</span>
                        <h1 class="entry-title inst-hero-title">Historia de Santa Juana</h1>
                        <p class="inst-hero-subtitle">Un legado patrimonial e histórico forjado desde 1626 en la ribera sur del río Biobío.</p>
                    </div>
                </div>
                <!-- Ondas decorativas de integración -->
                <svg class="inst-hero-wave" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal Extenso -->
            <div class="container inst-container">
                <div class="entry-content inst-content-box">
                    
                    <h2 class="inst-h2" style="margin-top:0;">Orígenes Colonial y El Fuerte de Santa Juana</h2>
                    <p>La rica historia de la comuna de Santa Juana tiene sus cimientos en el periodo colonial, evolucionando desde una posición estratégica y militar clave durante la Guerra de Arauco, hasta convertirse en la próspera entidad administrativa y cultural que conocemos hoy. El origen de nuestra comuna se remonta a la fundación del histórico <strong>Fuerte de Santa Juana de Guadalcázar</strong>, establecido el <strong>8 de marzo de 1626</strong> por orden del entonces gobernador de Chile, don Luis Fernández de Córdova y Arce.</p>
                    <p>La fortificación fue nombrada en honor a la esposa del virrey del Perú de la época, Diego Fernández de Córdoba, marqués de Guadalcázar. Ubicado en el estratégico valle de Catiray, en la ribera sur del imponente río Biobío, este enclave fue fundamental para resguardar la frontera española y controlar los pasos naturales de la zona frente a la resistencia del pueblo mapuche.</p>

                    <h2 class="inst-h2">De Fortaleza Fronteriza a Población Civil</h2>
                    <p>A lo largo de los siglos XVII y XVIII, la plaza fuerte enfrentó constantes desafíos, reconstrucciones y asedios. Fue en el año 1739, bajo el mandato del gobernador José Antonio Manso de Velasco, cuando el enclave fue reforzado y elevado a la categoría de plaza fuerte consolidada. Este hito permitió que comenzara a configurarse, de manera definitiva, un poblado permanente alrededor de sus muros, dando origen a la comunidad civil de Santa Juana.</p>
                    <p>La institucionalidad municipal moderna emergió a finales del siglo XIX. La <strong>Municipalidad de Santa Juana fue creada oficialmente el 13 de enero de 1891</strong> mediante el decreto de la Ley de Comuna Autónoma, siendo publicado en el Diario Oficial el 23 de enero del mismo año, marcando el inicio de nuestra autonomía local y administración propia.</p>

                    <h2 class="inst-h2">Resiliencia, Reconstrucción y Patrimonio Actual</h2>
                    <p>Nuestra comuna ha demostrado históricamente una inquebrantable capacidad de resiliencia frente a la adversidad. El devastador terremoto de 1939 destruyó cerca del 95% de las viviendas, dejando al pueblo temporalmente aislado. Sin embargo, el esfuerzo conjunto y el espíritu indomable de los santajuaninos permitieron levantar nuevos edificios públicos y hogares, sentando las bases de la ciudad moderna.</p>
                    <p>En el presente, Santa Juana se erige orgullosa de su legado, conservando su tradicional trazado urbano en damero (herencia de la arquitectura colonial española) y protegiendo fervientemente el Fuerte de Santa Juana, declarado Monumento Histórico Nacional. Somos una comuna rural y urbana que abraza el futuro con optimismo, valorando siempre las raíces profundas que forjaron nuestra identidad comunal.</p>

                    <?php
                    // En caso de que el editor de WordPress tenga texto adicional.
                    the_content();
                    ?>
                </div>
            </div>
            
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
