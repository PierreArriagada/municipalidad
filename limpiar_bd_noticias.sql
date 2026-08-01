-- ============================================================================
-- SCRIPT DE LIMPIEZA Y MIGRACIÓN: juana25_wp.sql → santajuana.cl
-- ============================================================================
-- INSTRUCCIONES:
--   1. Importa primero juana25_wp.sql en tu base de datos
--   2. Luego ejecuta este script sobre la MISMA base de datos
--   3. El archivo juana25_wp.sql original NO se modifica
-- ============================================================================
-- Autor: Generado automáticamente
-- Fecha: 2026-07-28
-- Dominio antiguo: new.santajuana.cl (prefijo BpyNWTw_)
-- Dominio nuevo:   santajuana.cl     (prefijo wp_)
-- ============================================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET FOREIGN_KEY_CHECKS = 0;
START TRANSACTION;

-- ============================================================================
-- PASO 1: RENOMBRAR PREFIJO DE TABLAS (BpyNWTw_ → wp_)
-- ============================================================================
-- Tablas core de WordPress que necesitamos conservar

RENAME TABLE `BpyNWTw_commentmeta`          TO `wp_commentmeta`;
RENAME TABLE `BpyNWTw_comments`             TO `wp_comments`;
RENAME TABLE `BpyNWTw_links`                TO `wp_links`;
RENAME TABLE `BpyNWTw_options`              TO `wp_options`;
RENAME TABLE `BpyNWTw_postmeta`             TO `wp_postmeta`;
RENAME TABLE `BpyNWTw_posts`                TO `wp_posts`;
RENAME TABLE `BpyNWTw_termmeta`             TO `wp_termmeta`;
RENAME TABLE `BpyNWTw_term_relationships`   TO `wp_term_relationships`;
RENAME TABLE `BpyNWTw_terms`                TO `wp_terms`;
RENAME TABLE `BpyNWTw_term_taxonomy`        TO `wp_term_taxonomy`;
RENAME TABLE `BpyNWTw_usermeta`             TO `wp_usermeta`;
RENAME TABLE `BpyNWTw_users`                TO `wp_users`;

-- ============================================================================
-- PASO 2: ELIMINAR TABLAS DE PLUGINS INNECESARIOS
-- ============================================================================

-- Action Scheduler (4 tablas)
DROP TABLE IF EXISTS `BpyNWTw_actionscheduler_actions`;
DROP TABLE IF EXISTS `BpyNWTw_actionscheduler_claims`;
DROP TABLE IF EXISTS `BpyNWTw_actionscheduler_groups`;
DROP TABLE IF EXISTS `BpyNWTw_actionscheduler_logs`;

-- AYS Poll - plugin de encuestas (5 tablas)
DROP TABLE IF EXISTS `BpyNWTw_ayspoll_answers`;
DROP TABLE IF EXISTS `BpyNWTw_ayspoll_categories`;
DROP TABLE IF EXISTS `BpyNWTw_ayspoll_polls`;
DROP TABLE IF EXISTS `BpyNWTw_ayspoll_reports`;
DROP TABLE IF EXISTS `BpyNWTw_ayspoll_settings`;

-- Complianz - cookies/GDPR (3 tablas)
DROP TABLE IF EXISTS `BpyNWTw_cmplz_cookiebanners`;
DROP TABLE IF EXISTS `BpyNWTw_cmplz_cookies`;
DROP TABLE IF EXISTS `BpyNWTw_cmplz_dnsmpd`;
DROP TABLE IF EXISTS `BpyNWTw_cmplz_services`;

-- Essential Blocks (1 tabla)
DROP TABLE IF EXISTS `BpyNWTw_eb_form_settings`;

-- Elementor submissions (5 tablas)
DROP TABLE IF EXISTS `BpyNWTw_e_events`;
DROP TABLE IF EXISTS `BpyNWTw_e_notes`;
DROP TABLE IF EXISTS `BpyNWTw_e_notes_users_relations`;
DROP TABLE IF EXISTS `BpyNWTw_e_submissions`;
DROP TABLE IF EXISTS `BpyNWTw_e_submissions_actions_log`;
DROP TABLE IF EXISTS `BpyNWTw_e_submissions_values`;

