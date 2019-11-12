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
            <basket/>
        </div>
    </section>

<?php
get_footer(); ?>