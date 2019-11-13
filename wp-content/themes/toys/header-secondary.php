<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body>

<?php require_once('includes/partials/svgs.php'); ?>

<div id="app">
    <!-- App-header -->
    <header id="app-header" class="app-header-secondary">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <a href="/" class="logo">
                        Logo
                    </a>
                </div>
                <div class="col-auto">
                    <div class="d-flex align-items-center">
                        <nav class="nav d-none d-md-block">
                            <?php wp_nav_menu([
                                'theme_location' => 'main_menu',
                                'menu' => '',
                                'container' => '',
                                'container_class' => '',
                                'container_id' => '',
                                'menu_class' => 'nav-list',
                                'menu_id' => '',
                                'echo' => true,
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            ]); ?>
                        </nav>
                        <div class="favorites d-none d-md-block">
                            <a href="<?= get_permalink(67); ?>">
                                <svg width="20" height="20">
                                    <use xlink:href="#favorite-icon"></use>
                                </svg>
                            </a>
                        </div>
                        <?php
                        if (function_exists('wpm_language_switcher'))
                            wpm_language_switcher('dropdown', 'name');
                        ?>
                        <div class="burger-menu">
                            <div class="line line--top"></div>
                            <div class="line line--middle"></div>
                            <div class="line line--bottom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <nav class="menu-nav">
                <?php wp_nav_menu([
                    'theme_location' => 'main_menu',
                    'menu' => '',
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'nav-list',
                    'menu_id' => '',
                    'echo' => true,
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                ]); ?>
                <div class="d-flex align-items-center">
                    <div class="favorites">
                        <a href="<?= get_permalink(67); ?>">
                            <svg width="20" height="20">
                                <use xlink:href="#favorite-icon"></use>
                            </svg>
                        </a>
                    </div>
                    <?php
                    if (function_exists('wpm_language_switcher'))
                        wpm_language_switcher('dropdown', 'name');
                    ?>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main -->
    <main>
