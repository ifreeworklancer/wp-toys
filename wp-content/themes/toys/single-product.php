<?php
require_once('../store.php');
require_once('../functions.php');
require_once('../views/base/header.php');
?>
    <!-- Product -->
    <section id="single-product" class="single single-product">
        <div class="container product-wrapper">
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-sm-9 col-lg-6">
                    <div class="product-view">
                        <div class="product-slider">
                            <?php foreach ($single_catalog['slider'] as $item) : ?>
                                <div class="product-slider-item">
                                    <figure style="background-image: url('<?= $item; ?>');"></figure>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="product-slider-asNavFor">
                            <?php foreach ($single_catalog['slider'] as $item) : ?>
                                <div class="product-slider-asNavFor-item">
                                    <figure style="background-image: url('<?= $item; ?>');"></figure>
                                </div>
                            <?php endforeach; ?>
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
                                <li>На склад Новой Почты.</li>
                            </ul>
                        </div>
                        <div class="product-info-item">
                            <div class="product-info-title">
                                Оплата
                            </div>
                            <ul class="product-info-list">
                                <li>Наличными при получении</li>
                                <li>Visa/Mastercard, Приват24</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-5">
                    <div class="product-description">
                        <div class="product-description-header">
                            <h1 class="title">
                                <?= $single_catalog['title']; ?>
                            </h1>
                            <div class="price">
                                <?php if (!is_null($single_catalog['old_price'])) : ?>
                                    <div class="price-value price-value--old">
                                        <span class="font-weight-bold">
                                            <?= $single_catalog['old_price']; ?>
                                        </span>
                                        грн
                                    </div>
                                <?php endif; ?>
                                <div class="price-value">
                                    <span class="font-weight-bold">
                                        <?= $single_catalog['price']; ?>
                                    </span>
                                    грн
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                                <a href="../page/page-basket.php" class="btn btn-primary mb-3 mb-sm-0 mr-sm-3">
                                    В корзину
                                </a>
                                <a href="#" class="btn btn-outline-secondary add-favorite mb-3 mb-sm-0 mr-sm-3">
                                    <svg width="15" height="15">
                                        <use xlink:href="#favorite-icon"></use>
                                    </svg>
                                </a>
                                <a href="#" class="btn btn-outline-primary add-feedback">
                                    <svg width="15" height="15">
                                        <use xlink:href="#feedback-icon"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="product-description-body">
                            <div class="description">
                                <?= $single_catalog['description']; ?>
                            </div>
                            <ul class="feature-list">
                                <?php foreach ($single_catalog['feature'] as $item) : ?>
                                    <li>
                                        <span class="title"><?= $item['title']; ?></span>
                                        <span class="value"><?= $item['value']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require_once('../views/base/footer.php');
