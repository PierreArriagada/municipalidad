# Instrucciones de Migración — BD Noticias santajuana.cl

## Resumen

Este proceso importa las **81 noticias** de la BD antigua (`juana25_wp.sql`) al sitio `santajuana.cl`, eliminando toda la basura y configurando correctamente el tema `wp-theme-muni`.

---

## Pre-requisitos

- Acceso a phpMyAdmin o línea de comandos MySQL en el servidor
- Archivos necesarios:
  - `juana25_wp.sql` (BD original, NO se modifica)
  - `limpiar_bd_noticias.sql` (script de limpieza)

---

## ⚠️ IMPORTANTE: Haz backup ANTES

```bash
# Si tienes acceso SSH, haz backup de tu BD actual:
mysqldump -u TU_USUARIO -p TU_BASE_DE_DATOS > backup_antes_migracion.sql
```

O desde phpMyAdmin: **Exportar** → seleccionar tu BD → descargar.

---

## Pasos

### Paso 1: Importar la BD original

**Opción A — phpMyAdmin:**
1. Ve a phpMyAdmin
2. Selecciona tu base de datos
3. Ve a la pestaña **Importar**
4. Sube `juana25_wp.sql`
5. Haz clic en **Continuar**

**Opción B — Línea de comandos:**
```bash
mysql -u TU_USUARIO -p TU_BASE_DE_DATOS < juana25_wp.sql
```

### Paso 2: Ejecutar el script de limpieza

**Opción A — phpMyAdmin:**
1. Ve a la pestaña **SQL**
2. Copia y pega TODO el contenido de `limpiar_bd_noticias.sql`
3. Haz clic en **Continuar**

**Opción B — Línea de comandos:**
```bash
mysql -u TU_USUARIO -p TU_BASE_DE_DATOS < limpiar_bd_noticias.sql
```

### Paso 3: Verificaciones post-migración

1. **Regenerar permalinks**: Ve a `Ajustes > Enlaces Permanentes` → clic en **Guardar cambios**
2. **Activar plugins**: Ve a `Plugins` y activa solo los que necesites
3. **Verificar noticias**: Visita la página principal y confirma que las noticias aparecen
4. **Probar "Ver más noticias"**: Haz clic en el botón y verifica que la página de archivo carga correctamente
5. **Verificar URLs**: Asegúrate de que no hay referencias a `new.santajuana.cl` en el contenido

---

## ¿Qué hace el script de limpieza?

| Acción | Detalle |
|--------|---------|
| Renombra tablas | `BpyNWTw_` → `wp_` (12 tablas core) |
| Elimina tablas basura | 45+ tablas de plugins innecesarios |
| Limpia posts | Elimina 625 revisiones, popups, templates |
| Actualiza URLs | 5,350+ URLs de `new.santajuana.cl` → `santajuana.cl` |
| Configura tema | Establece `wp-theme-muni` como tema activo |
| Limpia plugins | Desactiva plugins para evitar errores |
| Limpia taxonomías | Elimina categorías de Elementor/tema viejo |
| Corrige prefijos usuario | `BpyNWTw_capabilities` → `wp_capabilities` |

---

## Solución de problemas

### "Las noticias no aparecen"
- Verifica que los permalinks estén regenerados (Paso 3.1)
- Revisa en `wp_posts` que existan posts con `post_type = 'post'` y `post_status = 'publish'`

### "Error de permisos / acceso denegado"
- Verifica que `wp_options` tenga `siteurl` y `home` = `https://santajuana.cl`

### "Se ven errores de plugins"
- Verifica que `wp_options` con `option_name = 'active_plugins'` tenga el valor `a:0:{}`
- Activa plugins uno por uno desde el panel de WordPress

### "Las imágenes no cargan"
- Los archivos deben existir en `wp-content/uploads/` del servidor
- Las URLs en la BD ya apuntan a `santajuana.cl/wp-content/uploads/...`
- Si las imágenes estaban en `new.santajuana.cl`, necesitas copiar la carpeta `uploads` del servidor viejo
