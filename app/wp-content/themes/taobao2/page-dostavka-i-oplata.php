<?php get_header(); ?>

<section id="container">
    <section id="content">
        <h2 class="title">Оптовые закупки с Taobao.ru.com</h2>

        <div class="top"></div>
        <div class="body">
            <div class="allbox padding">
                <ul class="bottons">
                    <li><a href="#">Оплата</a></li>
                    <li><a href="#">Доставка</a></li>
                    <li class="activ"><a href="#" class="big">Примерный расчет</a></li>
                    <li><a href="#">Калькулятор</a></li>
                </ul>
                <div class="slaider-box-page">
                    <span class="prev"></span>
                    <span class="next"></span>

                    <div class="slaide-page">
                        <ul>
                            <li>
                                <a href="#">ВНИМАНИЕ! Почта zakaz.taobao.ru.com@gmail.com временно не работает.
                                    Отправляйте письмо на почту zakaz@taobao.ru.com</a>
                            </li>
                            <li>
                                <a href="#">ВНИМАНИЕ! Почта zakaz.taobao.ru.com@gmail.com временно не работает.
                                    Отправляйте письмо на почту zakaz@taobao.ru.com</a>
                            </li>
                            <li>
                                <a href="#">ВНИМАНИЕ! Почта zakaz.taobao.ru.com@gmail.com временно не работает.
                                    Отправляйте письмо на почту zakaz@taobao.ru.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php wp_reset_query(); ?>
                <?php rewind_posts(); ?>
                <?php  while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
            <?php query_posts('post_parent=dostavka-i-oplata&post_type=page&numberposts=1');?>
            <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile;?>
            <?php wp_reset_query();?>
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
