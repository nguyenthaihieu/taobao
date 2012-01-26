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
	
	<script type="text/javascript">
       
jQuery(document).ready(function() {

        jQuery("#fancys").fancybox({

    'titlePosition'  : 'inside',
    
    'transitionIn'  : 'none',
   
    'transitionOut'  : 'none',
    'type' : 'image'
    
   
   });

       });
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
	 wp_register_script('jquery.easing-1.3.pack',
       get_template_directory_uri() . '/fancybox/jquery.easing-1.3.pack.js',
       array('jquery'));
	wp_register_script('jquery.fancybox-1.3.4.pack',
       get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.pack.js',
       array('jquery'));  
	wp_register_script('jquery.fancybox-1.3.4',
       get_template_directory_uri() . '/fancybox/jquery.fancybox-1.3.4.js',
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
    wp_enqueue_script('jquery.easing-1.3.pack');
    wp_enqueue_script('jquery.fancybox-1.3.4.pack');
    wp_enqueue_script('jquery.fancybox-1.3.4');
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


function shortcode_calculation() {?>

<div class="alamo">
    <h2>Расчет</h2>
    <div class="calculator"><span>15<em>%</em></span>
        <span>5,3</span></div>
    <ul class="inform">
        <li>- доставка по Китаю выбирается EMS;</li>
        <li><span class="num">15%</span> - наша комиссия, которая может изменяться на 5-10 % (для оптовиков и посредников);</li>
        <li><span class="num">5,3</span> - внутренний курс юаня нашей компании;</li>
        <li>- 300 руб /кг – тарифы компании карго из Хэйхэ (Китай) до Благовещенска (Россия).</li>
    </ul>
</div>
<?php
//return true;
}
add_shortcode('calculation', 'shortcode_calculation');

function PriceCalculatorFun () {?>

<div class="minus">
    <form action="" method="post" class="color">
        <div class="text-form">
            <h2>Калькулятор стоимости доставки</h2>

            <p>Для удобства расчета стоимости товара с учетом доставки, воспользуйтесь приведенной ниже формой. </p>
        </div>
        <div class="item">
            <label>Стоимость товара на таобао (юани)</label>
            <input type="text" class="text"/>
            <a href="#" class="info"></a>
        </div>
        <div class="item">
            <label>Стоимость доставки по Китаю (юани)</label>
            <input type="text" class="text"/>
            <a href="#" class="info"></a>
        </div>
        <div class="item">
            <label>Вес посылки (кг.)</label>
            <input type="text" class="text"/>
            <a href="#" class="info"></a>
        </div>
        <div class="item">
            <label>Ваше местоположение</label>
            <select class="sel">
                <option>не выбрано</option>
                <option>1</option>
                <option>1</option>
                <option>1</option>
            </select>
        </div>
        <div class="item">
            <label>Оптовый заказ <input clsss="chek" type="checkbox"/></label>
        </div>
        <div class="item">
            <button type="submit" class="sub"><i>Рассчитать</i></button>
        </div>
    </form>
</div>
<?php
    //return true;
}
add_shortcode('PriceCalculator', 'PriceCalculatorFun');

function transportationFun(){
    ?>
    <div class="boxer-text">
    <p><b>Оптимальная доставка транспортными компаниями:</b></p>
    <dl class="tabs">
    <dt class="ta1"><a href="#" onclick="return false;">По территории РФ</a></dt>
    <dt class="ta2"><a href="#" onclick="return false;">Амурская область</a></dt>
    <dt class="ta3"><a href="#" onclick="return false;">Дальний Восток</a></dt>
    </dl>
    <div class="ta1">
    <?php query_posts('post_type=transport_com&transport_com-category=t1&order=ASC'); ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="it-line">
            <div class="logo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
            <div class="description">
                <?php the_content(); ?>
            <?php $url = get_post_meta($post->ID, "transport_com_url", true); ?>
                <p class="url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a>
            <?php if( has_term( 'air', 'transport_com-tags') ) { ?>
                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree1.gif" alt="" title="" /></a>
            <?php } if( has_term( 'auto', 'transport_com-tags') ) { ?>
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
        <?php } if( has_term( 'train', 'transport_com-tags') ) { ?>
        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree3.gif" alt="" title="" /></a>
        <?php } ?>
                </p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>

    <div class="ta2">

        <?php query_posts('post_type=transport_com&transport_com-category=t2&order=ASC'); ?>
        <?php while (have_posts()) : the_post(); ?>

        <div class="it-line">
            <div class="logo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
            <div class="description">
                <?php the_content(); ?>
                <?php $url = get_post_meta($post->ID, "transport_com_url", true); ?>
                <p class="url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a>
                    <?php if( has_term( 'air', 'transport_com-tags') ) { ?>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree1.gif" alt="" title="" /></a>
                        <?php } if( has_term( 'auto', 'transport_com-tags') ) { ?>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
                        <?php } if( has_term( 'train', 'transport_com-tags') ) { ?>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree3.gif" alt="" title="" /></a>
                        <?php } ?>
                </p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

    </div>

            <div class="ta3">

                <?php query_posts('post_type=transport_com&transport_com-category=t3&order=ASC'); ?>
                <?php while (have_posts()) : the_post(); ?>

                <div class="it-line">
                    <div class="logo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
                    <div class="description">
                        <?php the_content(); ?>
                        <?php $url = get_post_meta($post->ID, "transport_com_url", true); ?>
                        <p class="url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a>
                            <?php if( has_term( 'air', 'transport_com-tags') ) { ?>
                                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree1.gif" alt="" title="" /></a>
                                <?php } if( has_term( 'auto', 'transport_com-tags') ) { ?>
                                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
                                <?php } if( has_term( 'train', 'transport_com-tags') ) { ?>
                                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree3.gif" alt="" title="" /></a>
                                <?php } ?>
                        </p>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>

            </div>

</div>
    <?php

}
add_shortcode('transportation', 'transportationFun');
