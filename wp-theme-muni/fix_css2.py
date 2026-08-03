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

vecinos = "/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/assets/css/components/vecinos.css"
proyectos = "/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/assets/css/components/proyectos.css"
noticias = "/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/assets/css/components/noticias.css"
global_css = "/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/assets/css/base/global.css"
concejo = "/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/assets/css/components/concejo.css"

replace_in_file(vecinos, """.vecino-featured-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.09);
    border: 1px solid rgba(0, 0, 0, 0.06);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}""", """.vecino-featured-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.09);
    border: 1px solid rgba(0, 0, 0, 0.06);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}""")

replace_in_file(vecinos, """.vecino-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.09);
    border: 1px solid rgba(0, 0, 0, 0.06);
    display: flex;
    flex-direction: column;
    position: relative;
    padding-top: 2rem;
    margin-top: 2rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}""", """.vecino-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.09);
    border: 1px solid rgba(0, 0, 0, 0.06);
    display: flex;
    flex-direction: column;
    position: relative;
    padding-top: 2rem;
    margin-top: 2rem;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}""")

replace_in_file(global_css, """a {
    text-decoration: none;
    color: var(--azul-institucional);
    transition: color 0.3s ease;
}""", """a {
    text-decoration: none;
    color: var(--azul-institucional);
    transition: color 0.3s ease;
}

.stretched-link::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 10;
    content: "";
}""")

replace_in_file(noticias, """.noticia-premium-actions {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}""", """.noticia-premium-actions {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    position: relative;
    z-index: 11;
}""")

replace_in_file(proyectos, """.proyecto-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}

.proyecto-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.25);
}""", """.proyecto-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    border: 1px solid rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    position: relative;
    cursor: pointer;
}

.proyecto-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.18);
}""")

replace_in_file(proyectos, """.proyecto-title a {
    color: var(--texto-principal);
    text-decoration: none;
    transition: color 0.2s ease;
}

.proyecto-title a:hover {
    color: #006633;
}""", """.proyecto-title a {
    color: var(--texto-principal);
    text-decoration: none;
    transition: color 0.2s ease;
}

.proyecto-title a::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 5;
}

.proyecto-title a:hover,
.proyecto-card:hover .proyecto-title a {
    color: #006633;
}""")

replace_in_file(proyectos, """/* Footer de Tarjeta */
.proyecto-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid rgba(0, 0, 0, 0.06);
}

.proyecto-link {
    font-size: 0.9rem;
    font-weight: 700;
    color: #006633;
    text-decoration: none;
    transition: color 0.2s ease;
}

.proyecto-link:hover {
    color: #FF6600;
}

.proyecto-btn {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background-color: #006633;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.25s ease;
}

.proyecto-btn svg {
    width: 16px;
    height: 16px;
    stroke: #ffffff;
}

.proyecto-card:hover .proyecto-btn {
    background-color: #FF6600;
    transform: translateX(3px);
}""", """/* Footer de Tarjeta */
.proyecto-footer {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-top: 1.25rem;
    margin-top: auto;
    border-top: 1px solid rgba(0, 0, 0, 0.06);
    position: relative;
    z-index: 6;
    width: 100%;
}

.proyecto-actions {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    justify-content: flex-end !important;
    gap: 0.75rem !important;
    margin-left: auto !important;
}

.proyecto-link {
    color: #FF6600;
    font-weight: 700;
    font-size: 0.85rem;
    text-decoration: none;
    transition: color 0.3s ease;
}

.proyecto-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    min-width: 32px;
    min-height: 32px;
    background-color: #FF6600;
    color: #ffffff;
    border-radius: 50%;
    transition: all 0.3s ease;
    text-decoration: none;
}

.proyecto-btn svg {
    width: 16px !important;
    height: 16px !important;
    min-width: 16px !important;
    min-height: 16px !important;
    max-width: 16px !important;
    max-height: 16px !important;
    stroke: currentColor !important;
    display: block !important;
    margin: 0 !important;
    padding: 0 !important;
}

.proyecto-card:hover .proyecto-link {
    color: #e65c00;
}

.proyecto-btn:hover,
.proyecto-card:hover .proyecto-btn {
    background-color: #e65c00;
    transform: translateX(3px);
}""")

replace_in_file(concejo, """.playlist-items {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    overflow-y: auto;
    max-height: 400px;
    padding-right: 0.5rem;
}

.playlist-items::-webkit-scrollbar {
    width: 6px;
}

.playlist-items::-webkit-scrollbar-track {
    background: var(--fondo-secundario);
    border-radius: 4px;
}

.playlist-items::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 4px;
}

.playlist-item {""", """.playlist-items {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    overflow-y: auto;
    height: 100%;
    max-height: 500px; /* Incrementado para mostrar más videos */
    padding-right: 0.75rem;
}

.playlist-items::-webkit-scrollbar {
    width: 8px;
}

.playlist-items::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.03);
    border-radius: 8px;
}

.playlist-items::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.15);
    border-radius: 8px;
}

.playlist-items::-webkit-scrollbar-thumb:hover {
    background: rgba(0,0,0,0.25);
}

.playlist-item {""")

replace_in_file(concejo, """.pl-info span {
    font-size: 0.75rem;
    color: var(--texto-secundario);
}

@media (max-width: 900px) {""", """.pl-info span {
    font-size: 0.75rem;
    color: var(--texto-secundario);
}

/* Modificadores de altura para la lista según el aspecto del video */
.concejo-multimedia.aspect-16-9 .playlist-items {
    max-height: 550px;
}

@media (max-width: 900px) {""")

replace_in_file(concejo, """@media (max-width: 900px) {
    .concejo-multimedia {
        grid-template-columns: 1fr;
    }

    .playlist-items {
        max-height: 300px;
    }
}""", """@media (max-width: 900px) {
    .concejo-multimedia {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .playlist-items {
        max-height: 350px;
    }
}""")

