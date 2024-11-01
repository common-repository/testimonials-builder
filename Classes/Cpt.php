<?php

namespace TestimonialsBuilder\Classes;

class Cpt
{
    public static function register()
    {
        $cptArgs = array(
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => false,
            'show_in_menu'       => false,
            'query_var'          => false,
            'label'              => __('Testimoial Builder', 'testimonials_builder')
        );

        register_post_type('testimonials_builder', $cptArgs);
    }
}
