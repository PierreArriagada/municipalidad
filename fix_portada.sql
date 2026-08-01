-- ============================================================================
-- FIX: Crear página "Inicio" y asignarla como portada
-- ============================================================================
-- Ejecutar en phpMyAdmin de prueba.santajuana.cl
-- ============================================================================

-- Paso 1: Crear la página "Inicio" (si no existe)
INSERT INTO `wp_posts` (
    `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`,
    `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_name`,
    `post_type`, `post_modified`, `post_modified_gmt`, `to_ping`, `pinged`,
    `post_content_filtered`
) VALUES (
    1, NOW(), UTC_TIMESTAMP(), '', 'Inicio',
    '', 'publish', 'closed', 'closed', 'inicio',
    'page', NOW(), UTC_TIMESTAMP(), '', '',
    ''
);

-- Paso 2: Obtener el ID de la página recién creada y asignarla como portada
SET @pagina_inicio_id = LAST_INSERT_ID();

UPDATE `wp_options` SET `option_value` = @pagina_inicio_id WHERE `option_name` = 'page_on_front';

-- Si no existe la opción, crearla
INSERT IGNORE INTO `wp_options` (`option_name`, `option_value`, `autoload`)
VALUES ('page_on_front', @pagina_inicio_id, 'on');

-- Confirmar que show_on_front = 'page'
UPDATE `wp_options` SET `option_value` = 'page' WHERE `option_name` = 'show_on_front';

-- Verificar
SELECT 'Verificación:' AS info;
SELECT option_name, option_value FROM wp_options 
WHERE option_name IN ('show_on_front', 'page_on_front');
SELECT ID, post_title, post_name, post_status FROM wp_posts WHERE post_name = 'inicio';
