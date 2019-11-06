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
                    <?php
                    $termsParent = get_terms([
                        'taxonomy' => 'product_category',
                        'parent' => 0,
                    ]);
                    foreach ($termsParent

                             as $prterm) :
                        ?>
                        <li>
                            <div><?= $prterm->name; ?></div>
                            <ul>
                                <?php $termsChild =  get_terms([
                                    'taxonomy' => 'product_category',
                                    'parent' => $prterm->term_id,
                                ]);
                                foreach ($termsChild as $chterms) :
                                    ?>
                                    <li class="<?= checkIfFilterExists($_GET, $chterms->term_id) ? 'is-checked' : '' ?>">
                                        <a href="<?= makeFilterLink($_GET, $chterms->term_id) ?>">
                                            <?= $chterms->name; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-8 pl-0 pl-lg-3 pr-0 order-1 order-lg-2">
                <div class="intro-slider">
                    <?php foreach ($intro as $item) : ?>
                        <div class="intro-slider-item">
                            <a href="<?= $item['intro_slider_item']['intro_slider_link'] ?>">
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
