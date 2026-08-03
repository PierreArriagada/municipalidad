def replace_in_file(filepath, old, new):
    with open(filepath, 'r') as f:
        content = f.read()
    if old in content:
        content = content.replace(old, new)
        with open(filepath, 'w') as f:
            f.write(content)
        print(f"Patched {filepath}")
    else:
        print(f"Could not find target in {filepath}")

anuncios = "/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/assets/css/components/anuncios.css"

replace_in_file(anuncios, """/* Controles de navegación */
.anuncio-hero-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.anuncio-hero-control:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-50%) scale(1.05);
}

.anuncio-hero-control:active {
    transform: translateY(-50%) scale(0.95);
}""", """/* Controles de navegación */
.anuncio-hero-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background: #ffffff;
    border: none;
    color: var(--azul-institucional, #0549BD);
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
}

.anuncio-hero-control:hover {
    background: #ffffff;
    color: #03348b;
    transform: translateY(-50%) scale(1.08);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
}

.anuncio-hero-control:active {
    transform: translateY(-50%) scale(0.95);
}""")

replace_in_file(anuncios, """.anuncio-hero-bg {
    width: 100%;
    height: 400px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: transform 0.5s ease;
    position: relative; /* Para posicionar el contenido hijo */
}

@media (min-width: 768px) {
    .anuncio-hero-bg {
        height: 500px; /* Más grande en desktop */
    }
}

@media (min-width: 1200px) {
    .anuncio-hero-bg {
        height: 600px; /* Pantalla completa en pantallas grandes */
    }
}

.anuncio-hero-link:hover .anuncio-hero-bg {
    transform: scale(1.02);
}

/* Nuevo contenedor de contenido para título sobre imagen */
.anuncio-hero-content {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 2rem 2rem 4rem 2rem; /* Más padding inferior por los dots del carrusel */
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0) 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
}""", """.anuncio-hero-bg {
    width: 100%;
    height: 400px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: transform 0.5s ease;
    position: relative;
    overflow: hidden;
}

/* Efecto de fondo desenfocado para llenar los lados vacíos en imágenes verticales */
.anuncio-hero-bg::before {
    content: '';
    position: absolute;
    top: -5%;
    left: -5%;
    width: 110%;
    height: 110%;
    background: inherit;
    filter: blur(25px) brightness(0.6);
    z-index: 1;
}

/* Contenedor de la imagen real sin recortes (contain) */
.anuncio-hero-image-contain {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    z-index: 2;
}

@media (min-width: 768px) {
    .anuncio-hero-bg {
        height: 500px; /* Más grande en desktop */
    }
}

@media (min-width: 1200px) {
    .anuncio-hero-bg {
        height: 600px; /* Pantalla completa en pantallas grandes */
    }
}

.anuncio-hero-link:hover .anuncio-hero-bg {
    transform: scale(1.02);
}

/* Nuevo contenedor de contenido para título sobre imagen */
.anuncio-hero-content {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 2rem 2rem 4rem 2rem; /* Más padding inferior por los dots del carrusel */
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0) 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    z-index: 3;
}""")

replace_in_file(anuncios, """    max-height: 80vh;
    object-fit: cover;
}""", """    max-height: 80vh;
    object-fit: contain;
    background-color: #000;
}""")

replace_in_file(anuncios, """.anuncio-hero-section {
    position: relative;
    width: 100%;
    background-color: #0549BD; /* Azul institucional exacto de la sección Hero */
    padding: 2rem 0 1rem 0; /* Espaciado superior e inferior para integrarse perfectamente */
}""", """.anuncio-hero-section {
    position: relative;
    width: 100%;
    background-color: #0549BD; /* Azul institucional exacto de la sección Hero */
    padding: 2rem 0 1rem 0; /* Espaciado superior e inferior para integrarse perfectamente */
    margin-bottom: -2px; /* Elimina la línea blanca de gap de subpíxeles */
    z-index: 5;
}""")

print("Done with anuncios.css")
