-- ============================================================================
-- VERIFICACIÓN POST-MIGRACIÓN: prueba.santajuana.cl
-- ============================================================================
-- Ejecuta este script DESPUÉS de limpiar_bd_prueba.sql
-- Cada consulta debe devolver resultados correctos según el comentario
-- ============================================================================

-- ============================================================================
-- CHECK 1: ¿Existen las 12 tablas core con prefijo wp_?
-- Esperado: 12 filas
-- ============================================================================
SELECT 'CHECK 1: Tablas wp_ existentes' AS test;
SELECT TABLE_NAME FROM information_schema.TABLES 
WHERE TABLE_SCHEMA = DATABASE() 
AND TABLE_NAME LIKE 'wp\_%'
ORDER BY TABLE_NAME;

-- ============================================================================
-- CHECK 2: ¿Quedan tablas BpyNWTw_? 
-- Esperado: 0 filas (todas eliminadas o renombradas)
-- ============================================================================
SELECT 'CHECK 2: Tablas BpyNWTw_ residuales (debe ser 0)' AS test;
SELECT TABLE_NAME FROM information_schema.TABLES 
WHERE TABLE_SCHEMA = DATABASE() 
AND TABLE_NAME LIKE 'BpyNWTw\_%';

-- ============================================================================
-- CHECK 3: ¿siteurl y home apuntan a prueba.santajuana.cl?
-- Esperado: ambos = https://prueba.santajuana.cl
-- ============================================================================
SELECT 'CHECK 3: URLs del sitio' AS test;
SELECT option_name, option_value FROM wp_options 
WHERE option_name IN ('siteurl', 'home');

-- ============================================================================
-- CHECK 4: ¿Tema activo es wp-theme-muni?
-- Esperado: template=wp-theme-muni, stylesheet=wp-theme-muni
-- ============================================================================
SELECT 'CHECK 4: Tema activo' AS test;
SELECT option_name, option_value FROM wp_options 
WHERE option_name IN ('template', 'stylesheet', 'current_theme');

-- ============================================================================
-- CHECK 5: ¿show_on_front = page? (fix bug "Ver más noticias")
-- Esperado: page
-- ============================================================================
SELECT 'CHECK 5: Configuración de portada' AS test;
SELECT option_name, option_value FROM wp_options 
WHERE option_name IN ('show_on_front', 'page_for_posts', 'page_on_front');

-- ============================================================================
-- CHECK 6: ¿default_category = 1 (Noticias)?
-- Esperado: 1
-- ============================================================================
SELECT 'CHECK 6: Categoría por defecto' AS test;
SELECT o.option_value AS default_category_id, t.name AS categoria_nombre
FROM wp_options o
LEFT JOIN wp_terms t ON o.option_value = t.term_id
WHERE o.option_name = 'default_category';

-- ============================================================================
-- CHECK 7: ¿Cuántas noticias publicadas hay por categoría?
-- Esperado: Noticias ~130+, posiblemente Concursos, Eventos
-- ============================================================================
SELECT 'CHECK 7: Noticias por categoría' AS test;
SELECT t.name AS categoria, tt.count AS conteo_registrado, COUNT(p.ID) AS conteo_real
FROM wp_terms t
INNER JOIN wp_term_taxonomy tt ON t.term_id = tt.term_id
LEFT JOIN wp_term_relationships tr ON tt.term_taxonomy_id = tr.term_taxonomy_id
LEFT JOIN wp_posts p ON tr.object_id = p.ID AND p.post_type = 'post' AND p.post_status = 'publish'
WHERE tt.taxonomy = 'category'
GROUP BY t.term_id, t.name, tt.count;

-- ============================================================================
-- CHECK 8: ¿Hay posts sin categoría asignada?
-- Esperado: 0 filas
-- ============================================================================
SELECT 'CHECK 8: Posts sin categoría (debe ser 0)' AS test;
SELECT p.ID, p.post_title
FROM wp_posts p
WHERE p.post_type = 'post' AND p.post_status = 'publish'
AND p.ID NOT IN (
    SELECT tr.object_id FROM wp_term_relationships tr
    INNER JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
    WHERE tt.taxonomy = 'category'
);

-- ============================================================================
-- CHECK 9: ¿Quedan URLs de new.santajuana.cl?
-- Esperado: 0 en cada consulta
-- ============================================================================
SELECT 'CHECK 9: URLs residuales de new.santajuana.cl' AS test;
SELECT 'posts_content' AS tabla, COUNT(*) AS residuales FROM wp_posts WHERE post_content LIKE '%new.santajuana.cl%'
UNION ALL
SELECT 'posts_guid', COUNT(*) FROM wp_posts WHERE guid LIKE '%new.santajuana.cl%'
UNION ALL
SELECT 'postmeta', COUNT(*) FROM wp_postmeta WHERE meta_value LIKE '%new.santajuana.cl%'
UNION ALL
SELECT 'options', COUNT(*) FROM wp_options WHERE option_value LIKE '%new.santajuana.cl%';

-- ============================================================================
-- CHECK 10: ¿Custom Post Types tienen datos?
-- Esperado: banners=3, direcciones=6, tripticos=1, etc.
-- ============================================================================
SELECT 'CHECK 10: Custom Post Types' AS test;
SELECT post_type, post_status, COUNT(*) AS total 
FROM wp_posts 
WHERE post_type IN ('banners', 'direcciones', 'tripticos', 'turismo', 'reciclaje', 'concursos', 'contactos', 'beneficios', 'anuncios')
GROUP BY post_type, post_status
ORDER BY post_type;

-- ============================================================================
-- CHECK 11: ¿Plugins desactivados?
-- Esperado: a:0:{}
-- ============================================================================
SELECT 'CHECK 11: Plugins activos' AS test;
SELECT option_value FROM wp_options WHERE option_name = 'active_plugins';

-- ============================================================================
-- CHECK 12: ¿Permalinks configurados?
-- Esperado: /%postname%/
-- ============================================================================
SELECT 'CHECK 12: Estructura de permalinks' AS test;
SELECT option_value FROM wp_options WHERE option_name = 'permalink_structure';

-- ============================================================================
-- CHECK 13: ¿Usuarios con prefijo correcto?
-- Esperado: wp_capabilities (NO BpyNWTw_capabilities)
-- ============================================================================
SELECT 'CHECK 13: Prefijo de capabilities de usuarios' AS test;
SELECT DISTINCT meta_key FROM wp_usermeta 
WHERE meta_key LIKE '%capabilities%' OR meta_key LIKE '%user_level%';

-- ============================================================================
-- RESUMEN RÁPIDO
-- ============================================================================
SELECT 'RESUMEN' AS test;
SELECT 
    (SELECT COUNT(*) FROM wp_posts WHERE post_type='post' AND post_status='publish') AS noticias_publicadas,
    (SELECT COUNT(*) FROM wp_posts WHERE post_type='page' AND post_status='publish') AS paginas,
    (SELECT COUNT(*) FROM wp_posts WHERE post_type='attachment') AS adjuntos,
    (SELECT option_value FROM wp_options WHERE option_name='siteurl') AS url_sitio,
    (SELECT option_value FROM wp_options WHERE option_name='template') AS tema_activo,
    (SELECT option_value FROM wp_options WHERE option_name='show_on_front') AS portada_config;
