<?php
/*
Template Name: Otziv
*/
?>
<?php get_header(); ?>

<section id="container">
    <section id="content">
        <h2 class="title">Отзывы о сервисе Taobao.ru.com</h2>
        <div class="top"></div>
        <div class="body">
            <div class="page">
                <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="post">
                    <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
                    <div class="entrytext">
                                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                    </div>
                </div>
                    <?php endwhile;
                endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

                <div class="comentars">
                    <h3>Отзывы</h3>
                    <?php get_template_part( 'content', 'single' ); ?>
<?php comments_template( '', true ); ?>
                </div>
            </div>
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