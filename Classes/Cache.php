<?php

namespace TestimonialsBuilder\Classes;

class Cache
{
    public static function isActive($id)
    {
        return apply_filters('testimonials_builder_cache_content_status', true, $id);
    }

    public static function find($id)
    {
        return get_post_meta($id, '_testimonials_builder_html_'.TESTIMONIALS_BUILDER_CACHED_VERSION, true);
    }

    public static function save($id, $content)
    {
        update_post_meta($id, '_testimonials_builder_html_'.TESTIMONIALS_BUILDER_CACHED_VERSION, $content);
    }

    public static function delete($id)
    {
        update_post_meta($id, '_testimonials_builder_html_'.TESTIMONIALS_BUILDER_CACHED_VERSION, false);
    }
}
