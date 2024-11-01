<?php

$path = TESTIMONIALS_BUILDER_DIR_URL.'public/images/';

return array(
    'sliderStyle'       => array(
        array(
            'label'           => 'TESTIMONIAL TEMPLATE',
            'value'           => array(
                array(
                    'label' => 'Tiled Classic',
                    'value' => 'tiledClassic',
                    'grid'  => array(
                        'wrapper_lg'        => 12,
                        'wrapper_offset_lg' => 0,
                        'sm'                => 6,
                        'md'                => 4,
                        'lg'                => 3
                    )
                ),
                array(
                    'label' => 'Tiled Balloon',
                    'value' => 'tiledBalloon',
                    'grid'  => array(
                        'wrapper_lg'        => 12,
                        'wrapper_offset_lg' => 0,
                        'sm'                => 6,
                        'md'                => 4,
                        'lg'                => 3
                    )
                ),
                array(
                    'label' => 'Tiled Postcard',
                    'value' => 'tiledPostcard',
                    'grid'  => array(
                        'wrapper_lg'        => 12,
                        'wrapper_offset_lg' => 0,
                        'sm'                => 6,
                        'md'                => 4,
                        'lg'                => 3
                    )
                ),
                array(
                    'label' => 'Single Classic',
                    'value' => 'singleClassic',
                    'grid'  => array(
                        'wrapper_lg'        => 6,
                        'wrapper_md'        => 12,
                        'wrapper_offset_lg' => 3,
                        'wrapper_offset_md' => 0,
                        'sm'                => 12
                    )
                ),
                array(
                    'label' => 'Single Spotlight',
                    'value' => 'singleSpotlight',
                    'grid'  => array(
                        'wrapper_lg'        => 6,
                        'wrapper_md'        => 12,
                        'wrapper_offset_lg' => 3,
                        'wrapper_offset_md' => 0,
                        'sm'                => 12
                    )
                ),
                array(
                    'label' => 'Single Postcard',
                    'value' => 'singlePostcard',
                    'grid'  => array(
                        'wrapper_lg'        => 6,
                        'wrapper_md'        => 12,
                        'wrapper_offset_lg' => 3,
                        'wrapper_offset_md' => 0,
                        'sm'                => 12
                    )
                )
            ),
            'defaultSelected' => 'tiledClassic',
            'is_active'       => false
        ),
        array(
            'label'           => 'LAYOUT',
            'value'           => array(
                array(
                    'label' => 'Slider',
                    'value' => 'slider'
                ),
                array(
                    'label' => 'Grid',
                    'value' => 'grid'
                ),
            ),
            'defaultSelected' => "slider",
            'is_active'       => false,
        )
    ),
    'sliderContent'     => array(
        'label' => "TESTIMONIALS",
        'value' => array(
            array(
                'testimonial_text'   => 'Love the design and customization of InstaShow. We have used various Instagram apps for Shopify in the past but they would always mess up our theme. I love how we can completely customize InstaShow to how we want the feed to come out. Loads quickly and responsive to all devices. A++',
                'author_name'        => 'Taylor Jay',
                'social_profile_url' => 'https://www.facebook.com/taylorjay4',
                'caption'            => 'Founder & CEO',
                'picture'            => $path.'1.jpg',
                'website_url'        => 'https://www.raverebel.com/',
                'company_logo'       => $path.'logo1.jpg'
            ),
            array(
                'testimonial_text'   => 'Love the design and customization of InstaShow. We have used various Instagram apps for Shopify in the past but they would always mess up our theme. I love how we can completely customize InstaShow to how we want the feed to come out. Loads quickly and responsive to all devices. A++',
                'author_name'        => 'Tony Alisai',
                'social_profile_url' => 'https://www.facebook.com/tony',
                'caption'            => 'Founder & CEO',
                'picture'            => $path.'2.jpg',
                'website_url'        => 'https://www.raverebel.com/',
                'company_logo'       => $path.'logo2.png'
            ),
            array(
                'testimonial_text'   => 'Love the design and customization of InstaShow. We have used various Instagram apps for Shopify in the past but they would always mess up our theme. I love how we can completely customize InstaShow to how we want the feed to come out. Loads quickly and responsive to all devices. A++',
                'author_name'        => 'Sara Dashnar',
                'social_profile_url' => '',
                'caption'            => 'Founder & CEO',
                'picture'            => $path.'3.jpg',
                'website_url'        => 'https://www.raverebel.com/',
                'company_logo'       => $path.'logo3.png'
            ),
            array(
                'testimonial_text'   => 'Love the design and customization of InstaShow. We have used various Instagram apps for Shopify in the past but they would always mess up our theme. I love how we can completely customize InstaShow to how we want the feed to come out. Loads quickly and responsive to all devices. A++',
                'author_name'        => 'Max Millan',
                'social_profile_url' => 'https://www.twitter.com/taylorjay4',
                'caption'            => 'Founder & CEO',
                'picture'            => $path.'4.jpg',
                'website_url'        => 'https://www.raverebel.com/',
                'company_logo'       => $path.'logo4.jpg'
            ),
            array(
                'testimonial_text'   => 'Love the design and customization of InstaShow. We have used various Instagram apps for Shopify in the past but they would always mess up our theme. I love how we can completely customize InstaShow to how we want the feed to come out. Loads quickly and responsive to all devices. A++',
                'author_name'        => 'Ronti Samara',
                'social_profile_url' => '',
                'caption'            => 'Founder & CEO',
                'picture'            => $path.'5.jpg',
                'website_url'        => 'https://www.raverebel.com/',
                'company_logo'       => $path.'logo5.png'
            ),
            array(
                'testimonial_text'   => 'Love the design and customization of InstaShow. We have used various Instagram apps for Shopify in the past but they would always mess up our theme. I love how we can completely customize InstaShow to how we want the feed to come out. Loads quickly and responsive to all devices. A++',
                'author_name'        => 'Bob Daole',
                'social_profile_url' => 'https://www.facebook.com/bob',
                'caption'            => 'Founder & CEO',
                'picture'            => $path.'6.jpg',
                'website_url'        => 'https://www.raverebel.com/',
                'company_logo'       => $path.'logo6.jpg'
            )
        )
    ),
    'sliderMoreOptions' => array(
        'headerTitle' => 'What our clients say'
    )
);
