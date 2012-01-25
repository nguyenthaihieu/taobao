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

function initServerTime()
{?>
    <script type="text/javascript">
        var serverHours = parseInt("<?php echo getHours(); ?>");
        var serverMinutes = parseInt("<?php echo getMinutes(); ?>");
	</script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/timer.js"></script>
<?php
}
add_action('wp_enqueue_scripts','initServerTime');


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