<?php
/**
 * Plantilla de Error 404 (Página no encontrada)
 *
 * @package Muni_Santa_Juana
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<main id="primary" class="site-main error-404-section">
    <div class="container">
        <div class="error-404-card">
            <!-- Insignia / Ícono Visual 404 -->
            <div class="error-404-badge">
                <span class="error-number">404</span>
            </div>

            <h1 class="error-404-title"><?php esc_html_e( '¡Ups! Página no encontrada', 'muni-santa-juana' ); ?></h1>
            <p class="error-404-description">
                <?php esc_html_e( 'Lo sentimos, la página o recurso que estás buscando no existe, fue trasladada o la dirección ingresada no es correcta.', 'muni-santa-juana' ); ?>
            </p>

            <!-- Buscador para ayudar al vecino -->
            <div class="error-404-search">
                <form role="search" method="get" class="search-form-404" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" class="search-field-404" placeholder="<?php esc_attr_e( '¿Qué estás buscando? (ej: patentes, licencias, noticias)...', 'muni-santa-juana' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required />
                    <button type="submit" class="search-submit-404">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <span><?php esc_html_e( 'Buscar', 'muni-santa-juana' ); ?></span>
                    </button>
                </form>
            </div>

            <!-- Accesos Rápidos -->
            <div class="error-404-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-404-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    <?php esc_html_e( 'Volver al Inicio', 'muni-santa-juana' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/#pagos-online' ) ); ?>" class="btn-404-secondary">
                    <?php esc_html_e( 'Pagos Online y Trámites', 'muni-santa-juana' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/#transparencia' ) ); ?>" class="btn-404-secondary">
                    <?php esc_html_e( 'Portal de Transparencia', 'muni-santa-juana' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="btn-404-secondary">
                    <?php esc_html_e( 'Contacto y Emergencias', 'muni-santa-juana' ); ?>
                </a>
            </div>
        </div>
    </div>
</main>

<style>
.error-404-section {
    padding: 5rem 0;
    background-color: var(--fondo-principal, #f8fafc);
    min-height: 70vh;
    display: flex;
    align-items: center;
}

.error-404-card {
    background: #ffffff;
    border-radius: 24px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(0, 0, 0, 0.06);
    padding: 4rem 2.5rem;
    max-width: 750px;
    margin: 0 auto;
    text-align: center;
}

.error-404-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 110px;
    height: 110px;
    background: linear-gradient(135deg, rgba(5, 73, 189, 0.1) 0%, rgba(255, 102, 0, 0.1) 100%);
    border-radius: 50%;
    margin-bottom: 2rem;
    border: 2px dashed rgba(5, 73, 189, 0.25);
}

.error-number {
    font-size: 2.8rem;
    font-weight: 900;
    color: var(--azul-institucional, #0549BD);
    letter-spacing: -1px;
}

.error-404-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--texto-principal, #1e293b);
    margin: 0 0 1rem 0;
}

.error-404-description {
    font-size: 1.1rem;
    color: var(--texto-secundario, #64748b);
    line-height: 1.6;
    margin: 0 auto 2.5rem auto;
    max-width: 580px;
}

.error-404-search {
    max-width: 540px;
    margin: 0 auto 2.5rem auto;
}

.search-form-404 {
    display: flex;
    gap: 0.5rem;
    background: #f1f5f9;
    padding: 6px;
    border-radius: 50px;
    border: 1.5px solid #cbd5e1;
    transition: border-color 0.3s ease;
}

.search-form-404:focus-within {
    border-color: var(--azul-institucional, #0549BD);
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(5, 73, 189, 0.1);
}

.search-field-404 {
    flex: 1;
    border: none;
    background: transparent;
    padding: 0.75rem 1.25rem;
    font-size: 0.95rem;
    outline: none;
    color: #1e293b;
}

.search-submit-404 {
    background: var(--azul-institucional, #0549BD);
    color: #ffffff;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 40px;
    font-weight: 700;
    font-size: 0.9rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.search-submit-404:hover {
    background: #03348b;
    transform: scale(1.02);
}

.error-404-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1rem;
}

.btn-404-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--azul-institucional, #0549BD);
    color: #ffffff;
    padding: 0.85rem 1.75rem;
    border-radius: 30px;
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(5, 73, 189, 0.25);
}

.btn-404-primary:hover {
    background: #03348b;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(5, 73, 189, 0.35);
}

.btn-404-secondary {
    display: inline-flex;
    align-items: center;
    background: #f1f5f9;
    color: #334155;
    padding: 0.85rem 1.5rem;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
}

.btn-404-secondary:hover {
    background: #e2e8f0;
    color: #0f172a;
    transform: translateY(-2px);
}

@media (max-width: 640px) {
    .error-404-card {
        padding: 2.5rem 1.25rem;
    }
    .error-404-title {
        font-size: 1.75rem;
    }
    .search-form-404 {
        flex-direction: column;
        border-radius: 20px;
    }
    .search-submit-404 {
        justify-content: center;
        width: 100%;
    }
    .error-404-actions {
        flex-direction: column;
    }
    .btn-404-primary, .btn-404-secondary {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?php get_footer(); ?>
