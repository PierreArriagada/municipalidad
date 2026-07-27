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

<main id="primary" class="site-main" style="background-color: #f8fafc; padding-bottom: 5rem;">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <!-- Banner Superior Principal -->
            <div class="page-hero" style="background-color: #003399; text-align: center; position: relative; padding: 0;">
                <div style="width: 100%; height: 380px; overflow: hidden; position: relative;">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/Marca-Color-Horizontal-3.png' ); ?>" alt="Municipalidad de Santa Juana" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.75);">
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0, 51, 153, 0.85) 0%, rgba(15, 23, 42, 0.90) 100%);"></div>
                    <div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2; color: white; max-width: 900px; width: 90%;">
                        <span style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; font-weight: 600; color: #93c5fd; margin-bottom: 0.5rem; display: block;">Ilustre Municipalidad de Santa Juana</span>
                        <h1 class="entry-title" style="font-size: 3.2rem; margin: 0; font-weight: 800; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Misión Institucional</h1>
                        <p style="margin-top: 1rem; font-size: 1.25rem; font-weight: 300; line-height: 1.5; opacity: 0.95;">Compromiso permanente con el bienestar, el servicio público eficiente y el desarrollo sostenible de toda nuestra comunidad comunal.</p>
                    </div>
                </div>
                <!-- Ondas decorativas de integración -->
                <svg style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto; z-index: 3;" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal Extenso -->
            <div class="container" style="padding-top: 3.5rem; max-width: 960px;">
                <div class="entry-content" style="background: white; padding: 4rem 4.5rem; border-radius: 12px; box-shadow: 0 4px 25px rgba(0,0,0,0.04); line-height: 1.85; font-size: 1.125rem; color: #334155;">
                    
                    <!-- Declaración Oficial -->
                    <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 2.5rem; border-radius: 10px; margin-bottom: 3rem; text-align: center;">
                        <h2 style="color: #003399; font-size: 1.6rem; font-weight: 700; margin-top: 0; margin-bottom: 1.25rem; text-transform: uppercase; letter-spacing: 1px;">Declaración de Misión Municipal</h2>
                        <p style="font-size: 1.25rem; font-weight: 500; color: #1e293b; line-height: 1.9; margin: 0; font-style: italic;">
                            "La Ilustre Municipalidad de Santa Juana tiene como misión fundamental administrar y promover el desarrollo integral de la comuna, garantizando la prestación de servicios públicos locales con altos estándares de calidad, transparencia, probidad y calidez humana. Orientamos nuestro actuar hacia la satisfacción de las necesidades prioritarias de las familias santajuaninas, resguardando la identidad histórica, fomentando la equidad territorial entre los sectores urbanos y rurales, e impulsando un progreso sostenible y participativo."
                        </p>
                    </div>

                    <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-top: 2.5rem; margin-bottom: 1.25rem;">Propósito y Rol de la Gestión Municipal</h2>
                    <p>Como entidad territorial al servicio de la ciudadanía, la Municipalidad de Santa Juana asume la responsabilidad de ser el principal motor de desarrollo local y el nexo directo entre el Estado y la comunidad. Nuestra labor diaria abarca la planificación urbana y rural, la administración de la infraestructura pública, la asistencia social integral y la promoción de la actividad económica, agrícola y cultural de la zona.</p>
                    <p>En el contexto contemporáneo, asumimos con profundo sentido de urgencia la tarea de modernizar de manera continua nuestros procesos internos y de atención al público. Esto implica no solo incorporar tecnologías accesibles para la realización de trámites en línea, sino también mantener oficinas abiertas y dispuestas al diálogo con cada vecino, dirigente social y organización comunitaria.</p>

                    <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-top: 3rem; margin-bottom: 1.25rem;">Ejes Estratégicos de Nuestra Misión</h2>

                    <div style="margin-top: 2rem; display: flex; flex-direction: column; gap: 2rem;">
                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">1. Atención Social Integral y Cercanía Vecinal</h3>
                            <p style="margin: 0;">Trabajamos incansablemente por llegar a cada hogar de la comuna que requiera apoyo del municipio. A través de la Dirección de Desarrollo Comunitario (DIDECO) y los distintos programas sociales, focalizamos esfuerzos en proteger a las familias más vulnerables, adultos mayores, niños, niñas y personas en situación de discapacidad o emergencia, ofreciendo respuestas oportunas y soluciones reales.</p>
                        </div>

                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">2. Equidad Territorial y Fomento del Sector Rural</h3>
                            <p style="margin: 0;">Santa Juana posee un extenso territorio rural donde habitan campesinos, agricultores y emprendedores de vasta tradición. Nuestra misión exige desplegar servicios, maquinaria, caminos adecuados, apoyo técnico agrícola y asistencia en salud y educación en cada uno de los sectores rurales, asegurando que la distancia del centro urbano no sea un impedimento para acceder al progreso.</p>
                        </div>

                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">3. Transparencia, Probidad y Probidad Institucional</h3>
                            <p style="margin: 0;">La confianza de la comunidad es el activo más valioso de la gestión pública. En estricto cumplimiento con la normativa vigente y los estándares de Ley de Transparencia 20.285, garantizamos el acceso libre a la información municipal, la correcta ejecución presupuestaria y una rendición de cuentas clara en cada proyecto e iniciativa desarrollada por el municipio.</p>
                        </div>

                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">4. Protección del Medio Ambiente y Prevención de Riesgos</h3>
                            <p style="margin: 0;">Dada la ubicación geográfica de nuestra comuna y las contingencias climáticas y forestales observadas en la región, la municipalidad fortalece de manera constante sus planes de emergencia, prevención de incendios y gestión de desastres, junto con promover la gestión de residuos, el reciclaje y la conservación del entorno natural y del río Biobío.</p>
                        </div>

                        <div>
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">5. Puesta en Valor del Patrimonio y Turismo Local</h3>
                            <p style="margin: 0;">Preservar nuestra memoria histórica, el legado del Fuerte de Santa Juana y las tradiciones criollas es un deber ineludible. Nos comprometemos a difundir el turismo patrimonial, apoyar la artesanía local y dinamizar el comercio comunal mediante ferias, actividades culturales y festivales gastronómicos de arraigo comunal.</p>
                        </div>
                    </div>

                    <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-top: 3.5rem; margin-bottom: 1.25rem;">Compromiso con la Comunidad</h2>
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
