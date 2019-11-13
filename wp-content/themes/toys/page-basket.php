<?php
/*
Template Name: Корзина
Template Post Type: page
*/
get_header();
?>

    <!-- Basket -->
    <section id="page-basket" class="page page-basket">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= the_title(); ?>
                    </h1>
                </div>
            </div>
            <basket checkout-link="<?= get_the_permalink(84); ?>"
                    reset-text="<?= __('[:ru]Очистить корзину[:uk]Очистити кошик[:]'); ?>"
                    checkout-text="<?= __('[:ru]Оформить заказ[:uk]Оформити замовлення[:]'); ?>"
                    total-text="<?= __('[:ru]Итог:[:uk]Підсумок:[:]'); ?>"
                    no-result-text="<?= __('[:ru]Нет товаров в корзине[:uk]Немає товарів у кошику[:]'); ?>"
                    no-result-button-text="<?= __('[:ru]В каталог[:uk]В каталог[:]'); ?>"
            />
        </div>
    </section>

<?php
get_footer(); ?>