<?php

function getHours()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[0];
}

function getMinutes()
{
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[1];
}

function initScripts()
{
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery',
        get_template_directory_uri() . '/js/jquery-1.6.1.js');
    ?>
    <script>
        var serverHours = parseInt("<?php echo getHours(); ?>");
        var serverMinutes = parseInt("<?php echo getMinutes(); ?>");
	    var clientIP = "<?php echo getenv('REMOTE_ADDR'); ?>";
        var blogUrl = "<?php bloginfo('url'); ?>";
    </script>
	<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
<?php
    wp_register_script('timer',
       get_template_directory_uri() . '/js/timer.js',
       array('jquery'));

    wp_register_script('modernizr',
       get_template_directory_uri() . '/js/modernizr-2.0.6.min.js');

    wp_register_script('translate',
       get_template_directory_uri() . '/js/translate.js',
       array('jquery'));

    wp_register_script('geoip',
       get_template_directory_uri() . '/js/geoip.js',
       array('jquery'));

    wp_register_script('jcarousellite',
       get_template_directory_uri() . '/js/jcarousellite_1.0.1.js',
       array('jquery'));

    wp_register_script('jquery.cycle.all',
       get_template_directory_uri() . '/js/jquery.cycle.all.min.js',
       array('jquery'));

    wp_register_script('form',
       get_template_directory_uri() . '/js/form.js',
       array('jquery'));

    wp_register_script('cusel',
       get_template_directory_uri() . '/js/cusel.js',
       array('jquery'));

    wp_register_script('jScrollPane',
       get_template_directory_uri() . '/js/jScrollPane.js',
       array('jquery'));

    wp_register_script('jquery.mousewheel',
       get_template_directory_uri() . '/js/jquery.mousewheel.js',
       array('jquery'));

    wp_register_script('main',
       get_template_directory_uri() . '/js/main.js',
       array('jquery'));

    wp_enqueue_script('jquery');
    wp_enqueue_script('timer');
    wp_enqueue_script('modernizr');
    wp_enqueue_script('plugins');
    wp_enqueue_script('translate');
    wp_enqueue_script('geoip');
    wp_enqueue_script('jcarousellite');
    wp_enqueue_script('jquery.cycle.all');
    wp_enqueue_script('form');
    wp_enqueue_script('cusel');
    wp_enqueue_script('jScrollPane');
    wp_enqueue_script('jquery.mousewheel');
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts','initScripts');


function onlineConsultation()
{ ?>
<script type="text/javascript">
    var liveTex = true,
        liveTexID = 12443,
        liveTex_object = true;
    (function() {
        var lt = document.createElement('script');
        lt.type ='text/javascript';
        lt.async = true;
        lt.src = 'http://cs15.livetex.ru/js/client.js';
        var sc = document.getElementsByTagName('script')[0];
        if ( sc ) sc.parentNode.insertBefore(lt, sc);
        else  document.documentElement.firstChild.appendChild(lt);
 })();
</script>
<?php
}
//add_action('wp_enqueue_scripts','onlineConsultation');

register_taxonomy('messages-slider-category',
    array(
        0 => 'messages_slider',
    ),
    array('hierarchical' => true,
        'label' => 'Categories',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Slug'),
        'singular_label' => 'Category'
    )
);