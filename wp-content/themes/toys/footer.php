</main>

<!-- App-footer -->
<footer id="app-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm mb-3 mb-sm-0">
                <div class="footer-copyright text-center text-sm-left">
                    <?= date('Y'); ?> Все права защищены
                </div>
            </div>
            <div class="col-12 col-sm d-flex justify-content-center">
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
            <div class="col d-none d-md-block"></div>
        </div>
    </div>
</footer>

<!-- Script -->
<?php wp_footer(); ?>
</body>

</html>