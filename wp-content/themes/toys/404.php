<?php
get_header('secondary');
?>

    <!-- Thanks -->
    <section id="page-thanks" class="page page-secondary">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="page-secondary-item">
                        <h1 class="title">
                            <?= __('[:ru]Ууууупс![:uk]Ууууупс![:]'); ?>
                        </h1>
                        <div class="page-subtitle">
                            <?= __('[:ru]такой страницы не существует[:uk]такої сторінки не існує[:]'); ?>
                        </div>
                        <a href="/" class="btn btn-primary">
                            <?= __('[:ru]На главную[:uk]На головну[:]'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer('secondary'); ?>