-- Live Weather Station (12 tablas)
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_background_process`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_datas`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_datas_day`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_datas_year`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_data_year`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_log`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_maps`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_medias`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_module_detail`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_notifications`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_performance_cache`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_performance_cron`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_quota_day`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_quota_year`;
DROP TABLE IF EXISTS `BpyNWTw_live_weather_station_stations`;

-- Popup Maker (3 tablas)
DROP TABLE IF EXISTS `BpyNWTw_pps_countries`;
DROP TABLE IF EXISTS `BpyNWTw_pps_popup`;
DROP TABLE IF EXISTS `BpyNWTw_pps_popup_show_categories`;

-- WPForms (3 tablas)
DROP TABLE IF EXISTS `BpyNWTw_wpforms_logs`;
DROP TABLE IF EXISTS `BpyNWTw_wpforms_payment_meta`;
DROP TABLE IF EXISTS `BpyNWTw_wpforms_payments`;
DROP TABLE IF EXISTS `BpyNWTw_wpforms_tasks_meta`;

-- WP Google Maps (7 tablas)
DROP TABLE IF EXISTS `BpyNWTw_wpgmza`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_admin_notices`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_circles`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_image_overlays`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_maps`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_point_labels`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_polygon`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_polylines`;
DROP TABLE IF EXISTS `BpyNWTw_wpgmza_rectangles`;

-- WP User Frontend (2 tablas)
DROP TABLE IF EXISTS `BpyNWTw_wpuf_subscribers`;
DROP TABLE IF EXISTS `BpyNWTw_wpuf_transaction`;

-- ============================================================================
-- PASO 3: LIMPIAR POSTS — CONSERVAR SOLO NOTICIAS, ADJUNTOS Y PÁGINAS
-- ============================================================================

-- Eliminar todas las revisiones (basura, ~625 registros)
DELETE FROM `wp_posts` WHERE `post_type` = 'revision';

-- Eliminar tipos de post de plugins/tema viejo que no necesitamos
DELETE FROM `wp_posts` WHERE `post_type` IN (
    'popup',
    'popup_theme',
    'elementor_library',
    'elementor_snippet',
    'wp_navigation',
    'wp_template',
    'wp_template_part',
    'wp_global_styles',
    'wpforms',
    'wp_popup',
    'header',
    'footer',
    'wpuf_input',
    'wpuf_forms'
);

-- Eliminar metadatos huérfanos (de posts que ya no existen)
DELETE pm FROM `wp_postmeta` pm
LEFT JOIN `wp_posts` p ON pm.post_id = p.ID
WHERE p.ID IS NULL;

-- Eliminar comentarios huérfanos
DELETE cm FROM `wp_comments` cm
LEFT JOIN `wp_posts` p ON cm.comment_post_ID = p.ID
WHERE p.ID IS NULL;

-- Eliminar comment meta huérfanos
DELETE cmeta FROM `wp_commentmeta` cmeta
LEFT JOIN `wp_comments` c ON cmeta.comment_id = c.comment_ID
WHERE c.comment_ID IS NULL;

-- ============================================================================
-- PASO 4: ACTUALIZAR URLs (new.santajuana.cl → santajuana.cl)
-- ============================================================================

-- Contenido de posts
UPDATE `wp_posts` SET `post_content` = REPLACE(`post_content`, 'https://new.santajuana.cl', 'https://santajuana.cl');
UPDATE `wp_posts` SET `post_content` = REPLACE(`post_content`, 'http://new.santajuana.cl', 'https://santajuana.cl');

-- GUIDs de posts
UPDATE `wp_posts` SET `guid` = REPLACE(`guid`, 'https://new.santajuana.cl', 'https://santajuana.cl');
UPDATE `wp_posts` SET `guid` = REPLACE(`guid`, 'http://new.santajuana.cl', 'https://santajuana.cl');

-- Excerpts
UPDATE `wp_posts` SET `post_excerpt` = REPLACE(`post_excerpt`, 'https://new.santajuana.cl', 'https://santajuana.cl');

-- Post meta (imágenes destacadas, URLs en campos personalizados, etc.)
UPDATE `wp_postmeta` SET `meta_value` = REPLACE(`meta_value`, 'https://new.santajuana.cl', 'https://santajuana.cl');
UPDATE `wp_postmeta` SET `meta_value` = REPLACE(`meta_value`, 'http://new.santajuana.cl', 'https://santajuana.cl');

-- Versiones JSON-escaped (importante para Elementor data, bloques Gutenberg, etc.)
UPDATE `wp_posts` SET `post_content` = REPLACE(`post_content`, 'https:\\/\\/new.santajuana.cl', 'https:\\/\\/santajuana.cl');
UPDATE `wp_postmeta` SET `meta_value` = REPLACE(`meta_value`, 'https:\\/\\/new.santajuana.cl', 'https:\\/\\/santajuana.cl');

-- Opciones (serialized data puede contener URLs)
UPDATE `wp_options` SET `option_value` = REPLACE(`option_value`, 'https://new.santajuana.cl', 'https://santajuana.cl')
WHERE `option_name` NOT IN ('siteurl', 'home');
UPDATE `wp_options` SET `option_value` = REPLACE(`option_value`, 'https:\\/\\/new.santajuana.cl', 'https:\\/\\/santajuana.cl')
WHERE `option_name` NOT IN ('siteurl', 'home');
UPDATE `wp_options` SET `option_value` = REPLACE(`option_value`, 'http://new.santajuana.cl', 'https://santajuana.cl')
WHERE `option_name` NOT IN ('siteurl', 'home');

-- User meta (URLs de perfil, etc.)
UPDATE `wp_usermeta` SET `meta_value` = REPLACE(`meta_value`, 'https://new.santajuana.cl', 'https://santajuana.cl');

-- ============================================================================
-- PASO 5: CONFIGURAR OPCIONES DEL SITIO
-- ============================================================================

-- URLs del sitio (CRÍTICO para evitar redirecciones infinitas)
UPDATE `wp_options` SET `option_value` = 'https://santajuana.cl' WHERE `option_name` = 'siteurl';
UPDATE `wp_options` SET `option_value` = 'https://santajuana.cl' WHERE `option_name` = 'home';

-- Configurar tema wp-theme-muni
UPDATE `wp_options` SET `option_value` = 'wp-theme-muni' WHERE `option_name` = 'template';
UPDATE `wp_options` SET `option_value` = 'wp-theme-muni' WHERE `option_name` = 'stylesheet';
UPDATE `wp_options` SET `option_value` = 'Muni Santa Juana' WHERE `option_name` = 'current_theme';

-- Limpiar plugins activos (dejar array vacío para evitar errores de plugins faltantes)
UPDATE `wp_options` SET `option_value` = 'a:0:{}' WHERE `option_name` = 'active_plugins';

-- Configurar permalinks bonitos (/%postname%/)
UPDATE `wp_options` SET `option_value` = '/%postname%/' WHERE `option_name` = 'permalink_structure';

-- *** FIX BUG "Ver más noticias" & "Portada no carga" ***
-- La BD vieja tiene show_on_front='posts' pero tu tema usa front-page.php como portada.
-- Crear la página "Inicio" (si no existe) y asignarla como portada estática
INSERT INTO `wp_posts` (
    `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`,
    `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_name`,
    `post_type`, `post_modified`, `post_modified_gmt`, `to_ping`, `pinged`,
    `post_content_filtered`
) SELECT 
    1, NOW(), UTC_TIMESTAMP(), '', 'Inicio',
    '', 'publish', 'closed', 'closed', 'inicio',
    'page', NOW(), UTC_TIMESTAMP(), '', '',
    ''
FROM DUAL WHERE NOT EXISTS (SELECT ID FROM `wp_posts` WHERE `post_name` = 'inicio' AND `post_type` = 'page');

UPDATE `wp_options` SET `option_value` = 'page' WHERE `option_name` = 'show_on_front';

-- Asignar la página "Inicio" como page_on_front
INSERT IGNORE INTO `wp_options` (`option_name`, `option_value`, `autoload`)
VALUES ('page_on_front', (SELECT ID FROM `wp_posts` WHERE `post_name` = 'inicio' AND `post_type` = 'page' LIMIT 1), 'on');

UPDATE `wp_options` SET `option_value` = (SELECT ID FROM `wp_posts` WHERE `post_name` = 'inicio' AND `post_type` = 'page' LIMIT 1) WHERE `option_name` = 'page_on_front';

-- Categoría por defecto = "Noticias" (term_id=1)
-- Sin esto, las noticias nuevas creadas desde el editor NO se asignan a la categoría
-- "Noticias" y NO aparecen cuando el usuario visita /category/noticias/
UPDATE `wp_options` SET `option_value` = '1' WHERE `option_name` = 'default_category';

-- Limpiar transients expirados (basura de caché)
DELETE FROM `wp_options` WHERE `option_name` LIKE '_transient_timeout_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE '_transient_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE '_site_transient_timeout_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE '_site_transient_%';

-- Eliminar opciones de plugins que ya no existen
DELETE FROM `wp_options` WHERE `option_name` LIKE 'elementor_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE '_elementor_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'wpforms_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'wpgmza_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'pps_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'cmplz_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'complianz_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'live_weather_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'lws_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'ayspoll_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'ays_poll_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'essential_adons_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'eael_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'essential_blocks_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'premium_addons_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'pa_elements_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'pojo_accessibility_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'wpuf_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'widget_%';
DELETE FROM `wp_options` WHERE `option_name` LIKE 'action_scheduler_%';

-- Eliminar opciones del tema viejo Blockscape
DELETE FROM `wp_options` WHERE `option_name` LIKE 'theme_mods_blockscape%';

-- Limpiar rewrite rules (se regenerarán automáticamente)
UPDATE `wp_options` SET `option_value` = '' WHERE `option_name` = 'rewrite_rules';

-- ============================================================================
-- PASO 6: LIMPIAR TAXONOMÍAS Y RELACIONES HUÉRFANAS
-- ============================================================================

-- Eliminar relaciones de taxonomía que apuntan a posts que ya no existen
DELETE tr FROM `wp_term_relationships` tr
LEFT JOIN `wp_posts` p ON tr.object_id = p.ID
WHERE p.ID IS NULL;

-- Eliminar terms de Elementor, tema viejo, etc. (no son categorías de noticias)
-- Terms a conservar: 1=Noticias, 4=Concursos Públicos, 5=Eventos, 6=Historia
-- Terms a eliminar: 2=blockscape, 3=header, 7=footer, 8=twentytwentytwo,
--                   9=loop-item, 10=landing-page, 11=header(elementor)

-- Primero eliminar relaciones a taxonomías de plugins/temas viejos
DELETE FROM `wp_term_relationships` WHERE `term_taxonomy_id` IN (2, 3, 7, 8, 9, 10, 11);

-- Luego eliminar las taxonomías
DELETE FROM `wp_term_taxonomy` WHERE `term_taxonomy_id` IN (2, 3, 7, 8, 9, 10, 11);

-- Luego eliminar los terms
DELETE FROM `wp_terms` WHERE `term_id` IN (2, 3, 7, 8, 9, 10, 11);

-- Eliminar termmeta huérfanos
DELETE tm FROM `wp_termmeta` tm
LEFT JOIN `wp_terms` t ON tm.term_id = t.term_id
WHERE t.term_id IS NULL;

-- Actualizar contadores de categorías (recalcular cuántos posts tiene cada categoría)
UPDATE `wp_term_taxonomy` tt SET `count` = (
    SELECT COUNT(*) FROM `wp_term_relationships` tr
    INNER JOIN `wp_posts` p ON tr.object_id = p.ID
    WHERE tr.term_taxonomy_id = tt.term_taxonomy_id
    AND p.post_status = 'publish'
    AND p.post_type = 'post'
) WHERE tt.taxonomy = 'category';

-- ============================================================================
-- PASO 7: LIMPIAR METADATA DE USUARIOS (PLUGINS)
-- ============================================================================

-- Eliminar metadata de plugins que ya no existen
DELETE FROM `wp_usermeta` WHERE `meta_key` LIKE '%elementor%';
DELETE FROM `wp_usermeta` WHERE `meta_key` LIKE '%wpforms%';
DELETE FROM `wp_usermeta` WHERE `meta_key` LIKE '%pps_%';
DELETE FROM `wp_usermeta` WHERE `meta_key` LIKE '%cmplz%';
DELETE FROM `wp_usermeta` WHERE `meta_key` LIKE '%wpgmza%';
DELETE FROM `wp_usermeta` WHERE `meta_key` LIKE '%dismissed_wp_pointers%';

-- Limpiar capabilities para que usen el prefijo correcto (wp_ en vez de BpyNWTw_)
UPDATE `wp_usermeta` SET `meta_key` = 'wp_capabilities' WHERE `meta_key` = 'BpyNWTw_capabilities';
UPDATE `wp_usermeta` SET `meta_key` = 'wp_user_level' WHERE `meta_key` = 'BpyNWTw_user_level';
UPDATE `wp_usermeta` SET `meta_key` = 'wp_dashboard_quick_press_last_post_id' WHERE `meta_key` = 'BpyNWTw_dashboard_quick_press_last_post_id';
UPDATE `wp_usermeta` SET `meta_key` = 'wp_user-settings' WHERE `meta_key` = 'BpyNWTw_user-settings';
UPDATE `wp_usermeta` SET `meta_key` = 'wp_user-settings-time' WHERE `meta_key` = 'BpyNWTw_user-settings-time';

-- Actualizar prefijo en opciones que lo referencian internamente
UPDATE `wp_options` SET `option_name` = 'wp_user_roles' WHERE `option_name` = 'BpyNWTw_user_roles';

-- ============================================================================
-- PASO 8: LIMPIAR POSTMETA DE PLUGINS INNECESARIOS
-- ============================================================================

-- Eliminar metadata de Elementor en posts que quedan
DELETE FROM `wp_postmeta` WHERE `meta_key` LIKE '_elementor_%';
DELETE FROM `wp_postmeta` WHERE `meta_key` LIKE '_wp_page_template' AND `meta_value` LIKE 'elementor%';

-- Eliminar metadata de Essential Addons / Premium Addons
DELETE FROM `wp_postmeta` WHERE `meta_key` LIKE '_eael_%';
DELETE FROM `wp_postmeta` WHERE `meta_key` LIKE 'pa_%';

-- Eliminar metadata de popups
DELETE FROM `wp_postmeta` WHERE `meta_key` LIKE '_pps_%';

-- Eliminar metadata de WPForms
DELETE FROM `wp_postmeta` WHERE `meta_key` LIKE 'wpforms_%';

-- ============================================================================
-- FINALIZAR
-- ============================================================================

COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================================
-- NOTAS POST-EJECUCIÓN:
-- ============================================================================
-- 1. Ve a Ajustes > Enlaces Permanentes y haz clic en "Guardar cambios"
--    (esto regenera las rewrite rules)
-- 2. Ve a Plugins y activa solo los que necesites
-- 3. Verifica que las noticias cargan correctamente
-- 4. El botón "Ver más noticias" debería funcionar porque:
--    - Las URLs ya apuntan a santajuana.cl
--    - El tema está configurado como wp-theme-muni
--    - Los permalinks están en /%postname%/
--    - No hay plugins conflictivos cargándose
-- ============================================================================
