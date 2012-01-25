<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html lang="ru" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="ru" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="ru" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="ru" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru" class="no-js"> <!--<![endif]-->
<head>
    <title><?php wp_title() ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
    <!-- reference your own javascript files here -->

    <script src="<?php bloginfo('template_directory'); ?>/js/modernizr-2.0.6.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/translate.js"></script>

    <script type="text/javascript">
        var clientIP = "<?php echo getenv('REMOTE_ADDR'); ?>";
    </script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/geoip.js"></script>
    <!-- test runner files -->
    <script src="<?php bloginfo('template_directory'); ?>/js/qunit.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/tests.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/form.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cusel.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jScrollPane.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.js"></script>
	<script type="text/javascript">
	<!--
	
		
	jQuery(document).ready(function(){
	
	var params = {
			changedEl: "#search_country",
			visRows: 5,
			scrollArrows: true
		}
	
		cuSel(params);
		
	
	});
	
	-->
	</script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>css/ie7.css" media="screen"/><![endif]-->
	<!--[if gte IE 9]> <script type="text/javascript"> Cufon.set('engine', 'canvas'); </script> <![endif]-->
   <?php wp_head(); ?>
	
</head>
<body>
<div class="soce">
	<ul>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_1_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/i.gif" alt="" title="" /></a></li>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_2_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/i1.gif" alt="" title="" /></a></li>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_3_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/pen.gif" alt="" title="" /></a></li>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_4_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/i3.gif" alt="" title="" /></a></li>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_5_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/i4.gif" alt="" title="" /></a></li>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_6_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/i5.gif" alt="" title="" /></a></li>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_7_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/i6.gif" alt="" title="" /></a></li>
		<li><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_6_fieldID_8_numInSet_0', true) ?>"><img src="<?php bloginfo('template_url'); ?>/img/i7.gif" alt="" title="" /></a></li>
	</ul>
