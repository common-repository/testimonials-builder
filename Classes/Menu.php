<?php

namespace TestimonialsBuilder\Classes;

class Menu
{
    public static function add()
    {
        add_menu_page(
            __('Testimonial Builder', 'testimonials-builder'),
            __('Testimonial Builder', 'testimonials-builder'),
            static::managePermission(),
            'testimonials-builder',
            array(static::class, 'render'),
            static::getMenuIcon(),
            6
        );
    }

    public static function render()
    {
        wp_enqueue_script(
            'testimonials_builder_admin_app', TESTIMONIALS_BUILDER_DIR_URL.'public/js/testimonials_builder_admin.js',
            array('jquery'),
            TESTIMONIALS_BUILDER_VERSION,
            true
        );

        wp_enqueue_style(
            'testimonials_builder_admin_style', TESTIMONIALS_BUILDER_DIR_URL.'public/css/testimonials_builder_admin.css'
        );

        wp_localize_script(
            'testimonials_builder_admin_app',
            'testimonials_builder_admin_vars',
            array(
                'img_path' => TESTIMONIALS_BUILDER_DIR_URL.'public/images/',
                'i18n'     => array()
            )
        );

        include TESTIMONIALS_BUILDER_DIR.'views/admin_view.php';
    }

    public static function managePermission()
    {
        return apply_filters('testimonials_builder_manager', 'manage_options');
    }

    public static function getMenuIcon()
    {
        return 'data:image/svg+xml;base64,'
            .base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 503.08 505.64"><defs><style>.cls-1,.cls-2{fill:#fff;}.cls-1{opacity:0.5;}</style></defs><title>icon_dashboard</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M482.61,215.36a46.6,46.6,0,0,0-12.24-6L438.68,199q4.9,16.58,11.11,32.77l14.28,37.11,0,.07.32.83a58.4,58.4,0,0,1-33.95,75.3,56.09,56.09,0,0,1-12.43,3.07L303.78,363.74a390,390,0,0,0-54.48,11.44l-55.73,15.93,48.38,15.31a318.9,318.9,0,0,1,42.31,16.8l44.68,21.54c8.13,52.39-11.47,60.88-11.47,60.88a54,54,0,0,0,49.44-42.57l16.6,8.09a45.5,45.5,0,0,0,7.91,3,47.77,47.77,0,0,0,59.91-40.35l6.57-49.52a207.64,207.64,0,0,1,17.81-60.79l22.61-48.23A47.67,47.67,0,0,0,482.61,215.36Z"/><path class="cls-2" d="M170.92,378.86l58.38-16.68a390,390,0,0,1,54.48-11.44l114.27-15.56a56.09,56.09,0,0,0,12.43-3.07,58.4,58.4,0,0,0,33.95-75.3l-.32-.83,0-.07L429.79,218.8A435.26,435.26,0,0,1,401.86,93.17L399.17,55C397.4,29.71,379.88,8.08,355.36,1.83A58.77,58.77,0,0,0,336.44.16a56.29,56.29,0,0,0-12.3,2.38L215.46,35.87a477.55,477.55,0,0,1-71.46,16L49.52,65.61a57,57,0,0,0-16,4.68,58.89,58.89,0,0,0-10.64,6.42C3.81,91.2-4.19,116.07,2.13,139.16L19.31,202a253.94,253.94,0,0,1,8.81,77l-2.4,61c-1,25.62,14.46,49.3,38.61,57.93a58.78,58.78,0,0,0,25.19,3.18,55.64,55.64,0,0,0,10.17-2L121.34,393A66,66,0,0,0,172,454.6S150.2,440.29,170.92,378.86ZM253.14,130l12.55,12.43s-12.25,9.57-9,25.31h0q.19.9.45,1.83l0,.07q.25.91.58,1.84l0,.12q.32.91.72,1.85l.07.17q.4.92.87,1.86l.1.19c.32.63.66,1.26,1,1.9l.12.2c.38.64.77,1.29,1.21,2l.12.18c.44.67.91,1.35,1.41,2l.09.12c.52.71,1.08,1.43,1.67,2.15l25.4-3.2,1.92,15.28h0l5.75,45.62-60.89,7.67-7.56-60h-.09S227.87,155.69,253.14,130ZM149.42,198.66l-.9.11s-1.84-33.85,23.41-59.57l12.55,12.43s-18.83,14.71-3.55,37.64h0q.56.84,1.18,1.69l.19.26c.41.56.84,1.12,1.29,1.69l12.23-1.61h0L210,189.45l8,60.76-42.78,5.62h0l-18,2.36Z"/></g></g></svg>');
    }
}
