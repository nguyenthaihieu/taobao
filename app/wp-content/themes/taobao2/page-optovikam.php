<?php get_header(); ?>

<section id="container">
    <section id="content">
        <h2 class="title">Оптовые закупки с Taobao.ru.com</h2>
        <div class="top"></div>
        <div class="body">

            <?php wp_reset_query(); ?>
            <?php rewind_posts(); ?>
            <?php  while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
            <?php rewind_posts(); ?>

            <?php query_posts('post_parent=14&post_type=page&numberposts=1&order=asc');?>
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