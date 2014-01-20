<?php get_header(); ?>

		<!-- begin main -->
		<section class="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- begin .post -->
		<article <?php post_class(); ?>>

			<!-- begin .post-thumb -->
			<div class="post-thumb">
				<?php if(has_post_thumbnail()): the_post_thumbnail('single-post-image', array('class'=>'blog-thumb')); else: ?><?php endif; ?>

			</div>
			<!-- end .post-thumb -->

			<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>

			<?php endwhile; ?>

		</article>
		<!-- end .post -->

			<?php endif;?>
		</section>
		<!-- end main -->


<div class="clear"></div>
<?php get_footer(); ?>