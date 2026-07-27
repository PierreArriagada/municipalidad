<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Template Name: Políticas de Privacidad
 * Plantilla para la página de Políticas de Privacidad y Tratamiento de Datos
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
            <div class="page-hero" style="background-color: #0f172a; text-align: center; position: relative; padding: 4rem 1.5rem;">
                <div class="container" style="position: relative; z-index: 2; color: white; max-width: 900px;">
                    <span style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; font-weight: 600; color: #94a3b8; margin-bottom: 0.5rem; display: block;">Ilustre Municipalidad de Santa Juana</span>
                    <h1 class="entry-title" style="font-size: 3.2rem; margin: 0; font-weight: 800; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Políticas de Privacidad y Uso de Datos</h1>
                    <p style="margin-top: 1rem; font-size: 1.25rem; font-weight: 300; line-height: 1.5; color: #cbd5e1;">Compromiso institucional con la transparencia y protección de datos personales de nuestra comunidad.</p>
                </div>
                <!-- Ondas decorativas -->
                <svg style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto; z-index: 3;" viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48H1440V0C1440 0 1140 48 720 48C300 48 0 0 0 0V48Z" fill="#f8fafc"/></svg>
            </div>

            <!-- Contenido Principal -->
            <div class="container" style="padding-top: 3.5rem; max-width: 960px;">
                <div class="entry-content" style="background: white; padding: 4rem 4.5rem; border-radius: 12px; box-shadow: 0 4px 25px rgba(0,0,0,0.04); line-height: 1.85; font-size: 1.125rem; color: #334155;">
                    
                    <h2 style="color: #0f172a; font-size: 2rem; font-weight: 700; margin-top: 0; margin-bottom: 1.25rem;">1. Objetivo de la Política</h2>
                    <p>La Ilustre Municipalidad de Santa Juana se compromete a resguardar la privacidad y proteger los datos personales de todos los usuarios que acceden a nuestros servicios y plataformas digitales, en estricto cumplimiento con la legislación chilena vigente sobre protección de la vida privada y tratamiento de datos personales.</p>

                    <h2 style="color: #0f172a; font-size: 2rem; font-weight: 700; margin-top: 3rem; margin-bottom: 1.25rem;">2. Recopilación y Uso de Datos (Pagos Online)</h2>
                    <p>Es fundamental informar a la comunidad que <strong>nuestro municipio no almacena, procesa ni recopila datos financieros o personales sensibles de manera directa a través de este sitio web</strong>.</p>
                    <p>Para la gestión y recaudación de los <strong>Pagos de Permisos de Circulación</strong> y otros trámites financieros, utilizamos exclusivamente los servicios de un proveedor externo especializado y regulado: <strong>SMC (Servicios Municipales de Computación)</strong>.</p>
                    <ul style="background: #f1f5f9; padding: 1.5rem 1.5rem 1.5rem 3rem; border-radius: 8px; margin: 1.5rem 0;">
                        <li style="margin-bottom: 0.75rem;">Cuando usted hace clic en "Pagos Online", es redirigido de forma segura a los servidores de SMC.</li>
                        <li style="margin-bottom: 0.75rem;">Toda la información ingresada para completar el pago de su permiso es gestionada exclusivamente bajo las normativas de seguridad y cifrado del proveedor externo.</li>
                        <li>La Municipalidad de Santa Juana no tiene acceso a sus contraseñas bancarias ni números de tarjetas.</li>
                    </ul>

                    <h2 style="color: #0f172a; font-size: 2rem; font-weight: 700; margin-top: 3rem; margin-bottom: 1.25rem;">3. Ejercicio de los Derechos ARCO (Eliminación de Datos)</h2>
                    <p>De acuerdo con la nueva legislación de protección de datos personales en Chile, todo usuario tiene derecho a solicitar el <strong>Acceso, Rectificación, Cancelación u Oposición (ARCO)</strong> de cualquier dato personal mínimo (como correos o consultas) que haya sido enviado a nuestras casillas institucionales.</p>
                    
                    <div style="background-color: #eff6ff; border-left: 4px solid #3b82f6; padding: 2rem; border-radius: 0 8px 8px 0; margin-top: 1.5rem; margin-bottom: 1.5rem;">
                        <h3 style="color: #1e3a8a; font-size: 1.3rem; margin-top: 0; margin-bottom: 1rem;">¿Cómo solicitar la eliminación de sus datos?</h3>
                        <p style="margin-bottom: 1rem;">Si usted desea que eliminemos o modifiquemos cualquier registro de contacto previo que mantenga con la municipalidad, debe enviar una solicitud formal por correo electrónico.</p>
                        <p style="margin-bottom: 0;"><strong>Correo de contacto oficial:</strong> <a href="mailto:transparencia@santajuana.cl" style="color: #2563eb; font-weight: 600; text-decoration: none;">transparencia@santajuana.cl</a> (o al correo dispuesto por la Oficina de Partes).</p>
                    </div>
                    <p>En el correo, indique expresamente su intención de invocar su derecho de eliminación de datos. La entidad municipal responderá y gestionará la destrucción de la información en los plazos que dictamina la ley, garantizando así su derecho al olvido informático.</p>

                    <h2 style="color: #0f172a; font-size: 2rem; font-weight: 700; margin-top: 3rem; margin-bottom: 1.25rem;">4. Modificaciones a esta Política</h2>
                    <p>La Municipalidad de Santa Juana se reserva el derecho de actualizar esta política de privacidad en cualquier momento, con el fin de adaptarla a nuevas exigencias legislativas, jurisprudenciales o decisiones de los entes reguladores de transparencia y protección de datos en Chile.</p>

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
