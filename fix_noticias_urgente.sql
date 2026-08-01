-- ============================================================================
-- FIX URGENTE: Corregir bug "Ver más noticias" muestra solo 1 noticia
-- ============================================================================
-- Ejecutar este script en phpMyAdmin o por línea de comandos
-- sobre la BD de santajuana.cl AHORA MISMO
-- ============================================================================

-- FIX 1: Configurar portada como página estática
-- Tu tema usa front-page.php, pero la BD dice "mostrar posts en portada"
UPDATE `wp_options` SET `option_value` = 'page' WHERE `option_name` = 'show_on_front';

-- FIX 2: Categoría por defecto = "Noticias" 
-- Para que las noticias nuevas se asignen automáticamente a la categoría correcta
UPDATE `wp_options` SET `option_value` = '1' WHERE `option_name` = 'default_category';

-- FIX 3: Asignar las noticias existentes sin categoría a la categoría "Noticias" (term_taxonomy_id=1)
-- Esto agrega la relación para TODOS los posts publicados que no tienen ninguna categoría asignada
INSERT IGNORE INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`)
SELECT p.ID, 1, 0
FROM `wp_posts` p
WHERE p.post_type = 'post'
  AND p.post_status = 'publish'
  AND p.ID NOT IN (
      SELECT tr.object_id 
      FROM `wp_term_relationships` tr
      INNER JOIN `wp_term_taxonomy` tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
      WHERE tt.taxonomy = 'category'
  );

-- FIX 4: Recalcular el contador de la categoría "Noticias"
UPDATE `wp_term_taxonomy` SET `count` = (
    SELECT COUNT(*) FROM `wp_term_relationships` tr
    INNER JOIN `wp_posts` p ON tr.object_id = p.ID
    WHERE tr.term_taxonomy_id = 1
    AND p.post_status = 'publish'
    AND p.post_type = 'post'
) WHERE `term_taxonomy_id` = 1;

-- Limpiar caché de objetos
DELETE FROM `wp_options` WHERE `option_name` LIKE '_transient_%';
