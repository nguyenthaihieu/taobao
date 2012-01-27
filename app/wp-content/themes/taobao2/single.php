<?php get_header(); ?>
<?php //var`s for comments
$no="комментариев нет";
$one="комментарий - 1";
$more="комментариев - %";
$onenumber="1";
$morenumber="%";
function catch_that_image() {
  global $post, $posts;
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  return $matches[1][1];
}
?>

	<div class="width">
		<section id="container">
			<section id="content">
				<h2 class="title">Блог Taobao.ru.com</h2>
				<span class="post"></span>
				<?php rewind_posts(); $i=1; ?>  
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="top"></div>
				<div class="body">
					<div class="page">
						<h2><?php the_title(); ?></h2>
							
									<p><?php the_content(); ?></p>
							
												<div class="article">
							<span class="label"><?php the_tags('', ', ', '<br />'); ?></span>
							<?php endwhile; else: ?>
							<p><?php _e('По вашему запросу ничего нет.'); ?></p>
							<?php endif; ?>
							<a class="com"><?php comments_number(0,$onenumber,$morenumber);?></a>
							<span class="data"><?php the_time('d.m.Y');?></span> 
						</div>
						<div class="soc"><img src="img/soc.gif" alt="" title="" /></div>	
						<div class="comentars">
							<h3>Комментарии</h3>
							<?php get_template_part( 'content', 'single' ); ?>
							<?php comments_template( '', true ); ?>
							<!--<form action="" method="post">
								<div class="item">
									<div class="ava"><a href="#"><img src="img/ava.gif" alt="" title="" /></a></div>
									<textarea></textarea>
								</div>
								<div class="coment">
									<div class="ava"><a href="#"><img src="img/ava.gif" alt="" title="" /></a></div>
									<div class="boxer">
										<p><a href="#" class="name">T-ula</a> <span class="date">22 ноября 2011, 20:55</span></p>
										<p>Здравствуйте! Хотела бы заказать 5 брендовых курточек (одной модели), не будет ли проблем с таможней? Обычно многие поставщики не советуют заказывать более 4-х шт.  одной модели?</p>
									</div>
									<div class="podcoment">
										<div class="ava"><a href="#"><img src="img/ava.gif" alt="" title="" /></a></div>
										<div class="boxe">
											<p><a href="#" class="nameblue">T-ula</a> <span class="date">22 ноября 2011, 20:55</span></p>
											<p>Здравствуйте! Хотела бы заказать 5 брендовых курточек (одной модели), не будет ли проблем с таможней? Обычно многие поставщики не советуют заказывать более 4-х шт.  одной модели?</p>
										</div>
									</div>
								</div>
								<div class="coment">
									<div class="ava"><a href="#"><img src="img/ava.gif" alt="" title="" /></a></div>
									<div class="boxer">
										<p><a href="#" class="name">T-ula</a> <span class="date">22 ноября 2011, 20:55</span></p>
										<p>Здравствуйте! Хотела бы заказать 5 брендовых курточек (одной модели), не будет ли проблем с таможней? Обычно многие поставщики не советуют заказывать более 4-х шт.  одной модели?</p>
									</div>
								</div>
							</form>-->
							
							<ul class="rss">
								<li><a href="<?php bloginfo('rss2_url'); ?>" class="rss">RSS</a></li>
								<li><a href="#" class="mail">Подписаться по e-mail</a></li>
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
