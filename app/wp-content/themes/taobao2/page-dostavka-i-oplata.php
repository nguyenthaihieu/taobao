<?php get_header(); ?>

<section id="container">
    <section id="content">
        <h2 class="title">Оптовые закупки с Taobao.ru.com</h2>
        <div class="top"></div>
        <div class="body">
            <div class="allbox padding">
                <ul class="tabs bottons">
                    <li class="t1"><a href="#" onclick="return false;">Оплата</a></li>
        			<li class="t2"><a href="#" onclick="return false;">Доставка</a></li>
        			<li class="t3"><a href="#" class="big" onclick="return false;">Примерный расчет</a></li>
        			<li class="t4"><a href="#" onclick="return false;">Калькулятор</a></li>
                </ul>
                <div class="slaider-box-page">
                    <span class="prev"></span>
                    <span class="next"></span>


                    <div class="slaide-page">
                        <ul>
                            <?php query_posts('post_type=messages_slider&messages-slider-category=dostavka-i-oplata')?>
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <li>
                                    <?php the_content(); ?>
                                </li>
                                <?php endwhile; ?>
                            <?php endif;?>
                            <?php wp_reset_query();?>
                        </ul>
                    </div>
                </div>
				<div class="t1">
					<?php  while (have_posts()) : the_post(); ?>
	                <?php the_content(); ?>
	                <?php endwhile; ?>
	                <?php wp_reset_query(); ?>
				</div>
            </div>
            <?php query_posts('post_parent=12&post_type=page&numberposts=1');?>
            <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile;?>
            <?php wp_reset_query();?>
			<div class="t2">
	            <div class="block">
	                <?php query_posts('page_id=2737');?>
	                <?php while (have_posts()) : the_post(); ?>
	                <?php the_content(); ?>
	                <?php endwhile;?>
	                <?php wp_reset_query();?>
	                <?php echo do_shortcode('[transportation]') ?>
	            </div>
			</div>
            <div class="thanks">
                <h2>Наш режим работы</h2>
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td>Понедельник - пятница</td>
                        <td><span>10:00 – 19:00</span></td>
                    </tr>
                    <tr>
                        <td>Суббота - воскресенье</td>
                        <td><span>выходной</span></td>
                    </tr>
                    </tbody>
                </table>
                <div class="center">

                    Если у вас появились вопросы – <a href="#">задайте их менеджеру!</a> Работаем мы – улыбаетесь вы! :)
                    <h3>Удачных покупок и быстрой доставки!</h3>
                </div>
            </div>
            <?php //require_once"functions/transport-companies.php" ?>
        </div>
        <div class="bottom"></div>
    </section>
    <div class="right">
        <div class="boxen">
            <?php get_sidebar('calc') ?>
        </div>
        <div class="blog-gree">
            <?php get_sidebar('blog') ?>
        </div>
    </div>
</section>
</div>

<?php get_footer(); ?>