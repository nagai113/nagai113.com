<?php get_header(); ?>

		<section class="main">

			<div class="my_works">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h2><?php the_title(); ?></h2>

			<div class="navigation">
  				<div class="alignright"><?php next_post_link( '%link', '%title &raquo;' ); ?></div>
  				<div class="alignleft"><?php previous_post_link( '%link', '&laquo; %title' ); ?></div>
		    </div>

			<div class="work_item_image">
			<?php
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-landscape' );
				if(has_post_thumbnail()): echo '<img src="'.$thumbnail[0].'"/>'; else: ?>
			<?php endif; ?>
			</div>

			<div class="portfolio_desc">
				<?php the_content(); ?>
			</div>

			<?php endwhile; ?>

			<? endif;?>

			</div>

		</section>

<div class="clear"></div>
<?php get_footer(); ?>