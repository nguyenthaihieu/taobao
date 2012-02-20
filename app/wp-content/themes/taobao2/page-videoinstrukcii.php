<?php get_header(); ?>

<section id="container">
    <section id="content">
        <?php wp_reset_query(); ?>
        <?php rewind_posts(); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2 class="title"><?php the_title(); ?></h2>

        <div class="top"></div>
        <div class="body">
            <div class="page">
                <p>
                            <?php list($teaser, $junk) = explode('<!--more', $post->post_content);
                            echo apply_filters('the_content', $teaser); ?>
                        <?php endwhile; else: ?>
                <p><?php _e('По вашему запросу ничего нет.'); ?></p>
                <?php endif; ?>
                </p>
                <?php wp_reset_query(); ?>
                <?php rewind_posts(); ?>

                <div class="all">
                    <h2 class="video">Все видео</h2>

                    <ul class="video">
                        <?php query_posts('post_type=video_slider&order=ASCposts_per_page=999'); ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <li>
                            <div class="foto">

                                    <?php
                                    $youtube = false;
                                    $vimeo = false;
                                    if ($url = get_post_meta($post->ID, "Youtube", true)) {
                                        preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $youtube);
                                    } elseif ($url = get_post_meta($post->ID, "Vimeo", true)) {
                                        preg_match('%http:\/\/(www.vimeo|vimeo)\.com(\/|\/clip:)(\d+)(.*?)%i', $url, $vimeo);
                                    }
                                    if (!empty($youtube)) {
                                        ?>

                                <a href="http://www.youtube.com/watch?v=<?php echo $youtube[1]; ?>"
                                   rel="wp-video-lightbox" title=""><img
                                        src="//i2.ytimg.com/vi/<?php echo $youtube[1]; ?>/default.jpg"
                                        alt="YouTube" width="183"/></a> <?php

                                        } elseif ($vimeo) {
                                            ?>

                                <a href="http://vimeo.com/?php echo $vimeo[3]; ?>?width=640&amp;height=480"
                                   rel="wp-video-lightbox" title="">
                                    <img src="http://example.com/images/thumbnails/flash-logo.jpg"
                                         alt="YouTube" width="183"/></a>
                                <!--                            <iframe src="http://player.vimeo.com/video/-->
                                        <?php //echo $vimeo[3]; ?><!--?portrait=0&amp;autoplay=0" width="853" height="480" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>-->
                                        <?php
                                    } else {
                                        echo "Видео не доступно.";
                                    }?>

                            </div>
                            <div class="text-video">
                                <p><a href="http://www.youtube.com/watch?v=<?php echo $youtube[1]; ?>"
                                      rel="wp-video-lightbox" title=""><?php the_title(); ?></a></p>
                            </div>
                        </li>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </ul>
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