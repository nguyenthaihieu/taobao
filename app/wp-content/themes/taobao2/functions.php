<?php

add_theme_support('post-thumbnails');

if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails');
}

// PART 1
require_once "functions/type-video-slider.php";
require_once "functions/meta-video-slider.php";
require_once "functions/taxonomy-video-slider.php";

require_once "functions/type-transport-com.php";
require_once "functions/meta-transport-com.php";
require_once "functions/taxonomy-transport-com.php";

add_shortcode( 'howItWorks', 'shortcode_howItWorks' );

function shortcode_howItWorks() {
    return '<div class="alamo">
						<ul class="border">
							<li>
								<h2>Как это работает:</h2>
								<p>Для тех, кто первый раз работает с нами, мелким оптом считаем заказ от 6 500 юаней. В дальнейшем от 11 000 юаней.</p>
							</li>
							<li>
								<p><b>Размер комиссии при заказе составляет:</b></p>
								<table cellpadding="0" cellspacing="0">
									<tbody><tr>
										<td>
											<span>10%</span>
											<strong>от 6500 юаней</strong>
											<em>при первом заказе</em>
										</td>
										<td>
											<span>10%</span>
											<strong>от 6500 юаней</strong>
										</td>
										<td>
											<span>10%</span>
											<strong>от 27 000 юаней</strong>
										</td>
									</tr>
								</tbody></table>
							</li>
							<li>
								<h3>Доставка в Россию - от 300 р./кг.</h3>
								<p>г. Благовещенск, Амурская обл.</p>
							</li>
							<li>
								<h3>Оплата происходит в несколько этапов:</h3>
								<ol>
									<li>
										<span class="col-1">Оплата <i>вашего заказа</i></span>
										<span class="plus">+</span>
										<span class="commission">Наша комиссия</span>
										<span class="plus">+</span>
										<span class="col-1">Доставка <i>по Китаю</i></span>
									</li>
									<li><p><b>Оплата за перевозку из Китая в РФ</b> (г.Благовещенск, Амурская область).</p></li>
									<li><p><b>Оплата транспортных расходов до Вашего города</b> (если способ доставки не предусматривает оплату при получении, как, например, когда товар отправляется службой курьерской доставки EMS, в остальных случаях транспортные расходы оплачиваете самостоятельно при получении груза в Вашем городе).</p></li>
								</ol>
							</li>
						</ul>
					</div>';
}

add_shortcode( 'spiral', 'shortcode_spiral' );

function shortcode_spiral() {
    global $post;
    wp_reset_query();
    rewind_posts();
    if (have_posts()) : while (have_posts()) : the_post();
            return '<div class="steps step-next">
                <div class="num-1">
                    <span class="num">2</span>
                    <p>'.get_post_meta($post->ID, "num-2", true).'</p>
                </div>
                <div class="num-2">
                    <span class="num">1</span>
                    <p>'.get_post_meta($post->ID, "num-1", true).'</p>
                </div>

                <div class="num-4">
                    <span class="num">3</span>
                    <p>'.get_post_meta($post->ID, "num-3", true).'</p>
                </div>
                <div class="num-5">
                    <span class="num">4</span>
                    <p>'.get_post_meta($post->ID, "num-4", true).'</p>
                </div>
                <div class="num-6">
                    <span class="num">5</span>
                    <p>'.get_post_meta($post->ID, "num-5", true).'</p>
                </div>
            </div>
            <div class="color-text">
                <p>'.get_post_meta($post->ID, "Текст под схемой", true).'</p>
            </div>'; ?>
        <?php endwhile;
    endif;
    wp_reset_query();
}


// PART 2
function getHours() {
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[0];
}

function getMinutes() {
    $time = date_i18n(get_option('time_format'));
    $times = explode(":", $time);
    return $times[1];
}

function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function initScripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery',
            get_template_directory_uri() . '/js/jquery-1.6.1.js');
    ?>
<script>
    var serverHours = parseInt("<?php echo getHours(); ?>");
    var serverMinutes = parseInt("<?php echo getMinutes(); ?>");
    <?php list($startOfWork, $endOfWork) = explode('-', get_option('working_hours', '10-19')); ?>
        var startOfWork = parseInt("<?php echo $startOfWork ?>");
        var endOfWork = parseInt("<?php echo $endOfWork ?>");
        var workingDays = "<?php echo get_option('working_days', '1,2,3,4,5') ?>";
        var holidays = "<?php echo get_option('holidays', ''); ?>";

        var clientIP = "<?php echo (!empty($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR']:'127.0.0.1'; ?>";
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
    wp_register_script('jquery.easing-1.3.pack',
            get_template_directory_uri() . '/js/jquery/fancybox/jquery.easing-1.3.pack.js',
            array('jquery'));
    wp_register_script('jquery.fancybox-1.3.4.pack',
            get_template_directory_uri() . '/js/jquery/fancybox/jquery.fancybox-1.3.4.pack.js',
            array('jquery'));
    wp_register_script('jquery.cookie',
            get_template_directory_uri() . '/js/jquery.cookie.js',
            array('jquery'));
    wp_register_script('main',
            get_template_directory_uri() . '/js/main.js',
            array('jquery'));
    wp_register_script('valid',
            get_template_directory_uri() . '/js/valid.js',
            array('jquery'));
    wp_register_script('various',
        get_template_directory_uri() . '/js/jquery/fancybox/various.js',
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
    wp_enqueue_script('jquery.cookie');
    wp_enqueue_script('main');
    wp_enqueue_script('valid');
    wp_enqueue_script('various');
}
add_action('wp_enqueue_scripts','initScripts');

