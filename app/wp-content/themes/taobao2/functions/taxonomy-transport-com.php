<?php
register_taxonomy('transport_com-category',
        array(
        0 => 'transport_com',
        ),
        array('hierarchical' => true,
        'label' => 'Рубрики',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Slug'),
        'singular_label' => 'Category'
        )
);

register_taxonomy('transport_com-tags',
        array(
        0 => 'transport_com',
        ),
        array('hierarchical' => false,
        'label' => 'Метки',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Slug'),
        'singular_label' => 'Tag'
        )
);