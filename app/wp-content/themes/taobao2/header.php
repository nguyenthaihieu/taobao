<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html lang="ru" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="ru" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="ru" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="ru" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ru" class="no-js"> <!--<![endif]-->
<head>
    <title><?php wp_title() ?></title>    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>/fancybox/jquery.fancybox-1.3.4.css" type="text/css"/>
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>css/ie7.css" media="screen"/><![endif]-->
	
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
	<div class="form-reg">
				<div class="shadow"></div>
				<div class="ctnr">
					<form action="" method="post">
						<div class="form-1">
							<div class="item">
								<h3>Авторизация</h3>
							</div>
							<div class="item">
								<p>Если вы у нас первый раз, <a href="#">зарегистрируйтесь</a></p>
							</div>
							<div class="item">
								<label>Логин:</label>
								<input type="text" class="text" />
							</div>
							<div class="item">
								<label>Пароль:</label>
								<input type="password" class="text" />
								<label><a href="#" class="show">показать пароль</a></label>
							</div>
							<ul>
								<li><input type="checkbox" class="chek" /> <span>Запомнить меня</span></li>
								<li><input type="submit" class="sube" value="Войти" /></li>
								<li><a href="#">Я забыл пароль!</a></li>
							</ul>
							<p><a class="hid-form" href="javascript:void(0);" onclick="$('.form-reg').slideToggle('slow');"></a></p>
						</div>
					</form>	
				</div>				
			</div>
			<div class="form-reg-2">
				<div class="shadow"></div>
				<div class="ctnr">
					<form action="" method="post">
						<div class="register-form">
							<div class="item">
								<h3>Регистрация <a href="#">Видеоинструкция</a></h3>
							</div>
							<div class="item">
								<div class="left">
									<div class="item">
										<label>Логин: <i>*</i></label>
										<input type="text" class="text" />
									</div>
									<div class="item">
										<label>Пароль: <i>*</i></label>
										<input type="password" class="text" />
										<label><a href="#" class="show">показать пароль</a></label>
									</div>
									<div class="item">
										<label>Ваш e-mail: <i>*</i></label>
										<input type="text" class="text" />
									</div>
									<div class="item">
										<label>Контактный телефон: <i>*</i></label>
										<input type="text" class="text" />
										<span>Домашний, в формате (код города) xx-xx-xx <br/> Сотовый, в формате  +7 (xxx) xxx-xx-xx</span>
									</div>
								</div>
								<div class="left right">
									<div class="item">
										<label>Дополнительные контакты (icq. skype и т.п.):</label>
										<input type="text" class="text" />
									</div>
									<div class="item">
										<label>Фамилия: <i>*</i></label>
										<input type="text" class="text" />
									</div>
									<div class="item">
										<label>Имя: <i>*</i></label>
										<input type="text" class="text" />
									</div>
									<div class="item">
										<label>Отчество: <i>*</i></label>
										<input type="text" class="text" />
										<label><em>Поля, отмеченные *, обязательны для заполнения</em></label>
									</div>
								</div>
							</div>
							<p><a class="hid-form" href="javascript:void(0);" onclick="$('.form-reg-2').slideToggle('slow');"></a></p>
						</div>
						<ul>
							<li><input type="checkbox" class="chek" /> <span>Я согласен <a href="#">с условиями работы сервиса</a></span></li>
							<li><input type="submit" class="sube" value="Зарегистрироваться" /></li>
						</ul>
					</form>
				</div>				
			</div>
<div class="width">
    <section id="header">
        <header class="top">
            <div class="box">
                <div class="contru">
                    <span class="left">Доставляем товары по всей России, привезем и вам, в</span>
						<span class="val_left">
								<select class="wid100" id="search_country" name="search_country">
                                    <?php
                                    $countries = calc_places_get_countries();
                                    foreach ($countries as $country) {
                                        if($country->name)
                                        echo '<option value="' . $country->id . '">' . $country->name . '</option>';
                                    }
                                    ?>
                                </select>
						</span>
                </div>
               <div class="righ-box">
					<a href="javascript:void(0);" onclick="$('.form-reg').slideToggle('slow');" class="item1">Войти</a>
					&Iota;
					<a href="javascript:void(0);" onclick="$('.form-reg-2').slideToggle('slow');">Зарегистрироваться</a>
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
							<li class="mail"><a href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a></li>
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
							<li class="mail"><a href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a></li>
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
								<p><?php $a=get_the_content(); kama_excerpt(array("maxchar" => 380, "text" => $a));?></p>
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
