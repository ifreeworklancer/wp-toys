<?php
/*
Template Name: Оформление
Template Post Type: page
*/
get_header();
?>


    <!-- checkout -->
    <section id="page-checkout" class="page page-checkout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= get_the_title(); ?>
                    </h1>
                </div>
            </div>
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-sm-8 col-lg-6">
                    <checkout-list price-text="<?= __('[:ru]Цена[:uk]Ціна[:]'); ?>"
                                   value-text="<?= __('[:ru]Кол-во[:uk]Кількість[:]'); ?>"
                                   result-text="<?= __('[:ru]Итого[:uk]Разом[:]'); ?>"/>
                </div>
                <div class="col-sm-8 col-lg-5">
                    <form method="post" action="<?= get_theme_file_uri('mail-send.php'); ?>">
                        <div class="form-column">
                            <div class="title">
                                <?= __('[:ru]Информация о Вас[:uk]Інформація про Вас[:]'); ?>
                            </div>
                            <div class="form-group">
                                <label for="user-name" class="label-placeholder">
                                    <?= __('[:ru]Ваше имя[:uk]Ваше ім\'я[:]'); ?>
                                </label>
                                <input type="text" name="name" id="user-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="user-phone" class="label-placeholder">
                                    <?= __('[:ru]Телефон[:uk]Телефон[:]'); ?>
                                </label>
                                <input type="tel" name="phone" id="user-phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="user-email" class="label-placeholder">
                                    Email
                                </label>
                                <input type="email" name="email" id="user-email" class="form-control">
                            </div>
                            <input type="hidden" name="product">
                        </div>
                        <div class="form-column">
                            <div class="title mb-3">
                                <?= __('[:ru]Способы оплаты[:uk]Способи оплати[:]'); ?>
                            </div>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" name="payment"
                                       id="user-cash-payment" value="Оплата при получении"
                                       checked="checked"
                                       class="custom-control-input">
                                <label for="user-cash-payment" class="custom-control-label">
                                    <?= __('[:ru]Оплата при получении[:uk]Оплата при отриманні[:]'); ?>
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="payment"
                                       id="user-card-payment" value="Оплата Visa/Mastercard"
                                       class="custom-control-input">
                                <label
                                        for="user-card-payment" class="custom-control-label">
                                    <?= __('[:ru]Оплата Visa/Mastercard[:uk]Оплата Visa / Mastercard[:]'); ?>
                                </label>
                            </div>
                            <button class="btn btn-primary mt-4">
                                <?= __('[:ru]Купить[:uk]Купити[:]'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer(); ?>