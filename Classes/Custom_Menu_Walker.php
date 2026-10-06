<?php

class Custom_Menu_Walker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", ($depth)) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if ($args && isset($args->walker)) {
            $walker_args = $args;
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = $args && property_exists($args, 'item_id_prefix') ? $args->item_id_prefix . $item->ID : 'menu-item-' . $item->ID;
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';

        $item_output = $args->before ?? '';
        $item_output .= '<a href="' . esc_url($item->url) . '"';

        // Build link classes including WordPress current item classes
        $link_classes = array();

        // Preserve existing link classes from the menu item
        if (!empty($item->classes)) {
            foreach ($item->classes as $class) {
                if (strpos($class, 'current-menu-') === 0 || strpos($class, 'current-') === 0) {
                    $link_classes[] = $class;
                }
            }
        }

        // Add 'active' class if this is a current menu item
        if (!empty($item->classes) && in_array('current-menu-item', $item->classes)) {
            $link_classes[] = 'active';
        }

        // Add custom link_class if provided
        if ($args && isset($args->link_class) && $args->link_class) {
            $link_classes[] = $args->link_class;
        }

        if (!empty($link_classes)) {
            $item_output .= ' class="' . esc_attr(join(' ', $link_classes)) . '"';
        }

        $item_output .= '>';
        $item_output .= $args->link_before ?? '';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= $args->link_after ?? '';
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
