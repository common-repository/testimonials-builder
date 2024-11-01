<?php

namespace TestimonialsBuilder\Classes;

class View
{
    public static function make($path, $data = array())
    {
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        $file = TESTIMONIALS_BUILDER_DIR.'views/'.$path.'.php';
        ob_start();
        extract($data);
        include $file;
        return ob_get_clean();
    }

    public static function render($path, $data = array())
    {
        echo static::make($path, $data);
    }
}
