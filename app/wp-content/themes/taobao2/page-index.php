<?php get_header(); ?>

<section id="container">
    <div class="left">
        <div class="slider">
            <ul>  
				<?php for($i=0; get_post_meta(2701,'_simple_fields_fieldGroupID_5_fieldID_1_numInSet_'.$i,true)!=0;$i++) 
				{?>					
				<li>
					<a href="<?=get_post_meta(2701,'_simple_fields_fieldGroupID_5_fieldID_2_numInSet_'.$i,true); ?>">
		               <img src="<?=wp_get_attachment_url(get_post_meta(2701,'_simple_fields_fieldGroupID_5_fieldID_1_numInSet_'.$i,true)) ?>" alt="" title="" />
		            </a>
				</li>
				<?php }?>               
            </ul>
            <div class="pager"></div>
        </div>

<!--        Video-slider on home page-->
        <?php require_once "functions/slider-video-home.php"; ?>

    </div>
    <div class="right">
        <div class="boxen">
            <?php get_sidebar('calc') ?>
		</div>	
    </div>
</section>
<div id="bg-wraper">
    <div id="wraper">
        <div class="read">
            <h2>Полезно почитать</h2>
            <ul>
                <?php
					// The Query
					$the_query = new WP_Query('category_name=polezno-pochitat&posts_per_page=4');    
					// The Loop
					while ( $the_query->have_posts() ) : $the_query->the_post();
						echo '<li>'; ?>
						<p class="title"><a href="<?php the_permalink() ?>">"<?php the_title() ?>"</a></p> <?php
						echo '</li>';
					endwhile;
					
					// Reset Post Data
					wp_reset_postdata();				
				?>
            </ul>
        </div>
        <div class="report">
            <h2><span>Новые отзывы</span> <a href="<?php bloginfo('url') ?>/?page_id=982">все отзывы</a></h2>
            <table>
				<tr>
					<?php
                    $comments = get_comments('post_id=982&number=2&offset=0');
                    foreach($comments as $comment) :
                         echo "<td>"; ?>
                         <strong><?php printf(__('%s'), get_comment_author_link()) ?></strong> <span class="date"><?php printf(__('%1$s'), get_comment_date()) ?>
                            <?php
                            $author = get_comment_author_url();
                            echo substr_replace($author, "", 0, 7);
                            ?>
					 </span> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a>
                        <?php if ($comment->comment_approved == '0') : ?>
                        <p><?php _e('Your comment is awaiting moderation.') ?></p>
                        <?php endif; ?>
                         <?php
                    endforeach;
                    echo "</td>";
                    ?>
				</tr>
                <tr>
                    <?php
                    $comments = get_comments('post_id=982&number=2&offset=0');
                    foreach($comments as $comment) :
                         echo "<td>"; ?>
                          <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a>                       
                        <?php comment_text(); ?> <?php
                    endforeach;
                    echo "</td>";
                    ?>
                </tr>
				<tr class="height">
					<td></td>
					<td></td>
				</tr>
                <tr>
					<?php
                    $comments = get_comments('post_id=982&number=2&offset=2');
                    foreach($comments as $comment) :
                         echo "<td>"; ?>
                         <strong><?php printf(__('%s'), get_comment_author_link()) ?></strong> <span class="date"><?php printf(__('%1$s'), get_comment_date()) ?>
                            <?php
                            $author = get_comment_author_url();
                            echo substr_replace($author, "", 0, 7);
                            ?>
					 </span> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a>
                        <?php if ($comment->comment_approved == '0') : ?>
                        <p><?php _e('Your comment is awaiting moderation.') ?></p>
                        <?php endif; ?>
                         <?php
                    endforeach;
                    echo "</td>";
                    ?>
				</tr>				
                <tr>
                    <?php
                    $comments = get_comments('post_id=982&number=2&offset=2');
                    foreach($comments as $comment) :
                         echo "<td>"; ?>
                          <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a>
                        <?php if ($comment->comment_approved == '0') : ?>
                        <p><?php _e('Your comment is awaiting moderation.') ?></p>
                        <?php endif; ?>
                        <?php comment_text(); ?> <?php
                    endforeach;
                    echo "</td>";
                    ?>
                </tr>
            </table>

        </div>
    </div>
</div>
<section id="bg-main">
    <section id="main">
        <div class="block">
			<?php query_posts('post_type=optionstext&p=2707')?>
             <?php if (have_posts()) : ?>
                   <?php while (have_posts()) : the_post();  ?>
                       <div class="news">

			      			<p><?php the_content();?></p>

                      </div>
                   <?php endwhile; ?>
             <?php endif;?>
        </div>
            <?php get_sidebar('blog') ?>
    </section>
</section>
<div class="last">
    <div class="text">
        <div class="text-left">
			<?php query_posts('post_type=optionstext&p=2702')?>
             <?php if (have_posts()) : ?>
                   <?php while (have_posts()) : the_post();  ?>
                       <div class="news">

			      			<p><strong><?php the_title();?></strong></p>
			      			<p><?php the_content();?></p>

                      </div>
                   <?php endwhile; ?>
             <?php endif;?>
        </div>
        <div class="text-right">
            <div class="col-1">
				<?php query_posts('post_type=optionstext&p=2704')?>
	             <?php if (have_posts()) : ?>
	                   <?php while (have_posts()) : the_post();  ?>
	                       <div class="news">

				      			<p><strong><?php the_title();?></strong></p>
				      			<p><?php the_content();?></p>

	                      </div>
	                   <?php endwhile; ?>
	             <?php endif;?>
            </div>
            <div class="col-1 right">
				<?php query_posts('post_type=optionstext&p=2706 ')?>
	             <?php if (have_posts()) : ?>
	                   <?php while (have_posts()) : the_post();  ?>
	                       <div class="news">

				      			<p><strong><?php the_title();?></strong></p>
				      			<p><?php the_content();?></p>

	                      </div>
	                   <?php endwhile; ?>
	             <?php endif;?>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>