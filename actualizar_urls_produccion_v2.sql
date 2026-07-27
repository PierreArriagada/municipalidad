UPDATE `wp_posts` SET post_content = REPLACE(post_content, 'https://new.santajuana.cl', 'https://santajuana.cl');
UPDATE `wp_posts` SET post_content = REPLACE(post_content, 'https:\/\/new.santajuana.cl', 'https:\/\/santajuana.cl');
UPDATE `wp_postmeta` SET meta_value = REPLACE(meta_value, 'https://new.santajuana.cl', 'https://santajuana.cl');
UPDATE `wp_postmeta` SET meta_value = REPLACE(meta_value, 'https:\/\/new.santajuana.cl', 'https:\/\/santajuana.cl');

-- Actualizar URL principal del sitio en la tabla options
UPDATE `wp_options` SET option_value = 'https://santajuana.cl' WHERE option_name = 'home' OR option_name = 'siteurl';
