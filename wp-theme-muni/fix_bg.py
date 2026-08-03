import os

files = [
    'archive.php',
    'single-proyectos.php',
    'page.php',
    'single.php',
    'index.php',
    'archive-concursos.php',
    'archive-turismo.php',
    'archive-anuncios.php',
    'archive-direcciones.php'
]

base_dir = '/home/pierre/Documentos/Muni/muni-desing/wp-theme-muni/'

for file in files:
    path = os.path.join(base_dir, file)
    if os.path.exists(path):
        with open(path, 'r', encoding='utf-8') as f:
            content = f.read()
        
        # Replace the light background color
        new_content = content.replace('background-color: #f8fafc', 'background-color: #eef2f6')
        
        if new_content != content:
            with open(path, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Updated {file}")
