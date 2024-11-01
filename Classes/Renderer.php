<?php

namespace TestimonialsBuilder\Classes;

class Renderer
{
    public function render($atts)
    {
        $atts = shortcode_atts(array(
            'id' => null
        ), $atts);

        extract($atts);

        if (! $id) {
            return '';
        }

        $sliderConfig = get_post_meta(intval($atts['id']), '_testimonial_slider_config', true);

        wp_enqueue_style(
            'testimonials_builder_public_css',
            TESTIMONIALS_BUILDER_DIR_URL.'public/css/testimonials_builder_public.css'
        );

        if ($sliderConfig['sliderStyle'][1]['defaultSelected'] === 'slider') {
            wp_enqueue_script(
                'owl.carousel',
                TESTIMONIALS_BUILDER_DIR_URL.'public/js/libraries/owl.carousel.min.js',
                array('jquery')
            );

            wp_enqueue_script(
                'testimonials_builder_view_js',
                TESTIMONIALS_BUILDER_DIR_URL.'public/js/testimonials_builder_carousel.js'
            );
        }

        $shouldCache = Cache::isActive($id);

        if ($shouldCache && $cachedContent = Cache::find($id)) {
            return $cachedContent;
        }

        $content = View::make('render_view', array('config' => $sliderConfig));

        if ($shouldCache) {
            Cache::save($id, $content);
        }

        return $content;
    }
}