function onlineConsultation() { ?>
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

if ('on' == get_option('taobao_turn_online_consult', 'off')) {
    add_action('wp_enqueue_scripts','onlineConsultation');
}

register_taxonomy('messages-slider-category',
        array(
        0 => 'messages_slider',
        ),
        array('hierarchical' => true,
        'label' => 'Рубрики',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Slug'),
        'singular_label' => 'Category'
        )
);


function shortcode_calculation() {?>
<div class="t3">
    <div class="alamo">
        <h2>Расчет</h2>
        <div class="calculator"><span><?php echo get_option('procent', '15');?><em>%</em></span>
            <span><?php echo get_option('taobao_cny', 'N.A.');?></span></div>
        <ul class="inform">
            <li>- доставка по Китаю выбирается EMS;</li>
            <li><span class="num"><?php echo get_option('procent', '15');?>%</span> - наша комиссия, которая может изменяться на 5-10 % (для оптовиков и посредников);</li>
            <li><span class="num"><?php echo get_option('taobao_cny', 'N.A.');?></span> - внутренний курс юаня нашей компании;</li>
            <li>- 300 руб /кг – тарифы компании карго из Хэйхэ (Китай) до Благовещенска (Россия).</li>
        </ul>
    </div>
</div>
    <?php
//return true;
}
add_shortcode('calculation', 'shortcode_calculation');

function PriceCalculatorFun () {?>
<div class="t4">
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
</div>
    <?php
    //return true;
}
add_shortcode('PriceCalculator', 'PriceCalculatorFun');

function transportationFun() {
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
                                <?php } if

        ( has_term( 'auto', 'transport_com-tags') ) { ?>
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
                                <?php } if

                            ( has_term( 'train', 'transport_com-tags') ) { ?>
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
            <?php } if

                            ( has_term( 'auto', 'transport_com-tags') ) { ?>
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
                                <?php } if

        ( has_term( 'train', 'transport_com-tags') ) { ?>
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
                                <?php } if

                            ( has_term( 'auto', 'transport_com-tags') ) { ?>
                    <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
            <?php } if

                ( has_term( 'train', 'transport_com-tags') ) { ?>
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


// PART 3
                function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
        <div class="coment">
            <div class="ava">
                            <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
            </div>
            <div class="boxer">
                <p> <?php printf(__('%s'), get_comment_author_link()) ?> <span class="date"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
    <?php
                    $author = get_comment_author_url();
                    echo substr_replace($author, "", 0, 7);
    ?>
                    </span> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></p>
    <?php if ($comment->comment_approved == '0') : ?>
                <p><?php _e('Your comment is awaiting moderation.') ?></p>
    <?php endif; ?>
    <?php comment_text() ?>
                <div class="reply">
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>
        </div>
    </div>
        <?php
    }


// PART 4
    /**
     * Counting number of viewers of site
     * @author Vladislav Fedorischev <vlad_graf@mail.ru>
     *
     * @return array
     */
    function getViews() {
        $visit = strval((int)StatPress_Print("%totalpageviews%") + 616908);
        $resultArray = array();
        $stringLength = strlen($visit);
        for ($i = 0; $i < $stringLength; $i++) {
            $resultArray[] = $visit{$i};
        }
        $reverse = array_reverse($resultArray, false);
        $count = count($reverse);
        for ($count; $count < 9; $count++) {
            $reverse[] = "0";
        }
        $normal = array_reverse($reverse, false);

        return $normal;
    }

    /**
     * Prints ajax responce to show number of viewers
     * @author Vladislav Fedorischev <vlad_graf@mail.ru>
 */
function viewsRefresh() {
    if (isset($_GET['timer'])) :
        header('Content-Type: text/html; charset=utf-8');
        $views = getViews();
        ?>
    <div class="left-num">
        <a href="#"><?php echo $views[0];?></a>
        <a href="#"><?php echo $views[1];?></a>
        <a href="#"><?php echo $views[2];?></a>
    </div>
    <div class="left-num">
        <a href="#"><?php echo $views[3];?></a>
        <a href="#"><?php echo $views[4];?></a>
        <a href="#"><?php echo $views[5];?></a>
    </div>
    <div class="left-num">
        <a href="#"><?php echo $views[6];?></a>
        <a href="#"><?php echo $views[7];?></a>
        <a href="#"><?php echo $views[8];?></a>
    </div>
    <div class="text">
        <p>Столько человек уже воспользовались <br/> услугами нашего сервиса</p>
    </div>


            <?php die();
        endif;
    }

    add_action('init', 'viewsRefresh');

    function kama_excerpt($args='') {
        global $post;
        if(is_array($args)) {
            $i=$args;
        } else {
            parse_str($args, $i);
        }

        $maxchar     = isset($i['maxchar']) ?  (int)trim($i['maxchar'])     : 350;
        $text        = isset($i['text']) ?          trim($i['text'])        : '';
        $save_format = isset($i['save_format']) ?   trim($i['save_format'])         : false;
        $echo        = isset($i['echo']) ?          false                   : true;

        if (!$text) {
            $out = $post->post_excerpt ? $post->post_excerpt : $post->post_content;
            $out = preg_replace ("!\[/?.*\]!U", '', $out ); //убираем шоткоды, например:[singlepic id=3]
            //для тега <!--more-->
            if( !$post->post_excerpt && strpos($post->post_content, '<!--more-->') ) {

                $out = str_replace("\r", '', trim($match[1], "\n"));
                $out = preg_replace( "!\n\n+!s", "</p><p>", $out );
                $out = "<p>". str_replace( "\n", "<br />", $out ) ."</p>";
                if ($echo)
                    return print $out;
                return $out;
            }
        }

        $out = $text.$out;
        if (!$post->post_excerpt)
            $out =$out;

        if ( iconv_strlen($out, 'utf-8') > $maxchar ) {
            $out = iconv_substr( $out, 0, $maxchar, 'utf-8' );
            $out = preg_replace('@(.*)\s[^\s]*$@s', '\\1 ...', $out); //убираем последнее слово, ибо оно в 99% случаев неполное
        }

        if($save_format) {
            $out = str_replace( "\r", '', $out );
            $out = preg_replace( "!\n\n+!", "</p><p>", $out );
            $out = "<p>". str_replace ( "\n", "<br />", trim($out) ) ."</p>";
        }

        if($echo) return print $out;
        return $out;
    }


    add_filter( 'show_admin_bar', '__return_false' );

    add_theme_support( 'menu' );

    register_nav_menus(array(
            'top' => 'Верхнее меню',

    ));



    add_action('init', 'messages_slider');

    function messages_slider() {

        $eventlabels = array(
                'name' => 'Cрочные сообщения',
                'singular_name' => 'messages_slider',
                'add_new' => 'Добавить срочное сообщение',
                'add_new_item' => 'Добавить срочное сообщение',
                'edit_item' => 'Добавить новое срочное сообщение',
                'new_item' => 'Новое срочное сообщение',
                'view_item' => 'Показать',
                'search_items' => '',
                'not_found' =>  '',
                'not_found_in_trash' => '',
                'parent_item_colon' => '',
                'menu_name' => 'Cрочные сообщения',
                'all_items' => 'Все срочные сообщения'

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
                'supports' => array('title', 'editor'));

        register_post_type('messages_slider',$eventargs);
    }

    add_action('init', 'optionstext');

    function optionstext() {

        $eventlabels = array(
                'name' => 'Текст на главной',
                'singular_name' => 'optionstext',
                'add_new' => 'Добавить запись',
                'add_new_item' => 'Добавить запись',
                'edit_item' => 'Добавить новую запись',
                'new_item' => 'Новая запись',
                'view_item' => 'Показать',
                'search_items' => '',
                'not_found' =>  '',
                'not_found_in_trash' => '',
                'parent_item_colon' => '',
                'menu_name' => 'Настройки в главной',
                'all_items' => 'Все записи'

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
                'supports' => array('title', 'editor'));

        register_post_type('optionstext',$eventargs);
    }

    add_action('init', 'contact');

    function contact() {

        $eventlabels = array(
                'name' => 'Контакты',
                'singular_name' => 'contact',
                'add_new' => 'Добавить контакт',
                'add_new_item' => 'Добавить контакт',
                'edit_item' => 'Добавить новую запись',
                'new_item' => 'Новая запись',
                'view_item' => 'Показать',
                'search_items' => '',
                'not_found' =>  '',
                'not_found_in_trash' => '',
                'parent_item_colon' => '',
                'menu_name' => 'Контакты',
                'all_items' => 'Все контакты'

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
                'supports' => array('title', 'editor'));

        register_post_type('contact',$eventargs);
    }

    register_taxonomy('contact-category',
            array(
            0 => 'contact',
            ),
            array('hierarchical' => true,
            'label' => 'Рубрики',
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'Slug'),
            'singular_label' => 'Category'
            )
    );

    register_taxonomy('contact-tags',
            array(
            0 => 'contact',
            ),
            array('hierarchical' => false,
            'label' => 'Метки',
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'Slug'),
            'singular_label' => 'Tag'
            )
    );

// Load main options panel file
    require_once (TEMPLATEPATH . '/functions/admin-menu.php');


    function new_excerpt_length($length) {
        return 15;
    }
    add_filter('excerpt_length', 'new_excerpt_length');

    function new_excerpt_more($more) {
        return '<span class="block"><a href="'. get_permalink($post->ID) . '">' . ' Читать далее ..' . '</a></span>';
}
add_filter('excerpt_more', 'new_excerpt_more');


require_once 'functions/calculator.php';
require_once 'functions/calc_places.php';