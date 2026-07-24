# Guías de Color - Sitio Web Municipalidad Santa Juana

## Resumen Ejecutivo

Este documento establece las pautas estrictas de uso de color para el sitio web de la Municipio de Santa Juana, basadas exclusivamente en la identidad visual del logo institucional. El incumplimiento de estas guías comprometerá la coherencia visual y la accesibilidad del sitio.

---

## 1. Paleta de Colores Institucional

Los cuatro colores principales se extraen directamente del logo oficial y deben usarse únicamente estos:

| Color | Origen en el Logo | Significado | Uso Principal |
|-------|-------------------|-------------|----------------|
| **Azul Institucional** | Texto "MUNICIPALIDAD DE" | Confianza, seguridad, autoridad | Estructura y navegación |
| **Verde Bosque** | Texto "SANTA JUANA" | Identidad local, naturaleza | Elementos secundarios |
| **Naranja** | Franja "HISTORIA, PROGRESO Y TRADICIONES" | Energía, vitalidad, progreso | Llamados a la acción |
| **Gris Oscuro** | Complemento necesario | Equilibrio y legibilidad | Textos de lectura |

> **REQUISITO:** Los valores hexadecimales exactos deben extraerse del archivo del logo original. No usar colores aproximados. La consistencia depends de valores exactos extraídos digitally.

---

## 2. Regla 60-30-10 - Proporciones Obligatorias

Esta regla es **estrictamente obligatoria** para mantener profesionalismo y evitar saturación visual:

### Distribución de Proporciones

| Proporción | Color | Uso | Ejemplos |
|------------|-------|-----|----------|
| **60%** | Blanco y grises muy claros | Fondos generales | Fondo de página, fondos de tarjetas |
| **30%** | Azul Institucional y Verde Bosque | Estructura visual | Header, Footer, títulos, menús |
| **10%** | Naranja | Énfasis y acción | Botones CTA, alertas, badges |

### Aplicación Estricta

```
✓ CORRECTO: 60% blanco + 30% azul/verde + 10% naranja
✗ INCORRECTO: Más del 10% de naranja en una página
✗ INCORRECTO: Fondos de secciones completas en azul o verde
✗ INCORRECTO: Usar los tres colores por igual (efecto "carnaval")
```

---

## 3. Aplicación por Color -指南 Estrictas

### 3.1 Azul Institucional

**USAR ✓:**
- Barra de navegación principal (Header)
- Pie de página (Footer) — usar versión más oscura
- Títulos principales (H1, H2)
- Enlaces de navegación principales
- Bordes decorativos institucionales
- Fondo del Header (opcional: blanco con texto azul)

**NO USAR ✗:**
- Fondos de secciones completas
- Cuerpo de texto de más de una línea
- Botones de acción primaria
- Fondos de tarjetas de contenido
- Textos de noticias o artículos

**Ejemplo de uso correcto:**
```css
.header {
  background-color: var(--azul-institucional);
  color: #FFFFFF;
}

h1, h2 {
  color: var(--azul-institucional);
}
```

### 3.2 Verde Bosque

**USAR ✓:**
- Iconos representativos de servicios (Salud, Educación, Tránsito, Seguridad)
- Subtítulos y secciones terciarias
- Efectos hover en enlaces (cambio de azul a verde)
- Elementos decorativos de identidad local
- Badges o etiquetas informativas
- Iconos junto a títulos de servicios

**NO USAR ✗:**
- Fondos de botones primarios
- Textos de más de una palabra como título
- Como color principal del Header
- Fondos de secciones
- Títulos de noticias o artículos

**Ejemplo de uso correcto:**
```css
.servicio-icono {
  color: var(--verde-bosque);
}

a:hover {
  color: var(--verde-bosque);
}
```

### 3.3 Naranja - Color de Énfasis

**USAR ✓ (exclusivamente):**
- Botones de trámites (Call to Action)
- Enlaces a portales específicos:
  - "Pagar Permiso de Circulación"
  - "Portal de Transparencia"
  - "Trámites en Línea"
  - "Reserva de Hora"
- Alertas y avisos urgentes
- Campañas de vacunación
- Avisos de cortes de calle
- Indicadores de contenido "nuevo" o "destacado"
- Badges de estado

**NO USAR ✗:**
- Como fondo general de página
- Como fondo de secciones
- En elementos que no requieren acción del usuario
- En textos de más de 2-3 palabras
- En elementos decorativos
- En el Header o Footer como color de fondo
- En más del 10% de los elementos de una página

