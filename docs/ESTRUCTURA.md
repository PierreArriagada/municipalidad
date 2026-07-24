# Documentación de Estructura - Tema WordPress Municipalidad

## Visión General

Sitio web e interfaz institucional desarrollada para la Municipalidad, integrando un diseño responsive moderno, Custom Post Types (Noticias, Proyectos, Emergencias, Beneficios), opciones en la Base de Datos mediante el Customizer y Menús de WordPress, renderizador dinámico de SVGs, y una arquitectura CSS modular 1:1 con las plantillas de WordPress.

---

## Integración con la Base de Datos (BD) y Opciones Editables

Todas las secciones principales son **100% modificables desde el Panel de Administración de WordPress**:

| Sección Visual | Origen de Datos en BD | Método de Gestión en WP Admin | Límites de Seguridad Visual |
|---|---|---|---|
| **Header & Top Bar** | Menús nativos & Customizer | **Apariencia > Menús** / **Personalizar** | `white-space: nowrap`, menú móvil sticky |
| **Noticias Destacadas** | Tabla `wp_posts` (post) | **Entradas > Añadir nueva** | `wp_trim_words(20)` y `object-fit: cover` |
| **Información Municipal** | Tabla `wp_options` | **Apariencia > Personalizar > Enlaces Información** | Iconos SVG `currentColor` #2E7D32 |
| **Banners de Interés** | URLs y Personalizador | **Apariencia > Personalizar** | Aspect ratio 16/9 contenido |
| **Beneficios Vecinos** | CPT `beneficios` | **Beneficios > Añadir nuevo** | Grilla de 4 columnas, `wp_trim_words(15)` |
| **Contactos de Emergencia** | CPT `emergencias` | **Emergencias > Añadir nuevo** | Divisores de línea azul, `max-width: 100%` |
| **Noticias Recientes** | Tabla `wp_posts` (post) | **Entradas > Añadir nueva** | Grid de 3 columnas responsivo |
| **Transparencia Activa** | Tabla `wp_options` & Páginas | **Páginas** / **Personalizar** | Grid de 12 materias fijas de Ley 20.285 |
| **Concejo Municipal** | Personalizador & Iframe | **Personalizar > Redes y Vídeos** | Contenedor responsivo 16:9 y playlist |
| **Proyectos** | CPT `proyectos` | **Proyectos > Añadir nuevo** | Badges "Postulando" / "Aprobado", limit 3 |
| **Enlaces Útiles** | Menú `enlaces-rapidos` en BD | **Apariencia > Menús > Enlaces Rápidos** | **SVG 24px !important** estricto |
| **Contacto** | Tabla `wp_options` | **Personalizar > Contacto Municipal** | Saneamiento `sanitize_text_field` |
| **Footer** | Menús & Customizer | **Apariencia > Menús** / **Personalizar** | Estructura en 5 columnas en escritorio |

---

## Orden Estricto de Secciones (Home Page)

El archivo [`wp-theme-muni/front-page.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/front-page.php) renderiza las secciones en el siguiente orden estricto de diseño:

1. **Navbar & Top Bar** ([`header.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/header.php))
2. **Noticias Destacadas (Hero)** ([`home-hero.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-hero.php))
3. **Información Municipal** ([`home-info.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-info.php))
4. **Banners de Interés** ([`home-banners.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-banners.php))
5. **Centro de Beneficios Vecinos** ([`home-vecinos.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-vecinos.php))
6. **Contactos de Emergencia 24/7** ([`home-emergencias.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-emergencias.php))
7. **Noticias Recientes (Grid)** ([`home-noticias.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-noticias.php))
8. **Transparencia Activa** ([`home-transparencia.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-transparencia.php))
9. **Concejo Municipal** ([`home-concejo.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-concejo.php))
10. **Proyectos Municipales** ([`home-proyectos.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-proyectos.php))
11. **Enlaces Útiles y Servicios** ([`home-enlaces.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-enlaces.php))
12. **Información de Contacto** ([`home-contacto.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/template-parts/home-contacto.php))
13. **Footer** ([`footer.php`](file:///home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/footer.php))

---

*Última actualización: 21 de Julio de 2026*