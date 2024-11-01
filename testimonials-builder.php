<?php

/*
Plugin Name: Testimonials Builder
Description: The easiest & fastest, coding-free, responsive customer testimonials builder plugin on WordPress.
Version:     1.0.1
Author:      WPManageNinja
Author URI:  https://wpmanageninja.com
Plugin URI:  https://wpmanageninja.com/testimonials-builder
License:     GPL-2.0+
Text Domain: testimonials-builder
Domain Path: /languages
*/

defined('ABSPATH') or die;

include 'load.php';

define('TESTIMONIALS_BUILDER_DIR_URL', plugin_dir_url(__FILE__));
define('TESTIMONIALS_BUILDER_DIR', plugin_dir_path(__FILE__));
define('TESTIMONIALS_BUILDER_VERSION', '1.0.1');
define('TESTIMONIALS_BUILDER_CACHED_VERSION', '1.0.1');

class TestimonialsBuilder
{
    public function boot()
    {
        $this->commonHooks();
        $this->adminHooks();
        $this->publicHooks();
    }

    public function commonHooks()
    {
        add_shortcode(
            'testimonials_builder',
            array('TestimonialsBuilder\Classes\Renderer', 'render')
        );

        add_action('init', function () {
            \TestimonialsBuilder\Classes\Demo::make();
        });
    }

    public function adminHooks()
    {
        add_action('admin_menu', array('TestimonialsBuilder\Classes\Menu', 'add'));

        add_action('init', array('TestimonialsBuilder\Classes\Cpt', 'register'));

        add_action(
            'wp_ajax_wp_testimonial_ajax_actions',
            array('TestimonialsBuilder\Classes\Ajax', 'handle')
        );

        add_action(
            'testimonials_builder_updated_config',
            array('TestimonialsBuilder\Classes\Cache', 'delete')
        );
    }

    public function publicHooks()
    {
        // public hooks...
    }
}

add_action('plugins_loaded', function () {
    $testimonialClass = new TestimonialsBuilder();

    $testimonialClass->boot();

    $plugin_rel_path = basename(dirname(__FILE__)).'/languages';

    load_plugin_textdomain('testimonials-builder', false, $plugin_rel_path );
});
