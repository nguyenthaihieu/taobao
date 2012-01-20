<?php

add_action('init', 'transport_com');

function transport_com()
{

    $eventlabels = array(
        'name' => 'transport_com',
        'singular_name' => 'transport_com',
        'add_new' => 'Добавить транспортную компанию',
        'add_new_item' => 'Новая транспортная компания',
        'edit_item' => 'Добавить новую транспортную компанию',
        'new_item' => 'Новая транспортная компания',
        'view_item' => 'Показать транспортную компанию',
        'search_items' => 'Поиск транспортных компаний',
        'not_found' => 'Транспортные компании не найдены',
        'not_found_in_trash' => 'Транспортные компании в корзине не найдены',
        'parent_item_colon' => '',
        'menu_name' => 'Транспортные компании',
        'all_items' => 'Все транспортные компании'
    );
    $eventargs = array(
        'labels' => $eventlabels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'));

    register_post_type('transport_com', $eventargs);
}