</div>
<div class="width">
    <section id="header">
        <header class="top">
            <div class="box">
                <div class="contru">
                    <span class="left">Доставляем товары по всей России, привезем и вам, в</span>
						<span class="val_left">
							<!--<span id="city" class="val">Город не определен.</span>-->							
								<select class="wid100" id="search_country" name="search_country"><option value="0" selected="selected">Все страны</option><option value="13">Австралия</option><option value="15">Австрия</option><option value="6">Азербайджан</option><option value="8">Армения</option><option value="30">Беларусь</option><option value="22">Бельгия</option><option value="36">Болгария</option><option value="241">Великобритания</option><option value="109">Венгрия</option><option value="250">Вьетнам</option><option value="89">Гана</option><option value="94">Германия</option><option value="104">Гонконг</option><option value="98">Греция</option><option value="88">Грузия</option><option value="61">Дания</option><option value="67">Египет</option><option value="117">Израиль</option><option value="113">Индия</option><option value="111">Индонезия</option><option value="116">Иран</option><option value="68">Ирландия</option><option value="216">Испания</option><option value="118">Италия</option><option value="261">Йемен</option><option value="136">Казахстан</option><option value="40">Канада</option><option value="60">Кипр</option><option value="46">Китай</option><option value="57">Куба</option><option value="129">Кыргызстан</option><option value="139">Латвия</option><option value="140">Литва</option><option value="146">Люксембург</option><option value="167">Малайзия</option><option value="151">Молдова</option><option value="174">Нигерия</option><option value="175">Нидерланды (Голландия)</option><option value="183">Новая Зеландия</option><option value="177">Норвегия</option><option value="3">О.А.Э.</option><option value="189">Пакистан</option><option value="186">Перу</option><option value="190">Польша</option><option value="192">Португалия</option><option value="202">Россия</option><option value="199">Румыния</option><option value="214">Сингапур</option><option value="142">Словакия</option><option value="211">Словения</option><option value="243">США</option><option value="227">Таджикистан</option><option value="226">Таиланд</option><option value="237">Тайвань</option><option value="233">Тунис</option><option value="235">Турция</option><option value="246">Узбекистан</option><option value="242">Украина</option><option value="200">Филиппины</option><option value="77">Финляндия</option><option value="84">Франция</option><option value="108">Хорватия</option><option value="75" id="test">Чехия</option><option value="223">Швейцария</option><option value="220">Швеция</option><option value="70">Эстония</option><option value="133">Южная Корея</option><option value="121">Япония</option></select>
						</span>
                </div>
                <div class="righ-box">
                    <a href="#" class="item1">Войти</a>
                    &Iota;
                    <a href="#" class="item2">Зарегистрироваться</a>
                </div>
            </div>
		    <div class="box">
                <div id="counter" class="number">
				</div>
                <div class="time">
                    <div id="alarm"></div>
                </div>
            </div>
            <nav class="block-menu">
                <ul>
                    <li class="item1"><a href="<?php echo get_option('omr_tracking_first');?>">Первый раз на сайте?</a></li>
                    <li class="item2"><div id="liveTexButton_4988">Онлайн консультант</div></li>
                    <li class="item3"><a href="http://zingaya.com/widget/8f1f898b96da893919493f889553ecd3" onclick="window.open(this.href+'?referrer='+escape(window.location.href), '_blank', 'width=236,height=220,resizable=no,toolbar=no,menubar=no,location=no,status=no'); return false" class="zingaya_button">Бесплатный звонок</a></li>
                    <li class="item4 activ"><a href="<?php echo get_post_meta(2701, '_simple_fields_fieldGroupID_4_fieldID_2_numInSet_0',true);?>">Скачать форму заказа</a></li>
                </ul>
            </nav>
            <div class="box">
                <a href="<?php bloginfo('url') ?>" id="logo"></a>
                <div class="contact">
					<div class="left">
				         <div class="fone">
				         	<em>розничный отдел</em>
				         	<strong><span><?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_1_fieldID_1_numInSet_0',true);?></span> <?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_1_fieldID_2_numInSet_0',true);?></strong>
				         </div>
						 <ul class="contact">
							<li><img src="http://web.icq.com/whitepages/online?icq=<?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_1_fieldID_3_numInSet_0',true); ?>&img=5" alt="Статус <?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_1_fieldID_3_numInSet_0',true); ?>" /><?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_1_fieldID_3_numInSet_0',true); ?></li>
							<li class="mail"><a href="<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a></li>
							<li class="skype"><a href="skype:<?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_1_fieldID_4_numInSet_0',true);?>"><?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_1_fieldID_4_numInSet_0',true);?></a></li>					
						</ul>
				    </div>  
					<div class="left right">
				         <div class="fone">
				         	<em>оптовый отдел</em>
				         	<strong><span><?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_2_fieldID_1_numInSet_0',true);?></span> <?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_2_fieldID_2_numInSet_0',true);?></strong>
				         </div>
						 <ul class="contact">
							<li><img src="http://web.icq.com/whitepages/online?icq=<?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_2_fieldID_3_numInSet_0',true); ?>&img=5" alt="Статус <?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_2_fieldID_3_numInSet_0',true); ?>" /><?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_2_fieldID_3_numInSet_0',true); ?></li>
							<li class="mail"><a href="<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a></li>
							<li class="skype"><a href="skype:<?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_2_fieldID_4_numInSet_0',true);?>"><?php echo get_post_meta(2701,'_simple_fields_fieldGroupID_2_fieldID_4_numInSet_0',true);?></a></li>					
						</ul>
				    </div>             
		        </div>
            </div>
            <nav class="menu">
                    <?php wp_nav_menu($args = array(
                        'menu' => 'Top',
                        'container' => 'div',
                        'container_class' => 'bgmenu',
                        'menu_class' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'depth' => 0,
                    )
                );?>

                <a href="<?php bloginfo('url') ?>/?page_id=2689" class="blog">&nbsp;</a>
            </nav>
            <div class="slaider-box">
                <span class="prev"></span>
                <span class="next"></span>
                <div class="slaide">
                    <ul>
                        <?php query_posts('post_type=messages_slider&messages-slider-category=all')?>
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post();  ?>
                            <li>
                                <?php the_content(); ?>
                            </li>
                            <?php endwhile; ?>
                        <?php endif;?>
						<?php wp_reset_query();?>
                    </ul>
					<div class="pagers"></div>
                </div>
            </div>
        </header>
    </section>
