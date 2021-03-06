<div class="videos">
    <h2>Видеоинструкции <span> по работе с сервисом:</span></h2>
    <span class="prev">&nbsp;</span>
    <span class="next">&nbsp;</span>

    <div class="slaider-video">
        <ul>
            <?php $posts = get_posts(array(
                'post_type' => 'video_slider',
                'video_slider-category' => 'home-video-slider',
                'order' => 'ASC',
                'numberposts' => 20,
            )); ?>
            <?php foreach ($posts as $post): ?>
            <li>
                <div class="foto">
                    <a href="#">
                            <?php
                            $youtube = false;
                            $vimeo = false;
                            if($url = get_post_meta($post->ID, "Youtube", true)) {
                                preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $youtube);
                            } elseif($url = get_post_meta($post->ID, "Vimeo", true)) {
                                preg_match('%http:\/\/(www.vimeo|vimeo)\.com(\/|\/clip:)(\d+)(.*?)%i', $url, $vimeo);
                            }
                            if (!empty($youtube)) { ?>

                                <a class="various fancybox iframe" href="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?autoplay=1">
                                    <img src="//i2.ytimg.com/vi/<?php echo $youtube[1]; ?>/default.jpg"
                                         alt="YouTube" width="183"/></a>
                                <?php
                            } elseif ($vimeo) {
                                ?>

                                <a href="http://vimeo.com/?php echo $vimeo[3]; ?>?width=640&amp;height=480"
                                   rel="wp-video-lightbox" title="">
                                    <img src="http://example.com/images/thumbnails/flash-logo.jpg"
                                         alt="" width="60"/></a>
                                <!--                            <iframe src="http://player.vimeo.com/video/-->
                                    <?php //echo $vimeo[3]; ?><!--?portrait=0&amp;autoplay=0" width="853" height="480" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>-->
                                <?php
                            } else {
                                echo "Видео не доступно.";
                            }?>
                    </a>
                </div>
                <div class="text-video">
                    <p>
                        <a class="various fancybox iframe" href="http://www.youtube.com/embed/<?php echo $youtube[1]; ?>?autoplay=1">
                            <?php the_title(); ?>
                        </a>
                    </p>
                </div>
            </li>
            <?php endforeach; ?>
            <?php wp_reset_query(); ?>
        </ul>
    </div>
</div>