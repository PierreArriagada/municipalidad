-- ==============================================================================
-- SCRIPT PARA ACTUALIZAR ENLACES EN EL CONTENIDO DE LAS NOTICIAS
-- ==============================================================================
-- Este script buscará en el texto de todas tus noticias y reemplazará
-- "https://new.santajuana.cl" por "https://prueba.santajuana.cl".
-- Esto arreglará los enlaces de los PDFs e imágenes que están incrustados.

UPDATE `BpyNWTw_posts`
SET post_content = REPLACE(post_content, 'https://new.santajuana.cl', 'https://prueba.santajuana.cl');

UPDATE `BpyNWTw_posts`
SET guid = REPLACE(guid, 'https://new.santajuana.cl', 'https://prueba.santajuana.cl');
