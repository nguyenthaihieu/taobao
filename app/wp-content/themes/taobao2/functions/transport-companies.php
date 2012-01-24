<div class="boxer-text">
    <p><b>Оптимальная доставка транспортными компаниями:</b></p>
    <dl class="tabs">
        <dt class="ta1"><a href="#" onclick="return false;">По территории РФ</a></dt>
        <dt class="ta2"><a href="#" onclick="return false;">Амурская область</a></dt>
        <dt class="ta3"><a href="#" onclick="return false;">Дальний Восток</a></dt>
    </dl>
    <div class="ta1">
    <?php query_posts('post_type=transport_com&transport_com-category=t1&order=ASC'); ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="it-line">
            <div class="logo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
            <div class="description">
                <?php the_content(); ?>
            <?php $url = get_post_meta($post->ID, "transport_com_url", true); ?>
                <p class="url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a>
            <?php if( has_term( 'air', 'transport_com-tags') ) { ?>
                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree1.gif" alt="" title="" /></a>
            <?php } if( has_term( 'auto', 'transport_com-tags') ) { ?>
                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
            <?php } if( has_term( 'train', 'transport_com-tags') ) { ?>
                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree3.gif" alt="" title="" /></a>
            <?php } ?>
                </p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>

    <div class="ta2">

        <?php query_posts('post_type=transport_com&transport_com-category=t2&order=ASC'); ?>
        <?php while (have_posts()) : the_post(); ?>

        <div class="it-line">
            <div class="logo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
            <div class="description">
                <?php the_content(); ?>
                <?php $url = get_post_meta($post->ID, "transport_com_url", true); ?>
                <p class="url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a>
                    <?php if( has_term( 'air', 'transport_com-tags') ) { ?>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree1.gif" alt="" title="" /></a>
                    <?php } if( has_term( 'auto', 'transport_com-tags') ) { ?>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
                    <?php } if( has_term( 'train', 'transport_com-tags') ) { ?>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree3.gif" alt="" title="" /></a>
                    <?php } ?>
                </p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

    </div>

            <div class="ta3">

                <?php query_posts('post_type=transport_com&transport_com-category=t3&order=ASC'); ?>
                <?php while (have_posts()) : the_post(); ?>

                <div class="it-line">
                    <div class="logo"><a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a></div>
                    <div class="description">
                        <?php the_content(); ?>
                        <?php $url = get_post_meta($post->ID, "transport_com_url", true); ?>
                        <p class="url"><a href="<?php echo $url; ?>"><?php echo $url; ?></a>
                            <?php if( has_term( 'air', 'transport_com-tags') ) { ?>
                                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree1.gif" alt="" title="" /></a>
                                <?php } if( has_term( 'auto', 'transport_com-tags') ) { ?>
                                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree-2.gif" alt="" title="" /></a>
                                <?php } if( has_term( 'train', 'transport_com-tags') ) { ?>
                                <a href="#"><img src="<?php bloginfo('template_directory'); ?>/img/gree3.gif" alt="" title="" /></a>
                                <?php } ?>
                        </p>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>

            </div>

</div>