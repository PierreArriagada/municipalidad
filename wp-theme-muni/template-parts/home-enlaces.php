<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- ============================================
     ENLACES ÚTILES (Diseño Institucional Limpio y Responsivo)
     ============================================ -->
<section class="enlaces-rapidos">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e( 'Enlaces Útiles', 'muni-santa-juana' ); ?></h2>
        
        <?php if ( has_nav_menu( 'enlaces-rapidos' ) ) : ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'enlaces-rapidos',
                'menu_class'     => 'enlaces-rapidos-grid',
                'container'      => false,
            ) );
            ?>
        <?php else : ?>
            <div class="enlaces-rapidos-grid">
                <!-- 1. Pagos Online -->
                <a href="https://portalpagos.smc.cl/SANTA_JUANA/PV/Login" class="enlace-rapido-card" target="_blank" rel="noopener">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Pagos Online</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <!-- 2. Turismo Comunal -->
                <a href="<?php echo esc_url( home_url( '/turismo/' ) ); ?>" class="enlace-rapido-card">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"></polygon>
                            <line x1="9" y1="3" x2="9" y2="21"></line>
                            <line x1="15" y1="3" x2="15" y2="21"></line>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Turismo Comunal</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <!-- 3. Boletines Municipales -->
                <a href="#" class="enlace-rapido-card">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 22h14a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v4"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <path d="M2 15h10"></path>
                            <path d="M2 18h10"></path>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Boletines Mensuales</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <!-- 4. Trípticos Informativos -->
                <a href="<?php echo esc_url( home_url( '/tripticos/' ) ); ?>" class="enlace-rapido-card">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Trípticos e Informes</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <!-- 5. Proyectos Municipales -->
                <a href="<?php echo esc_url( home_url( '/proyectos/' ) ); ?>" class="enlace-rapido-card">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 22h20"></path>
                            <path d="M12 2v20"></path>
                            <path d="M5 22V9"></path>
                            <path d="M19 22V11"></path>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Proyectos y Obras</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <!-- 6. Ley de Lobby -->
                <a href="https://www.leylobby.gob.cl/instituciones/MU306" class="enlace-rapido-card" target="_blank" rel="noopener noreferrer">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Ley de Lobby</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <!-- 7. Ley 21.146 -->
                <a href="https://www.portaltransparencia.cl/PortalPdT/directorio-de-organismos-regulados/?org=MU306&pagina=34511023" class="enlace-rapido-card" target="_blank" rel="noopener noreferrer">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Ley 21.146</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <!-- 8. Permisos de Circulación -->
                <a href="https://portalpagos.smc.cl/SANTA_JUANA/PV/Login" class="enlace-rapido-card" target="_blank" rel="noopener">
                    <div class="enlace-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m21 8-2 2-1.5-3.7A2 2 0 0 0 15.6 5H8.4a2 2 0 0 0-1.9 1.3L5 10 3 8"></path>
                            <path d="M7 14h.01"></path>
                            <path d="M17 14h.01"></path>
                            <rect width="18" height="8" x="3" y="10" rx="2"></rect>
                            <path d="M5 18v2a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-2"></path>
                            <path d="M14 18v2a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-2"></path>
                        </svg>
                    </div>
                    <div class="enlace-info">
                        <span class="enlace-titulo">Permiso Circulación</span>
                    </div>
                    <div class="enlace-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
