<?php

require_once('../store.php');
require_once('../functions.php');
require_once('../views/base/header.php');
?>

    <!-- checkout -->
    <section id="page-checkout" class="page page-checkout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= $page_checkout['title']; ?>
                    </h1>
                </div>
            </div>
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-sm-8 col-lg-6">
                    <div class="checkout-catalog">
                        <?php foreach ($page_checkout['items'] as $item) : ?>
                            <div class="checkout-catalog-item">
                                <div class="checkout-catalog-item-cell">
                                    <div class="checkout-catalog-item-view">
                                        <figure style="background-image: url('<?= $item['image']; ?>');"></figure>
                                    </div>
                                    <div class="checkout-catalog-item-description">
                                        <h6 class="title">
                                            <?= $item['title']; ?>
                                        </h6>
                                    </div>
                                </div>
                                <div class="checkout-catalog-item-cell">
                                    <div class="price">
                                        <div class="price-value">
                                            Кол-во: <span class="font-weight-bold">2</span> шт
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="price-value">
                                            Цена: <span class="font-weight-bold"><?= $item['price'] ?></span> грн
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="checkout-result">
                            Итого: <span class="font-weight-bold text-secondary">200</span> грн
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-5">
                    <form>
                        <div class="form-column">
                            <div class="title">
                                Информация о Вас
                            </div>
                            <div class="form-group">
                                <label for="user-name" class="label-placeholder">
                                    Ваше имя
                                </label>
                                <input type="text" name="user_name" id="user-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="user-phone" class="label-placeholder">
                                    Телеофн
                                </label>
                                <input type="tel" name="user_phone" id="user-phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="user-email" class="label-placeholder">
                                    Email
                                </label>
                                <input type="email" name="user_email" id="user-email" class="form-control">
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="title mb-3">
                                Способы оплаты
                            </div>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" name="payment"
                                       id="user-cash-payment" value="cash"
                                       checked="checked"
                                       class="custom-control-input">
                                <label for="user-cash-payment" class="custom-control-label">
                                    Оплата при получении </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment"
                                       id="user-card-payment" value="card"
                                       class="custom-control-input">
                                <label
                                        for="user-card-payment" class="custom-control-label">
                                    Оплата Visa/Mastercard
                                </label>
                            </div>
                            <button class="btn btn-primary mt-4">
                                Купить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
require_once('../views/base/footer.php');