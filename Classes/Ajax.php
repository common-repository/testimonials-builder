<?php

namespace TestimonialsBuilder\Classes;

class Ajax
{
    /**
     * Handle ajax calls.
     *
     * @return void
     */
    public static function handle()
    {
        if (! current_user_can(Menu::managePermission())) {
            return;
        }

        $routes = array(
            'get_slider_lists' => 'index',
            'get_slider'       => 'find',
            'add_slider'       => 'store',
            'update_slider'    => 'update',
            'delete_slider'    => 'destroy',
            'update_config'    => 'configure',
            'photo'            => 'photo'
        );

        $route = sanitize_text_field($_REQUEST['route']);

        if (isset($routes[$route])) {
            $method = $routes[$route];

            (new Slider)->{$method}();
        }

        wp_die();
    }
}
