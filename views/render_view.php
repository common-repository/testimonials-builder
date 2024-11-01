<?php

if (!$config) {
    $demodata = include 'mockdata.php';

    $config = $demodata;
}

$grids = $config['sliderStyle'][0]['value'];
$contents = $config['sliderContent']['value'];
$header_title = $config['sliderMoreOptions']['headerTitle'];
$selected_style = $config['sliderStyle'][0]['defaultSelected'];

$selected_grid = '';
foreach ($grids as $grid) {
    if ($grid['value'] == $selected_style) {
        $selected_grid = $grid['grid'];
    }
}

function sliceText($text)
{
    $length = strlen($text);

    if ($length > 256) {
        return substr($text, 0, 256).'...';
    }

    return $text;
}

?>

<div class="testimonial_slider_main">
    <!-- Testimonial Slider Upper Title -->
    <div class="testimonial_slider_header">
        <div class="testimonial_slider_widget_title"><?php echo $header_title ?></div>
    </div>

    <!-- Testimonial Slider Contents -->
    <div <?php if ($config['sliderStyle'][1]['defaultSelected'] == 'grid'): ?>
        <div>
            <?php foreach ($contents as $content): ?>
                <div
                        class="testimonial_slider-col-sm-<?php echo $selected_grid['sm'] ?>
                               testimonial_slider-col-md-<?php echo $selected_grid['md'] ?>
                               testimonial_slider-col-lg-<?php echo $selected_grid['lg'] ?>
                               testimonial_slider-col-xl-<?php echo $selected_grid['lg'] ?>"
                >
                    <div class="testimonial_slider_item <?php echo $selected_style ?>">
                        <?php if (!(in_array($selected_style,
                                ['tiledClassic', 'tiledBalloon'])) && $content['picture']): ?>
                            <div class="testimonial_slider_item_author_picture_container">
                                <img src="<?php echo $content['picture'] ?>"
                                     class="testimonial_slider_item_author_picture"
                                >
                            </div>
                        <?php endif; ?>

                        <div class="testimonial_slider_wrap">
                            <div class="testimonial_slider_author_container">
                                <?php if ($content['picture'] && (in_array($selected_style,
                                        ['tiledClassic', 'tiledBalloon']))): ?>
                                    <div class="testimonial_slider_item_author_picture_container">
                                        <img src="<?php echo $content['picture'] ?>"
                                             class="testimonial_slider_item_author_picture">
                                    </div>
                                <?php endif; ?>

                                <div class="testimonial_slider_item_author">
                                    <div class="testimonial_slider_item_author_info">
                                        <?php if ($content['author_name'] && $content['social_profile_url']): ?>
                                            <a class="testimonial_slider_item_author_name_link"
                                               href="<?php echo $content['social_profile_url'] ?>"
                                               rel="nofollow"
                                               title="<?php echo $content['social_profile_url'] ?>"
                                               target="_blank"
                                            >
                                                <span class="testimonial_slider_item_author_info_name">
                                                    <?php echo $content['author_name'] ?>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!$content['social_profile_url']): ?>
                                            <span class="testimonial_slider_item_author_info_name">
                                                <?php echo $content['author_name'] ?>
                                            </span>
                                        <?php endif; ?>

                                        <div class="testimonial_slider_item_author_info_caption">
                                            <?php echo $content['caption'] ?>
                                        </div>

                                        <?php if ($content['website_url']): ?>
                                            <a class="testimonial_slider_item_author_info-logo-link"
                                               href="<?php echo $content['website_url'] ?>"
                                               rel="nofollow"
                                               title="<?php echo $content['website_url'] ?>"
                                               target="_blank">

                                                <?php if ($content['company_logo']): ?>
                                                    <div>
                                                        <img class="testimonial_slider_item_author_info_logo"
                                                             src="<?php echo $content['company_logo'] ?>"
                                                             alt="<?php echo $content['author_name'] ?>"
                                                        >
                                                    </div>
                                                <?php else: ?>
                                                    <div class="testimonial_slider_item_author_info_logo_link_inner">
                                                        <?php echo $content['website_url'] ?>
                                                    </div>
                                                <?php endif ?>
                                            </a>
                                        <?php else: ?>
                                            <div class="new-wrap">
                                                <?php if ($content['company_logo']): ?>
                                                    <div>
                                                        <img class="testimonial_slider_item_author_info_logo"
                                                             src="<?php echo $content['company_logo'] ?>"
                                                             alt="<?php echo $content['author_name'] ?>"
                                                        >
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial_slider_item_text">
                                <div>
                                    <?php if (strlen($content['testimonial_text']) > 256): ?>
                                        <div class="testimonial_slider_item_text_excerpt">
                                            <span class="testimonial_slider_text_excerpt_inner">
                                                <?php echo sliceText($content['testimonial_text']) ?>
                                            </span>
                                            <span class="testimonial_slider_item_text_see_more">
                                                read more
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="testimonial_slider_item_text_full">
                                        <?php echo $content['testimonial_text'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Carousel -->
        <div class="testimonial_slider_init owl-carousel owl-theme">
            <?php foreach ($contents as $content): ?>
                <div class="testimonial_slider_item <?php echo $selected_style ?>" id="<?php echo $selected_style ?>">
                    <?php if (!(in_array($selected_style, ['tiledClassic', 'tiledBalloon'])) && $content['picture']): ?>
                        <div class="testimonial_slider_item_author_picture_container">
                            <img src="<?php echo $content['picture'] ?>"
                                 class="testimonial_slider_item_author_picture"
                            >
                        </div>
                    <?php endif; ?>

                    <div class="testimonial_slider_wrap">
                        <div class="testimonial_slider_author_container">
                            <?php if ($content['picture'] && (in_array($selected_style,
                                    ['tiledClassic', 'tiledBalloon']))): ?>
                                <div class="testimonial_slider_item_author_picture_container">
                                    <img src="<?php echo $content['picture'] ?>"
                                         class="testimonial_slider_item_author_picture"
                                    >
                                </div>
                            <?php endif; ?>

                            <div class="testimonial_slider_item_author">
                                <div class="testimonial_slider_item_author_info">

                                    <?php if ($content['author_name'] && $content['social_profile_url']): ?>
                                        <a class="testimonial_slider_item_author_name_link"
                                           href="<?php echo $content['social_profile_url'] ?>"
                                           rel="nofollow"
                                           title="<?php echo $content['social_profile_url'] ?>"
                                           target="_blank"
                                        >
                                            <span class="testimonial_slider_item_author_info_name">
                                                <?php echo $content['author_name'] ?>
                                            </span>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!$content['social_profile_url']): ?>
                                        <span class="testimonial_slider_item_author_info_name">
                                            <?php echo $content['author_name'] ?>
                                        </span>
                                    <?php endif; ?>

                                    <div class="testimonial_slider_item_author_info_caption">
                                        <?php echo $content['caption'] ?>
                                    </div>

                                    <?php if ($content['website_url']): ?>
                                        <a class="testimonial_slider_item_author_info-logo-link"
                                           href="<?php echo $content['website_url'] ?>"
                                           rel="nofollow"
                                           title="<?php echo $content['website_url'] ?>"
                                           target="_blank"
                                        >
                                            <?php if ($content['company_logo']): ?>
                                                <div>
                                                    <img class="testimonial_slider_item_author_info_logo"
                                                         src="<?php echo $content['company_logo'] ?>"
                                                         alt="<?php echo $content['author_name'] ?>"
                                                    >
                                                </div>
                                            <?php else: ?>
                                                <div class="testimonial_slider_item_author_info_logo_link_inner">
                                                    <?php echo $content['website_url'] ?>
                                                </div>
                                            <?php endif ?>
                                        </a>
                                    <?php else: ?>
                                        <div class="new-wrap">
                                            <?php if ($content['company_logo']): ?>
                                                <div>
                                                    <img class="testimonial_slider_item_author_info_logo"
                                                         src="<?php echo $content['company_logo'] ?>"
                                                         alt="<?php echo $content['author_name'] ?>"
                                                    >
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_slider_item_text">
                            <div>
                                <?php if (strlen($content['testimonial_text']) > 256): ?>
                                    <div class="testimonial_slider_item_text_excerpt">
                                        <span class="testimonial_slider_text_excerpt_inner">
                                            <?php echo sliceText($content['testimonial_text']) ?>
                                        </span>
                                        <span class="testimonial_slider_item_text_see_more">
                                            read more
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <div class="testimonial_slider_item_text_full">
                                    <?php echo $content['testimonial_text'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
