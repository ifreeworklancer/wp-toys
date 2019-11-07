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
        <?php
        $currentFilters = isset($_GET['filter']) ? array_map('strtolower', explode(',', $_GET['filter'])) : [];
        ?>
        <products category="product"
                  filters="<?= implode(',', $currentFilters) ?>"
                  button-text="<?= __('[:ru]показать еще[:ua]показати ще[:]'); ?>"></products>
    </div>
</section>