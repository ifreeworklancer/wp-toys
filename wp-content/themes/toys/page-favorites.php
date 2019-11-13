<?php
/*
Template Name: Избранное
Template Post Type: page
*/
get_header();
?>

<!-- Favorites -->
<section id="page-favorites" class="page page-favorites">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="section-title">
                    <?= the_title(); ?>
                </h1>
            </div>
        </div>
        <products-favorite no-result-text="<?= __('[:ru]Нет избранных товаров[:uk]Немає обраних товарів[:]'); ?>"
                           button-text="<?= __('[:ru]В каталог[:uk]В каталог[:]'); ?>"
        />
    </div>
</section>

<?php
get_footer(); ?>
<!--<script>-->
<!--    import ProductsFavorite from "./src/js/components/product-favorite/ProductsFavorite";-->
<!--    export default {-->
<!--        components: {ProductsFavorite}-->
<!--    }-->
<!--</script>-->