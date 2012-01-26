<?php get_header(); ?>
<div class="width">
    <section id="container">
        <section id="content">
            <h2 class="title">Error 404 - Not Found</h2>
            <div class="top"></div>
            <div class="body">
                <div class="page">
                    <h3>Error 404 - Not Found Please <a href="<?php bloginfo('home'); ?>" Click here</a> to return to our home page.</h3>
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
