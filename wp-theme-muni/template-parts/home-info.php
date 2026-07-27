<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- ============================================
         INFORMACIÓN MUNICIPAL
         ============================================ -->
    <section class="info-municipal">
        <div class="container">
            <div class="info-grid">
                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_solicitud', 'https://www.portaltransparencia.cl/PortalPdT/ingreso-sai-v2?idOrgTa=MU306' ) ); ?>" class="info-card" target="_blank" rel="noopener noreferrer">
                    <div class="info-icon">
                        <?php echo muni_render_svg( 'info-ley20285-solicitud' ); ?>
                    </div>
                    <span class="info-titulo"><?php echo wp_kses_post( get_theme_mod( 'muni_titulo_solicitud', 'Ley 20.285<br>Solicitud de Información' ) ); ?></span>
                </a>

                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_transparencia', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306' ) ); ?>" class="info-card" target="_blank" rel="noopener noreferrer">
                    <div class="info-icon">
                        <?php echo muni_render_svg( 'info-ley20285-transparencia' ); ?>
                    </div>
                    <span class="info-titulo"><?php echo wp_kses_post( get_theme_mod( 'muni_titulo_transparencia', 'Ley 20.285<br>Transparencia Activa' ) ); ?></span>
                </a>

                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_juntas', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023' ) ); ?>" class="info-card" target="_blank" rel="noopener noreferrer">
                    <div class="info-icon">
                        <?php echo muni_render_svg( 'info-ley21146-juntas' ); ?>
                    </div>
                    <span class="info-titulo"><?php echo wp_kses_post( get_theme_mod( 'muni_titulo_juntas', 'Ley 21.146<br>Juntas de Vecinos' ) ); ?></span>
                </a>

                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_concejo', '#concejo' ) ); ?>" class="info-card">
                    <div class="info-icon">
                        <?php echo muni_render_svg( 'info-concejo' ); ?>
                    </div>
                    <span class="info-titulo"><?php echo wp_kses_post( get_theme_mod( 'muni_titulo_concejo', 'Concejo<br>Municipal' ) ); ?></span>
                </a>

                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_cuenta', 'https://transparenciasantajuana.cl/owncloud/index.php/s/1BE1rqMdG8U6dJq' ) ); ?>" class="info-card" target="_blank" rel="noopener noreferrer">
                    <div class="info-icon">
                        <?php echo muni_render_svg( 'info-cuenta' ); ?>
                    </div>
                    <span class="info-titulo"><?php echo wp_kses_post( get_theme_mod( 'muni_titulo_cuenta', 'Cuenta<br>Pública' ) ); ?></span>
                </a>

                <a href="<?php echo esc_url( get_theme_mod( 'muni_link_pladetur', 'https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306' ) ); ?>" class="info-card" target="_blank" rel="noopener noreferrer">
                    <div class="info-icon">
                        <?php echo muni_render_svg( 'info-pladetur' ); ?>
                    </div>
                    <span class="info-titulo"><?php echo wp_kses_post( get_theme_mod( 'muni_titulo_pladetur', 'PLADETUR' ) ); ?></span>
                </a>
            </div>
        </div>

        <!-- Wave & Silhouette divider -->
        <div class="info-municipal-wave">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/wave.png" alt="Paisaje Santa Juana" class="wave-image">
        </div>
    </section>
