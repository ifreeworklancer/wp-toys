<?php

require_once('../store.php');
require_once('../functions.php');
require_once('../views/base/header.php');
require_once('../views/sections/intro-page.php');
?>

    <!-- Favorites -->
    <section id="page-favorites" class="page page-favorites">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= $page_favorites['title']; ?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <?php foreach ($page_favorites['items'] as $item) : ?>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <a href="../single/single-product.php" class="catalog-card">
                            <div class="catalog-card-view">
                                <figure style="background-image: url('<?= $item['image']; ?>');"></figure>
                            </div>
                            <div class="catalog-card-description">
                                <h6 class="title">
                                    <?= $item['title']; ?>
                                </h6>
                                <div class="price">
                                    <?php if (!is_null($item['old_price'])) : ?>
                                        <div class="price-value price-value--old">
                                                <span class="font-weight-bold">
                                                        <?= $item['old_price']; ?>
                                                </span>
                                            грн
                                        </div>
                                    <?php endif; ?>
                                    <div class="price-value">
                                        <span class="font-weight-bold">
                                                <?= $item['price']; ?>
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
                                </div>
                            </div>
                            <div class="catalog-card-badges">
                                <?php if (!is_null($item['old_price'])) : ?>
                                    <div class="catalog-card-badges-item catalog-card-badges-item--sale">
                                        Акция
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php
require_once('../views/base/footer.php');