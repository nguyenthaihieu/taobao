<?php get_header();?>
<?php //var`s for comments
$no="комментариев нет";
$one="комментарий - 1";
$more="комментариев - %";
$onenumber="1";
$morenumber="%";
?>
<body>	
	<div class="width">
		<section id="container">
			<section id="content">
				<h2 class="title">Блог Taobao.ru.com</h2>
				<span class="post">Всего записей: <?php echo get_category('4')->category_count;?></span>
				<div class="top"></div>
				<div class="body">
					<?php query_posts( array( 'cat' => 4, 'paged' => get_query_var('paged') ) );?>
					<div class="allbox padding">
						<?php while(have_posts()) : the_post(); global $post;?>
						<div class="post">
							<h2><a href="#"><?php the_title();?></a></h2>
							<p><?php list($teaser, $junk) = explode('<!--more',$post->post_content);
					echo apply_filters('the_content', $teaser); ?> <a href="<?php the_permalink();?>">Есть решение!</a></p>
							<div class="article">
								<span class="label"><?php the_tags('', ', ', '<br />'); ?></span>
								<a class="com"><?php comments_number("0",$onenumber,$morenumber);?></a>
								<span class="data"><?php the_time('d.m.Y');?></span> 
							</div>
						</div>
						<?php endwhile;?>
						<div class="pagenawi">
							<?php wp_pagenavi();?>
						</div>	
						<?php wp_reset_query();?>
					</div>
				</div>
				<div class="bottom"></div>
			</section>			
			<div class="right">
				<div class="boxen">
					<?php get_sidebar('calc') ?>
					<div class="bottom-s"></div>
					<div class="blog-gree">
						<?php get_sidebar('blog') ?>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php get_footer();?>
</body>
</html>