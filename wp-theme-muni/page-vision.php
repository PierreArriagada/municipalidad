<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Template Name: Visión Institucional
 * Plantilla para la página de Visión de la Municipalidad de Santa Juana
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
                        <h1 class="entry-title" style="font-size: 3.2rem; margin: 0; font-weight: 800; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Visión Institucional</h1>
                        <p style="margin-top: 1rem; font-size: 1.25rem; font-weight: 300; line-height: 1.5; opacity: 0.95;">Proyección estratégica y mirada al futuro para consolidar una comuna moderna, segura y sostenible.</p>
                    </div>
                </div>
                <!-- Ondas decorativas de integración -->
                <svg style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto; z-index: 3;" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal Extenso -->
            <div class="container" style="padding-top: 3.5rem; max-width: 960px;">
                <div class="entry-content" style="background: white; padding: 4rem 4.5rem; border-radius: 12px; box-shadow: 0 4px 25px rgba(0,0,0,0.04); line-height: 1.85; font-size: 1.125rem; color: #334155;">
                    
                    <!-- Declaración Oficial de Visión -->
                    <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 2.5rem; border-radius: 10px; margin-bottom: 3rem; text-align: center;">
                        <h2 style="color: #003399; font-size: 1.6rem; font-weight: 700; margin-top: 0; margin-bottom: 1.25rem; text-transform: uppercase; letter-spacing: 1px;">Declaración de Visión Futura</h2>
                        <p style="font-size: 1.25rem; font-weight: 500; color: #1e293b; line-height: 1.9; margin: 0; font-style: italic;">
                            "Consolidar a Santa Juana como una comuna referente en la Región del Biobío, caracterizada por una elevada calidad de vida, un desarrollo sostenible e inclusivo y un fuerte sentido de orgullo por sus tradiciones e historia. Aspiramos a ser un territorio interconectado, moderno y seguro, donde la innovación en la gestión pública responda con agilidad a los desafíos de los sectores urbanos y rurales, promoviendo el bienestar de las familias en armonía con nuestro medio ambiente."
                        </p>
                    </div>

                    <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-top: 2.5rem; margin-bottom: 1.25rem;">Hacia Dónde Nos Dirigimos: Desafíos y Perspectivas</h2>
                    <p>La visión de la Ilustre Municipalidad de Santa Juana se proyecta con decisión hacia la construcción de un territorio resiliente, capaz de transformarse positivamente frente a los desafíos demográficos, económicos y ambientales del siglo XXI. Entendemos el futuro no como un acontecimiento lejano, sino como el resultado directo de la planificación seria y participativa que realizamos día a día.</p>
                    <p>Nuestra meta es consolidar un modelo comunal en el que la calidad de los servicios básicos, la salud pública, la educación y la conectividad vial alcancen estándares de excelencia en cada rincón de la comuna, eliminando las brechas históricas que han afectado a las zonas alejadas del radio urbano.</p>

                    <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-top: 3rem; margin-bottom: 1.25rem;">Metas y Lineamientos Estratégicos de Desarrollo</h2>

                    <div style="margin-top: 2rem; display: flex; flex-direction: column; gap: 2rem;">
                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">1. Desarrollo Sostenible y Resiliencia Comunal</h3>
                            <p style="margin: 0;">Proyectamos a Santa Juana como un modelo regional en sustentabilidad ambiental y adaptación al cambio climático. Buscamos implementar infraestructura resiliente, proteger de manera efectiva nuestras cuencas hidrográficas, fomentar la reforestación nativa y contar con sistemas de alerta y respuesta ante emergencias de primer nivel para la seguridad de toda la población.</p>
                        </div>

                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">2. Conectividad e Integración del Mundo Rural</h3>
                            <p style="margin: 0;">Aspiramos a que la totalidad de los sectores rurales cuenten con caminos consolidados, agua potable rural (APR) garantizada, conectividad digital y telefonía móvil de alta velocidad, permitiendo que niños, jóvenes y productores agrícolas gocen de las mismas oportunidades de desarrollo y trabajo sin necesidad de migrar de sus localidades de origen.</p>
                        </div>

                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">3. Modernización Digital y Municipio Inteligente</h3>
                            <p style="margin: 0;">Visualizamos un municipio inteligente e intuitivo, donde los trámites principales puedan ser iniciados y seguidos digitalmente de forma rápida y transparente. La modernización tecnológica estará orientada a simplificar la vida de las personas, reduciendo tiempos de espera y optimizando la atención presencial y remota.</p>
                        </div>

                        <div style="padding-bottom: 1.5rem; border-bottom: 1px solid #f1f5f9;">
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">4. Polo Turístico, Gastronómico y Cultural del Biobío</h3>
                            <p style="margin: 0;">Buscamos posesionar a Santa Juana como uno de los destinos turísticos y culturales más atractivos y visitados de la Región del Biobío. Potenciaremos la infraestructura turística en el Fuerte de Santa Juana, la ribera del río Biobío y las ferias gastronómicas comunales, impulsando el emprendimiento local y generando nuevas fuentes de ingreso para los habitantes.</p>
                        </div>

                        <div>
                            <h3 style="color: #003399; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 0.75rem;">5. Infraestructura Pública y Espacios Comunitarios de Calidad</h3>
                            <p style="margin: 0;">Nos proyectamos con plazas, espacios deportivos, sedes comunitarias y parques infantiles modernos, seguros y bien mantenidos en los barrios y sectores rurales, propiciando el encuentro familiar, la práctica del deporte y el fortalecimiento de las organizaciones comunitarias.</p>
                        </div>
                    </div>

                    <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-top: 3.5rem; margin-bottom: 1.25rem;">Construyendo el Futuro Juntos</h2>
                    <p>Esta visión estratégica se construye con el aporte diario de cada vecino, dirigencia social, trabajador y funcionario de nuestra comuna. Con trabajo coordinado, vocación de servicio y un profundo cariño por nuestra tierra, avanzamos firmes hacia el Santa Juana del futuro.</p>

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
