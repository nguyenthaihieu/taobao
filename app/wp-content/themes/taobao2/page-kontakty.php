<?php get_header(); ?>
<section id="container">
    <script type="text/javascript">
        jQuery(function(){
            jQuery('span.fancyimg').fancybox();
        });
    </script>
    <style type="text/css">
        span.fancyimg {color:blue;text-decoration:underline;cursor:pointer;}
    </style>
    <section id="content">
        <h2 class="title">Контакты</h2>
        <div class="top"></div>
        <div class="body">
            <div class="allbox">
                <ul class="tabs">
                    <li class="t5"><span><i><b>г. Благовещенск</b></i></span></li>
                    <li class="t6"><span><i><b>г. Хабаровск</b></i></span></li>
                    <li class="t7"><span><i><b>г. Москва</b></i></span></li>
                    <li class="t8"><span><i><b>Китай, г. Хэй-Хэ</b></i></span></li>
                </ul>
                <div class="t5">
                    <?php query_posts('post_type=contact&contact-category=g-blagoveshhensk'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="contact-list">
                        <h2><?php the_title(); ?></h2>
                            <div><?php the_content(); ?></div><br />
                        <p><a href="#wpcf7-f2-p2682-o1" class="button">Напишите нам</a></p>
                        <p><span href="<?=wp_get_attachment_url(get_post_meta(2750,'_simple_fields_fieldGroupID_8_fieldID_1_numInSet_0',true)) ?>" class="fancyimg">Как добраться</span></p>
                    </div>
                    <div class="contact-list">
                        <p><b>Менеджеры в Благовещенске</b></p>
                        <ul>
                                <?php for($i = 0;get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)!=0;$i++) {?>
                            <li>
                                <div class="ava"><img src="<?=wp_get_attachment_url(get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)) ?>" alt="" title="" /></div>
                                <span class="name"><?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_2_numInSet_'.$i,true); ?></span>
                                <p>тел.: <?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_8_numInSet_'.$i,true);?></p>
                                <p><img src="http://web.icq.com/whitepages/online?icq=<?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?>&img=5" alt="Статус <?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_',true); ?>" /><?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?></p>
                                <p class="skype"><a href="skype:<?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?>"><?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?></a></p>
                                <p><a href="mailto:<?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_5_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo1.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_6_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/v.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2750,'_simple_fields_fieldGroupID_7_fieldID_7_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/f.jpg" alt="" title="" /></a></p>
                            </li>
        <?php } ?>
                        </ul>
                    </div>
<?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                </div>
                <div class="t6">
<?php query_posts('post_type=contact&contact-category=g-xabarovsk'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="contact-list">
                        <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
                        <p><a href="#wpcf7-f2-p2682-o1" class="button">Напишите нам</a></p>
                        <p><span href="<?=wp_get_attachment_url(get_post_meta(2753,'_simple_fields_fieldGroupID_8_fieldID_1_numInSet_0',true)) ?>" class="fancyimg">Как добраться</span></p>
                    </div>
                    <div class="contact-list">
                        <p><b>Менеджеры в г. Хабаровск</b></p>
                        <ul>
    <?php for($i = 0;get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)!=0;$i++) {?>
                            <li>
                                <div class="ava"><img src="<?=wp_get_attachment_url(get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)) ?>" alt="" title="" /></div>
                                <span class="name"><?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_2_numInSet_'.$i,true); ?></span>
                                <p>тел.: <?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_8_numInSet_'.$i,true);?></p>
                                <p><img src="http://web.icq.com/whitepages/online?icq=<?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?>&img=5" alt="Статус <?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_',true); ?>" /><?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?></p>
                                <p class="skype"><a href="skype:<?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?>"><?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?></a></p>
                                <p><a href="mailto:<?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_5_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo1.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_6_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/v.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2753,'_simple_fields_fieldGroupID_7_fieldID_7_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/f.jpg" alt="" title="" /></a></p>
                            </li>
        <?php } ?>
                        </ul>
                    </div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
                </div>
                <div class="t7">
<?php query_posts('post_type=contact&contact-category=g-moskva'); ?>
<?php while (have_posts()) : the_post(); ?>				
                    <div class="contact-list">
                        <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
                        <p><a href="#wpcf7-f2-p2682-o1" class="button">Напишите нам</a></p>
                        <p><span href="<?=wp_get_attachment_url(get_post_meta(2751,'_simple_fields_fieldGroupID_8_fieldID_1_numInSet_0',true)) ?>" class="fancyimg">Как добраться</span></p>
                    </div>
                    <div class="contact-list">
                        <p><b>Менеджеры в Москве</b></p>
                        <ul>
    <?php for($i = 0;get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)!=0;$i++) {?>
                            <li>
                                <div class="ava"><img src="<?=wp_get_attachment_url(get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)) ?>" alt="" title="" /></div>
                                <span class="name"><?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_2_numInSet_'.$i,true); ?></span>
                                <p>тел.: <?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_8_numInSet_'.$i,true);?></p>
                                <p><img src="http://web.icq.com/whitepages/online?icq=<?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?>&img=5" alt="Статус <?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_',true); ?>" /><?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?></p>
                                <p class="skype"><a href="skype:<?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?>"><?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?></a></p>
                                <p><a href="mailto:<?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_5_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo1.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_6_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/v.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2751,'_simple_fields_fieldGroupID_7_fieldID_7_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/f.jpg" alt="" title="" /></a></p>
                            </li>
        <?php } ?>
                        </ul>
                    </div>
                            <?php endwhile; ?>
<?php wp_reset_query(); ?>
                </div>
                <div class="t8">
                    <?php query_posts('post_type=contact&contact-category=kitaj-g-xej-xe'); ?>
<?php while (have_posts()) : the_post(); ?>				
                    <div class="contact-list">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <p><a href="#wpcf7-f2-p2682-o1" class="button">Напишите нам</a></p>
                        <p><span href="<?=wp_get_attachment_url(get_post_meta(2751,'_simple_fields_fieldGroupID_8_fieldID_1_numInSet_0',true)) ?>" class="fancyimg">Как добраться</span></p>
                    </div>
                    <div class="contact-list">
                        <p><b>Менеджеры в Китай, г. Хэй-Хэ</b></p>
                        <ul>
    <?php for($i = 0;get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)!=0;$i++) {?>
                            <li>
                                <div class="ava"><img src="<?=wp_get_attachment_url(get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_1_numInSet_'.$i,true)) ?>" alt="" title="" /></div>
                                <span class="name"><?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_2_numInSet_'.$i,true); ?></span>
                                <p>тел.: <?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_8_numInSet_'.$i,true);?></p>
                                <p><img src="http://web.icq.com/whitepages/online?icq=<?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?>&img=5" alt="Статус <?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_',true); ?>" /><?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_3_numInSet_'.$i,true); ?></p>
                                <p class="skype"><a href="skype:<?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?>"><?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_4_numInSet_'.$i,true);?></a></p>
                                <p><a href="mailto:<?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_5_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo1.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_6_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/v.jpg" alt="" title="" /></a> <a href="<?=get_post_meta(2752,'_simple_fields_fieldGroupID_7_fieldID_7_numInSet_'.$i,true);?>"><img src="<?php bloginfo('template_directory'); ?>/img/f.jpg" alt="" title="" /></a></p>
                            </li>
        <?php } ?>
                        </ul>
                    </div>
<?php endwhile; ?>
                            <?php wp_reset_query(); ?>
                </div>
            </div>
                    <?php echo do_shortcode('[contact-form 2 "Обратная связь"]') ?>
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
<?php get_footer();?>