**Ejemplo de uso correcto:**
```css
.boton-cta {
  background-color: var(--naranja);
  color: #FFFFFF;
  padding: 12px 24px;
  border-radius: 4px;
}

.alerta-urgente {
  background-color: var(--naranja);
  color: #FFFFFF;
  padding: 8px 16px;
}
```

### 3.4 Gris Oscuro / Negro

**USAR ✓:**
- Cuerpo de texto (párrafos) — usar #333333 o #444444
- Texto en botones naranjas (siempre blanco o negro sobre naranja)
- Texto en botones azules (siempre blanco)
- Iconos de acción secundaria
- Líneas divisorias
- Texto de fecha, autor, metadata

**NO USAR ✗:**
- Como color de fondo
- Como color de texto sobre fondos claros (usar solo para cuerpos de texto)
- Sobre fondos azules claros (contraste insuficiente)

**Ejemplo de uso correcto:**
```css
p {
  color: #333333;
  line-height: 1.6;
}

.texto-meta {
  color: #666666;
}
```

---

## 4. Restricciones de Contraste - CRÍTICO

### 4.1 Combinaciones Prohibidas

Las siguientes combinaciones están **estrictamente prohibidas** por缺乏 contraste y problemas de accesibilidad:

```
✗ PROHIBIDO: Texto naranja sobre fondo verde
✗ PROHIBIDO: Texto verde sobre fondo naranja
✗ PROHIBIDO: Texto verde sobre fondo azul claro
✗ PROHIBIDO: Texto azul claro sobre fondo verde
✗ PROHIBIDO: Texto blanco sobre fondo naranja claro
✗ PROHIBIDO: Texto gris claro sobre fondo blanco
```

### 4.2 Combinaciones Permitidas

```
✓ PERMITIDO: Texto blanco sobre fondo azul institucional
✓ PERMITIDO: Texto blanco sobre fondo naranja
✓ PERMITIDO: Texto gris oscuro (#333333) sobre fondo blanco
✓ PERMITIDO: Texto blanco sobre fondo azul oscuro (Footer)
✓ PERMITIDO: Texto azul sobre fondo blanco
✓ PERMITIDO: Texto verde sobre fondo blanco
✓ PERMITIDO: Texto naranja sobre fondo blanco
```

---

## 5. Restricciones Generales - OBLIGATORIAS

### 5.1 Fondos

```
✓ HACER: Usar fondo blanco (#FFFFFF) o gris muy claro (#F9F9F9)
✗ NO HACER: Usar colores saturados como fondo general
✗ NO HACER: Usar gradientes de colores en fondos
✗ NO HACER: Usar imágenes de fondo con colores saturados
```

### 5.2 Cuerpo de Texto

```
✓ HACER: Usar gris oscuro (#333333) para párrafos
✗ NO HACER: Usar azul para textos largos
✗ NO HACER: Usar verde para textos de lectura
✗ NO HACER: Usar negro puro (#000000) - es muy agresivo
✗ NO HACER: Usar naranja para cuerpos de texto
```

### 5.3 Distribución de Color por Sección

```
✓ HACER: Máximo 3 colores por sección pequeña
✓ HACER: Mantener proporción 60-30-10 a nivel de página
✗ NO HACER: Usar más de 4 colores en total en una página
✗ NO HACER: Mezclar todos los colores por igual
```

---

## 6. Estructura Visual de Referencia

```
┌─────────────────────────────────────────────────────────┐
│  [Logo]   Inicio  Servicios  Trámites  Contacto        │  ← Header: FONDO AZUL o BLANCO + TEXTO AZUL
├─────────────────────────────────────────────────────────┤
│                                                         │
│  ┌──────────────────────���─��────────────────────────┐  │
│  │           NOTICIAS DESTACADAS                    │  │  ← TÍTULO H1: AZUL INSTITUCIONAL
│  └─────────────────────────────────────────────────┘  │
│                                                         │
│  ┌──────────────┐ ┌──────────────┐ ┌──────────────┐    │
│  │   Noticia    │ │   Noticia    │ │   Noticia    │    │
│  │   Título    │ │   Título    │ │   Título    │    │
│  │   Resumen   │ │   Resumen   │ │   Resumen   │    │  ← TEXTO: GRIS OSCURO (#333333)
│  │   Fecha     │ │   Fecha     │ │   Fecha     │    │
│  └──────────────┘ └──────────────┘ └──────────────┘    │
│                                                         │
│  ┌─────────────────────────────────────────────────┐  │
│  │     🏥 TRÁMITES MUNICIPALES                   │  │  ← SUBTÍTULO: VERDE BOSQUE
│  │                                                 │  │
│  │  ┌─────────────────┐  ┌─────────────────┐    │  │
│  │  │ Pagar Permiso   │  │ Portal          │    │  │  ← BOTONES: NARANJA con texto BLANCO
│  │  │ de Circulación → │  │ Transparencia → │    │  │
│  │  └─────────────────┘  └─────────────────┘    │  │
│  └─────────────────────────────────────────────────┘  │
│                                                         │
├─────────────────────────────────────────────────────────┤
│  │  Municipio de Santa Juana - Todos los derechos  │  │  ← Footer: FONDO AZUL OSCURO + TEXTO BLANCO
│  │  reservados © 2026                              │  │
└─────────────────────────────────────────────────────────┘
```

