<?php
$page_id = 8;
$intro = get_field('intro_slider', $page_id);
?>
<!-- Intro -->
<section id="intro">
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-lg-4 filters-wrapper order-2 order-lg-1">
                <ul class="filters">
<!--                    --><?php //foreach ($catalog['filter'] as $key => $val) : ?>
<!--                        <li>-->
<!--                            <div>--><?//= $key; ?><!--</div>-->
<!--                            <ul>-->
<!--                                --><?php //foreach ($val as $item) : ?>
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            --><?//= $item ?>
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                --><?php //endforeach; ?>
<!--                            </ul>-->
<!--                        </li>-->
<!--                    --><?php //endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-8 pl-0 pl-lg-3 pr-0 order-1 order-lg-2">
                <div class="intro-slider">
                    <?php foreach ($intro as $item) : ?>
                        <div class="intro-slider-item">
                            <a href="<?= $item['intro_slider_item']['intro_slider_link']?>">
                                <figure style="background-image: url('<?= $item['intro_slider_item']['intro_slider_image']['url']; ?>');"></figure>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slider-arrow slider-arrow--intro">
                    <div class="slider-arrow-item slider-arrow-item--prev">
                        <svg width="20" height="20">
                            <use xlink:href="#arrow-prev"></use>
                        </svg>
                    </div>
                    <div class="slider-arrow-item slider-arrow-item--next">
                        <svg width="20" height="20">
                            <use xlink:href="#arrow-next"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
