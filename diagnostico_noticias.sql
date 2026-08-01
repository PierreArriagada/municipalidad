-- ============================================================================
-- DIAGNÓSTICO: ¿Por qué solo aparece 1 noticia?
-- Ejecuta cada bloque por separado en phpMyAdmin y envíame los resultados
-- ============================================================================

-- 1. ¿Cuál es la categoría por defecto? (¿Es "Noticias"?)
SELECT o.option_value AS default_category_id, t.name AS categoria_nombre
FROM wp_options o
LEFT JOIN wp_terms t ON o.option_value = t.term_id
WHERE o.option_name = 'default_category';

-- 2. ¿Qué categorías existen?
SELECT t.term_id, t.name, t.slug, tt.taxonomy, tt.count
FROM wp_terms t
INNER JOIN wp_term_taxonomy tt ON t.term_id = tt.term_id
WHERE tt.taxonomy = 'category';

-- 3. ¿Cuántos posts publicados hay y en qué categorías están?
SELECT t.name AS categoria, COUNT(*) AS total_posts
FROM wp_posts p
INNER JOIN wp_term_relationships tr ON p.ID = tr.object_id
INNER JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
WHERE p.post_type = 'post' AND p.post_status = 'publish' AND tt.taxonomy = 'category'
GROUP BY t.name;

-- 4. ¿Hay posts SIN ninguna categoría asignada?
SELECT p.ID, p.post_title, p.post_date
FROM wp_posts p
WHERE p.post_type = 'post' AND p.post_status = 'publish'
AND p.ID NOT IN (
    SELECT tr.object_id FROM wp_term_relationships tr
    INNER JOIN wp_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
    WHERE tt.taxonomy = 'category'
);

-- 5. ¿Qué valor tiene show_on_front?
SELECT option_name, option_value FROM wp_options WHERE option_name IN ('show_on_front', 'page_for_posts', 'page_on_front', 'default_category', 'posts_per_page');
