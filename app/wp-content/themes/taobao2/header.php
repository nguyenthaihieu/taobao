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
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/jquery/fancybox/jquery.fancybox-1.3.4.css" type="text/css"/>
  <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>css/ie7.css" media="screen"/><![endif]-->

        <?php wp_head(); ?>
		<script type="text/javascript">
			jQuery(document).ready(function() {	
				$(".various-map").fancybox({
					'transitionIn'	: 'none',
					'transitionOut'	: 'none'
				});
			
			});
		</script>
    </head>
    <body>
        <div class="soce">
            <ul>
                <?php for ($i = 0; $i <= 6; $i++) {
                if (get_option("cos$i")) {
                    ?>
                    <li><a href="<?php echo get_option("cos$i");?>"><img
                        src="<?php bloginfo('template_url'); ?>/img/i<?php echo $i; ?>.gif" alt="" title=""/></a></li>
                    <?php
                }

            } ?>

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
                            <input type="password" class="text pass" />
                            <label><a href="javascript:void(0);" class="show">показать пароль</a></label>
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
                        <p><a class="hid-form" href="javascript:void(0);"></a></p>
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
                                            echo '<option value="' . $country->code . '">' . $country->name . '</option>';
                                    }
                                    ?>
                                </select>
                            </span>
                        </div>
                        <div class="righ-box">
                            <a href="javascript:void(0);" class="item1">Войти</a>
                            &Iota;
                            <a href="javascript:void(0);" class="item2">Зарегистрироваться</a>
                        </div>
                    </div>
                    <div class="box">
                        <div id="counter" class="number">
                        </div>
                        <div class="time">
                            <div id="alarm"></div>
                        </div>
                    </div>
                    <?php if ('off' == get_option('taobao_turn_online_consult', 'off')) : ?>
                        <script type="text/javascript">
                            jQuery(function(){
                                jQuery('#liveTexButton_4988').click(function(){
                                    alert('Онлайн консультант временно не работает');
                                });
                            });
                        </script>
                    <?php endif; ?>
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
                                    <?php $a=get_the_content();
        kama_excerpt(array("maxchar" => 380, "text" => $a));?>
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
				<?php
					if (is_front_page()) {
						global $is_fp;
						$is_fp = true;
					}
					
				?>