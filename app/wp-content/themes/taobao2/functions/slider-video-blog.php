<div class="videos">

    <span class="prev">&nbsp;</span>
    <span class="next">&nbsp;</span>

    <div class="slaider-video">
        <ul class="video">
            <?php $posts = get_posts(array(
                'post_type' => 'video_slider',
                'video_slider-category' => 'blog-video-slider',
                'order' => 'ASC',
                'numberposts' => 20,
            )); ?>
            <?php foreach ($posts as $post): ?>
            <li>
                <div class="foto">

                        <?php
                        $youtube = false;
                        $vimeo = false;
                        if($url = get_post_meta($post->ID, "Youtube", true)) {
                            preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $youtube);
                        } elseif($url = get_post_meta($post->ID, "Vimeo", true)) {
                            preg_match('%http:\/\/(www.vimeo|vimeo)\.com(\/|\/clip:)(\d+)(.*?)%i', $url, $vimeo);
                        }
                        if (!empty($youtube)) { ?>

                    <a href="http://www.youtube.com/watch?v=<?php echo $youtube[1]; ?>"
                       rel="wp-video-lightbox" title=""><img
                            src="//i2.ytimg.com/vi/<?php echo $youtube[1]; ?>/default.jpg"
                            alt="YouTube" width="60" /></a> <?php

                            } elseif($vimeo) { ?>

                    <a href="http://vimeo.com/?php echo $vimeo[3]; ?>?width=640&amp;height=480"
                       rel="wp-video-lightbox" title="">
                        <img src="http://example.com/images/thumbnails/flash-logo.jpg"
                             alt="YouTube" width="60" /></a>
                        <!--                            <iframe src="http://player.vimeo.com/video/--><?php //echo $vimeo[3]; ?><!--?portrait=0&amp;autoplay=0" width="853" height="480" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>-->
                            <?php } else {
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