<?php

namespace TestimonialsBuilder\Classes;

class Demo
{
    public static function make()
    {
        if (isset($_GET['testimonials_builder_preview']) && $_GET['testimonials_builder_preview']) {
            if (current_user_can(Menu::managePermission())) {
                $id = intval($_GET['testimonials_builder_preview']);
                static::renderPreview($id);
            }
        }
    }

    public static function renderPreview($id)
    {
        $table = get_post($id);

        if ($table) {
            static::loadDefaultPageTemplate();

            add_action('pre_get_posts', function ($query) {
                self::pre_get_posts($query);
            }, 100, 1);

            add_filter('post_thumbnail_html', '__return_empty_string');

            add_filter('get_the_excerpt', function ($content) {
                return '';
            });

            add_filter('the_title', function ($title) use ($table) {
                if (in_the_loop()) {
                    return $table->post_title;
                }
                return $title;
            }, 100, 1);

            add_filter('the_content', function ($content) use ($table) {
                if (in_the_loop()) {

                    $custom_content = __('Testimonial Slider Preview (Slider ID: ', 'testimonials_builder');

                    $content = '<div id="testimonials_builder_preview" style="text-align: center" class="demo">'.
                        '<h3>'.$custom_content.$table->ID.' )</h3>'.
                        '</div><hr />';

                    $content .= '[testimonials_builder id='.$table->ID.']';
                }

                return $content;
            });
        }
    }

    private static function loadDefaultPageTemplate()
    {
        add_filter('template_include', function ($original) {

            return locate_template(array('page.php', 'single.php', 'index.php'));
        });
    }

    /**
     * Set the posts to one
     *
     * @param  WP_Query $query
     *
     * @return void
     */
    public static function pre_get_posts($query)
    {
        if ($query->is_main_query()) {
            $query->set('posts_per_page', 1);
            $query->set('ignore_sticky_posts', true);
        }
    }
}
