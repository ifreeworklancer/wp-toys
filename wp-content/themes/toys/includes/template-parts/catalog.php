<!-- Catalog -->
<section id="catalog">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">
                    Каталог
                </h2>
            </div>
        </div>
        <div class="row">
            <?php
            if(!empty($_GET['filter'])) {
                $args = array(
                    'post_type' => 'product',
                    'order' => 'date',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_category',
                            'field' => 'id',
                            'terms' => explode(',', $_GET['filter'])
                        )
                    ),
                );
            } else {
                $args = array(
                    'post_type' => 'product',
                    'order' => 'date',
                );
            }
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    $old_price = get_field('product_old_price');
                    $price = get_field('product_price');
                    ?>
                    <div class="col-md-6 col-lg-4 catalog-card-wrapper">
                        <a href="<?= get_the_permalink(); ?>" class="catalog-card">
                            <div class="catalog-card-view">
                                <figure style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');"></figure>
                            </div>
                            <div class="catalog-card-description">
                                <h6 class="title">
                                    <?= the_title(); ?>
                                </h6>
                                <div class="price">
                                    <?php if ($old_price) : ?>
                                        <div class="price-value price-value--old">
                                                <span class="font-weight-bold">
                                                        <?= $old_price; ?>
                                                </span>
                                            грн
                                        </div>
                                    <?php endif; ?>
                                    <div class="price-value">
                                        <span class="font-weight-bold">
                                                <?= $price; ?>
                                        </span>
                                        грн
                                    </div>
                                </div>
                                <div class="catalog-card-operation">
                                    <div class="add-basket">
                                        <svg width="15" height="15">
                                            <use xlink:href="#basket-icon"></use>
                                        </svg>
                                    </div>
                                    <div class="add-feedback">
                                        <svg width="15" height="15">
                                            <use xlink:href="#feedback-icon"></use>
                                        </svg>
                                    </div>
                                    <div class="add-favorite">
                                        <svg width="15" height="15">
                                            <use xlink:href="#favorite-icon"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="catalog-card-badges">
                                <?php if ($old_price) : ?>
                                    <div class="catalog-card-badges-item catalog-card-badges-item--sale">
                                        Акция
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <?php echo paginate_links( $args ) ?>
                <ul class="pagination-list">
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">...</a>
                    </li>
                    <li>
                        <a href="#">10</a>
                    </li>
                    <li>
                        <a href="#">11</a>
                    </li>
                    <li>
                        <a href="#">12</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>