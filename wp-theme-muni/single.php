<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * Plantilla para entradas individuales (Noticias)
 *
 * @package Muni_Santa_Juana
 */

get_header();
?>

<style>
    .single-main-container { background-color: #eef2f6; padding: 1rem 0.25rem; }
    .noticia-single-article { background: #ffffff; padding: 0.85rem; border-radius: 12px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01); max-width: 1000px; margin: 0 auto; overflow: hidden; }
    .single-entry-title { font-size: 1.8rem; color: #1e293b; font-weight: 800; line-height: 1.2; margin-bottom: 1rem; text-align: center; }
    .single-entry-meta { color: #64748b; font-size: 0.9rem; margin-bottom: 1.5rem; display: flex; justify-content: center; gap: 1rem; align-items: center; flex-wrap: wrap; }
    .single-post-thumbnail { border-radius: 12px; overflow: hidden; margin: 0 auto 2rem auto; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .single-post-thumbnail img { width: 100%; height: auto; display: block; object-fit: cover; }
    .single-entry-content { line-height: 1.7; font-size: 1.05rem; color: #334155; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; hyphens: auto; }
    .single-entry-content img { max-width: 100%; height: auto; border-radius: 8px; }
    
    @media (min-width: 768px) {
        .single-main-container { padding: 4rem 0; }
        .noticia-single-article { padding: 2rem; border-radius: 20px; }
        .single-entry-title { font-size: 2.5rem; margin-bottom: 1.5rem; }
        .single-entry-meta { font-size: 1rem; gap: 1.5rem; margin-bottom: 2rem; }
        .single-post-thumbnail { border-radius: 16px; margin-bottom: 2.5rem; }
        .single-entry-content { line-height: 1.8; font-size: 1.15rem; }
    }

    /* Lightbox Styles */
    .muni-lightbox-overlay {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.9); z-index: 10000;
        display: none; justify-content: center; align-items: center;
        opacity: 0; transition: opacity 0.3s ease;
    }
    .muni-lightbox-overlay.active { opacity: 1; }
    .muni-lightbox-img {
        max-width: 90%; max-height: 90vh; object-fit: contain;
        border-radius: 8px; box-shadow: 0 5px 25px rgba(0,0,0,0.5);
        transform: scale(0.95); transition: transform 0.3s ease;
    }
    .muni-lightbox-overlay.active .muni-lightbox-img { transform: scale(1); }
    .muni-lightbox-close {
        position: absolute; top: 20px; right: 20px;
        background: rgba(255, 255, 255, 0.2); color: white; border: none;
        border-radius: 50%; width: 44px; height: 44px; font-size: 32px;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; transition: background 0.3s; z-index: 10001;
    }
    .muni-lightbox-close:hover { background: rgba(255, 255, 255, 0.4); }
    
    .single-entry-content img { cursor: zoom-in; transition: filter 0.3s; }
    .single-entry-content img:hover { filter: brightness(0.9); }
    
    .img-zoom-wrapper { position: relative; display: inline-block; max-width: 100%; }
    .img-zoom-btn {
        position: absolute; bottom: 10px; right: 10px;
        background: rgba(0,0,0,0.7); color: white; border: none;
        border-radius: 50%; width: 36px; height: 36px;
        display: flex; align-items: center; justify-content: center;
        cursor: zoom-in; opacity: 0; transition: opacity 0.3s; pointer-events: none;
    }
    .img-zoom-wrapper:hover .img-zoom-btn { opacity: 1; }
    
    @media (max-width: 767px) {
        .img-zoom-btn { opacity: 1; } /* Siempre visible en móviles para indicar la función */
    }
</style>

<main id="primary" class="site-main single-main-container">
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 !important;">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'noticia-single-article' ); ?>>
                <header class="entry-header">
                    <?php
                    the_title( '<h1 class="single-entry-title">', '</h1>' );
                    ?>
                    <div class="single-entry-meta">
                        <span class="posted-on" style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline" style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <?php the_author(); ?>
                        </span>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="single-post-thumbnail">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="single-entry-content">
                    <?php
                    the_content();
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links" style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0;">' . esc_html__( 'Páginas:', 'muni-santa-juana' ),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>

    <!-- Lightbox Overlay -->
    <div id="muni-lightbox" class="muni-lightbox-overlay">
        <button class="muni-lightbox-close" aria-label="Cerrar">&times;</button>
        <img src="" alt="Imagen ampliada" class="muni-lightbox-img">
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const contentImages = document.querySelectorAll('.single-entry-content img');
        if (contentImages.length === 0) return;

        const lightbox = document.getElementById('muni-lightbox');
        const lightboxImg = lightbox.querySelector('.muni-lightbox-img');
        const closeBtn = lightbox.querySelector('.muni-lightbox-close');

        contentImages.forEach(img => {
            // Evitar doble wrapper si hay recargas AJAX o similar
            if (img.parentElement.classList.contains('img-zoom-wrapper')) return;

            const wrapper = document.createElement('div');
            wrapper.className = 'img-zoom-wrapper';
            img.parentNode.insertBefore(wrapper, img);
            wrapper.appendChild(img);

            const zoomBtn = document.createElement('div');
            zoomBtn.className = 'img-zoom-btn';
            zoomBtn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="11" y1="8" x2="11" y2="14"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>';
            wrapper.appendChild(zoomBtn);

            const openLightbox = function(e) {
                e.preventDefault();
                lightboxImg.src = img.src;
                lightbox.style.display = 'flex';
                setTimeout(() => lightbox.classList.add('active'), 10);
                document.body.style.overflow = 'hidden';
            };
            
            img.addEventListener('click', openLightbox);
            zoomBtn.addEventListener('click', openLightbox);
        });

        function closeLightbox() {
            lightbox.classList.remove('active');
            setTimeout(() => {
                lightbox.style.display = 'none';
                lightboxImg.src = '';
            }, 300);
            document.body.style.overflow = '';
        }

        closeBtn.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && lightbox.style.display === 'flex') closeLightbox();
        });
    });
    </script>
</main>

<?php
get_footer();
