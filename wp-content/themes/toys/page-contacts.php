<?php
/*
Template Name: Контакты
Template Post Type: page
*/
get_header();
?>

    <!-- Contacts -->
    <section id="page-contacts" class="page page-contacts">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-title">
                        <?= the_title(); ?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="contacts-item">
                        <ul class="contacts-list">
                            <li>
                                <a href="tel:<?= phone_link(get_theme_mod('phone')) ?>">
                                    <svg width="15" height="15">
                                        <use xlink:href="#phone-icon"></use>
                                    </svg>
                                    <?= get_theme_mod('phone'); ?>
                                </a>
                            </li>
                        </ul>
                        <ul class="social-list">
                            <li>
                                <a href="<?= get_theme_mod('instagram'); ?>">
                                    <svg width="20" height="20">
                                        <use xlink:href="#instagram-icon"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="viber://add?number=<?= get_theme_mod('viber'); ?>">
                                    <svg width="20" height="20">
                                        <use xlink:href="#viber-icon"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="tg://resolve?domain=<?= get_theme_mod('telegram'); ?>">
                                    <svg width="20" height="20">
                                        <use xlink:href="#telegram-icon"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-description">
                        <?php
                        while ( have_posts() ) : the_post();
                            echo get_the_content();
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer(); ?>