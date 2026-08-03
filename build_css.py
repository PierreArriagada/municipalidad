import os

base_dir = '/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/assets/css'
files_to_concat = [
    'base/variables.css',
    'base/global.css',
    'components/header.css',
    'components/hero.css',
    'components/info.css',
    'components/banners.css',
    'components/vecinos.css',
    'components/transparencia.css',
    'components/noticias.css',
    'components/concejo.css',
    'components/proyectos.css',
    'components/enlaces.css',
    'components/emergencias.css',
    'components/contacto.css',
    'components/footer.css',
    'components/direcciones.css',
    'components/intranet.css',
    'components/institucional.css',
    'components/anuncios.css'
]

output_content = "/* ==========================================================================\n"
output_content += "   MASTER STYLESHEET - MUNICIPALIDAD THEME (CONSOLIDATED)\n"
output_content += "   ========================================================================== */\n\n"

for file_path in files_to_concat:
    full_path = os.path.join(base_dir, file_path)
    if os.path.exists(full_path):
        with open(full_path, 'r', encoding='utf-8') as f:
            output_content += f"/* --- Source: {file_path} --- */\n"
            output_content += f.read() + "\n\n"
    else:
        print(f"Warning: File not found {full_path}")

main_css_path = os.path.join(base_dir, 'main.css')
with open(main_css_path, 'w', encoding='utf-8') as f:
    f.write(output_content)

print(f"Concatenation complete! Created {main_css_path}")
