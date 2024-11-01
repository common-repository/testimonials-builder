<?php

namespace TestimonialsBuilder\Classes;

class Slider
{
    private $postType = 'testimonials_builder';

    public function index()
    {
        $pageNumber = intval($_REQUEST['page_number']);

        $perPage = intval($_REQUEST['per_page']);

        $offset = ($pageNumber - 1) * $perPage;

        $sliders = get_posts(array(
            'post_type'      => $this->postType,
            'offset'         => $offset,
            'posts_per_page' => $perPage
        ));

        $total = wp_count_posts($this->postType);

        $formatted = array();

        foreach ($sliders as $slider) {
            $formatted[] = array(
                'ID'         => $slider->ID,
                'post_title' => $slider->post_title,
                'demo_url'   => home_url().'?'.$this->postType.'_preview='.$slider->ID.'#'.$this->postType.'_preview'
            );
        }

        wp_send_json_success(array(
            'sliders' => $formatted,
            'total'   => intval($total->publish)
        ), 200);
    }

    public function find()
    {
        $id = intval($_REQUEST['id']);

        $slider = get_post($id);

        $formatted = (object) array(
            'ID'         => $slider->ID,
            'post_title' => $slider->post_title
        );

        $sliderConfig = get_post_meta($id, '_testimonial_slider_config', true);

        wp_send_json_success(array(
            'slider'        => $formatted,
            'slider_config' => $sliderConfig,
            'demo_url'      => home_url().'?'.$this->postType.'_preview='.$slider->ID.'#'.$this->postType.'_preview'
        ));
    }

    public function store()
    {
        $title = sanitize_text_field($_REQUEST['title']);

        $this->validate();

        $data = array(
            'post_title'  => $title,
            'post_type'   => $this->postType,
            'post_status' => 'publish'
        );

        $id = wp_insert_post($data);

        do_action('testimonial_slider_added', $id);

        wp_send_json_success(array(
            'message' => __('Successfully created the testimonial slider.', $this->postType),
            'id'      => $id
        ), 200);
    }

    public function update()
    {
        $id = intval($_REQUEST['id']);

        $this->validate();

        $data = array(
            'ID'         => $id,
            'post_title' => sanitize_text_field($_REQUEST['title'])
        );

        wp_update_post($data);

        wp_send_json_success(array(
            'message' => __('Successfully updated the testimonial slider name.', $this->postType)
        ), 200);
    }

    public function destroy()
    {
        $id = intval($_REQUEST['id']);

        delete_post_meta($id, '_testimonial_slider_config');

        wp_delete_post($id);

        wp_send_json_success(array(
            'message' => __('Successfully deleted the testimonial slider.', $this->postType)
        ), 200);
    }

    public function configure()
    {
        $id = intval($_REQUEST['id']);

        $config = wp_unslash($_REQUEST['config']);

        $config = json_decode($config, true);

        update_post_meta($id, '_testimonial_slider_config', $config);

        do_action('testimonials_builder_updated_config', $id, $config);

        wp_send_json_success(array(
            'message' => __('Successfully updated the testimonial slider.', $this->postType)
        ));
    }

    private function validate()
    {
        if (! sanitize_text_field($_REQUEST['title'])) {
            wp_send_json_error(array(
                'message' => __('The testimonial slider name field is required.', $this->postType)
            ), 423);
        }
    }

    public function photo()
    {
        $photos = array();

        foreach ($_FILES as $file) {
            $photos[] = wp_handle_upload(
                $file,
                ['test_form' => false]
            );
        }

        wp_send_json_success([
            'files' => $photos
        ], 200);
    }
}
