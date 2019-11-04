<?php
/*
Template Name: Отзывы
Template Post Type: page
*/
get_header();
$page_reviews = get_field('reviews_slider_image', $page_id);
?>

    <!-- Reviews -->
    <section id="page-reviews" class="page page-reviews">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= the_title(); ?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="reviews-slider">
                        <?php foreach ($page_reviews as $item) : ?>
                            <div class="reviews-slider-item">
                                <img src="<?= $item['url']; ?>" alt="<?= $item['alt']; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="slider-arrow slider-arrow--reviews">
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

<?php
get_footer(); ?>