### Distribución de colores en el ejemplo:

- **60%** → Fondo blanco (página completa)
- **30%** → Azul (Header, Footer, título H1)
- **10%** → Naranja (2 botones CTA) + Verde (1 icono)

---

## 7. Valores de Referencia - EXTRAER DEL LOGO

> **IMPORTANTE:** Los siguientes valores son referenciales. Deben confirmarse y ajustarse según los valores exactos extraídos del archivo del logo original.

### 7.1 CSS - Definiciones Obligatorias

```css
:root {
  /* Colores del logo - EXTRAER del archivo original */
  --azul-institucional: #0D47A1;    /* Reemplazar con valor exacto */
  --verde-bosque: #1B5E20;          /* Reemplazar con valor exacto */
  --naranja: #E65100;                /* Reemplazar con valor exacto */
  
  /* Colores complementarios */
  --gris-oscuro: #333333;
  --gris-medio: #666666;
  --gris-claro: #999999;
  
  /* Fondos */
  --fondo-principal: #FFFFFF;
  --fondo-secundario: #F9F9F9;
  --fondo-footer: #0A3A8C;   /* Azul más oscuro para Footer */
  
  /* Texto */
  --texto-principal: #333333;
  --texto-secundario: #666666;
  --texto-inverso: #FFFFFF;
  
  /* Estados hover */
  --hover-azul: #1565C0;     /* Azul más claro */
  --hover-verde: #2E7D32;     /* Verde más claro */
  --hover-naranja: #FF6D00;   /* Naranja más brillante */
}
```

---

## 8. Checklist de Verificación - REVISAR ANTES DE PUBLICAR

Antes de publicar cualquier página, verificar absolutamenteTODOS los siguientes puntos:

### Colores de Fondo
- [ ] El fondo general es blanco (#FFFFFF) o gris muy claro (#F9F9F9)
- [ ] No hay fondos de colores saturados (azul, verde, naranja)

### Aplicación de Colores
- [ ] Los títulos principales (H1, H2) son azules
- [ ] Los botones de acción principal son naranjas
- [ ] Los iconos de servicios son verdes
- [ ] El cuerpo de texto es gris oscuro (#333333), NO azul, NO verde

### Contraste y Accesibilidad
- [ ] Hay contraste suficiente entre texto y fondo (WCAG AA mínimo - 4.5:1)
- [ ] NO hay texto naranja sobre fondo verde
- [ ] NO hay texto verde sobre fondo naranja
- [ ] Los botones naranjas tienen texto blanco o negro

### Proporción
- [ ] La distribución de colores sigue la regla 60-30-10
- [ ] No hay más del 10% de naranja en la página
- [ ] No hay más de 3 colores principales por sección

---

## 9. Resumen de Referencia Rápida

| Elemento | Color Obligatorio |
|----------|------------------|
| Fondo de página | Blanco (#FFFFFF) |
| Fondo secundario | Gris muy claro (#F9F9F9) |
| Header | Azul Institucional |
| Footer | Azul oscuro |
| Títulos (H1, H2) | Azul Institucional |
| Subtítulos | Verde Bosque |
| Cuerpo de texto | Gris Oscuro (#333333) |
| Metadata | Gris Medio (#666666) |
| Botones de trámite | Naranja |
| Iconos de servicios | Verde Bosque |
| Efectos hover | Verde Bosque |
| Enlaces | Azul Institucional |

---

*Documento elaborado basado en la identidad visual del logo de la Municipio de Santa Juana. Estas guías son de cumplimiento obligatorio para mantener coherencia visual y accesibilidad.*