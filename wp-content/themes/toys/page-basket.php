<?php

require_once('../store.php');
require_once('../functions.php');
require_once('../views/base/header.php');
require_once('../views/sections/intro-page.php');
?>

    <!-- Basket -->
    <section id="page-basket" class="page page-basket">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= $page_basket['title']; ?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="basket-wrapper">
                        <div class="basket-wrapper-header">
                            <div class="reset-basket">
                                Очистить корзину
                                <svg width="15" height="15">
                                    <use xlink:href="#trash-icon"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="basket-wrapper-body">
                            <?php foreach ($page_basket['items'] as $item) : ?>
                                <div class="basket-item">
                                    <div class="basket-item-cell flex-column flex-md-row">
                                        <div class="basket-item-view">
                                            <figure style="background-image: url('<?= $item['image']; ?>');"></figure>
                                        </div>
                                        <div class="basket-item-description">
                                            <h6 class="title">
                                                <?= $item['title']; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="basket-item-cell">
                                        <div class="quantity">
                                            <form class="quantity-form">
                                                <label class="quantity-label">
                                                    <input type="number" class="quantity-input form-control"
                                                           name="basket_quantity" min="1" value="1">
                                                    <div class="quantity-button quantity-down">-</div>
                                                    <div class="quantity-button quantity-up">+</div>
                                                </label>
                                            </form>
                                        </div>
                                        <div class="price">
                                            <div class="price-value">
                                            <span class="font-weight-bold">
                                                <?= $item['price']; ?>
                                            </span>
                                                грн
                                            </div>
                                        </div>
                                    </div>
                                    <div class="delete-basket-item">
                                        <div class="delete-icon">
                                            <div class="line line--left"></div>
                                            <div class="line line--right"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="basket-wrapper-footer">
                            <div class="basket-wrapper-footer-description">
                                <div class="basket-result">
                                    <span class="basket-result-text">Итог:</span> <span class="basket-result-value font-weight-bold">200</span> грн
                                </div>
                                <a href="page-checkout.php" class="btn btn-primary">
                                    Оформить заказ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require_once('../views/base/footer.php');