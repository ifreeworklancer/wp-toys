<?php
get_header();
$product_gallery = get_field('product_gallery');
$product_price = get_field('product_price');
$product_old_price = get_field('product_old_price');
$product_feature = get_field('product_feature');
$product_delivery = get_field('product_delivery', 8);
$product_payment = get_field('product_payment', 8);
$product = get_post();
$computed = [];
array_push($computed, [
    'id' => $post->ID,
    'title' => $post->post_title,
    'image' => get_the_post_thumbnail_url($post->ID, 'large'),
    'old_price' => get_field('product_old_price', $post->ID),
    'price' => get_field('product_price', $post->ID),
    'permalink' => get_the_permalink($post->ID),
    'quantity' => 1
]);
?>
<!-- Product -->
<section id="single-product" class="single single-product">
    <div class="container product-wrapper">
        <div class="row justify-content-center justify-content-lg-between">
            <div class="col-sm-9 col-lg-6">
                <div class="product-view">
                    <div class="product-slider">
                        <?php if ($product_gallery) : foreach ($product_gallery as $item) : ?>
                            <div class="product-slider-item">
                                <figure style="background-image: url('<?= $item['url']; ?>');"></figure>
                            </div>
                        <?php endforeach; endif; ?>
                        <?php if (!$product_gallery) : ?>
                            <div class="product-slider-item">
                                <figure style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');"></figure>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-slider-asNavFor">
                        <?php if ($product_gallery) : foreach ($product_gallery as $item) : ?>
                            <div class="product-slider-asNavFor-item">
                                <figure style="background-image: url('<?= $item['url']; ?>');"></figure>
                            </div>
                        <?php endforeach; endif; ?>
                        <?php if (!$product_gallery) : ?>
                            <div class="product-slider-asNavFor-item">
                                <figure style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');"></figure>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="slider-arrow slider-arrow--product">
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
                <div class="product-info">
                    <div class="product-info-item">
                        <div class="product-info-title">
                            Доставка
                        </div>
                        <ul class="product-info-list">
                            <?php foreach ($product_delivery as $item) : ?>
                                <li><?= $item['product_delivery_item']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="product-info-item">
                        <div class="product-info-title">
                            Оплата
                        </div>
                        <ul class="product-info-list">
                            <?php foreach ($product_payment as $item) : ?>
                                <li><?= $item['product_payment_item']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-lg-5">
                <div class="product-description">
                    <div class="product-description-header">
                        <h1 class="title">
                            <?= the_title(); ?>
                        </h1>
                        <div class="price">
                            <?php if ($product_old_price) : ?>
                                <div class="price-value price-value--old">
                                        <span class="font-weight-bold">
                                            <?= $product_old_price; ?>
                                        </span>
                                    грн
                                </div>
                            <?php endif; ?>
                            <div class="price-value">
                                    <span class="font-weight-bold">
                                        <?= $product_price; ?>
                                    </span>
                                грн
                            </div>
                        </div>
                        <product-operation :post='<?= json_encode($computed); ?>'/>
                    </div>
                    <div class="product-description-body">
                        <div class="description">
                            <?php
                            while (have_posts()) : the_post();
                                echo get_the_content();
                            endwhile;
                            ?>
                        </div>
                        <ul class="feature-list">
                            <?php if($product_feature['product_feature_item']) : foreach ($product_feature['product_feature_item'] as $item) : ?>
                                <li>
                                    <span class="title"><?= $item['product_feature_item_title']; ?></span>
                                    <span class="value"><?= $item['product_feature_item_value']; ?></span>
                                </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer(); ?>
