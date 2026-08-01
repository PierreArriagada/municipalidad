<?php
/**
 * Walker personalizado para el menú principal del navbar.
 * Genera el mismo HTML que el fallback hardcoded del header.php,
 * incluyendo la flechita SVG para los dropdowns.
 *
 * @package Muni_Santa_Juana
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Muni_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Inicia un nivel de submenú (<ul class="dropdown-menu">).
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    /**
     * Finaliza un nivel de submenú.
     */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "$indent</ul>\n";
    }

    /**
     * Inicia un elemento del menú (<li>).
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        // Determinar si tiene hijos
        $has_children = in_array( 'menu-item-has-children', $classes, true );

        // Construir clases del <li>
        $li_classes = array( 'nav-item' );
        if ( $has_children ) {
            $li_classes[] = 'dropdown';
        }

        $class_output = implode( ' ', array_filter( $li_classes ) );
        $output .= $indent . '<li class="' . esc_attr( $class_output ) . '">';

        // Construir atributos del <a>
        $atts = array();
        $atts['href'] = ! empty( $item->url ) ? $item->url : '#';

        if ( $depth === 0 ) {
            $atts['class'] = 'nav-link';
            if ( $has_children ) {
                $atts['aria-haspopup'] = 'true';
                $atts['aria-expanded'] = 'false';
            }
        } else {
            $atts['class'] = 'dropdown-link';
        }

        // Si es un enlace externo, agregar target y rel
        if ( ! empty( $item->url ) && strpos( $item->url, home_url() ) !== 0 && $item->url !== '#' ) {
            $atts['target'] = ! empty( $item->target ) ? $item->target : '_blank';
            $atts['rel']    = 'noopener noreferrer';
        }

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $output .= '<a' . $attributes . '>';
        $output .= $title;

        // Agregar flechita SVG para los dropdowns (solo nivel 0)
        if ( $has_children && $depth === 0 ) {
            $output .= '<svg class="dropdown-icon" viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 4px; vertical-align: -3px;"><polyline points="6 9 12 15 18 9"></polyline></svg>';
        }

        $output .= '</a>';
    }

    /**
     * Finaliza un elemento del menú.
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}
