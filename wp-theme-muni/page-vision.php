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
                        <h1 class="entry-title inst-hero-title">Visión Institucional</h1>
                        <p class="inst-hero-subtitle">Proyección estratégica y mirada al futuro para consolidar una comuna moderna, segura y sostenible.</p>
                    </div>
                </div>
                <!-- Ondas decorativas de integración -->
                <svg class="inst-hero-wave" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal Extenso -->
            <div class="container inst-container">
                <div class="entry-content inst-content-box">
                    
                    <!-- Declaración Oficial de Visión -->
                    <div class="inst-declaration-box">
                        <h2 class="inst-declaration-title">Declaración de Visión Futura</h2>
                        <p class="inst-declaration-quote">
                            "Consolidar a Santa Juana como una comuna referente en la Región del Biobío, caracterizada por una elevada calidad de vida, un desarrollo sostenible e inclusivo y un fuerte sentido de orgullo por sus tradiciones e historia. Aspiramos a ser un territorio interconectado, moderno y seguro, donde la innovación en la gestión pública responda con agilidad a los desafíos de los sectores urbanos y rurales, promoviendo el bienestar de las familias en armonía con nuestro medio ambiente."
                        </p>
                    </div>

                    <h2 class="inst-h2">Hacia Dónde Nos Dirigimos: Desafíos y Perspectivas</h2>
                    <p>La visión de la Ilustre Municipalidad de Santa Juana se proyecta con decisión hacia la construcción de un territorio resiliente, capaz de transformarse positivamente frente a los desafíos demográficos, económicos y ambientales del siglo XXI. Entendemos el futuro no como un acontecimiento lejano, sino como el resultado directo de la planificación seria y participativa que realizamos día a día.</p>
                    <p>Nuestra meta es consolidar un modelo comunal en el que la calidad de los servicios básicos, la salud pública, la educación y la conectividad vial alcancen estándares de excelencia en cada rincón de la comuna, eliminando las brechas históricas que han afectado a las zonas alejadas del radio urbano.</p>

                    <h2 class="inst-h2">Metas y Lineamientos Estratégicos de Desarrollo</h2>

                    <div class="inst-ejes-grid">
                        <div class="inst-eje-item">
                            <h3 class="inst-h3">1. Desarrollo Sostenible y Resiliencia Comunal</h3>
                            <p style="margin: 0;">Proyectamos a Santa Juana como un modelo regional en sustentabilidad ambiental y adaptación al cambio climático. Buscamos implementar infraestructura resiliente, proteger de manera efectiva nuestras cuencas hidrográficas, fomentar la reforestación nativa y contar con sistemas de alerta y respuesta ante emergencias de primer nivel para la seguridad de toda la población.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">2. Modernización Digital y Excelencia en el Servicio</h3>
                            <p style="margin: 0;">Aspiramos a ser un municipio cero papeles y 100% interconectado, donde los vecinos puedan realizar trámites, pagos y solicitudes desde cualquier dispositivo móvil o de manera presencial con tiempos de respuesta mínimos, eliminando la burocracia innecesaria y garantizando un trato digno, empático y profesional.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">3. Integración Urbana-Rural y Conectividad Comunal</h3>
                            <p style="margin: 0;">Visualizamos un territorio donde el desarrollo no se concentre únicamente en la zona urbana. La visión comunal contempla la mejora sustancial de caminos rurales, la extensión de redes de agua potable rural (APR), conectividad digital de alta velocidad en escuelas rurales y el fortalecimiento del transporte público comunal.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">4. Fomento Económico Local, Turismo y Emprendimiento</h3>
                            <p style="margin: 0;">Queremos que Santa Juana sea un polo de atracción turística, gastronómica y cultural en la Provincia de Concepción. Fomentaremos el emprendimiento de nuestras mujeres, jóvenes y agricultores, consolidando marcas locales, circuitos turísticos en el río Biobío y espacios de comercialización justa para nuestros productores.</p>
                        </div>

                        <div class="inst-eje-item">
                            <h3 class="inst-h3">5. Comuna Segura, Saludable y Participativa</h3>
                            <p style="margin: 0;">Visualizamos barrios y sectores rurales seguros, iluminados y equipados con espacios públicos para la práctica del deporte, el esparcimiento y la convivencia familiar. La prevención del delito, el fortalecimiento de la salud primaria rural y la participación ciudadana activa en el presupuesto municipal serán los cimientos de nuestra comunidad.</p>
                        </div>
                    </div>

                    <h2 class="inst-h2">Un Compromiso Compartido hacia el Mañana</h2>
                    <p>Alcanzar esta visión no es tarea de una sola gestión, sino el esfuerzo conjunto de toda la comunidad santajuanina. Invitamos a cada vecino, dirigente social, emprendedor y funcionario a sumar sus capacidades para construir, día a día, la Santa Juana próspera, justa y acogedora que soñamos para las futuras generaciones.</p>

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
