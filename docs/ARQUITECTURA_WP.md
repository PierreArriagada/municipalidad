# Arquitectura y Desarrollo WordPress - Tema Municipalidad

## 1. Visión General Técnica

Este documento define la arquitectura técnica del tema de WordPress `wp-theme-muni`, abarcando la registración de Custom Post Types (CPT), la integración con la Base de Datos (`wp_posts`, `wp_options`, `wp_terms`), el Customizer de WordPress, el sistema dinámico de renderizado de SVGs, el control de assets con Cache-Busting (`filemtime`), y los límites defensivos de diseño en PHP/CSS para evitar roturas de layout.

---

## 2. Gestión de Contenido desde la Base de Datos (BD)

Todo el contenido dinámico del sitio web se administra desde el Panel de Administración de WordPress y se almacena en la base de datos de MySQL:

### A. Custom Post Types (CPTs) - Tabla `wp_posts`
Definidos en `inc/cpt.php`:
1. **`emergencias` (Contactos de Emergencia)**:
   - Administrado mediante CPT `emergencias`.
   - La consulta `WP_Query` en `template-parts/home-emergencias.php` extrae los 4 registros más recientes.
   - El número telefónico y el título se extraen dinámicamente desde la BD con la función `preg_match` de saneamiento.
2. **`proyectos` (Proyectos Municipales)**:
   - Administrado mediante CPT `proyectos`.
   - Permite clasificar estados ("Postulando", "Aprobado") mediante metadatos o taxonomías.
3. **`beneficios` (Convenios Tarjeta Vecino)**:
   - Administrado mediante CPT `beneficios`.
   - Muestra las imágenes, títulos y resúmenes de convenios (Aramco, Kupos, Fonasa).
4. **`post` (Noticias y Publicaciones)**:
   - Administrado como entradas nativas de WordPress.

### B. Opciones del Customizer - Tabla `wp_options`
Definido en `inc/customizer.php`:
- Permite modificar de forma interactiva desde **Apariencia > Personalizar**:
  - **Contacto Municipal**: Teléfono principal, email de Oficina de Partes, dirección física, horario de atención.
  - **Enlaces de Información Municipal**: URLs para Solicitud de Información (Ley 20.285), Transparencia Activa, Juntas de Vecinos (Ley 21.146), Concejo Municipal, Cuenta Pública y PLADETUR.
- En las plantillas PHP, los valores se recuperan dinámicamente con `get_theme_mod( 'clave', 'fallback' )`.

### C. Menús de Navegación Nativos - Tablas `wp_terms` y `wp_term_relationships`
Definidos en `functions.php`:
- **`enlaces-rapidos`**: Menú dinámico administrado en **Apariencia > Menús**.
- La función `muni_add_svg_to_menu()` filtra el renderizado de títulos para inyectar automáticamente el icono vectorial SVG asociado a la clase `svg-nombreicono` agregada desde el panel.

---

## 3. Límites Defensivos para Preservación del Diseño

Para garantizar que el ingreso de textos largos o cambios de contenido en la BD **nunca rompan la grilla visual**, se aplican límites estrictos en dos capas:

### A. Capa de Aplicación (PHP)
- **Recorte seguro de caracteres**: Uso de `wp_trim_words( get_the_excerpt(), $limite, '...' )` en resúmenes de noticias y beneficios.
- **Límite de registros por sección**: Todas las consultas `WP_Query` definen `posts_per_page` explícito (4 emergencias, 3 proyectos, 4 noticias, 3 beneficios).

### B. Capa Visual (CSS)
- **Contención de SVGs**: Todos los vectores SVG poseen contención estricta `!important`:
  ```css
  svg {
      width: 24px !important;
      height: 24px !important;
      max-width: 24px !important;
      max-height: 24px !important;
  }
  ```
- **Control de desbordamiento de texto**:
  ```css
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  ```

---

## 4. Enqueueing Modular y Condicional (`functions.php`)

Para optimizar el rendimiento y evitar transferir CSS innecesario, el tema utiliza una carga de estilos estrictamente modular y condicional:

```php
function muni_santa_juana_scripts() {
    $tpl_uri = get_template_directory_uri();
    $theme_version = '24.0.1';

    // 1. Estilos Base (Variables y Globales)
    wp_enqueue_style( 'muni-variables', $tpl_uri . '/assets/css/base/variables.css', array(), $theme_version );
    wp_enqueue_style( 'muni-global',    $tpl_uri . '/assets/css/base/global.css',    array('muni-variables'), $theme_version );

    // 2. Estilos Transversales (Header, Footer, Info, Enlaces, Banners)
    wp_enqueue_style( 'muni-header',  $tpl_uri . '/assets/css/components/header.css',  array('muni-global'), $theme_version );
    wp_enqueue_style( 'muni-footer',  $tpl_uri . '/assets/css/components/footer.css',  array('muni-global'), $theme_version );
    ...

    // 3. Estilos Condicionales por Página/Template (is_front_page, is_page, is_singular)
    if ( is_front_page() || is_home() ) {
        wp_enqueue_style( 'muni-hero', $tpl_uri . '/assets/css/components/hero.css', array('muni-global'), $theme_version );
        ...
    }
}
add_action( 'wp_enqueue_scripts', 'muni_santa_juana_scripts' );
```

---

## 5. Helper `muni_render_svg`

Inyecta directo el SVG inline ubicado en `assets/svg/`:
- **Limpieza de sufijos**: Elimina automáticamente sufijos numéricos como `-132` o `-4242`.
- **Mapeo de Alias**: Contiene un mapa interno de alias (`carabineros` -> `policia`, `samu` -> `ambulancia`, etc.).

---

*Última actualización: 07 de Agosto de 2026*
