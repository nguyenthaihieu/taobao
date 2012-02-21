<div class="blog">
    <h2>Новое в блоге</h2>
    <ul>
        <?php
		global $is_fp;
		if (isset($is_fp) && $is_fp === true) {
			$showposts = 4;
		} else {
			$showposts = 3;
		}
		query_posts('cat=4&showposts=' . $showposts);
   		while (have_posts()) : the_post();
                echo("<li>"); ?>
        <p><span class="data"><?php the_time('d.m.Y'); ?></span> <span class="com"><?php comments_number('0','1','%'); ?></span></p>
        <p class="title"><a href="<?php the_permalink() ?>">"<?php the_title() ?>"</a></p> <?php
                echo the_excerpt("<p>", "</p>");
                echo("</li>");
        endwhile;
        ?>
    </ul>
</div>
