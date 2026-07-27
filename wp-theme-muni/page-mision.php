<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Template Name: Misión Institucional
 * Plantilla para la página de Misión de la Municipalidad de Santa Juana
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
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Marca-Color-Horizontal-3.png' ); ?>" alt="Municipalidad de Santa Juana" class="inst-hero-bg">
                    <div class="inst-hero-overlay"></div>
                    <div class="inst-hero-content">
                        <span class="inst-hero-tag">Ilustre Municipalidad de Santa Juana</span>
                        <h1 class="entry-title inst-hero-title">Misión Institucional</h1>
                        <p class="inst-hero-subtitle">Compromiso permanente con el bienestar, el servicio público eficiente y el desarrollo sostenible de toda nuestra comunidad comunal.</p>
                    </div>
                </div>
                <!-- Ondas decorativas de integración -->
                <svg class="inst-hero-wave" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal Extenso -->
            <div class="container inst-container">
                <div class="entry-content inst-content-box">
                    
                    <!-- Declaración Oficial -->
                    <div class="inst-declaration-box">
                        <h2 class="inst-declaration-title">Declaración de Misión Municipal</h2>
                        <p class="inst-declaration-quote">
                            "La Ilustre Municipalidad de Santa Juana tiene como misión fundamental administrar y promover el desarrollo integral de la comuna, garantizando la prestación de servicios públicos locales con altos estándares de calidad, transparencia, probidad y calidez humana. Orientamos nuestro actuar hacia la satisfacción de las necesidades prioritarias de las familias santajuaninas, resguardando la identidad histórica, fomentando la equidad territorial entre los sectores urbanos y rurales, e impulsando un progreso sostenible y participativo."
                        </p>
                    </div>

                    <h2 class="inst-h2">Propósito y Rol de la Gestión Municipal</h2>
                    <p>Como entidad territorial al servicio de la ciudadanía, la Municipalidad de Santa Juana asume la responsabilidad de ser el principal motor de desarrollo local y el nexo directo entre el Estado y la comunidad. Nuestra labor diaria abarca la planificación urbana y rural, la administración de la infraestructura pública, la asistencia social integral y la promoción de la actividad económica, agrícola y cultural de la zona.</p>
                    <p>En el contexto contemporáneo, asumimos con profundo sentido de urgencia la tarea de modernizar de manera continua nuestros procesos internos y de atención al público. Esto implica no solo incorporar tecnologías accesibles para la realización de trámites en línea, sino también mantener oficinas abiertas y dispuestas al diálogo con cada vecino, dirigente social y organización comunitaria.</p>

                    <h2 class="inst-h2">Ejes Estratégicos de Nuestra Misión</h2>

                    <div class="inst-ejes-grid">
                        <div class="inst-eje-item">
                            <h3 class="inst-h3">1. Atención Social Integral y Cercanía Vecinal</h3>
                            <p style="margin: 0;">Trabajamos incansablemente por llegar a cada hogar de la comuna que requiera apoyo del municipio. A través de la Dirección de Desarrollo Comunitario (DIDECO) y los distintos programas sociales, focalizamos esfuerzos en proteger a las familias más vulnerables, adultos mayores, niños, niñas y personas en situación de discapacidad o emergencia, ofreciendo respuestas oportunas y soluciones reales.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">2. Equidad Territorial y Fomento del Sector Rural</h3>
                            <p style="margin: 0;">Santa Juana posee un extenso territorio rural donde habitan campesinos, agricultores y emprendedores de vasta tradición. Nuestra misión exige desplegar servicios, maquinaria, caminos adecuados, apoyo técnico agrícola y asistencia en salud y educación en cada uno de los sectores rurales, asegurando que la distancia del centro urbano no sea un impedimento para acceder al progreso.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">3. Transparencia, Probidad y Probidad Institucional</h3>
                            <p style="margin: 0;">La confianza de la comunidad es el activo más valioso de la gestión pública. En estricto cumplimiento con la normativa vigente y los estándares de Ley de Transparencia 20.285, garantizamos el acceso libre a la información municipal, la correcta ejecución presupuestaria y una rendición de cuentas clara en cada proyecto e iniciativa desarrollada por el municipio.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">4. Protección del Medio Ambiente y Prevención de Riesgos</h3>
                            <p style="margin: 0;">Dada la ubicación geográfica de nuestra comuna y las contingencias climáticas y forestales observadas en la región, la municipalidad fortalece de manera constante sus planes de emergencia, prevención de incendios y gestión de desastres, junto con promover la gestión de residuos, el reciclaje y la conservación del entorno natural y del río Biobío.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">5. Puesta en Valor del Patrimonio y Turismo Local</h3>
                            <p style="margin: 0;">Preservar nuestra memoria histórica, el legado del Fuerte de Santa Juana y las tradiciones criollas es un deber ineludible. Nos comprometemos a difundir el turismo patrimonial, apoyar la artesanía local y dinamizar el comercio comunal mediante ferias, actividades culturales y festivales gastronómicos de arraigo comunal.</p>
                        </div>
                    </div>

                    <h2 class="inst-h2">Compromiso con la Comunidad</h2>
                    <p>Cada funcionario y funcionaria municipal que forma parte de la Ilustre Municipalidad de Santa Juana asume el compromiso ético y profesional de trabajar con dedicación diaria, buscando siempre superar las expectativas de la comunidad y construyendo un entorno más equitativo, seguro y próspero para todas y todos.</p>

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
