<?php
// Register Custom Taxonomy
function product_category() {

    $labels = array(
        'name'                       => _x( 'Категории продуктов', 'Taxonomy General Name', 'product_category' ),
        'singular_name'              => _x( 'Категории продуктов', 'Taxonomy Singular Name', 'product_category' ),
        'menu_name'                  => __( 'Категории продуктов', 'product_category' ),
        'all_items'                  => __( 'Все категории', 'product_category' ),
        'parent_item'                => __( 'Родительская категория', 'product_category' ),
        'parent_item_colon'          => __( 'Родительская категория:', 'product_category' ),
        'new_item_name'              => __( 'Название новой категории', 'product_category' ),
        'add_new_item'               => __( 'Добавить новую категорию', 'product_category' ),
        'edit_item'                  => __( 'Изменить категорию', 'product_category' ),
        'update_item'                => __( 'Обновить категорию', 'product_category' ),
        'view_item'                  => __( 'Посмотреть категорию', 'product_category' ),
        'separate_items_with_commas' => __( 'Отдельные категории с запятыми', 'product_category' ),
        'add_or_remove_items'        => __( 'Добавить или удалить категорию', 'product_category' ),
        'choose_from_most_used'      => __( 'Выберите из наиболее часто используемых', 'product_category' ),
        'popular_items'              => __( 'Популярные категории', 'product_category' ),
        'search_items'               => __( 'Поиск категорий', 'product_category' ),
        'not_found'                  => __( 'Не обнаружена', 'product_category' ),
        'no_terms'                   => __( 'Нет категорий', 'product_category' ),
        'items_list'                 => __( 'Список категорий', 'product_category' ),
        'items_list_navigation'      => __( 'Навигация по списку категорий', 'product_category' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'x', array( 'product' ), $args );

}
add_action( 'init', 'product_category', 0 );